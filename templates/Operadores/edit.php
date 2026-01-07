<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador $operador
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'operador_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
?>
<div>
    <div class="column">
        <div class="operadores edit content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Operadores'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(
                        __('Deletar Operador'),
                        ['action' => 'delete', $operador->id],
                        ['confirm' => __('Tem certeza que deseja deletar o operador {0}?', $operador->user->nome), 'class' => 'button']
                    ) ?>
                </div>
            </aside>
            <?= $this->Form->create($operador) ?>
            <fieldset>
                <h3><?= __('Editando Operador ') . $operador->user->nome ?></h3>
                <?php
                    if ($user_data['administrador_id']):
                       echo $this->Form->control('user_id', ['type' => 'number']); 
                    endif;
                    echo $this->Form->control('cpf');
                    echo $this->Form->control('endereco');
                    echo $this->Form->control('celular');
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Edição'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
