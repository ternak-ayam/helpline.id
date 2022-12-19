<?php

if (! function_exists('is_nav_active')) {
    function is_nav_active($nav) {
        return request()->is("*{$nav}*") ? "class = active" : '';
    }
}

if (! function_exists('is_drop_active')) {
    function is_drop_active($nav) {
        return request()->is("*{$nav}*") ? "active" : '';
    }
}
