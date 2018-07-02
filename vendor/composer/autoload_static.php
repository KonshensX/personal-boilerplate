<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit88fa998b94509c951d0176a6be980d27
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Yaml\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit88fa998b94509c951d0176a6be980d27::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit88fa998b94509c951d0176a6be980d27::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}