<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'operador_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
  
?>
<div class="users index content">
	<aside>
		<div class="nav">
            <?= $this->Html->link(__('Novo Usuário'), ['action' => 'add'], ['class' => 'button']) ?>
            <?= $this->Html->link(__('Buscar Usuário'), ['action' => 'search'], ['class' => 'button']) ?>
		</div>
	</aside>
    
    <h3><?= __('Lista de Usuários') ?></h3>
    
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table id="tabela_usuarios">
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                    <th><?= $this->Paginator->sort('categorias', 'Categorias') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Criado') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Html->link(__('🔑'), ['action' => 'editpassword', $user->id]) ?>
                        <?php if ($user_data['administrador_id']): ?>
                            <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza que deseja deletar o usuário {0}?', $user->nome)]) ?>
                        <?php endif; ?>
                        
                    </td>
                    <td><?= $this->Html->link((string)$user->id ?? 'id', ['action' => 'view', $user->id]) ?></td>
                    <td><?= $this->Html->link($user->nome ?? 'sem nome', ['action' => 'view', $user->id]) ?></td>
                    <td><?= $user->email ? $this->Text->autoLinkEmails($user->email) : 'Erro: É necessário registrar um email' ?></td>
                    <td><?php 
                        $roles = [];
                        if ($user->administrador) array_push($roles, 'Administrador');
                        if ($user->supervisor) array_push($roles, 'Supervisor');
                        if ($user->operador) array_push($roles, 'Operador');
                        echo implode(', ', $roles);
                    ?></td>
                    <td><?= $user->created ? h($user->created) : '' ?></td>
                    <td><?= $user->modified ? h($user->modified) : '' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->element('export_excel', ['id_da_tabela' => 'tabela_usuarios']); ?>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
