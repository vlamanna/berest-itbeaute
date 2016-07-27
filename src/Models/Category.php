<?php

namespace ItBeaute\API\Models;

class Category extends \BeRest\API\Models\Base
{
    public $category_id;
    public $parent_category_id;
    public $dateCreated;
    public $dateUpdated;

    public static $idField = 'category_id';
}