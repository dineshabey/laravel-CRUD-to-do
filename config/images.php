<?php

return [

    'driver' => env('IMAGE_DRIVER', 'gd'), //image driver
    'upload_path' => env('IMAGE_UPLOAD_PATH', '/uploads'), //image upload path
    'access_path' => env('IMAGE_ACCESS_PATH', 'http://todo.test/uploads'),
    // 'access_path' => env('IMAGE_ACCESS_PATH', 'http://todo.cp/uploads'),


    1 => ['width' => 35, 'height' => 35],
    2 => ['width' => 480, 'height' => 635],
    3 => ['width' => 1920, 'height' => 700],
    4 => ['width' => 960, 'height' => 960],
    5 => ['width' => 105, 'height' => 140],

];
