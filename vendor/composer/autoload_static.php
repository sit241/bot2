<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03de6e192ef09a5b48b3916453cd66ac
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TelegramBot\\Api\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TelegramBot\\Api\\' => 
        array (
            0 => __DIR__ . '/..' . '/telegram-bot/api/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit03de6e192ef09a5b48b3916453cd66ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03de6e192ef09a5b48b3916453cd66ac::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit03de6e192ef09a5b48b3916453cd66ac::$classMap;

        }, null, ClassLoader::class);
    }
}
