<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador[]|\Cake\Collection\CollectionInterface $operadores
 */
?>
<div class="operadores index content">
    
    <?= $this->Html->link(__('Novo Operador'), ['action' => 'add'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Buscar Operador'), ['action' => 'search'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Operadores') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table id="tabela_operadores">
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
                <?php foreach ($operadores as $operador): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $operador->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $operador->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $operador->id], ['confirm' => __('Tem certeza que deseja deletar o operador {0}?', $operador->nome)]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$operador->id, ['action' => 'view', $operador->id]) ?></td>
                    <td><?= $this->Html->link($operador->user->nome, ['action' => 'view', $operador->id]) ?></td>
                    <td><?= h($operador->cpf) ?></td>
                    <td><?= ($operador->user and $operador->user->email) ? $this->Text->autoLinkEmails($operador->user->email) : '' ?></td>
                    <td><?= h($operador->celular) ?></td>
                    <td><?= h($operador->observacoes) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Html->script('excellentexport') ?>
        <a id="excelexport" download="operadores.xls" class="button" href="#" onclick="return ExcellentExport.excel(this, 'tabela_operadores_export', 'Operadores');">Exportar para Excel</a>
        <script>
            // formata uma copia da tabela para exportar para excel
            const formula_table = document.querySelector('#tabela_operadores').cloneNode(true);
            formula_table.id = 'tabela_operadores_export';
            formula_table.classList.add('hidden');
            document.currentScript.before(formula_table);
            
            //remove a 1a coluna de acoes
            const actions = document.querySelectorAll('#tabela_operadores_export .actions');
            for (let a of actions) a.remove();
        </script>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
