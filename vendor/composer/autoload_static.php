<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2d87211ecac1f2bea69eb3c0659068b4
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chillerlan\\Settings\\' => 20,
            'chillerlan\\QRCode\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chillerlan\\Settings\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-settings-container/src',
        ),
        'chillerlan\\QRCode\\' => 
        array (
            0 => __DIR__ . '/..' . '/chillerlan/php-qrcode/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2d87211ecac1f2bea69eb3c0659068b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2d87211ecac1f2bea69eb3c0659068b4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2d87211ecac1f2bea69eb3c0659068b4::$classMap;

        }, null, ClassLoader::class);
    }
}