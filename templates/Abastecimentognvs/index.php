<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\abastecimentognv[]|\Cake\Collection\CollectionInterface $abastecimentognvs
 */
?>
<div class="abastecimentognvs index content">
    
    <?= $this->Html->link(__('Novo Abastecimento GNV'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Abastecimentos GNV') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('instituicao_id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('cliente_id') ?></th> -->
                    <th><?= $this->Paginator->sort('saida') ?></th>
                    <th><?= $this->Paginator->sort('motorista') ?></th>
                    <th><?= $this->Paginator->sort('rg') ?></th>
                    <th><?= $this->Paginator->sort('placa') ?></th>
                    <th><?= $this->Paginator->sort('p_inicial') ?></th>
                    <th><?= $this->Paginator->sort('p_final') ?></th>
                    <th><?= $this->Paginator->sort('volume') ?></th>
                    <th><?= $this->Paginator->sort('valor') ?></th>
                    <th><?= $this->Paginator->sort('pureza') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($abastecimentognvs as $abastecimentognv): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $abastecimentognv->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $abastecimentognv->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $abastecimentognv->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimentognv {0}?', $abastecimentognv->controle)]) ?>
                    </td>
                    <!-- <td><?= $this->Html->link((string)$abastecimentognv->id, ['action' => 'view', $abastecimentognv->id]) ?></td> -->
                    <!-- <td><?= $this->Html->link((string)$abastecimentognv->user->id, ['controller' => 'users', 'action' => 'view', $abastecimentognv->user->id]) ?></td> -->
                    <!-- <td><?= $this->Html->link($abastecimentognv->instituicao->nome, ['controller' => 'instituicoes', 'action' => 'view', $abastecimentognv->instituicao->id]) ?></td> -->
                    <!-- <td><?= $this->Html->link($abastecimentognv->cliente->nome, ['controller' => 'clientes', 'action' => 'view', $abastecimentognv->cliente->id]) ?></td> -->
                    <td><?= h($abastecimentognv->saida) ?></td>
                    <td><?= h($abastecimentognv->motorista) ?></td>
                    <td><?= h($abastecimentognv->rg) ?></td>
                    <td><?= h($abastecimentognv->placa) ?></td>
                    <td><?= h($abastecimentognv->p_inicial) ?></td>
                    <td><?= h($abastecimentognv->p_final) ?></td>
                    <td><?= h($abastecimentognv->volume) ?></td>
                    <td><?= h($abastecimentognv->valor) ?></td>
                    <td><?= h($abastecimentognv->pureza) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
