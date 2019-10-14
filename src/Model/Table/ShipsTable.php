<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ships Model
 *
 * @property \App\Model\Table\CruisesTable&\Cake\ORM\Association\HasMany $Cruises
 *
 * @method \App\Model\Entity\Ship get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ship newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ship[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ship|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ship saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ship patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ship[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ship findOrCreate($search, callable $callback = null, $options = [])
 */
class ShipsTable extends Table
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

        $this->setTable('ships');
        $this->setDisplayField('ship_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Cruises', [
            'foreignKey' => 'ship_id'
        ]);
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('ship_name')
            ->maxLength('ship_name', 255)
            ->requirePresence('ship_name', 'create')
            ->notEmptyString('ship_name');

        $validator
            ->scalar('other_details')
            ->maxLength('other_details', 255)
            ->requirePresence('other_details', 'create')
            ->notEmptyString('other_details');

        return $validator;
    }
}
