<?php

namespace vladimino\CHGKDB\Resource;

use GuzzleHttp\Client;
use Symfony\Component\Yaml\Parser;
use vladimino\CHGKDB\Converter\ToursConverter;

/**
 * Class Tours
 * @package vladimino\CHGKDB
 */
class Tours extends AbstractResource
{
    /**
     * @var ToursConverter
     */
    private $converter;

    /**
     * Tours constructor.
     *
     * @param Parser $parser
     * @param Client $client
     */
    public function __construct(Parser $parser, Client $client)
    {
        parent::__construct($parser, $client);
        $this->converter = new ToursConverter();
    }

    /**
     * @param string $tourTextId
     *
     * @return array
     */
    public function retrieveTourListPage($tourTextId = '')
    {
        $rawTours = $this->getResponse($this->getFullUrl($tourTextId));
        $toursPage = [
            'meta'  => $this->converter->getToursMeta($rawTours),
            'tours' => $this->converter->getToursCollection($rawTours),
        ];

        return $toursPage;
    }

    /**
     * @return string
     */
    protected function getBaseUrl()
    {
        return $this->config['base_url'].$this->config['tours_slug'];
    }
}
