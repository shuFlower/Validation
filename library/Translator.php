<?php

namespace Respect\Validation;

/**
 * Class Translator
 *
 * @package Respect\Validation
 * @author  Leo Yang <leoyang@duduapp.net>
 */
class Translator
{

    protected static $map = array();


    public static function init($locale, $resource_dir = null)
    {
        if ($resource_dir === null) {
            $resource_dir = __DIR__ . DIRECTORY_SEPARATOR . 'Translator';
        }

        if (!is_dir($resource_dir)) {
            throw new \InvalidArgumentException("No such directory: {$resource_dir}");
        }

        $filename = sprintf("%s/%s.php", realpath($resource_dir), $locale);
        if (!is_file($filename)) {
            throw new \InvalidArgumentException("No such file: {$filename}");
        }

        static::$map = include $filename;

    }


    public static function trans($id, array $parameters = array())
    {
        if (array_key_exists($id, static::$map)) {
            $id = static::$map[$id];
        }

        return strtr($id, $parameters);
    }


}