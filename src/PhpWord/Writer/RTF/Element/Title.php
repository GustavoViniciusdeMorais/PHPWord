<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\RTF\Element;

/**
 * TextBreak element RTF writer
 *
 * @since 0.10.0
 */
class Title extends Element
{
    /**
     * Write element
     *
     * @return string
     */
    public function write()
    {
        $rtfText = '';
        $rtfText .= '\pard\nowidctlpar' . PHP_EOL;
        $rtfText .= $this->element->getText();
        $rtfText .= '\par' . PHP_EOL;

        return $rtfText;
    }
}
