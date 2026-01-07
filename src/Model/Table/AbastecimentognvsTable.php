<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Abastecimentognvs Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Abastecimentognv newEmptyEntity()
 * @method \App\Model\Entity\Abastecimentognv newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Abastecimentognv[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Abastecimentognv get($primaryKey, $options = [])
 * @method \App\Model\Entity\Abastecimentognv findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Abastecimentognv patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Abastecimentognv[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Abastecimentognv|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Abastecimentognv saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Abastecimentognv[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Abastecimentognv[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Abastecimentognv[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Abastecimentognv[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AbastecimentognvsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('abastecimentognvs');
        $this->setAlias('Abastecimentognvs');
        $this->setDisplayField('controle');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Instituicoes', [
            'foreignKey' => 'instituicao_id',
        ]);
        $this->belongsTo('Clientes', [
            'foreignKey' => 'cliente_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 128)
            ->notEmptyString('nome');

        return $validator;
    }
}
