<?php

namespace Barcha17\Module\ModuleTest;


class Document
{
    private $id;
    private $text;
    public function getText(): string
    {
        return $this->name;
    }
    public function setText(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
