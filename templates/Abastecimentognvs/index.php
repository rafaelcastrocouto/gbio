<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\abastecimentognv[]|\Cake\Collection\CollectionInterface $abastecimentognvs
 */
?>
<div class="abastecimentognvs index content">
    
    <?= $this->Html->link(__('Novo Abastecimento GNV'), ['action' => 'add'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Buscar Abastecimento GNV'), ['action' => 'search'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Abastecimentos GNV') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table id="tabela_abastecimentognv">
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('user_id', ['label' => 'Autor']) ?></th>
                    <th><?= $this->Paginator->sort('instituicao_id', ['label' => 'Instituição']) ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th><?= $this->Paginator->sort('saida', ['label' => 'Data de Saída']) ?></th>
                    <th><?= $this->Paginator->sort('motorista') ?></th>
                    <th><?= $this->Paginator->sort('rg', ['label' => 'RG']) ?></th>
                    <th><?= $this->Paginator->sort('placa') ?></th>
                    <th><?= $this->Paginator->sort('prefixo') ?></th>
                    <th><?= $this->Paginator->sort('p_inicial', ['label' => 'Pressão Inicial (bar)']) ?></th>
                    <th><?= $this->Paginator->sort('p_final', ['label' => 'Pressão Final (bar)']) ?></th>
                    <th><?= $this->Paginator->sort('volume', ['label' => 'Volume (m³)']) ?></th>
                    <th><?= $this->Paginator->sort('observacoes') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($abastecimentognvs as $abastecimentognv): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $abastecimentognv->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $abastecimentognv->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $abastecimentognv->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimentognv {0}?', $abastecimentognv->controle)]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$abastecimentognv->id ?? 'id', ['action' => 'view', $abastecimentognv->id]) ?></td>
                    <td><?= $this->Html->link($abastecimentognv->user->nome ?? 'sem nome', ['controller' => 'users', 'action' => 'view', $abastecimentognv->user->id]) ?></td>
                    <td><?= $this->Html->link($abastecimentognv->instituicao->nome ?? 'sem nome', ['controller' => 'instituicoes', 'action' => 'view', $abastecimentognv->instituicao->id]) ?></td>
                    <td><?= $this->Html->link($abastecimentognv->cliente->nome ?? 'sem nome', ['controller' => 'clientes', 'action' => 'view', $abastecimentognv->cliente->id]) ?></td>
                    <td><?= h($abastecimentognv->saida) ?></td>
                    <td><?= h($abastecimentognv->motorista) ?></td>
                    <td><?= h($abastecimentognv->rg) ?></td>
                    <td><?= h($abastecimentognv->placa) ?></td>
                    <td><?= h($abastecimentognv->prefixo) ?></td>
                    <td><?= h($abastecimentognv->p_inicial) ?></td>
                    <td><?= h($abastecimentognv->p_final) ?></td>
                    <td><?= h($abastecimentognv->volume) ?></td>
                    <td><?= h($abastecimentognv->observacoes) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->element('export_excel', ['id_da_tabela' => 'tabela_abastecimentognv']); ?>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
