<?php

namespace Arduino;

class Writer
{
    private $wrappers;

    public function __construct(Wrapper $wrapper)
    {
        $this->wrappers = $wrapper;
    }

    public function out($to, $data)
    {
        $this->wrappers->stream_open($to, 'r+');
        $bytes = $this->wrappers->stream_write($data);
        
        return ($bytes != 0);
    }
}