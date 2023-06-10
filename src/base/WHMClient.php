<?php

namespace EmadMohammed\WHMAPI\base;

use EmadMohammed\WHMAPI\exceptions\SSLException;
use EmadMohammed\WHMAPI\whm\accounts\AccountsManagement;
use EmadMohammed\WHMAPI\whm\mail\MailManagement;
use EmadMohammed\WHMAPI\whm\services\ServicesManagement;
use GuzzleHttp\Client as GClient;

class WHMClient extends Client
{

    private $accountM = null;
    private $serviceM = null;
    private $mailM = null;

    /**
     * @throws SSLException
     */
    public function __construct($domainOrIp, $username, $token)
    {
        $domainOrIp = $this->init($domainOrIp);
        $this->defaultOptions['query'] = [
            'api.version' => '1'
        ];
        $this->client = new GClient([
            'base_uri' => "https://$domainOrIp:2087/json-api/"
        ]);

        $this->defaultOptions['headers'] = [
            'Authorization' => " whm $username:$token"
        ];
    }


    /**
     * @return AccountsManagement
     */
    public function accountsManagementInstance(): AccountsManagement
    {
        $this->accountM === null ? $this->accountM = new AccountsManagement($this) : '';
        return $this->accountM;
    }


    /**
     * @return ServicesManagement
     */
    public function servicesManagementInstance(): ServicesManagement
    {
        $this->serviceM === null ? $this->serviceM = new ServicesManagement($this) : '';
        return $this->serviceM;
    }


    /**
     * @return MailManagement
     */
    public function mailManagementInstance(): MailManagement
    {
        $this->mailM === null ? $this->mailM = new MailManagement($this) : '';
        return $this->mailM;
    }

}