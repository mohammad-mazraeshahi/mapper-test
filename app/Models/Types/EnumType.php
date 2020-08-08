<?php


namespace App\Models\Types;

use ReflectionClass;

abstract class EnumType
{
    public static function toArray()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }
}
