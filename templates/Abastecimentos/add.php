<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador $abastecimento
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }

?>
<div>
    <div class="column">
        <div class="abastecimentos add content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <?= $this->Form->create($abastecimento) ?>
            <fieldset>
                <h3><?= __('Adicionando Abastecimento') ?></h3>
                <?php
                    echo $this->Form->control('user_id', ['label' => 'ID de Usuário do Autor', 'type' => 'number', 'value' => $user_session->get('id'), 'hidden' => !$user_data['administrador_id'] ]);
                    echo $this->Form->control('instituicao_id', ['label' => 'Instituição', 'options' => $instituicoes, 'class' => 'form-control']);
                    echo $this->Form->control('cliente_id', ['options' => $clientes, 'class' => 'form-control']);
                    echo $this->Form->control('controle', ['label' => 'Nº de Controle', 'placeholder' => '1234']);
                    echo $this->Form->control('nf', ['label' => 'NF', 'placeholder' => '123456']);
                    echo $this->Form->control('certificado', ['placeholder' => 'AB123456-123']);
                    echo $this->Form->control('inicio');
                    echo $this->Form->control('fim');
                    echo $this->Form->control('saida', ['label' => 'Data de Saída']);
                    echo $this->Form->control('placa', ['label' => 'Placa Carreta', 'placeholder' => 'ABC-ABCD']);
                    echo $this->Form->control('p_inicial', ['label' => 'Pressão Inicial (bar)', 'placeholder' => '12']);
                    echo $this->Form->control('p_final', ['label' => 'Pressão Final (bar)', 'placeholder' => '34']);
                    echo $this->Form->control('carregamento', ['label' => 'Volume do Carregamento (m³)', 'placeholder' => '1234']);
                    if ($user_data['administrador_id'] || $user_data['supervisor_id']):
                        echo $this->Form->control('o2', ['label' => 'O₂ (%)', 'placeholder' => '0.123456']);
                        echo $this->Form->control('n2', ['label' => 'N₂ (%)', 'placeholder' => '4.123456']);
                        echo $this->Form->control('ch4', ['label' => 'CH₄ (%)', 'placeholder' => '99.123456']);
                        echo $this->Form->control('co2', ['label' => 'CO₂ (%)', 'placeholder' => '1.123456']);
                        echo $this->Form->control('soma', ['label' => 'Soma (%) CO₂ O₂ N₂', 'placeholder' => '6.123456']);
                        echo $this->Form->control('densidade', ['label' => 'Densidade (kg/m³)', 'placeholder' => '0.123']);
                        echo $this->Form->control('ponto', ['label' => 'Ponto de orvalho (°C)', 'placeholder' => '-100']);
                        echo $this->Form->control('wobbe', ['label' => 'Wobbe (KJ/m³)', 'placeholder' => '12345.6']);
                        echo $this->Form->control('pcs', ['label' => 'PCS (Kcal/m³)', 'placeholder' => '1234.5']);
                        echo $this->Form->control('o2_media', ['label' => 'O₂ (%) Média Biogás', 'placeholder' => '0.12']);
                        echo $this->Form->control('ch4_media', ['label' => 'CH₄ (%) Média Biogás', 'placeholder' => '12.34']);
                        echo $this->Form->control('co2_media', ['label' => 'CO₂ (%) Média Biogás', 'placeholder' => '12.34']);
                    endif;
                    echo $this->Form->control('observacoes', ['label' => 'Observações']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar Abastecimento'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
