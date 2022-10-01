<?php

namespace App\Helpers;

class ConvertPositionToPx {
    public static function convert($x, $y, $radius = 50)
    {
        // Get center point
        $x = $x*((1100-935)/1000)+935;
        $y = $y*((827-664)/1000)+664;

        $x = $x - ($radius/2);
        $y = $y - ($radius/2);

        return ['x' => $y, 'y' => $x];
    }
}