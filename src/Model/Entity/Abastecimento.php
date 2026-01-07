<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Abastecimento Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $instituicao_id
 * @property int $cliente_id
 * @property int $controle
 * @property string $nf
 * @property string $certificado
 * @property \Cake\I18n\FrozenTime $inicio
 * @property \Cake\I18n\FrozenTime $fim
 * @property \Cake\I18n\Date $saida
 * @property string $placa
 * @property string|null $p_inicial
 * @property string|null $p_final
 * @property string|null $carregamento
 * @property string|null $o2
 * @property string|null $n2
 * @property string|null $ch4
 * @property string|null $co2
 * @property string|null $soma
 * @property string|null $densidade
 * @property string|null $ponto
 * @property string|null $wobbe
 * @property string|null $pcs
 * @property string|null $ch4_media
 * @property string|null $co2_media
 * @property string|null $o2_media
 * @property string|null $observacoes
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Instituicao[] $instituicoes
 * @property \App\Model\Entity\Instituicao[] $clientes
 */
class Abastecimento extends Entity
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
     'controle' => true,
     'nf' => true,
     'certificado' => true,
     'inicio' => true,
     'fim' => true,
     'saida' => true,
     'placa' => true,
     'p_inicial' => true,
     'p_final' => true,
     'carregamento' => true,
     'o2' => true,
     'n2' => true,
     'ch4' => true,
     'co2' => true,
     'soma' => true,
     'densidade' => true,
     'ponto' => true,
     'wobbe' => true,
     'pcs' => true,
     'ch4_media' => true,
     'co2_media' => true,
     'o2_media' => true,
     'observacoes' => true
    ];
}
