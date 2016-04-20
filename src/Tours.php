<?php

namespace vladimino\CHGKDB;

use Symfony\Component\Yaml\Parser;

/**
 * Class Tours
 * @package vladimino\CHGKDB
 */
class Tours
{
    /**
     * Configuration
     */
    private $config;

    public function __construct()
    {
        $this->config = (new Parser())
            ->parse(
                file_get_contents(__DIR__.'/../config/config.yaml')
            );
    }

    /**
     * @return null|array|string
     */
    public function getConfig($param)
    {
        return $this->config[$param];
    }
}
