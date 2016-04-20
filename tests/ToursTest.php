<?php

namespace vladimino\CHGKDB;

/**
 * Class ToursTest
 * @package vladimino\CHGKDB
 */
class ToursTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Dummy test
     */
    public function testCanInstantiate()
    {
        $tours = new Tours();
        $this->assertTrue(is_object($tours));
    }
}
