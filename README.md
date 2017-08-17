# arduino-php-wrapper

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/3d57a79cbf3245e0af61e9123fda26eb)](https://www.codacy.com/app/matheus-marabesi/arduino-php-wrapper?utm_source=github.com&utm_medium=referral&utm_content=marabesi/arduino-php-wrapper&utm_campaign=badger)
[![Build Status](https://travis-ci.org/marabesi/arduino-php-wrapper.svg?branch=master)](https://travis-ci.org/marabesi/arduino-php-wrapper)
[![Latest Stable Version](https://poser.pugx.org/marabesi/arduino-php-wrapper/v/stable)](https://packagist.org/packages/marabesi/arduino-php-wrapper)
[![Total Downloads](https://poser.pugx.org/marabesi/arduino-php-wrapper/downloads)](https://packagist.org/packages/marabesi/arduino-php-wrapper)
[![composer.lock](https://poser.pugx.org/marabesi/arduino-php-wrapper/composerlock)](https://packagist.org/packages/marabesi/arduino-php-wrapper)

If you are wondering how to control the Arduino serial port via PHP, here is the solution. 
The **arduino://** wrapper is a easy and straightforward way to write and read data from Arduino.

## Usage

to write date on Arduino serial just use the regular I/O functions in PHP such as **fwrite** or **file_put_contents**

``` php
\Arduino\Wrapper::register();

//reads data from Arduino
$resource = fopen('arduino://ttyUSB0', 'r+');
print fread($resource, 1024);
```

Or if you prefer, you can use **file_get_contents** and get the same result
``` php
print file_get_contents('arduino://ttyUSB0');
```

To write data in the Arduino serial is as easy as it could be

``` php
\Arduino\Wrapper::register();

//writes data to Arduino
$resource = fopen('arduino://ttyUSB0', 'r+');
print fwrite('hello Arduino');
```

``` php
\Arduino\Wrapper::register();

print file_put_contents('arduino://hello Arduino');
```

## OOP

You can use in your project in a OOP style

### Sending data

``` php
$writer = new Arduino\Writer(new Arduino\Wrapper());
$bytes = $writer->out('ttyUSB0', 'from oop');
```
### Reading data

``` php
$arduino = new \Arduino\Wrapper();

$writer = new \Arduino\Reader($arduino);
while (true) {
    print $writer->from('/dev/cu.usbmodem1411');
}
```

## Improvements

As you can see is really simple and we can improve it much more as the sensors are identified
