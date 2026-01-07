<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supervisor[]|\Cake\Collection\CollectionInterface $supervisores
 */
?>
<div class="supervisores index content">
    
    <?= $this->Html->link(__('Novo Supervisor'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Supervisores') ?></h3>
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
                <?php foreach ($supervisores as $supervisor): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $supervisor->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $supervisor->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $supervisor->id], ['confirm' => __('Tem certeza que deseja deletar o supervisor {0}?', $supervisor->nome)]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$supervisor->id, ['action' => 'view', $supervisor->id]) ?></td>
                    <td><?= $this->Html->link($supervisor->user->nome, ['action' => 'view', $supervisor->id]) ?></td>
                    <td><?= h($supervisor->cpf) ?></td>
                    <td><?= ($supervisor->user and $supervisor->user->email) ? $this->Text->autoLinkEmails($supervisor->user->email) : '' ?></td>
                    <td><?= h($supervisor->celular) ?></td>
                    <td><?= h($supervisor->observacoes) ?></td>
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
