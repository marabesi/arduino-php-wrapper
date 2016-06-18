<?php

class ArduinoTest extends \ArduinoTestCase
{

    public function testShouldDefineArduinoWrapperToBeUsed()
    {
        $arduino = new \Arduino\Wrapper();

        $has = false;
        foreach (stream_get_wrappers() as $wrapper) {
            if ($wrapper == 'arduino') {
                $has = true;
                break;
            }
        }

        $this->assertTrue($has);
    }

    public function testShoudlSendDataToArduino()
    {
        $resource = fopen('arduino://' . $this->fakeUsbPath, 'r+');
        fwrite($resource, 'data to arduino');

        $this->assertTrue(is_resource($resource));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testShouldHandlerErrorWhenTheUsbIsNotAvailable()
    {
        fopen('arduino:///foo/bar/tty_fake_usb', 'r+');
    }
}
