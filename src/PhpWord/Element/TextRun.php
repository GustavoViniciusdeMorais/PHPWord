<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\Style\Paragraph;

/**
 * Textrun/paragraph element
 */
class TextRun extends AbstractContainer
{
    /**
     * Paragraph style
     *
     * @var string|\PhpOffice\PhpWord\Style\Paragraph
     */
    private $paragraphStyle;

    /**
     * Create new instance
     *
     * @param string|array|\PhpOffice\PhpWord\Style\Paragraph $paragraphStyle
     */
    public function __construct($paragraphStyle = null)
    {
        $this->container = 'textrun';
        $this->paragraphStyle = $this->setStyle(new Paragraph(), $paragraphStyle);
    }

    /**
     * Get Paragraph style
     *
     * @return string|\PhpOffice\PhpWord\Style\Paragraph
     */
    public function getParagraphStyle()
    {
        return $this->paragraphStyle;
    }
}
