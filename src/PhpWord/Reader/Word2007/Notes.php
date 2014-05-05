<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Reader\Word2007;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\XMLReader;

/**
 * Notes reader
 */
class Notes extends AbstractPart
{
    /**
     * Note type footnotes|endnotes
     *
     * @var string
     */
    protected $type = 'footnotes';

    /**
     * Read (footnotes|endnotes).xml
     *
     * @param \PhpOffice\PhpWord\PhpWord $phpWord
     */
    public function read(PhpWord &$phpWord)
    {
        $this->type = ($this->type == 'endnotes') ? 'endnotes' : 'footnotes';
        $getMethod = 'get' . $this->type;
        $collection = $phpWord->$getMethod()->getItems();

        $xmlReader = new XMLReader();
        $xmlReader->getDomFromZip($this->docFile, $this->xmlFile);
        $nodes = $xmlReader->getElements('*');
        if ($nodes->length > 0) {
            foreach ($nodes as $node) {
                $id = $xmlReader->getAttribute('w:id', $node);
                $type = $xmlReader->getAttribute('w:type', $node);

                // Avoid w:type "separator" and "continuationSeparator"
                // Only look for <footnote> or <endnote> without w:type attribute
                if (is_null($type) && array_key_exists($id, $collection)) {
                    $element = $collection[$id];
                    $pNodes = $xmlReader->getElements('w:p/*', $node);
                    foreach ($pNodes as $pNode) {
                        $this->readRun($xmlReader, $pNode, $element, $this->type);
                    }
                    $addMethod = 'add' . ($this->type == 'endnotes' ? 'endnote' : 'footnote');
                    $phpWord->$addMethod($element);
                }
            }
        }
    }
}
