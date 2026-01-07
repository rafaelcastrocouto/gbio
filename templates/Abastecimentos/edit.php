<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento $abastecimento
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
?>
<div>
    <div class="column">
        <div class="abastecimentos edit content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(
                        __('Deletar Abastecimento'),
                        ['action' => 'delete', $abastecimento->id],
                        ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimento->controle), 'class' => 'button']
                    ) ?>
                </div>
            </aside>
            <?= $this->Form->create($abastecimento) ?>
            <fieldset>
                <h3><?= __('Editando Abastecimento Controle ') . $abastecimento->controle ?></h3>
                <?php
                    echo $this->Form->control('user_id', ['type' => 'number', 'value' => $user_session->get('id'), 'hidden' => !$user_data['administrador_id'] ]);
                    echo $this->Form->control('instituicao_id', ['options' => $instituicoes, 'class' => 'form-control']);
                    echo $this->Form->control('cliente_id', ['options' => $clientes, 'class' => 'form-control']);
                    echo $this->Form->control('controle');
                    echo $this->Form->control('nf');
                    echo $this->Form->control('certificado');
                    echo $this->Form->control('inicio');
                    echo $this->Form->control('fim');
                    echo $this->Form->control('saida');
                    echo $this->Form->control('placa');
                    echo $this->Form->control('p_inicial');
                    echo $this->Form->control('p_final');
                    echo $this->Form->control('carregamento');
                    echo $this->Form->control('o2');
                    echo $this->Form->control('n2');
                    echo $this->Form->control('ch4');
                    echo $this->Form->control('co2');
                    echo $this->Form->control('soma');
                    echo $this->Form->control('densidade');
                    echo $this->Form->control('ponto');
                    echo $this->Form->control('wobbe');
                    echo $this->Form->control('pcs');
                    echo $this->Form->control('ch4_media');
                    echo $this->Form->control('co2_media');
                    echo $this->Form->control('o2_media');
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Edição'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
