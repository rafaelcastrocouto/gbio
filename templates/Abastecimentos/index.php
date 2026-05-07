<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento[]|\Cake\Collection\CollectionInterface $abastecimentos
 */
?>
<div class="abastecimentos index content">
    
    <?= $this->Html->link(__('Novo Abastecimento'), ['action' => 'add'], ['class' => 'button']) ?>
    <?= $this->Html->link(__('Buscar Abastecimento'), ['action' => 'search'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Abastecimentos') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table id="tabela_abastecimento">
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('instituicao_id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('cliente_id') ?></th> -->
                    <th><?= $this->Paginator->sort('controle', ['label' => 'Nº de Controle']) ?></th>
                    <th><?= $this->Paginator->sort('nf', ['label' => 'NF']) ?></th>
                    <th><?= $this->Paginator->sort('certificado') ?></th>
                    <th><?= $this->Paginator->sort('inicio') ?></th>
                    <th><?= $this->Paginator->sort('fim') ?></th>
                    <th><?= $this->Paginator->sort('saida') ?></th>
                    <th><?= $this->Paginator->sort('placa') ?></th>
                    <th><?= $this->Paginator->sort('p_inicial', ['label' => 'Pressão Inicial (bar)']) ?></th>
                    <th><?= $this->Paginator->sort('p_final', ['label' => 'Pressão Final (bar)']) ?></th>
                    <th><?= $this->Paginator->sort('carregamento', ['label' => 'Volume do Carregamento (m³)']) ?></th>
                    <th><?= $this->Paginator->sort('o2', ['label' => 'O₂ (%)']) ?></th>
                    <th><?= $this->Paginator->sort('n2', ['label' => 'N₂ (%)']) ?></th>
                    <th><?= $this->Paginator->sort('ch4', ['label' => 'CH₄ (%)']) ?></th>
                    <th><?= $this->Paginator->sort('co2', ['label' => 'CO₂ (%)']) ?></th>
                    <th><?= $this->Paginator->sort('soma', ['label' => 'Soma (%) CO₂ O₂ N₂']) ?></th>
                    <th><?= $this->Paginator->sort('densidade', ['label' => 'Densidade (kg/m³)']) ?></th>
                    <th><?= $this->Paginator->sort('ponto', ['label' => 'Ponto de orvalho (°C)']) ?></th>
                    <th><?= $this->Paginator->sort('wobbe', ['label' => 'Wobbe (KJ/m³)']) ?></th>
                    <th><?= $this->Paginator->sort('pcs', ['label' => 'PCS (Kcal/m³)']) ?></th>
                    <th><?= $this->Paginator->sort('o2_media', ['label' => 'O₂ (%) Média Biogás']) ?></th>
                    <th><?= $this->Paginator->sort('ch4_media', ['label' => 'CH₄ (%) Média Biogás']) ?></th>
                    <th><?= $this->Paginator->sort('co2_media', ['label' => 'CO₂ (%) Média Biogás']) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($abastecimentos as $abastecimento): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $abastecimento->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $abastecimento->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $abastecimento->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimento->controle)]) ?>
                    </td>
                    <td><?= $this->Html->link((string)$abastecimento->id, ['action' => 'view', $abastecimento->id]) ?></td>
                    <!-- <td><?= $this->Html->link((string)$abastecimento->user->id, ['controller' => 'users', 'action' => 'view', $abastecimento->user->id]) ?></td> -->
                    <!-- <td><?= $this->Html->link($abastecimento->instituicao->nome, ['controller' => 'instituicoes', 'action' => 'view', $abastecimento->instituicao->id]) ?></td> -->
                    <!-- <td><?= $this->Html->link($abastecimento->cliente->nome, ['controller' => 'clientes', 'action' => 'view', $abastecimento->clientes->id]) ?></td> -->
                    <td><?= h($abastecimento->controle) ?></td>
                    <td><?= h($abastecimento->nf) ?></td>
                    <td><?= h($abastecimento->certificado) ?></td>
                    <td><?= h($abastecimento->inicio) ?></td>
                    <td><?= h($abastecimento->fim) ?></td>
                    <td><?= h($abastecimento->saida) ?></td>
                    <td><?= h($abastecimento->placa) ?></td>
                    <td><?= h($abastecimento->p_inicial) ?></td>
                    <td><?= h($abastecimento->p_final) ?></td>
                    <td><?= h($abastecimento->carregamento) ?></td>
                    <td><?= h($abastecimento->o2) ?></td>
                    <td><?= h($abastecimento->n2) ?></td>
                    <td><?= h($abastecimento->ch4) ?></td>
                    <td><?= h($abastecimento->co2) ?></td>
                    <td><?= h($abastecimento->soma) ?></td>
                    <td><?= h($abastecimento->densidade) ?></td>
                    <td><?= h($abastecimento->ponto) ?></td>
                    <td><?= h($abastecimento->wobbe) ?></td>
                    <td><?= h($abastecimento->pcs) ?></td>
                    <td><?= h($abastecimento->o2_media) ?></td>
                    <td><?= h($abastecimento->ch4_media) ?></td>
                    <td><?= h($abastecimento->co2_media) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->element('export_excel', ['id_da_tabela' => 'tabela_abastecimento']); ?>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
