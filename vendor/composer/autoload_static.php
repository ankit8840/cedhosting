<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5706abb39ae4607dd7fe1d3c3ab58c89
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5706abb39ae4607dd7fe1d3c3ab58c89::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5706abb39ae4607dd7fe1d3c3ab58c89::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}