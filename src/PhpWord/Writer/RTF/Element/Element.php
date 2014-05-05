<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\RTF\Element;

use PhpOffice\PhpWord\Element\AbstractElement;
use PhpOffice\PhpWord\Writer\RTF;

/**
 * Generic element writer
 *
 * @since 0.10.0
 */
class Element
{
    /**
     * Parent writer
     *
     * @var \PhpOffice\PhpWord\Writer\RTF
     */
    protected $parentWriter;

    /**
     * Element
     *
     * @var \PhpOffice\PhpWord\Element\AbstractElement
     */
    protected $element;

    /**
     * Without paragraph
     *
     * @var bool
     */
    protected $withoutP = false;

    /**
     * Create new instance
     *
     * @param bool $withoutP
     */
    public function __construct(RTF $parentWriter, AbstractElement $element, $withoutP = false)
    {
        $this->parentWriter = $parentWriter;
        $this->element = $element;
        $this->withoutP = $withoutP;
    }

    /**
     * Write element
     *
     * @return string
     */
    public function write()
    {
        $rtfText = '';
        $elmName = str_replace('PhpOffice\\PhpWord\\Element\\', '', get_class($this->element));
        $elmWriterClass = 'PhpOffice\\PhpWord\\Writer\\RTF\\Element\\' . $elmName;
        if (class_exists($elmWriterClass) === true) {
            $elmWriter = new $elmWriterClass($this->parentWriter, $this->element, $this->withoutP);
            $rtfText = $elmWriter->write();
        }

        return $rtfText;
    }
}
