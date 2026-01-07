<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\abastecimentognv $abastecimentognv
 */
?>
<div>
    <div class="column">
        <div class="abastecimentognvs view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar abastecimentos GNV'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar abastecimento GNV'), ['action' => 'edit', $abastecimentognv->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar abastecimento GNV'), ['action' => 'delete', $abastecimentognv->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimentognv {0}?', $abastecimentognv->controle), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo abastecimento GNV'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Abastecimento GNV</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td>
                 <?= h($abastecimentognv->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuário') ?></th>
                    <td><?= $this->Html->link($abastecimentognv->user->nome, ['controller' => 'users', 'action' => 'view', $abastecimentognv->user->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Instituição') ?></th>
                    <td><?= $this->Html->link($abastecimentognv->instituicao->nome, ['controller' => 'instituicoes', 'action' => 'view', $abastecimentognv->instituicao->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $this->Html->link($abastecimentognv->cliente->nome, ['controller' => 'clientes', 'action' => 'view', $abastecimentognv->cliente->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Saída') ?></th>
                    <td><?= h($abastecimentognv->saida) ?></td>
                </tr>
                <tr>
                    <th><?= __('Motorista') ?></th>
                    <td><?= h($abastecimentognv->motorista) ?></td>
                </tr>
                <tr>
                    <th><?= __('RG') ?></th>
                    <td><?= h($abastecimentognv->rg) ?></td>
                </tr>
                <tr>
                    <th><?= __('Placa') ?></th>
                    <td><?= h($abastecimentognv->placa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pressão Inicial') ?></th>
                    <td><?= h($abastecimentognv->p_inicial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pressão Final') ?></th>
                    <td><?= h($abastecimentognv->p_final) ?></td>
                </tr>
                <tr>
                    <th><?= __('Volume') ?></th>
                    <td><?= h($abastecimentognv->volume) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= h($abastecimentognv->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pureza') ?></th>
                    <td><?= h($abastecimentognv->pureza) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($abastecimentognv->observacoes) ?></td>
                </tr>
            </table>
        </div>            
    </div>
</div>
</div>
