<?php
/**
 * PHPWord
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Tests\Reader;

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Reader\Word2007;

/**
 * Test class for PhpOffice\PhpWord\Reader\Word2007
 *
 * @coversDefaultClass \PhpOffice\PhpWord\Reader\Word2007
 * @runTestsInSeparateProcesses
 */
class Word2007Test extends \PHPUnit_Framework_TestCase
{
    /**
     * Init
     */
    public function tearDown()
    {
    }

    /**
     * Test canRead() method
     */
    public function testCanRead()
    {
        $object = new Word2007();
        $fqFilename = join(
            DIRECTORY_SEPARATOR,
            array(PHPWORD_TESTS_BASE_DIR, 'PhpWord', 'Tests', '_files', 'documents', 'reader.docx')
        );
        $this->assertTrue($object->canRead($fqFilename));
    }

    /**
     * Can read exception
     *
     * @expectedException \PhpOffice\PhpWord\Exception\Exception
     */
    public function testCanReadFailed()
    {
        $object = new Word2007();
        $fqFilename = join(
            DIRECTORY_SEPARATOR,
            array(PHPWORD_TESTS_BASE_DIR, 'PhpWord', 'Tests', '_files', 'documents', 'foo.docx')
        );
        $this->assertFalse($object->canRead($fqFilename));
        $object = IOFactory::load($fqFilename);
    }

    /**
     * Load
     */
    public function testLoad()
    {
        $fqFilename = join(
            DIRECTORY_SEPARATOR,
            array(PHPWORD_TESTS_BASE_DIR, 'PhpWord', 'Tests', '_files', 'documents', 'reader.docx')
        );
        $object = IOFactory::load($fqFilename);
        $this->assertInstanceOf('PhpOffice\\PhpWord\\PhpWord', $object);
    }
}
