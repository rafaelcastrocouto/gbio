<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $instituicao_id
 * @property \Cake\I18n\Date $data
 * @property string|null $ch4_media_biogas
 * @property string|null $co2_media_biogas
 * @property string|null $o2_media_biogas
 * @property string|null $ch4_media_metano
 * @property string|null $co2_media_metano
 * @property string|null $o2_media_metano
 * @property string|null $n2_media_metano
 * @property string|null $volume_biogas_dia
 * @property string|null $consumo_clientes
 * @property string|null $dispenser
 * @property string|null $energia
 * @property string|null $densidade
 * @property string|null $status
 * @property string|null $observacoes
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Instituicao[] $instituicoes
 */
class Cliente extends Entity
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
        'data' => true,
        'ch4_media_biogas' => true,
        'co2_media_biogas' => true,
        'o2_media_biogas' => true,
        'ch4_media_metano' => true,
        'co2_media_metano' => true,
        'o2_media_metano' => true,
        'n2_media_metano' => true,
        'volume_biogas_dia' => true,
        'consumo_clientes' => true,
        'dispenser' => true,
        'energia' => true,
        'densidade' => true,
        'status' => true,
        'observacoes' => true
    ];
}
