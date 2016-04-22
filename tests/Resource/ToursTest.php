<?php

namespace vladimino\CHGKDB\Resource;

use GuzzleHttp\Client;
use Symfony\Component\Yaml\Parser;

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
        $this->tours = new Tours(
            (new Parser()),
            (new Client())
        );
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
    }

    /**
     *
     */
    public function testRetrieveToursAuthorsPage()
    {
        $toursPage = $this->tours->retrieveAuthorsPage();

        $this->assertNotEmpty($toursPage);
        $this->assertArrayHasKey('meta', $toursPage);
        $this->assertArrayHasKey('tours', $toursPage);
    }
}
