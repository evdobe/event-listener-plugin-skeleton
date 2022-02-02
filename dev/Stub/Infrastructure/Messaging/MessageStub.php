<?php

namespace Stub\Infrastructure\Messaging;

use Application\Messaging\Message as ApplicationMessage;

class MessageStub implements ApplicationMessage
{

    protected string $body;

    protected array $headers;

    protected array $properties;

    protected string $key;

    public function getBody():string {
        return $this->body;
    }

    public function getHeaders():array {
        return $this->headers;
    }

    public function getHeader(string $name, mixed $default = null):mixed{
        return !empty($this->headers[$name])?$this->headers[$name]:$default;
    }

    public function getProperties():array{
        return $this->properties;
    }

    public function getPropery(string $name, mixed $default = null):mixed{
        return !empty($this->properties[$name])?$this->properties[$name]:$default;
    }

    public function getKey():?string{
        return $this->key;
    }

    public function withBody(string $body): ApplicationMessage
    {
        $new = clone($this);
        $new->body = $body;
        return $new;
    }

    public function withHeader(string $name, mixed $value): ApplicationMessage
    {
        $new = clone($this);
        $new->headers[$name] = $value;
        return $new;
    }

    public function withProperty(string $name, mixed $value): ApplicationMessage
    {
        $new = clone($this);
        $new->properties[$name] = $value;
        return $new;
    }

    public function withoutHeader(string $name): ApplicationMessage
    {
        $headers = $this->getHeaders();
        unset($headers[$name]);

        $new = clone($this);
        $new->headers = $headers;
        return $new;
    }

    public function withoutProperty(string $name): ApplicationMessage
    {
        $properties = $this->getProperties();
        unset($properties[$name]);

        $new = clone($this);
        $new->properties = $properties;
        return $new;
    }

}
