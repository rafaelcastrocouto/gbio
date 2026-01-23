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
    
    <div class="inline-block">
        <span id="date" class="hidden"><?= $month.'_'.$year ?></span>
        <span id="clientes" class="hidden"><?= h(json_encode($clientes->toArray())) ?></span>
        <script>
            // parse nos dados dos clientes de JSON string para objeto
            const clientes = document.querySelector('#clientes');
            const clientesData = JSON.parse(clientes.textContent);
            const parsedClients = {};
            let sum = 0;
            for (let key in clientesData) {
                parsedClients[clientesData[key].id] = clientesData[key];
                sum++;
            }
            window.parsedClientsLength = sum;
            window.parsedClients = parsedClients;
        </script>
        <table id="tabela_relatorio">
            <thead>
                <tr>
                    <th class="col_rem_span" colspan="2"></th>
                    <th colspan="7">Qualidade</th>
                    <th class="th_producao" colspan="6">Produção</th>
                    <th colspan="3"></th>
                </tr>
                <tr>
                    <th class="col_rem_span" colspan="2"></th>
                    <th colspan="3">Qualidade Média do Biogás (%)</th>
                    <th colspan="4">Qualidade Média do BioMetano (%)</th>
                    <th colspan="2">Volume Biogás (m³)</th>
                    <th class="th_volume_biometano" colspan="4">Volume BioMetano (m³)</th>
                </tr>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('data') ?></th>
                    <th><?= $this->Paginator->sort('ch4_media_biogas', 'CH₄ Média') ?></th>
                    <th><?= $this->Paginator->sort('co2_media_biogas', 'CO₂ Média') ?></th>
                    <th><?= $this->Paginator->sort('o2_media_biogas', 'O₂ Média') ?></th>
                    <th><?= $this->Paginator->sort('ch4_media_metano', 'CH₄ Média') ?></th>
                    <th><?= $this->Paginator->sort('co2_media_metano', 'CO₂ Média') ?></th>
                    <th><?= $this->Paginator->sort('o2_media_metano', 'O₂ Média') ?></th>
                    <th><?= $this->Paginator->sort('n2_media_metano', 'N₂ Média') ?></th>
                    <th><?= $this->Paginator->sort('volume_biogas_dia', 'Total Dia') ?></th>
                    <th><?= $this->Paginator->sort('volume_biogas_mes', 'Total Mês') ?></th>
                    <th class="th_consumo_clientes"><?= $this->Paginator->sort('consumo_clientes', 'Clientes') ?></th>
                    <script>
                        // adiciona o nome dos clientes
                        const producao_th = document.querySelector('#tabela_relatorio .th_producao');
                        const volume_biometano_th = document.querySelector('#tabela_relatorio .th_volume_biometano');
                        const consumo_th = document.querySelector('#tabela_relatorio .th_consumo_clientes');
                        
                        let parsedText = [];
                        for (let clienteId in window.parsedClients) {
                            const link = '<a href="clientes/view/' + clienteId + '">Cliente ' + window.parsedClients[clienteId].nome + '</a>';
                            parsedText[clienteId] = link;
                        }
                        producao_th.colSpan = 5 + window.parsedClientsLength;
                        volume_biometano_th.colSpan = 3 + window.parsedClientsLength;
                        
                        consumo_th.classList.add('hidden');
        
                        for (let clienteId in window.parsedClients) {
                            const cliente_th = document.createElement('th');
                            cliente_th.innerHTML = parsedText[clienteId];
                            consumo_th.before(cliente_th); 
                        }

                    </script>
                    <th><?= $this->Paginator->sort('dispenser', 'Dispenser') ?></th>
                    <th><?= $this->Paginator->sort('volume_total_dia', 'Total Dia') ?></th>
                    <th><?= $this->Paginator->sort('volume_total_mes', 'Total Mès') ?></th>
                    <th><?= $this->Paginator->sort('energia', 'Energia (KW)') ?></th>
                    <th><?= $this->Paginator->sort('densidade', 'Densidade (Kg/m³)') ?></th>
                    <!-- <th><?= $this->Paginator->sort('observacoes', 'Observações') ?></th> -->
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
                        <span class="consumo"><?= h($relatorio->consumo_clientes) ?></span>
                    </td>
                    <td class="dispenser"><?= h($relatorio->dispenser) ?></td>
                    <td class="td_volume_total_dia"></td>
                    <td class="td_volume_total_mes"></td>
                        <script>
                            (function () { 
                                // calcula o volume cumulativo de biogas no mes
                                const parent = document.currentScript.parentElement;
                                const volume_biogas_dia = parent.querySelector('#tabela_relatorio .td_volume_biogas_dia');
                                const volume_biogas_mes = parent.querySelector('#tabela_relatorio .td_volume_biogas_mes');
                                const previous_tr = parent.previousElementSibling;
                                if (!previous_tr) volume_biogas_mes.textContent = volume_biogas_dia.textContent;
                                else {
                                    const previous_td = previous_tr.querySelector('#tabela_relatorio .td_volume_biogas_mes');
                                    volume_biogas_mes.textContent = Number(previous_td.textContent) + Number(volume_biogas_dia.textContent);
                                }
                                
                                // divide as celulas para incluir os clientes
                                const consumo = parent.querySelector('#tabela_relatorio .td_consumo .consumo');
                                const consumoData = new Function('return {'+consumo.textContent+'}')();
                                const consumo_td =  parent.querySelector('.td_consumo');
                                for (let clienteId in window.parsedClients) {
                                    const cliente_td = document.createElement('td');
                                    cliente_td.textContent = Number(consumoData[clienteId]) || 0;
                                    consumo_td.before(cliente_td); 
                                }
                                consumo_td.classList.add('hidden');

                                // calcula o volume total de biometano no dia
                                let sum = 0;
                                for (let clienteId in consumoData) {
                                    sum += Number(consumoData[clienteId]) || 0;
                                }
                                const volume_dia = parent.querySelector('.td_volume_total_dia');
                                volume_dia.textContent = sum;

                                // calcula o volume cumulativo de biometano no mes
                                const volume_mes= parent.querySelector('.td_volume_total_mes');
                                if (!previous_tr) volume_mes.textContent = volume_dia.textContent;
                                else {
                                    const previous_td = previous_tr.querySelector('#tabela_relatorio .td_volume_total_mes');
                                    volume_mes.textContent = Number(previous_td.textContent) + Number(volume_dia.textContent);
                                }
                            })()
                        </script>
                    <td class="energia"><?= h($relatorio->energia) ?></td>
                    <td><?= h($relatorio->densidade) ?></td>
                    <!-- <td><?= h($relatorio->observacoes) ?></td> -->
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="col_rem_span" colspan="2"></td>
                    <td colspan="3">CH₄ Médio do mês (%)</td>
                    <td class="ch4_media_metano_sum"></td>
                    <td colspan="3"></td>
                    <td colspan="2">Média atual (m³/dia)</td>
                    <td class="media_clientes"></td>
                    <td colspan="2">Dispenser mês (m³)</td>
                    <td class="dispenser_total"></td>
                    <td colspan="2">Consumo de Energia Acumulado no mês (KW)</td>
                    <td class="energia_total"></td>
                    <script>
                        (function () {
                            // calcula as medias e somas finais 
                            const sum = function (elements) {
                                let sum = 0;
                                for (const element of elements) { sum += Number(element.textContent); }
                                return sum;
                            }
                            
                            const ch4_media_metano = document.querySelectorAll('#tabela_relatorio .ch4_media_metano');
                            const media_metano = sum(ch4_media_metano) / ch4_media_metano.length;
                            document.querySelector('#tabela_relatorio .ch4_media_metano_sum').textContent = media_metano.toFixed(2);
                            
                            const dado_media_clientes = document.querySelectorAll('#tabela_relatorio .td_volume_total_dia');
                            const media_clientes = sum(dado_media_clientes) / dado_media_clientes.length;
                            document.querySelector('#tabela_relatorio .media_clientes').textContent = media_clientes.toFixed(2);
                            
                            const dispenser_total = document.querySelectorAll('#tabela_relatorio .dispenser');
                            document.querySelector('#tabela_relatorio .dispenser_total').textContent = sum(dispenser_total);

                            const energia_total = document.querySelectorAll('#tabela_relatorio .energia');
                            document.querySelector('#tabela_relatorio .energia_total').textContent = sum(energia_total);
                            
                        })()
                    </script>
                </tr>
            </tbody>
        </table>
        
        <?= $this->Html->script('excellentexport') ?>
        <a id="excelexport" download="relatorio.xls" class="button" href="#" onclick="return ExcellentExport.excel(this, 'tabela_relatorio_formula', 'Relatorio');">Exportar para Excel</a>
        <script>
            // formata uma copia da tabela para exportar para excel
            const formula_table = document.querySelector('#tabela_relatorio').cloneNode(true);
            formula_table.id = 'tabela_relatorio_formula';
            formula_table.classList.add('hidden');
            document.currentScript.before(formula_table);
            document.querySelector('#excelexport').download = 'relatorio_'+document.querySelector('#date').textContent+'.xls';

            //remove a 1a coluna de acoes
            const col_rem_span = document.querySelectorAll('#tabela_relatorio_formula .col_rem_span');
            for (let col of col_rem_span) col.colSpan = 1;
            const actions = document.querySelectorAll('#tabela_relatorio_formula .actions');
            for (let a of actions) a.remove();
            
            // remove dados dos clientes
            const th_clientes = document.querySelector('#tabela_relatorio_formula .th_consumo_clientes');
            th_clientes.remove();
            const td_cliente = document.querySelectorAll('#tabela_relatorio_formula .td_consumo');
            for (let td of td_cliente) td.remove();
            
            // substitui formulas 
            const start = 4;
            
            // formula biogas cumulativo do mes
            const volume_biogas_dia = document.querySelectorAll('#tabela_relatorio_formula .td_volume_biogas_dia');
            for (let td of volume_biogas_dia) {
                const volume_biogas_mes = td.nextElementSibling;
                const previous_tr = td.parentElement.previousElementSibling;
                const previous_td = previous_tr?.querySelector('.td_volume_biogas_mes');
                if (!previous_td) volume_biogas_mes.textContent = '=I'+start; 
                else {
                    const index = start + Array.prototype.indexOf.call(td.parentElement.parentElement.children, td.parentElement);
                    volume_biogas_mes.textContent = '=I'+index+' + J'+(index-1);
                }
            }
            
            // formula biometano cumulativo do mes
            const volume_biometano_dia = document.querySelectorAll('#tabela_relatorio_formula .td_volume_total_dia');
            for (let td of volume_biometano_dia) {
                const volume_biometano_mes = td.nextElementSibling;
                const previous_tr = td.parentElement.previousElementSibling;
                const previous_td = previous_tr?.querySelector('.td_volume_total_mes');
                if (!previous_td) volume_biometano_mes.textContent = '=O'+start; 
                else {
                    const index = start + Array.prototype.indexOf.call(td.parentElement.parentElement.children, td.parentElement);
                    volume_biometano_mes.textContent = '=O'+index+' + P'+(index-1);
                }
            }
            
            // formula biometano total dia
            const clientes_pad = 11;
            for (let td of volume_biometano_dia) {
                const index = start + Array.prototype.indexOf.call(td.parentElement.parentElement.children, td.parentElement);
                const SI = getExcelColumnName(clientes_pad);
                const LI = getExcelColumnName(clientes_pad + window.parsedClientsLength - 1);
                td.textContent = '=SUM('+ SI + index +':'+ LI + index +')'
            }
            
            // substitui valores finais
            const rows = document.querySelectorAll('#tabela_relatorio_formula .ch4_media_metano');
            const last = start + rows.length - 1;
            
            const dispenser_pad = 11;
            const media_clientes_pad = 12;
            const energia_pad = 14;

            const DI = getExcelColumnName(dispenser_pad + window.parsedClientsLength);
            const CI = getExcelColumnName(media_clientes_pad + window.parsedClientsLength);
            const EI = getExcelColumnName(energia_pad + window.parsedClientsLength);
            
            document.querySelector('#tabela_relatorio_formula .ch4_media_metano_sum').innerHTML = '=AVERAGE(E'+start+':E'+last+')';
            document.querySelector('#tabela_relatorio_formula .media_clientes').innerHTML = '=AVERAGE('+CI+start+':'+CI+last+')';
            document.querySelector('#tabela_relatorio_formula .dispenser_total').innerHTML = '=SUM('+DI+start+':'+DI+last+')';
            document.querySelector('#tabela_relatorio_formula .energia_total').innerHTML = '=SUM('+EI+start+':'+EI+last+')';
            
            function getExcelColumnName(n) {
              let result = ''; // Initialize the result variable to store the Excel column title
            
              if (n < 1) {
                throw new Error("Column number must be a positive integer.");
              }
            
              while (n > 0) {
                // Calculate the character corresponding to the current digit, adjusting for 1-based indexing
                let el = String.fromCharCode(65 + (n - 1) % 26);
                // Prepend the character to the result
                result = el + result;
                // Update n for the next digit (using bitwise OR ~~ for integer division)
                n = ~~((n - 1) / 26);
              }
            
              return result; // Return the Excel column title
            }
        </script>
        
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_month', ['month' => $month]) ?>
    </div>
</div>
