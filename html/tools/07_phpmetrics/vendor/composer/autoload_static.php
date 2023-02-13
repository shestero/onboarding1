<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita44d61bf6dd4dcff03ccc99f8cc99a2a
{
    public static $files = array (
        '5f0e95b8df5acf4a92c896dc3ac4bb6e' => __DIR__ . '/..' . '/phpmetrics/phpmetrics/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'Hal\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpmetrics/phpmetrics/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita44d61bf6dd4dcff03ccc99f8cc99a2a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita44d61bf6dd4dcff03ccc99f8cc99a2a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita44d61bf6dd4dcff03ccc99f8cc99a2a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInita44d61bf6dd4dcff03ccc99f8cc99a2a::$classMap;

        }, null, ClassLoader::class);
    }
}
