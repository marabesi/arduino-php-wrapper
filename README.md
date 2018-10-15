# arduino-php-wrapper (inspired by Johnny-Five JS)

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/3d57a79cbf3245e0af61e9123fda26eb)](https://www.codacy.com/app/matheus-marabesi/arduino-php-wrapper?utm_source=github.com&utm_medium=referral&utm_content=marabesi/arduino-php-wrapper&utm_campaign=badger)
[![Build Status](https://travis-ci.org/marabesi/arduino-php-wrapper.svg?branch=master)](https://travis-ci.org/marabesi/arduino-php-wrapper)
[![Latest Stable Version](https://poser.pugx.org/marabesi/arduino-php-wrapper/v/stable)](https://packagist.org/packages/marabesi/arduino-php-wrapper)
[![Total Downloads](https://poser.pugx.org/marabesi/arduino-php-wrapper/downloads)](https://packagist.org/packages/marabesi/arduino-php-wrapper)
[![composer.lock](https://poser.pugx.org/marabesi/arduino-php-wrapper/composerlock)](https://packagist.org/packages/marabesi/arduino-php-wrapper)

If you are wondering how to control the Arduino serial port via PHP, here is the solution. 
The **arduino://** wrapper is a easy and straightforward way to write and read data from Arduino.

## Install

```
composer require marabesi/arduino-php-wrapper
```

## Usage

To read data from Arduino serial just use the regular I/O functions in PHP such as **fread** or **file_get_contents**

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

As you can see is really simple and we can improve it much more as the sensors are identified.

- Prevent arduino from reload everytime a request is made by PHP

## Slides (talks based on this lib)

[![SlideShare](https://img.shields.io/badge/slides-SlideShare-brightgreen.svg)](https://www.slideshare.net/marabesi/introduction-to-iot-and-php-nerdzao-day-1) [Introduction to IoT and PHP - Nerdzão day #1](https://www.slideshare.net/marabesi/introduction-to-iot-and-php-nerdzao-day-1)

[![SlideShare](https://img.shields.io/badge/slides-SlideShare-brightgreen.svg)](
https://www.slideshare.net/marabesi/iot-powered-by-php-and-streams-phpexperience2017) [IoT powered by PHP and streams - PHPExperience2017](https://www.slideshare.net/marabesi/iot-powered-by-php-and-streams-phpexperience2017)

[![SlideShare](https://img.shields.io/badge/slides-SlideShare-brightgreen.svg)](
https://www.slideshare.net/marabesi/controll-your-house-with-the-elephpant-phpconf2016) [Control your house with the elePHPant - PHPConf2016](https://www.slideshare.net/marabesi/controll-your-house-with-the-elephpant-phpconf2016)
