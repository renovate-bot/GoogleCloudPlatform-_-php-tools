<?php

namespace Google\Cloud\Samples\NoArgs;

use Google\Cloud\Dlp\V2\DlpServiceClient;

// Instantiate a client.
$dlp = new DlpServiceClient();

// no args
$infoTypes = $dlp->listInfoTypes();
