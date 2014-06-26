<?php


namespace DomAndTom\LaravelSwagger;

use Composer\Script\Event;

class SwaggerAssetManager {

    public static function postUpdate(Event $event)
    {
        $composer = $event->getComposer();

        $package_root = dirname(__FILE__).'/../../../';
        $swagger_ui_path = $package_root.'/vendor/domandtom/swagger-ui/dist';
        $public_path = $package_root.'/public';

        $srcDir = $swagger_ui_path;
        $destDir = $public_path;

        self::recursiveCopy($srcDir, $destDir);

    }

    public static function recursiveCopy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    self::recursiveCopy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }
} 