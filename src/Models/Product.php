<?php

namespace ItBeaute\API\Models;

class Product extends \BeRest\API\Models\Base
{
    public $product_id;
    public $category_id;
    public $dateCreated;
    public $dateUpdated;

    public static $idField = 'product_id';
    public static $virtualFields = [
        'category_id' => [
            'key'       => 'product_id',
            'field'     => 'category_id',
            'table'     => 'ProductCategories',
            'index'     => 'c'
        ]
    ];
}