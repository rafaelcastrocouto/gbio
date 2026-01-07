<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Abastecimentognv Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $instituicao_id
 * @property int $cliente_id
 * @property \Cake\I18n\FrozenTime $saida
 * @property string|null $motorista
 * @property string|null $rg
 * @property string|null $placa
 * @property string|null $p_inicial
 * @property string|null $p_final
 * @property string|null $volume
 * @property string|null $valor
 * @property string|null $pureza
 * @property string|null $observacoes
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Instituicao[] $instituicoes
 * @property \App\Model\Entity\Cliente[] $clientes
 */
class Abastecimentognv extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected array $_accessible = [
     'user_id' => true,
     'instituicao_id' => true,
     'cliente_id' => true,
     'saida' => true,
     'motorista' => true,
     'rg' => true,
     'placa' => true,
     'p_inicial' => true,
     'p_final' => true,
     'volume' => true,
     'valor' => true,
     'pureza' => true,
     'observacoes' => true
    ];
}
