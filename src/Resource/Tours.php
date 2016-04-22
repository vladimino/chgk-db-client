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

    /**
     * @return mixed
     */
    public function retrieveAuthorsPage()
    {
        $response = $this->client->request(
            'GET',
            $this->getToursUrl($this->getConfig('authors_slug'))
        );

        $rawTours = new \SimpleXMLElement($response->getBody());
        $converter = new ToursConverter($rawTours);
        $toursPage = [
            'meta'  => $converter->getToursMeta(),
            'tours' => $converter->getToursCollection(),
        ];

        return $toursPage;
    }

    private function getToursUrl($slug = '')
    {
        return $this->getToursBaseUrl().$slug.'/'.$this->config['format'];
    }

    /**
     * @return string
     */
    private function getToursBaseUrl()
    {
        return $this->config['base_url'].$this->config['tours_slug'];
    }
}
