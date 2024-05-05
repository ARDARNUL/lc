<?php

namespace Src;

use InvalidArgumentException;

class Response
{
    protected $content;
    protected $status;
    protected $headers;

    

    public function __construct($content, $status = 200, array $headers = [])
    {
        $this->setContent($content);
        $this->setStatus($status);
        $this->setHeaders($headers);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = (int) $status;

        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }

    public function withHeaders(array $headers)
    {
        foreach ($headers as $name => $value) {
            $this->headers[$name] = $value;
        }

        return $this;
    }
}