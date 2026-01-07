<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador[]|\Cake\Collection\CollectionInterface $operadores
 */
?>
<div class="operadores index content">
    
    <?= $this->Html->link(__('Novo Operador'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Operadores') ?></h3>
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
                <?php foreach ($operadores as $operador): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $operador->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $operador->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $operador->id], ['confirm' => __('Tem certeza que deseja deletar o operador {0}?', $operador->nome)]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$operador->id, ['action' => 'view', $operador->id]) ?></td>
                    <td><?= $this->Html->link($operador->user->nome, ['action' => 'view', $operador->id]) ?></td>
                    <td><?= h($operador->cpf) ?></td>
                    <td><?= ($operador->user and $operador->user->email) ? $this->Text->autoLinkEmails($operador->user->email) : '' ?></td>
                    <td><?= h($operador->celular) ?></td>
                    <td><?= h($operador->observacoes) ?></td>
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
