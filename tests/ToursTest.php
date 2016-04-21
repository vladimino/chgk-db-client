<?php

namespace vladimino\CHGKDB;

/**
 * Class ToursTest
 * @package vladimino\CHGKDB
 */
class ToursTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Tours
     */
    private $tours;

    /**
     *
     */
    public function setUp()
    {
        $this->tours = $tours = new Tours();
    }

    /**
     *
     */
    public function testCanGetConfig()
    {
        $this->assertNotEmpty($this->tours->getConfig());
        $this->assertInternalType('array', $this->tours->getConfig());
    }

    /**
     *
     */
    public function testGetConfigParam()
    {
        $this->assertNotEmpty($this->tours->getConfig('base_url'));
    }

    /**
     *
     */
    public function testRetrieveToursRootPage()
    {
        $toursCollection = $this->tours->retrieveRootPage();

        $this->assertNotEmpty($toursCollection);
        $this->assertInstanceOf(\SimpleXmlElement::class, $toursCollection);
    }
}
