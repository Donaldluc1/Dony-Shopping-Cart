<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitefea73b08593ac7e2f5cb7e24e831782
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitefea73b08593ac7e2f5cb7e24e831782::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitefea73b08593ac7e2f5cb7e24e831782::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
