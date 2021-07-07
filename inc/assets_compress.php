<?php

class Assets_compress
{

    public static $destination_dir;
    public static $destination_url;

    private static function init()
    {
        self::$destination_dir = get_template_directory() . '/assets/compress/';
        self::$destination_url = get_template_directory_uri() . '/assets/compress/';
    }

    public static function js($array_files, $dest_file_name, $return_url = null)
    {

        self::init();

        $content = "";
        foreach ($array_files as $file) {
            $search = 'http';
            if (!preg_match("/{$search}/i", $file)) {
                $file = home_url() . $file;
            }
            $content .= file_get_contents($file);
        }

        $content = self::minify_js($content);

        if (!is_dir(self::$destination_dir)) {
            mkdir(self::$destination_dir);
        }

        $new_file = fopen(self::$destination_dir . $dest_file_name, "w");
        fwrite($new_file, $content); //write to destination
        fclose($new_file);
        if ($return_url){
            return self::$destination_url . $dest_file_name;
        }
        return '<script src="' . self::$destination_url . $dest_file_name . '"></script>';

    }

    public static function css($array_files, $dest_file_name, $return_url = null)
    {

        self::init();

        $content = "";
        foreach ($array_files as $file) {
            $search = 'http';
            if (!preg_match("/{$search}/i", $file)) {
                $file = home_url() . $file;
            }
            $content .= file_get_contents($file);
        }

        $content = self::minify_css($content);

        if (!is_dir(self::$destination_dir)) {
            mkdir(self::$destination_dir);
        }

        $new_file = fopen(self::$destination_dir . $dest_file_name, "w");
        fwrite($new_file, $content);
        fclose($new_file);
        if ($return_url){
            return self::$destination_url . $dest_file_name;
        }
        return '<link rel="stylesheet" href="' . self::$destination_url . $dest_file_name . '" type="text/css" media="all">';

    }

    private static function minify_css($content)
    {
        $content = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $content); // negative look ahead
        $content = preg_replace('/\s{2,}/', ' ', $content);
        $content = preg_replace('/\s*([:;{}])\s*/', '$1', $content);
        $content = preg_replace('/;}/', '}', $content);
        return $content;
    }

    private static function minify_js($content)
    {
        require_once 'packages/JShrink.php';
        $content = package\JShrink\Minifier::minify($content);
        return $content;
    }

}