<?php

use Phinx\Migration\AbstractMigration;

class InitialSchema extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('Categories', ['id' => false, 'primary_key' => ['category_id']]);
        $table->addColumn('category_id', 'integer')
            ->addColumn('parent_category_id', 'integer', ['null' => true])
            ->addForeignKey('parent_category_id', 'Categories', 'category_id')
            ->create();

        $table = $this->table('Products', ['id' => false, 'primary_key' => ['product_id']]);
        $table->addColumn('product_id', 'integer')
            ->create();

        $table = $this->table('ProductCategories', ['id' => false, 'primary_key' => ['product_id', 'category_id']]);
        $table->addColumn('product_id', 'integer')
            ->addColumn('category_id', 'integer')
            ->addIndex('product_id')
            ->addForeignKey('product_id', 'Products', 'product_id')
            ->addForeignKey('category_id', 'Categories', 'category_id')
            ->create();

        $categories = [
            [
                'category_id' => 1,
                'parent_category_id' => null
            ],
            [
                'category_id' => 2,
                'parent_category_id' => 1
            ],
            [
                'category_id' => 3,
                'parent_category_id' => 1
            ]
        ];
        $this->insert('Categories', $categories);

        $products = [
            ['product_id' => 1],
            ['product_id' => 2],
            ['product_id' => 3],
            ['product_id' => 4]
        ];
        $this->insert('Products', $products);

        $productCategories = [
            [
                'product_id' => 1,
                'category_id' => 1
            ],
            [
                'product_id' => 1,
                'category_id' => 2
            ],
            [
                'product_id' => 2,
                'category_id' => 2
            ],
            [
                'product_id' => 3,
                'category_id' => 1
            ],
            [
                'product_id' => 3,
                'category_id' => 3
            ],
            [
                'product_id' => 4,
                'category_id' => 1
            ]
        ];
        $this->insert('ProductCategories', $productCategories);
    }
}
