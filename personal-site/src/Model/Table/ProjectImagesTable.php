<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectImages Model
 *
 * @method \App\Model\Entity\ProjectImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectImage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectImage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectImage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectImage findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectImagesTable extends Table
{


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('project_images');
        $this->setDisplayField('path');
        $this->setPrimaryKey('id');
        
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('project-id')
            ->requirePresence('project-id', 'create')
            ->notEmpty('project-id');

        $validator
            ->requirePresence('path', 'create')
            ->notEmpty('path');

        $validator
            ->boolean('banner')
            ->requirePresence('banner', 'create')
            ->notEmpty('banner');

        return $validator;
    }
}
