<?php

if (!function_exists('popular_badge')) {
    function popular_badge($views)
    {
        if ($views >= 10) {
            return true;
        }
    }
}

if (!function_exists('newNotes')) {
    function newNotes($time)
    {
        $time = strtotime($time);

        // Get Current timestamp
        $current_time = time();

        $diff = ($current_time - $time);

        if ($diff <= 259200) {
            return "new";
        } else {
            return null;
        }
        // return $date;

    }

}

if(!function_exists('publish_date')){
     function publish_date($time)
    {
        $date = date("d,M Y", strtotime($time));
        return $date;

    }
}


?>