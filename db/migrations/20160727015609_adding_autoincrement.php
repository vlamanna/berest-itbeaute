<?php

use Phinx\Migration\AbstractMigration;

class AddingAutoincrement extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('Categories');
        $table->dropForeignKey('parent_category_id')
            ->save();

        $table = $this->table('ProductCategories');
        $table->dropForeignKey('product_id')
            ->dropForeignKey('category_id')
            ->save();

        $table = $this->table('Categories');
        $table->changeColumn('category_id', 'integer', ['identity' => true])
            ->save();

        $table = $this->table('Products');
        $table->changeColumn('product_id', 'integer', ['identity' => true])
            ->save();

        $table = $this->table('Categories');
        $table->addForeignKey('parent_category_id', 'Categories', 'category_id')
            ->save();

        $table = $this->table('ProductCategories');
        $table->addForeignKey('product_id', 'Products', 'product_id')
            ->addForeignKey('category_id', 'Categories', 'category_id')
            ->save();
    }
}
