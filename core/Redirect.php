<?php

namespace Core;

class Redirect {

    public static function to($url) {
        return header("location:{$url}");
    }
}