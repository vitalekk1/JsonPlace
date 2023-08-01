<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit353f27cc2b01c42b21b5c9d2461d43cb
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit353f27cc2b01c42b21b5c9d2461d43cb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit353f27cc2b01c42b21b5c9d2461d43cb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit353f27cc2b01c42b21b5c9d2461d43cb::$classMap;

        }, null, ClassLoader::class);
    }
}