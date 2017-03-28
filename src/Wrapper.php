<?php

namespace Arduino;

class Wrapper
{

    private static $wrapperName = 'arduino';
    private $path;

    public function __construct()
    {
        self::register();
    }

    public function stream_open($path, $mode, $options = null, &$opened_path = null)
    {
        $realPath = str_replace('arduino://', '', $path);

        /*if (!file_exists($realPath)) {
            throw new \InvalidArgumentException('Could not find Arduino connection in ' . $realPath);
        }*/

        $this->path = fopen($realPath, 'r+');

        return true;
    }

    public function stream_read($count)
    {
        sleep(2);
        return fgets($this->path, $count);
    }

    public function stream_write($data)
    {
        sleep(2);
        return fwrite($this->path, $data);
    }

    public function stream_eof()
    {
        return fclose($this->path);
    }

    public static function register()
    {
        // if we already defined the wrapper just return false
        foreach (stream_get_wrappers() as $wrapper) {
            if ($wrapper == self::$wrapperName) {
                return false;
            }
        }

        stream_wrapper_register(self::$wrapperName, self::class);
    }
}