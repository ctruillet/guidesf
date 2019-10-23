<?php

namespace GuideSF;

class View
{
    use Helper;

    protected $arguments = array();

    public function set(string $key, $value): void
    {
        $this->arguments[$key] = $value;
    }

    public function __isset(string $key)
    {
        if (array_key_exists($key, $this->arguments)) {
            return true;
        }

        return false;
    }

    public function __get(string $key)
    {
        if (array_key_exists($key, $this->arguments)) {
            return $this->arguments[$key];
        }

        throw new \Exception("Invalid key '".$key."'");
    }

    public function render(string $template): void
    {
        include_once __DIR__.'/../../template/base.php';
    }
}
