<?php

    function getBGColors()
    {
        return ['primary', 'info', 'danger', 'warning', 'dark', 'light', 'success'];
    }

    function getBgColorsIndex($target_value)
    {
        $bg_colors = getBGColors();
        $index = array_search(strtolower($target_value), $bg_colors);
        return strlen($index) > 0 ? $index : -1;
    }

    function getRandomBgColor($except)
    {
        $bg_colors = getBGColors();
        $index = rand(0, count($bg_colors));
        while ($index == $except) {
            $index = rand(0, (count($bg_colors) - 1));
        }
        try {
            return 'btn-inverse-' . $bg_colors[$index];
        } catch (\Throwable $th) {
            return 'btn-inverse-' . $bg_colors[6];
        }
    }