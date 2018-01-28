<?php

return [
    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', //actionIndex в NewsController
    'products/([0-9]+)/([a-z]+)' => 'product/list',  //actionList в ProductController

    'news' => 'news/index',
];