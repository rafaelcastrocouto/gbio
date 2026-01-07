<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Relatorio $relatorio
 */
?>
<div>
    <div class="column">
        <div class="relatorios view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Relatorios'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Relatorio'), ['action' => 'edit', $relatorio->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Relatorio'), ['action' => 'delete', $relatorio->id], ['confirm' => __('Tem certeza que deseja deletar o relatorio {0}?', $relatorio->controle), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo Relatorio'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Relatorio <?= h($relatorio->data) ?></h3>
            <span id="clientes" class="hidden"><?= h(json_encode($clientes->toArray())) ?></span>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td>
                 <?= h($relatorio->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuário') ?></th>
                    <td><?= $this->Html->link($relatorio->user->nome, ['controller' => 'users', 'action' => 'view', $relatorio->user->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Instituição') ?></th>
                    <td><?= $this->Html->link($relatorio->instituicao->nome, ['controller' => 'instituicoes', 'action' => 'view', $relatorio->instituicao->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data') ?></th>
                    <td><?= h($relatorio->data) ?></td> 
                </tr>
                <tr>
                    <th><?= __('Ch4 Media Biogas') ?></th>
                    <td><?= h($relatorio->ch4_media_biogas) ?></td>
                </tr>
                <tr>
                    <th><?= __('CO2 Media Biogas') ?></th>
                    <td><?= h($relatorio->co2_media_biogas) ?></td>
                </tr>
                <tr>
                    <th><?= __('O2 Media Biogas') ?></th>
                    <td><?= h($relatorio->o2_media_biogas) ?></td>
                </tr>
                <tr>
                    <th><?= __('CH4 Media Metano') ?></th>
                    <td><?= h($relatorio->ch4_media_metano) ?></td>
                </tr>
                <tr>
                    <th><?= __('CO2 Media Metano') ?></th>
                    <td><?= h($relatorio->co2_media_metano) ?></td>
                </tr>
                <tr>
                    <th><?= __('O2 Media Metano') ?></th>
                    <td><?= h($relatorio->o2_media_metano) ?></td>
                </tr>
                <tr>
                    <th><?= __('N2 Media Metano') ?></th>
                    <td><?= h($relatorio->n2_media_metano) ?></td>
                </tr>
                <tr>
                    <th><?= __('Volume Biogas Dia') ?></th>
                    <td><?= h($relatorio->volume_biogas_dia) ?></td>
                </tr>
                <tr class="tr_consumo">
                    <th><?= __('Consumo Clientes') ?></th>
                    <!-- <td><?= h($relatorio->consumo_clientes) ?></td> -->
                    <td>
                        <span class="consumo_parsed"></span>
                        <span class="consumo"><?= h($relatorio->consumo_clientes) ?></span>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Dispenser') ?></th>
                    <td><?= h($relatorio->dispenser) ?></td>
                </tr>
                <tr>
                    <th><?= __('Volume Total Dia') ?></th>
                    <td></td>
                    <script>
                        (function () {
                            const clientes = document.querySelector('#clientes');
                            const clientesData = JSON.parse(clientes.textContent);
                            const parsedClients = {};
                            for (let key in clientesData) {
                                parsedClients[clientesData[key].id] = clientesData[key];
                            }
                            const consumo = document.currentScript.parentElement.parentElement.querySelector('.tr_consumo .consumo');
                            const consumoData = new Function('return {'+consumo.textContent+'}')();
                            let parsedText = [];
                            let sum = 0;
                            for (let clienteId in consumoData) {
                                const link = '<a href="clientes/view/' + clienteId + '">' + parsedClients[clienteId].nome + '</a>';
                                const text = link + ': ' + consumoData[clienteId];
                                parsedText.push(text);
                                sum += Number(consumoData[clienteId]) || 0;
                            }
                            consumo.classList.add('hidden');
                            consumo.previousElementSibling.innerHTML = parsedText.join(', ');
                            const volume_dia = document.currentScript.previousElementSibling;
                            volume_dia.textContent = sum;
                        })()
                    </script>
                </tr>
                <tr>
                    <th><?= __('Energia') ?></th>
                    <td><?= h($relatorio->energia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Densidade') ?></th>
                    <td><?= h($relatorio->densidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($relatorio->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($relatorio->observacoes) ?></td>
                </tr>
            </table>
        </div>            
    </div>
</div>
</div>
