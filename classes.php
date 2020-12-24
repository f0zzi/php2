<?php

class BreadcrumbItem
{
    public $text;
    public $url;
    public $isActive;

    function __construct($text, $isActive=false, $url="green")
    {
        $this->text = $text;
        $this->isActive = $isActive;
        $this->url = $url;
    }
    function show()
    {
        if ($this->isActive) {
            print '<li class="breadcrumb-item active">' . $this->text . '</li>';
        } else {
            print '<li class="breadcrumb-item"><a href="' . $this->url . '">' . $this->text . '</a></li>';

        }
    }
}