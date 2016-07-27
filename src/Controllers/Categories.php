<?php

namespace ItBeaute\API\Controllers;

class Categories extends \BeRest\API\Controllers\Base
{
    public static $routes = [
        'get_' => ['function' => 'getAll'],
        'get_/{id}' => ['function' => 'getOne'],
        'post_' => ['function' => 'create'],
        'put_/{id}' => ['function' => 'update'],
        'delete_/{id}' => ['function' => 'delete']
    ];
}
