<?php

namespace vladimino\CHGKDB\Resource;

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
        $toursCollection = new \SimpleXMLElement($response->getBody());

        return $toursCollection;
    }

    private function getToursUrl()
    {
        return $this->config['base_url'].$this->config['tours_slug'].$this->config['format'];
    }
}
