<?php

require '../vendor/autoload.php';

$arduino = new \Arduino\Wrapper();

$writer = new \Arduino\Reader($arduino);
while (true) {
    print $writer->from('/dev/cu.usbmodem1411');
}