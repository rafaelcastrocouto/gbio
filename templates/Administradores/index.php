<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador[]|\Cake\Collection\CollectionInterface $administradores
 */
?>
<div class="administradores index content">
    
    <h3><?= __('Lista de Administradores') ?></h3>
	
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($administradores as $administrador): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $administrador->id]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$administrador->id ?? 'id', ['action' => 'view', $administrador->id]) ?></td>
                    <td><?= $this->Html->link($administrador->user->nome ?? 'sem nome', ['action' => 'view', $administrador->id]) ?></td>
                    <td><?= $administrador->user->email ? $this->Text->autoLinkEmails($administrador->user->email) ? 'Erro: É necessário registrar um email' ?></td>
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
