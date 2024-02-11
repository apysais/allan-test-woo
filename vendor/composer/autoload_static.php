<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit227e1197737ba9cd84e1d89edf7d4aee
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
        'A' => 
        array (
            'AllanTest\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
        'AllanTest\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit227e1197737ba9cd84e1d89edf7d4aee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit227e1197737ba9cd84e1d89edf7d4aee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit227e1197737ba9cd84e1d89edf7d4aee::$classMap;

        }, null, ClassLoader::class);
    }
}