<?php

defined('_EXEC') or die;

class Route_vkye
{
    private $path;
    private $settings_url;

    public function __construct($path, $settings_url)
    {
        $this->path = $path;
        $this->settings_url = $settings_url;
    }

    public function on_change_start()
    {
    }

    public function on_change_end()
    {
    }
}
