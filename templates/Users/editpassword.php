<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

$user_data = ['administrador_id'=>0,'aluno_id'=>0,'professor_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
?>
    
<div class="users form content">
    <aside>
        <div class="nav">
            <?php 
            echo $this->Html->link(__('Ver Usuário'), ['action' => 'view', $user->id], ['class' => 'button']);
            if ($user_data['administrador_id']):
                echo $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'button']);
                echo $this->Form->postLink( __('Deletar'), ['action' => 'delete', $user->id],
                    ['confirm' => __('Tem certeza que deseja deletar o usuário {0}?', $user->nome), 'class' => 'button']
                ); 
            endif; ?>
        </div>
    </aside>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <h3><?= __('Editando Senha do Usuário ') . $user->nome ?></h3>
        <?php
            echo $this->Form->control('password', ['value' => '', 'label' => 'Nova senha', 'placeholder' => 'nova senha', 'id' => 'password', 'required' => false]);
            echo $this->element('show_password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Alterar Senha'), ['class' => 'button']) ?>
    <?= $this->Form->end() ?>
</div>
