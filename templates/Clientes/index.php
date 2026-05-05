<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
 */
?>
<div class="clientes index content">
    
    <?= $this->Html->link(__('Novo Cliente'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Clientes') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table id="tabela_clientes">
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('cpf', 'CPF') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                    <th><?= $this->Paginator->sort('celular', 'Celular') ?></th>
                    <th><?= $this->Paginator->sort('observacoes', 'Observações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $cliente->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $cliente->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $cliente->id], ['confirm' => __('Tem certeza que deseja deletar o cliente {0}?', $cliente->nome)]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$cliente->id, ['action' => 'view', $cliente->id]) ?></td>
                    <td><?= $this->Html->link($cliente->nome, ['action' => 'view', $cliente->id]) ?></td>
                    <td><?= h($cliente->cpf) ?></td>
                    <td><?= ($cliente->email) ? $this->Text->autoLinkEmails($cliente->email) : '' ?></td>
                    <td><?= h($cliente->celular) ?></td>
                    <td><?= h($cliente->observacoes) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Html->script('excellentexport') ?>
        <a id="excelexport" download="clientes.xls" class="button" href="#" onclick="return ExcellentExport.excel(this, 'tabela_clientes_export', 'Clientes');">Exportar para Excel</a>
        <script>
            // formata uma copia da tabela para exportar para excel
            const formula_table = document.querySelector('#tabela_clientes').cloneNode(true);
            formula_table.id = 'tabela_clientes_export';
            formula_table.classList.add('hidden');
            document.currentScript.before(formula_table);
            
            //remove a 1a coluna de acoes
            const actions = document.querySelectorAll('#tabela_clientes_export .actions');
            for (let a of actions) a.remove();
        </script>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
