<?php

namespace vladimino\CHGKDB\Resource;

use GuzzleHttp\Client;
use Symfony\Component\Yaml\Parser;

/**
 * Class BaseResource
 * @package vladimino\CHGKDB
 */
abstract class AbstractResource
{
    /**
     * Path to config file
     */
    const CONFIG_FILE = __DIR__.'/../../config/config.yaml';

    /**
     * Configuration
     */
    protected $config;
    /**
     * @var Parser
     */
    protected $parser;
    /**
     * @var Client
     */
    protected $client;

    /**
     * Tours constructor.
     *
     * @param Parser $parser
     * @param Client $client
     */
    public function __construct(Parser $parser, Client $client)
    {
        $this->parser = $parser;
        $this->client = $client;
        $this->config = $this->parser->parse(file_get_contents(self::CONFIG_FILE));
    }

    /**
     * @param string $param
     *
     * @return array|string|null
     */
    public function getConfig($param = null)
    {
        if (empty($param)) {
            return $this->config;
        }

        return array_key_exists($param, $this->config) ? $this->config[$param] : null;
    }

    /**
     * @param string $url
     *
     * @return \SimpleXMLElement
     */
    protected function getResponse($url)
    {
        $response = $this->client->request('GET', $url);

        return new \SimpleXMLElement($response->getBody());
    }

    /**
     * @return string
     */
    abstract protected function getBaseUrl();

    /**
     * @param string $slug
     *
     * @return string
     */
    protected function getFullUrl($slug = '')
    {
        return $this->getBaseUrl().$slug.'/'.$this->config['format'];
    }
}
