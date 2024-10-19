<?php

namespace App\Traits;

trait EnumList
{
    public static function optionList(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function allOptions()
    {
        $list = [];
        foreach (self::names() as $name) {
            $list[] = constant("self::$name")->options();
        }
        return $list;
    }

}
