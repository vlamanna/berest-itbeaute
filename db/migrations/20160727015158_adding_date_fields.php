<?php

use Phinx\Migration\AbstractMigration;

class AddingDateFields extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('Categories');
        $table->addColumn('dateCreated', 'datetime')
            ->addColumn('dateUpdated', 'datetime')
            ->save();

        $table = $this->table('Products');
        $table->addColumn('dateCreated', 'datetime')
            ->addColumn('dateUpdated', 'datetime')
            ->save();
    }
}
