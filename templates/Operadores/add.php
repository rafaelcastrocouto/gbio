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
        <div class="operadores add content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Operadores'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <?= $this->Form->create($operador) ?>
            <fieldset>
                <h3><?= __('Adicionando Operador') ?></h3>
                <?php
                    if ($user_data['administrador_id']):
                        $val = $this->request->getParam('pass') ? $this->request->getParam('pass')[0] : '';
                        echo $this->Form->control('user_id', ['label' => 'ID do usuário', 'type' => 'number', 'value' => $val, 'hidden' => !$user_data['administrador_id'] ]); 
                     else:
                        echo $this->Form->control('user_id', ['type' => 'number', 'value' => $user_session->get('id'), 'hidden' => true ]); 
                    endif;
                    echo $this->Form->control('cpf', ['placeholder' => '123.456.789-00']);
                    echo $this->Form->control('endereco', ['placeholder' => 'Rua ABCD nº 123, Cidade - Estado']);
                    echo $this->Form->control('celular', ['placeholder' => '(21)98765-4321']);
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar Operador'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
