<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento $abastecimento
 */
?>
<div>
    <div class="column">
        <div class="abastecimentos view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Abastecimento'), ['action' => 'edit', $abastecimento->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Abastecimento'), ['action' => 'delete', $abastecimento->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimento->controle), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo Abastecimento'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Abastecimento</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td>
                 <?= h($abastecimento->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Autor') ?></th>
                    <td><?= $this->Html->link($abastecimento->user->nome, ['controller' => 'users', 'action' => 'view', $abastecimento->user->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Instituição') ?></th>
                    <td><?= $this->Html->link($abastecimento->instituicao->nome, ['controller' => 'instituicoes', 'action' => 'view', $abastecimento->instituicao->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $this->Html->link($abastecimento->cliente->nome, ['controller' => 'clientes', 'action' => 'view', $abastecimento->cliente->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nº de Controle') /* todo */ ?></th>
                    <td><?= h($abastecimento->controle) ?></td> 
                </tr>
                <tr>
                    <th><?= __('NF') ?></th>
                    <td><?= h($abastecimento->nf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Certificado') ?></th>
                    <td><?= h($abastecimento->certificado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inicio') ?></th>
                    <td><?= h($abastecimento->inicio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fim') ?></th>
                    <td><?= h($abastecimento->fim) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de Saída') ?></th>
                    <td><?= h($abastecimento->saida) ?></td>
                </tr>
                <tr>
                    <th><?= __('Placa Carreta') ?></th>
                    <td><?= h($abastecimento->placa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pressão Inicial (bar)') ?></th>
                    <td><?= h($abastecimento->p_inicial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pressão Final (bar)') ?></th>
                    <td><?= h($abastecimento->p_final) ?></td>
                </tr>
                <tr>
                    <th><?= __('Volume do Carregamento (m³)') ?></th>
                    <td><?= h($abastecimento->carregamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('O₂ (%)') ?></th>
                    <td><?= h($abastecimento->o2) ?></td>
                </tr>
                <tr>
                    <th><?= __('N₂ (%)') ?></th>
                    <td><?= h($abastecimento->n2) ?></td>
                </tr>
                <tr>
                    <th><?= __('CH₄ (%)') ?></th>
                    <td><?= h($abastecimento->ch4) ?></td>
                </tr>
                <tr>
                    <th><?= __('CO₂ (%)') ?></th>
                    <td><?= h($abastecimento->co2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Soma (%) CO₂ O₂ N₂') ?></th>
                    <td><?= h($abastecimento->soma) ?></td>
                </tr>
                <tr>
                    <th><?= __('Densidade (kg/m³)') ?></th>
                    <td><?= h($abastecimento->densidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ponto de orvalho (°C)') ?></th>
                    <td><?= h($abastecimento->ponto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wobbe (KJ/m³)') ?></th>
                    <td><?= h($abastecimento->wobbe) ?></td>
                </tr>
                <tr>
                    <th><?= __('PCS (Kcal/m³)') ?></th>
                    <td><?= h($abastecimento->pcs) ?></td>
                </tr>
                <tr>
                    <th><?= __('O₂ (%) Média Biogás') ?></th>
                    <td><?= h($abastecimento->o2_media) ?></td>
                </tr>
                <tr>
                    <th><?= __('CH₄ (%) Média Biogás') ?></th>
                    <td><?= h($abastecimento->ch4_media) ?></td>
                </tr>
                <tr>
                    <th><?= __('CO₂ (%) Média Biogás') ?></th>
                    <td><?= h($abastecimento->co2_media) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($abastecimento->observacoes) ?></td>
                </tr>
            </table>
        </div>            
    </div>
</div>
</div>
