<?php

use Phinx\Migration\AbstractMigration;

class Contact extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
     public function up()
     {
       $contactTable = $this->table("contact");
       $contactTable->addColumn("email", "string", [
         'length' => 255,
         'default' => null,
         'null' => false
       ])
       ->addColumn("firstname", 'string', [
         'length' => 255,
         'default' => null,
         'null' => false
       ])
       ->addColumn("lastname", 'string', [
         'length' => 255,
         'default' => null,
         'null' => false
       ])
       ->addColumn("message", 'text', [
         'default' => null,
         'null' => false
       ])
       ->create();
     }
     public function down()
     {
       $this->dropTable("contact");
     }
}
