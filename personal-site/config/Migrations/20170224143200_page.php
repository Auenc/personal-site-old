<?php

use Phinx\Migration\AbstractMigration;

class Page extends AbstractMigration
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

    public function up(){
      $projectTable = $this->table("project");

      $projectTable->addColumn("title", 'string', [
        'length' => 100,
        'default' => null,
        'null' => false
      ])->addColumn("description", 'text', [
        'default' => null,
        'null' => false
      ])->addColumn("published", 'boolean', [
        'default' => false,
      ])->create();

      $tagTable = $this->table("tag");
      $tagTable->addColumn("name", 'string', [
        'length' => 255,
        'default' => null,
        'null' => false
      ])
      ->create();

      $projectTagsTable = $this->table("project-tags");
      $projectTagsTable->addColumn("project-id", 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->addIndex("project-id")
      ->addForeignKey('project-id', 'project', 'id')
      ->addColumn("tag-id", 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->addIndex('tag-id')
      ->addForeignKey('tag-id', 'tag', 'id')
      ->create();

      $imageTable = $this->table("images");
      $imageTable->addColumn("projectid", 'integer', [
        'length' => 9,
        'default' => null,
        'null' => false
      ])
      ->addIndex("projectid")
      ->addForeignKey("projectid", "project", "id")
      ->addColumn("path", "string", [
        'length' => 255,
        'default' => null,
        'null' => false
      ])
      ->addColumn("banner", "boolean", [
        'default' => false
      ])
      ->create();
    }

    public function down(){
      $this->dropTable("images");
      $this->dropTable("project-tags");
      $this->dropTable("project");
      $this->dropTable("tag");
    }
}
