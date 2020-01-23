<?php
namespace App\Helpers;

class General
{
    public static function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public static function url($slug_url=NULL,$link_type=NULL, $link_url=NULL, $section_url=NULL){
        
        $url="";
        switch($link_type){
            case 'C':
                $url="content/".$slug_url;
            break;
            case 'S':
                if(isset($section_url))
                    $url=$section_url;
            break;
            default:
                if(isset($link_url))
                    $url=$link_url;
            break;
        }

        return $url;
    }
}