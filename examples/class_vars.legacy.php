<?php

namespace Google\Cloud\Samples\ClassVars;

// new client surface doesn't exist (yet)
use Google\ApiCore\LongRunning\OperationsClient;
// new client surface exists
use Google\Cloud\Dlp\V2\DlpServiceClient;
// invalid client
use Google\Cloud\Dlp\V2\NonexistentClient;
// new client surface exists
use Google\Cloud\SecretManager\V1\SecretManagerServiceClient;
// new client surface won't exist (not a generator client)
use Google\Cloud\Storage\StorageClient;

class ClientWrapper
{
    public $dlp;
    public $secretmanager;

    public function __construct()
    {
        $this->dlp = new DlpServiceClient();
        $this->secretmanager = new SecretManagerServiceClient();
    }

    public function callDlp()
    {
        $infoTypes = $this->dlp->listInfoTypes();
    }

    public function callSecretManager()
    {
        $secrets = $this->secretmanager->listSecrets('this/is/a/parent');
    }

    public function callDlpFromFunction(DlpServiceClient $client)
    {
        $infoTypes = $client->listInfoTypes();
    }
}

// Instantiate a wrapping object.
$wrapper = new ClientWrapper();

// these should update
$infoTypes = $wrapper->dlp->listInfoTypes();
$secrets = $wrapper->secretmanager->listSecrets('this/is/a/parent');
