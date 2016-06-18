<?php

class WriterTest extends \ArduinoTestCase
{

    public function testShouldWriteToArduinoUsingOOPStyle()
    {
        $writer = new Arduino\Writer(new Arduino\Wrapper());
        $bytes = $writer->out($this->fakeUsbPath, 'from oop');

        $this->assertNotEmpty($bytes);
    }
}