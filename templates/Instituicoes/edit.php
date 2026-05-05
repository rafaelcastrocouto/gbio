<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Instituicao $instituicao
 */
?>
<div>
    <div class="column">
        <div class="instituicoes edit content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Instituições'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(
                        __('Deletar Instituição'),
                        ['action' => 'delete', $instituicao->id],
                        ['confirm' => __('Tem certeza que deseja deletar a instituição {0}?', $instituicao->nome), 'class' => 'button']
                    ) ?>
                </div>
            </aside>
            <?= $this->Form->create($instituicao) ?>
            <fieldset>
                <h3><?= __('Editando Instituição ') . $instituicao->nome ?></h3>
                <?php
                    echo $this->Form->control('nome', ['label' => 'Nome']);
                    echo $this->Form->control('cnpj', ['label' => 'CNPJ']);
                    echo $this->Form->control('email', ['label' => 'E-mail']);
                    echo $this->Form->control('url', ['label' => 'Link']);
                    echo $this->Form->control('endereco', ['label' => 'Endereço']);
                    echo $this->Form->control('telefone', ['label' => 'Telefone']);
                    echo $this->Form->control('observacoes', ['label' => 'Observações']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Edição'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
