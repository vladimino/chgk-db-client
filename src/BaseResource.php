<?php

namespace vladimino\CHGKDB;

use GuzzleHttp\Client;
use Symfony\Component\Yaml\Parser;

/**
 * Class BaseResource
 * @package vladimino\CHGKDB
 */
class BaseResource
{
    /**
     * Path to config file
     */
    const CONFIG_FILE = __DIR__.'/../config/config.yaml';

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
}
