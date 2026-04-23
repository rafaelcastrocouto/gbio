<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Instituicao $instituicao
 */
?>
<div>
    <div class="column">
        <div class="instituicoes add content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Instituições'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <?= $this->Form->create($instituicao) ?>
            <fieldset>
                <h3><?= __('Adicionando Instituição') ?></h3>
                <?php
                    echo $this->Form->control('nome', ['placeholder' => 'Empresa Nome Fantasia']);
                    echo $this->Form->control('cnpj', ['placeholder' => '12.345.678/1234-00']);
                    echo $this->Form->control('email', ['placeholder' => 'joao@email.com']);
                    echo $this->Form->control('url', ['placeholder' => 'www.sitedaempresa.com.br']);
                    echo $this->Form->control('endereco', ['placeholder' => 'Rua ABCD nº 123, Cidade - Estado']);
                    echo $this->Form->control('telefone', ['placeholder' => '(21)98765-4321']);
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar Instituição'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
