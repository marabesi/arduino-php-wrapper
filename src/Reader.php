<?php

namespace Arduino;


class Reader
{
    private $wrappers;

    public function __construct(Wrapper $wrapper)
    {
        $this->wrappers = $wrapper;
    }

    public function from($from)
    {
        $this->wrappers->stream_open($from, 'r');
        return $this->wrappers->stream_read(1024);
    }
}