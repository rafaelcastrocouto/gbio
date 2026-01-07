<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>
<div class="clientes index content">
    
    <?= $this->Html->link(__('Novo Cliente'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Clientes') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <th><?= $this->Paginator->sort('cpf') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('celular') ?></th>
                    <th><?= $this->Paginator->sort('observacoes') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $cliente->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $cliente->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $cliente->id], ['confirm' => __('Tem certeza que deseja deletar o cliente {0}?', $cliente->nome)]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$cliente->id, ['action' => 'view', $cliente->id]) ?></td>
                    <td><?= $this->Html->link($cliente->nome, ['action' => 'view', $cliente->id]) ?></td>
                    <td><?= h($cliente->cpf) ?></td>
                    <td><?= ($cliente->email) ? $this->Text->autoLinkEmails($cliente->email) : '' ?></td>
                    <td><?= h($cliente->celular) ?></td>
                    <td><?= h($cliente->observacoes) ?></td>
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
