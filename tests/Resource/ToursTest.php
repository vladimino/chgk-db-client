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
     * @var string
     */
    private $tourList = 'AUTHORS';

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
        $toursPage = $this->tours->retrieveTourListPage('AUTHORS');

        $this->assertNotEmpty($toursPage);
        $this->assertArrayHasKey('meta', $toursPage);
        $this->assertArrayHasKey('tours', $toursPage);
        $this->assertNotEmpty($toursPage['tours']);
    }

    /**
     *
     */
    public function testRetrieveTourListAuthorsPage()
    {
        $toursPage = $this->tours->retrieveTourListPage($this->tourList);

        $this->assertNotEmpty($toursPage);
        $this->assertArrayHasKey('meta', $toursPage);
        $this->assertArrayHasKey('tours', $toursPage);
        $this->assertEquals($this->tourList, $toursPage['meta']['TextId']);
        $this->assertNotEmpty($toursPage['tours']);
    }
}
