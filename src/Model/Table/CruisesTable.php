<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cruises Model
 *
 * @property \App\Model\Table\ShipsTable&\Cake\ORM\Association\BelongsTo $Ships
 * @property \App\Model\Table\CruisesRoomsUsersTable&\Cake\ORM\Association\HasMany $CruisesRoomsUsers
 * @property \App\Model\Table\RoomsTable&\Cake\ORM\Association\HasMany $Rooms
 *
 * @method \App\Model\Entity\Cruise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cruise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cruise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cruise|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cruise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cruise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cruise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cruise findOrCreate($search, callable $callback = null, $options = [])
 */
class CruisesTable extends Table
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

        $this->setTable('cruises');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ships', [
            'foreignKey' => 'ship_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ville', [
            'foreignKey' => 'ville_id'
        ]);
        $this->hasMany('CruisesRoomsUsers', [
            'foreignKey' => 'cruise_id'
        ]);
        $this->hasMany('Rooms', [
            'foreignKey' => 'cruise_id'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'cruise_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'cruises_files'
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
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDate('end_date');

        $validator
            ->scalar('other_details')
            ->maxLength('other_details', 255)
            ->requirePresence('other_details', 'create')
            ->notEmptyString('other_details');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ship_id'], 'Ships'));

        return $rules;
    }
}
