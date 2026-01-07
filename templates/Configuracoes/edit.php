<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Configuracao $configuracao
 */
?>
<div>
    <div class="column">
        <div class="configuracao edit content">
            <?= $this->Form->create($configuracao) ?>
            <fieldset>
                <h3><?= __('Editando Configurações') ?></h3>
                <?php
                    echo $this->Form->control('instituicao');
                    echo $this->Form->control('descricao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Edição'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
