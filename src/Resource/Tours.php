<?php

namespace vladimino\CHGKDB\Resource;

use vladimino\CHGKDB\Converter\ToursConverter;

/**
 * Class Tours
 * @package vladimino\CHGKDB
 */
class Tours extends AbstractResource
{
    /**
     * @return mixed
     */
    public function retrieveRootPage()
    {
        $response = $this->client->request('GET', $this->getToursUrl());
        $rawTours = new \SimpleXMLElement($response->getBody());
        $toursCollection = (new ToursConverter($rawTours))->getToursCollection();

        return $toursCollection;
    }

    private function getToursUrl()
    {
        return $this->config['base_url'].$this->config['tours_slug'].$this->config['format'];
    }
}
