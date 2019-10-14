<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefRoomCategories Model
 *
 * @property \App\Model\Table\RoomsTable&\Cake\ORM\Association\HasMany $Rooms
 *
 * @method \App\Model\Entity\RefRoomCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\RefRoomCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RefRoomCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RefRoomCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefRoomCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefRoomCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RefRoomCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RefRoomCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class RefRoomCategoriesTable extends Table
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

        $this->setTable('ref_room_categories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Rooms', [
            'foreignKey' => 'ref_room_category_id'
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
            ->numeric('cruise_charge')
            ->requirePresence('cruise_charge', 'create')
            ->notEmptyString('cruise_charge');

        $validator
            ->numeric('daily_gratuity_rate')
            ->requirePresence('daily_gratuity_rate', 'create')
            ->notEmptyString('daily_gratuity_rate');

        $validator
            ->scalar('room_category_description')
            ->maxLength('room_category_description', 255)
            ->requirePresence('room_category_description', 'create')
            ->notEmptyString('room_category_description');

        return $validator;
    }
}
