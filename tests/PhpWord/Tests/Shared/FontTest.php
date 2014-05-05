<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Tests\Shared;

use PhpOffice\PhpWord\Shared\Font;

/**
 * Test class for PhpOffice\PhpWord\Shared\Font
 *
 * @coversDefaultClass \PhpOffice\PhpWord\Shared\Font
 * @runTestsInSeparateProcesses
 */
class FontTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test various conversions
     */
    public function testConversions()
    {
        $original = 1;

        $result = Font::fontSizeToPixels($original);
        $this->assertEquals($original * 16 / 12, $result);

        $result = Font::inchSizeToPixels($original);
        $this->assertEquals($original * 96, $result);

        $result = Font::centimeterSizeToPixels($original);
        $this->assertEquals($original * 37.795275591, $result);

        $result = Font::centimeterSizeToTwips($original);
        $this->assertEquals($original * 565.217, $result);

        $result = Font::inchSizeToTwips($original);
        $this->assertEquals($original * 565.217 * 2.54, $result);

        $result = Font::pixelSizeToTwips($original);
        $this->assertEquals($original * 565.217 / 37.795275591, $result);

        $result = Font::pointSizeToTwips($original);
        $this->assertEquals($original * 20, $result);
    }
}
