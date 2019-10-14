<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CruisesFiles Model
 *
 * @property \App\Model\Table\CruisesTable&\Cake\ORM\Association\BelongsTo $Cruises
 * @property \App\Model\Table\FilesTable&\Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\CruisesFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\CruisesFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CruisesFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CruisesFile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CruisesFile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CruisesFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CruisesFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CruisesFile findOrCreate($search, callable $callback = null, $options = [])
 */
class CruisesFilesTable extends Table
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

        $this->setTable('cruises_files');

        $this->belongsTo('Cruises', [
            'foreignKey' => 'cruise_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'file_id',
            'joinType' => 'INNER'
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
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

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
        $rules->add($rules->existsIn(['cruise_id'], 'Cruises'));
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }
}
