<?php

/// Require Composer AutoLoader
require_once '../../vendor/autoload.php';

/// Define our application
$App = new \alphayax\freebox\utils\Application( 'com.alphayax.freebox.config', 'PHP API Example (Config)', '1.0.0');
$App->authorize();
$App->openSession();

// PortForwarding
$toto = new \alphayax\freebox\api\v3\services\config\NAT\IncomingPort( $App);
$a = $toto->getFromId('http');
var_dump( $a);
