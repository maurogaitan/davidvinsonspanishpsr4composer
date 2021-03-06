<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4b232454f5f28dea7e5fb21a60bcb5c3
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
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4b232454f5f28dea7e5fb21a60bcb5c3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4b232454f5f28dea7e5fb21a60bcb5c3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4b232454f5f28dea7e5fb21a60bcb5c3::$classMap;

        }, null, ClassLoader::class);
    }
}
