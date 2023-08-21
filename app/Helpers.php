<?php

#use DB;

if (!function_exists('asset_dir')) {
    function asset_dir($path, $secure = null)
    {
        $url = config('app.asset_url') . $path;

        if ($secure) {
            str_replace(['http://', 'https://', $url]);
        }

        return $url;
    }
}

if (!function_exists('media')) {
    function media($path, $secure = null)
    {
        $url = config('app.media_url') . $path;

        if ($secure) {
            str_replace(['http://', 'https://', $url]);
        }

        return $url;
    }
}

if (!function_exists('helperdateFormat')) {


    function helperdateFormat($date)
    {

        $currnet = DB::select("SELECT * FROM lv_settings WHERE `id`= 18;");
        $currnet_get =  $currnet[0]->value;

        if($currnet_get == 'dollar'){
            return date('d/m/Y', strtotime($date));
        }else{
            return date('Y/m/d', strtotime($date));
        }

    }
}
