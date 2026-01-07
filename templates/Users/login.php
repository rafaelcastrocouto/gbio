<div class="users edit content">
    <aside>
        <div class="nav">
            <?= $this->Html->link(__('Novo usuário'), ['action' => 'add'], ['class' => 'button']) ?>
        </div>
    </aside>
    <?= $this->Form->create() ?>
    <fieldset>
        <h3><?= __('Fazer login') ?></h3>
        <?= $this->Form->control('email', ['placeholder' => 'joao@gmail.com']) ?>
        <?= $this->Form->control('password', ['placeholder' => 'senha_secreta_do_joao']) ?>
        <?= $this->Form->button(__('Login'), ['class' => 'button btn-info']); ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>