<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitea7ae6c4ea0293cba61a0c5423d29340
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitea7ae6c4ea0293cba61a0c5423d29340::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitea7ae6c4ea0293cba61a0c5423d29340::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitea7ae6c4ea0293cba61a0c5423d29340::$classMap;

        }, null, ClassLoader::class);
    }
}
