<?php

namespace vladimino\CHGKDB;

/**
 * Class ToursTest
 * @package vladimino\CHGKDB
 */
class ToursTest extends \PHPUnit_Framework_TestCase
{
    private $tours;

    /**
     *
     */
    public function setUp()
    {
        $this->tours = $tours = new Tours();
    }

    /**
     * Dummy test
     */
    public function testCanInstantiate()
    {
        $this->assertTrue(is_object($this->tours));
    }

    /**
     *
     */
    public function testCanReadConfig()
    {
        $this->assertNotEmpty($this->tours->getConfig('base_url'));
    }
}
