<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento[]|\Cake\Collection\CollectionInterface $abastecimentos
 */
?>
<div class="abastecimentos index content">
    
    <?= $this->Html->link(__('Novo Abastecimento'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Abastecimentos') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('instituicao_id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('cliente_id') ?></th> -->
                    <th><?= $this->Paginator->sort('controle') ?></th>
                    <th><?= $this->Paginator->sort('nf') ?></th>
                    <th><?= $this->Paginator->sort('certificado') ?></th>
                    <th><?= $this->Paginator->sort('inicio') ?></th>
                    <th><?= $this->Paginator->sort('fim') ?></th>
                    <th><?= $this->Paginator->sort('saida') ?></th>
                    <th><?= $this->Paginator->sort('placa') ?></th>
                    <th><?= $this->Paginator->sort('p_inicial') ?></th>
                    <th><?= $this->Paginator->sort('p_final') ?></th>
                    <th><?= $this->Paginator->sort('carregamento') ?></th>
                    <th><?= $this->Paginator->sort('o2') ?></th>
                    <th><?= $this->Paginator->sort('n2') ?></th>
                    <th><?= $this->Paginator->sort('ch4') ?></th>
                    <th><?= $this->Paginator->sort('co2') ?></th>
                    <th><?= $this->Paginator->sort('soma') ?></th>
                    <th><?= $this->Paginator->sort('densidade') ?></th>
                    <th><?= $this->Paginator->sort('ponto') ?></th>
                    <th><?= $this->Paginator->sort('wobbe') ?></th>
                    <th><?= $this->Paginator->sort('pcs') ?></th>
                    <th><?= $this->Paginator->sort('o2_media') ?></th>
                    <th><?= $this->Paginator->sort('ch4_media') ?></th>
                    <th><?= $this->Paginator->sort('co2_media') ?></th>
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
                    <!-- <td><?= $this->Html->link((string)$abastecimento->id, ['action' => 'view', $abastecimento->id]) ?></td> -->
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
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
