<?php

class ArduinoTestCase extends PHPUnit_Framework_TestCase
{

    protected $fakeArduinoUsbResource;
    protected $fakeUsbPath = 'ttyUSB0_fake';

    public function setUp()
    {
        $this->fakeArduinoUsbResource = fopen($this->fakeUsbPath, 'w');
    }

    public function tearDown()
    {
        fclose($this->fakeArduinoUsbResource);
        unlink($this->fakeUsbPath);
    }
}
