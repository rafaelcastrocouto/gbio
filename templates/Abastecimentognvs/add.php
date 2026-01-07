<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador $abastecimentognv
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }

?>
<div>
    <div class="column">
        <div class="abastecimentognvs add content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Abastecimentos GNV'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <?= $this->Form->create($abastecimentognv) ?>
            <fieldset>
                <h3><?= __('Adicionando Abastecimento GNV') ?></h3>
                <?php
                    echo $this->Form->control('user_id', ['type' => 'number', 'value' => $user_session->get('id'), 'hidden' => !$user_data['administrador_id'] ]);
                    echo $this->Form->control('instituicao_id', ['options' => $instituicoes, 'class' => 'form-control']);
                    echo $this->Form->control('cliente_id', ['options' => $clientes, 'class' => 'form-control']);
                    echo $this->Form->control('saida');
                    echo $this->Form->control('motorista');
                    echo $this->Form->control('rg');
                    echo $this->Form->control('placa');
                    echo $this->Form->control('p_inicial');
                    echo $this->Form->control('p_final');
                    echo $this->Form->control('volume');
                    echo $this->Form->control('valor');
                    echo $this->Form->control('pureza');
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar Abastecimento GNV'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
