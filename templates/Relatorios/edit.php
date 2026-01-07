<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Relatorio $relatorio
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
?>
<div>
    <div class="column">
        <div class="relatorios edit content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Relatorios'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(
                        __('Deletar Relatorio'),
                        ['action' => 'delete', $relatorio->id],
                        ['confirm' => __('Tem certeza que deseja deletar o relatorio {0}?', $relatorio->controle), 'class' => 'button']
                    ) ?>
                </div>
            </aside>
            <?= $this->Form->create($relatorio) ?>
            <fieldset>
                <h3><?= __('Editando Relatorio ') . $relatorio->data ?></h3>
                <span id="clientes" class="hidden"><?= h(json_encode($clientes->toArray())) ?></span>
                <?php
                    echo $this->Form->control('user_id', ['type' => 'number', 'value' => $user_session->get('id'), 'hidden' => !$user_data['administrador_id'] ]);
                    echo $this->Form->control('instituicao_id', ['options' => $instituicoes, 'class' => 'form-control']);
                    echo $this->Form->control('data');
                    echo $this->Form->control('ch4_media_biogas');
                    echo $this->Form->control('co2_media_biogas');
                    echo $this->Form->control('o2_media_biogas');
                    echo $this->Form->control('ch4_media_metano');
                    echo $this->Form->control('co2_media_metano');
                    echo $this->Form->control('o2_media_metano');
                    echo $this->Form->control('n2_media_metano');
                    echo $this->Form->control('volume_biogas_dia');
                    echo $this->Form->control('consumo_clientes');
                ?>    
                        <h3>Clientes</h3>
                        <fieldset class="consumo_parsed input"></fieldset>
                        <span class="consumo"><?= h($relatorio->consumo_clientes) ?></span>
                        <script>
                            (function () {
                                const clientes = document.querySelector('#clientes');
                                const clientesData = JSON.parse(clientes.textContent);
                                const parsedClients = {};
                                for (let key in clientesData) {
                                    parsedClients[clientesData[key].id] = clientesData[key];
                                }
                                const consumo = document.currentScript.previousElementSibling;
                                const consumoData = new Function('return {'+consumo.textContent+'}')();
                                let parsedText = [];
                                for (let clienteId in parsedClients) {
                                    const labelEl = '<label for="cliente_' + clienteId + '">Cliente ' + parsedClients[clienteId].nome + '</label>';
                                    const clienteVal = consumoData[clienteId] ? consumoData[clienteId] : 0;
                                    const inputEl = '<input type="text" name="cliente_' + clienteId + '" value="' + clienteVal + '" class="cliente_input">';
                                    const text = labelEl + ' ' + inputEl;
                                    parsedText.push(text);
                                }
                                consumo.classList.add('hidden');
                                const consumo_parsed = consumo.previousElementSibling;
                                consumo_parsed.innerHTML = parsedText.join('');
                                const consumo_clientes = consumo_parsed.previousElementSibling.previousElementSibling;
                                consumo_clientes.classList.add('hidden');
                                const cliente_inputs = document.querySelectorAll('.cliente_input');
                                const cliente_update = function (e) {
                                    const val = [];
                                    for (let cliente_input of cliente_inputs) {
                                        if (cliente_input.value && cliente_input.value !== '0') {
                                            const clienteId = cliente_input.name.split('_')[1];
                                            val.push(clienteId + ': ' + cliente_input.value);
                                        }
                                    }
                                    console.log(consumo_clientes)
                                    consumo_clientes.children[1].value = val.join(', ');
                                };
                                for (let cliente_input of cliente_inputs) {
                                    cliente_input.addEventListener('change', cliente_update);
                                }
                            })()
                        </script>
                <?php
                    echo $this->Form->control('dispenser');
                    echo $this->Form->control('energia');
                    echo $this->Form->control('densidade');
                    echo $this->Form->control('status');
                    echo $this->Form->control('observacoes');
                
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Edição'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
