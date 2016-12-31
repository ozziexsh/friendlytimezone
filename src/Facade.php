<?php

namespace Nehero\FriendlyTimezone;

require_once __DIR__ . '/FriendlyTimezone.php';

class Facade
{
    public static function __callStatic($name, $args)
    {
        return (new \Nehero\FriendlyTimezone())->$name(...$args);
    }
}