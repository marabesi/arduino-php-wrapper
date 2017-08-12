<?php

require '../vendor/autoload.php';

$arduino = new \Arduino\Wrapper();

$writer = new \Arduino\Writer($arduino);
$writer->out('/dev/cu.usbmodem1411', 'OFF');
