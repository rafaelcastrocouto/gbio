<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador $cliente
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }

?>
<div>
    <div class="column">
        <div class="clientes add content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <?= $this->Form->create($cliente) ?>
            <fieldset>
                <h3><?= __('Adicionando Cliente') ?></h3>
                <?php
                    echo $this->Form->control('nome', ['placeholder' => 'João da Silva']);
                    echo $this->Form->control('cpf', ['placeholder' => '123.456.789-00']);
                    echo $this->Form->control('email', ['placeholder' => 'joao@email.com']);
                    echo $this->Form->control('endereco', ['placeholder' => 'Rua ABCD nº 123, Cidade - Estado']);
                    echo $this->Form->control('celular', ['placeholder' => '(21)98765-4321']);
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar Cliente'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
