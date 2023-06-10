<?php

namespace EmadMohammed\WHMAPI\base;

use EmadMohammed\WHMAPI\exceptions\ResponseException;
use EmadMohammed\WHMAPI\exceptions\SSLException;
use EmadMohammed\WHMAPI\utilities\Initiator;
use EmadMohammed\WHMAPI\utilities\RegEx;

abstract class Client
{
    protected $client;
    protected $defaultOptions = [];


    /**
     * @throws SSLException
     */
    protected function init($domainOrIP)
    {
        (new  RegEx($domainOrIP))->isIP4() ? $domainOrIP = Initiator::getHostByIP($domainOrIP) : '';
        if (!Initiator::checkSSL($domainOrIP))
            throw new SSLException("this $domainOrIP don't has ssl API require secure connection");
        return $domainOrIP;
    }


    /**
     * @throws ResponseException
     */
    public function executeAPICall($path, $options = [])
    {
        try {
            return json_decode($this->client->get($path, array_merge_recursive($this->defaultOptions, $options))->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\ClientException $guzzleException) {
            throw new  ResponseException($guzzleException , $guzzleException->getResponse()->getStatusCode());
        }
    }

}