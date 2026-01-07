<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Relatorio[]|\Cake\Collection\CollectionInterface $relatorios
 */
?>
<div class="relatorios index content">
    
    <?= $this->Html->link(__('Novo Relatorio'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Relatorios') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    
    <?php
        //pr($meses->toArray());
        //die();
    ?>
    
    <div class="inline-block">
        <span id="clientes" class="hidden"><?= h(json_encode($clientes->toArray())) ?></span>
        <table id="tabela_relatorio">
            <thead>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="7">Qualidade</th>
                    <th colspan="6">Produção</th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="3">QUALIDADE MÉDIA DO BIOGÁS ECOURBIS</th>
                    <th colspan="4">QUALIDADE DO BIOMETANO</th>
                    <th colspan="1">VOLUME BIOGÁS</th>
                    <th colspan="1">VOLUME BIOGÁS</th>
                    <th colspan="4">VOLUME BIOMETANO</th>
                </tr>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('data') ?></th>
                    <th><?= $this->Paginator->sort('ch4_media_biogas', '% CH4 MÉDIA') ?></th>
                    <th><?= $this->Paginator->sort('co2_media_biogas', '% CO2 MÉDIA') ?></th>
                    <th><?= $this->Paginator->sort('o2_media_biogas', '% O2 MÉDIA') ?></th>
                    <th><?= $this->Paginator->sort('ch4_media_metano', '% CH4 MÉDIA') ?></th>
                    <th><?= $this->Paginator->sort('co2_media_metano', '% CO2 MÉDIA') ?></th>
                    <th><?= $this->Paginator->sort('o2_media_metano', '% O2 MÉDIA') ?></th>
                    <th><?= $this->Paginator->sort('n2_media_metano', '% N2 MÉDIA') ?></th>
                    <th><?= $this->Paginator->sort('volume_biogas_dia', 'TOTAL DIA M³') ?></th>
                    <th><?= $this->Paginator->sort('volume_biogas_mes', 'TOTAL MÊS M³') ?></th>
                    <th><?= $this->Paginator->sort('consumo_clientes', 'CLIENTES M³') ?></th>
                    <th><?= $this->Paginator->sort('dispenser', 'DISPENSER') ?></th>
                    <th><?= $this->Paginator->sort('volume_total_dia', 'TOTAL DIA M³') ?></th>
                    <th><?= $this->Paginator->sort('volume_total_mes', 'TOTAL MÊS M³') ?></th>
                    <th><?= $this->Paginator->sort('energia', 'ENERGIA MW') ?></th>
                    <th><?= $this->Paginator->sort('densidade', 'DENSIDADE KG/M3') ?></th>
                    <th title="PP: Planta Parada, PO:: Planta em Operação"><?= $this->Paginator->sort('status', 'STATUS') ?></th>
                    <!-- <th><?= $this->Paginator->sort('observacoes') ?></th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($relatorios as $relatorio): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $relatorio->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $relatorio->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $relatorio->id], ['confirm' => __('Tem certeza que deseja deletar o relatorio {0}?', $relatorio->data)]) ?>
                    </td>
                    <td class="current_data"><?= h($relatorio->data) ?></td>
                    <td><?= h($relatorio->ch4_media_biogas) ?></td>
                    <td><?= h($relatorio->co2_media_biogas) ?></td>
                    <td><?= h($relatorio->o2_media_biogas) ?></td>
                    <td class="ch4_media_metano"><?= h($relatorio->ch4_media_metano) ?></td>
                    <td><?= h($relatorio->co2_media_metano) ?></td>
                    <td><?= h($relatorio->o2_media_metano) ?></td>
                    <td><?= h($relatorio->n2_media_metano) ?></td>
                    <td class="td_volume_biogas_dia"><?= h($relatorio->volume_biogas_dia) ?></td>
                    <td class="td_volume_biogas_mes"></td>
                    <td class="td_consumo">
                        <span class="consumo_parsed"></span>
                        <span class="consumo"><?= h($relatorio->consumo_clientes) ?></span>
                    </td>
                    <td class="dispenser"><?= h($relatorio->dispenser) ?></td>
                    <td class="td_volume_total_dia"></td>
                    <td class="td_volume_total_mes"></td>
                        <script>
                            (function () {
                                const parent = document.currentScript.parentElement;
                                const volume_biogas_dia = parent.querySelector('.td_volume_biogas_dia');
                                const volume_biogas_mes = parent.querySelector('.td_volume_biogas_mes');
                                const previous_tr = parent.previousElementSibling;
                                if (!previous_tr) volume_biogas_mes.textContent = volume_biogas_dia.textContent;
                                else {
                                    const previous_td = previous_tr.querySelector('.td_volume_biogas_mes');
                                    volume_biogas_mes.textContent = Number(previous_td.textContent) + Number(volume_biogas_dia.textContent);
                                }
                                const clientes = document.querySelector('#clientes');
                                const clientesData = JSON.parse(clientes.textContent);
                                const parsedClients = {};
                                for (let key in clientesData) {
                                    parsedClients[clientesData[key].id] = clientesData[key];
                                }
                                const consumo = parent.querySelector('.td_consumo .consumo');
                                const consumoData = new Function('return {'+consumo.textContent+'}')();
                                let parsedText = [];
                                let sum = 0;
                                for (let clienteId in consumoData) {
                                    const link = '<a href="clientes/view/' + clienteId + '">' + parsedClients[clienteId].nome + '</a>';
                                    const text = link + ': <span class="dado_media_cliente_'+clienteId+'">' + consumoData[clienteId] + '</span>';
                                    parsedText.push(text);
                                    sum += Number(consumoData[clienteId]) || 0;
                                }
                                consumo.classList.add('hidden');
                                consumo.previousElementSibling.innerHTML = parsedText.join(' | ');
                                const volume_dia = parent.querySelector('.td_volume_total_dia');
                                const volume_mes= parent.querySelector('.td_volume_total_mes');
                                volume_dia.textContent = sum;
                                if (!previous_tr) volume_mes.textContent = volume_dia.textContent;
                                else {
                                    const previous_td = previous_tr.querySelector('.td_volume_total_mes');
                                    volume_mes.textContent = Number(previous_td.textContent) + Number(volume_dia.textContent);
                                }
                            })()
                        </script>
                    <td class="energia"><?= h($relatorio->energia) ?></td>
                    <td><?= h($relatorio->densidade) ?></td>
                    <td><?= h($relatorio->status) ?></td>
                    <!-- <td><?= h($relatorio->observacoes) ?></td> -->
                </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="3"></th>
                    <th colspan="3">CH4 MÉDIO DO MÊS (%): <span id="ch4_media_metano_sum"></span></th>
                    <th colspan="1"></th>
                    <th colspan="3">MEDIA ATUAL (m³/dia): <span id="media_cliente"></span></th>
                    <th colspan="2">FECHAMENTO ESPERADO PARA O MÊS (M3): <span id="esperado"></span></th>
                    <th colspan="1">DISPENSER MÊS (M3): <span id="dispenser_total"></span></th>
                    <th colspan="3">CONSUMO DE ENERGIA ACUMULADO NO MÊS (MW): <span id="energia_total"></span></th>
                    <script>
                        (function () {
                            const sum = function (elements) {
                                let sum = 0;
                                for (const element of elements) { sum += Number(element.textContent); }
                                return sum;
                            }
                            const ch4_media_metano = document.querySelectorAll('.ch4_media_metano');
                            const media_metano = sum(ch4_media_metano) / ch4_media_metano.length;
                            document.querySelector('#ch4_media_metano_sum').textContent = media_metano.toFixed(2);
                            
                            const dado_media_cliente_1 = document.querySelectorAll('.dado_media_cliente_1');
                            const media_cliente = sum(dado_media_cliente_1) / dado_media_cliente_1.length;
                            document.querySelector('#media_cliente').textContent = media_cliente.toFixed(2);
                            
                            document.querySelector('#esperado').textContent = media_cliente * 30;
                            
                            const dispenser_total = document.querySelectorAll('.dispenser');
                            document.querySelector('#dispenser_total').textContent = sum(dispenser_total);

                            const energia_total = document.querySelectorAll('.energia');
                            document.querySelector('#energia_total').textContent = sum(energia_total);
                            
                        })()
                    </script>
                </tr>
            </tbody>
        </table>
        <a download="relatorio.xls" class="button" href="#" onclick="return ExcellentExport.excel(this, 'tabela_relatorio', 'Relatorio');">Exportar para Excel</a>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_month', ['month' => $month]) ?>
    </div>
</div>
