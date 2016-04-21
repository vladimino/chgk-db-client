<?php

namespace vladimino\CHGKDB;

use GuzzleHttp\Client;
use Symfony\Component\Yaml\Parser;

/**
 * Class Tours
 * @package vladimino\CHGKDB
 */
class Tours
{
    /**
     * Path to config file
     */
    const CONFIG_FILE = __DIR__.'/../config/config.yaml';

    /**
     * Configuration
     */
    private $config;

    /**
     * Tours constructor.
     */
    public function __construct()
    {
        $this->config = (new Parser())->parse(file_get_contents(self::CONFIG_FILE));
    }

    /**
     * @param string $param
     *
     * @return array|null|string
     */
    public function getConfig($param = null)
    {
        if (empty($param)) {
            return $this->config;
        }

        return array_key_exists($param, $this->config) ? $this->config[$param] : null;
    }

    /**
     * @return mixed
     */
    public function retrieveRootPage()
    {
        $client = new Client();
        $response = $client->request('GET', $this->getToursUrl());
        $toursCollection = new \SimpleXMLElement($response->getBody());

        return $toursCollection;
    }

    private function getToursUrl()
    {
        return $this->config['base_url'].$this->config['tours_slug'].$this->config['format'];
    }
}
