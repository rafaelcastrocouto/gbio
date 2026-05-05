<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */

declare(strict_types=1);

$nome = $this->getRequest()->getQuery('nome');
$email = $this->getRequest()->getQuery('email');
$id = $this->getRequest()->getQuery('id');
     
?>

<div class="users busca content">
    
    <?= $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'button']) ?>

    <div class="tabset">
        
        <input type="radio" name="tabs" id="tab_nome" <?= ($nome or (!$email)) ? 'checked' : '' ?> >
        <label for="tab_nome">Busca por nome</label>
        <div class="tab-content">
            <?php echo $this->Form->create($user_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('nome', ['label' => ['text' => 'Digite o nome do usuário'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_email" <?= ($email) ? 'checked' : '' ?> >
        <label for="tab_email">Busca por email</label>
        <div class="tab-content">
            <?php echo $this->Form->create($user_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('email', ['label' => ['text' => 'Digite o email do usuário'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_id" <?= ($id) ? 'checked' : '' ?> >
        <label for="tab_id">Busca por ID</label>
        <div class="tab-content">
            <?php echo $this->Form->create($user_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('id', ['type' => 'text', 'label' => ['text' => 'Digite o ID do usuário'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
    </div>
    
    <?php if (isset($users)): ?>
    
        <?php if (iterator_count($users)): ?>
    
            <?php if ($nome): ?><h3>Resultado da busca para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Resultado da busca para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($id):  ?><h3>Resultado da busca para o ID <?= $id ?></h3><?php endif; ?>
    
            <div class="paginator">
                <?= $this->element('paginator'); ?>
            </div>
            <div class="table_wrap">
                <table>
                    <thead class='thead-light'>
                        <tr>
                            <th class="actions"><?= __('Ações') ?></th>
                            <th><?= $this->Paginator->sort('id', 'ID'); ?></th>
                            <th><?= $this->Paginator->sort('nome', 'Nome'); ?></th>
                            <th><?= $this->Paginator->sort('email', 'E-mail'); ?></th>
                            <th><?= $this->Paginator->sort('categorias', 'Categorias'); ?></th>
                            <th><?= $this->Paginator->sort('created', 'Criado') ?></th>
                            <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                        </tr>
                    </thead>
                    <?php foreach ($users as $user): ?>
                        <?php 
                          //pr($user);
                          // die();
                        ?>
                        <tr>    
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['action' => 'edit', $user->id]) ?>
                                <?= $this->Html->link(__('🔑'), ['action' => 'editpassword', $user->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza que deseja deletar o user {0}?', $user->controle)]) ?>
                            </td>                        
                            <td><?= $this->Html->link((string)$user->id, ['action' => 'view', $user->id]); ?></td>
                            <td><?= $this->Html->link($user->nome, ['controler' => 'Users', 'action' => 'view', $user->id]); ?></td>
                            <td><?= $this->Text->autoLinkEmails($user->email) ?></td>
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
                </table>
            </div>
            <div class="paginator">
                <?= $this->element('paginator'); ?>
                <?= $this->element('paginator_count'); ?>
            </div>
        
        <?php else: ?>
            <?php if ($nome): ?><h3>Nenhum resultado encontrado para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Nenhum resultado encontrado para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($id):  ?><h3>Nenhum resultado encontrado para o id <?= $id ?></h3><?php endif; ?>
        <?php endif; ?>
    
    <?php endif; ?>
</div>