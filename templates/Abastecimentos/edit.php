<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento $abastecimento
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
?>
<div>
    <div class="column">
        <div class="abastecimentos edit content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(
                        __('Deletar Abastecimento'),
                        ['action' => 'delete', $abastecimento->id],
                        ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimento->controle), 'class' => 'button']
                    ) ?>
                </div>
            </aside>
            <?= $this->Form->create($abastecimento) ?>
            <fieldset>
                <h3><?= __('Editando Abastecimento Controle ') . $abastecimento->controle ?></h3>
                <?php
                    echo $this->Form->control('user_id', ['label' => 'ID de Usuário do Autor', 'type' => 'number', 'value' => $user_session->get('id'), 'hidden' => !$user_data['administrador_id'] ]);
                    echo $this->Form->control('instituicao_id', ['label' => 'Instituição', 'options' => $instituicoes, 'class' => 'form-control']);
                    echo $this->Form->control('cliente_id', ['options' => $clientes, 'class' => 'form-control']);
                    echo $this->Form->control('controle', ['label' => 'Nº de Controle']);
                    echo $this->Form->control('nf', ['label' => 'NF']);
                    echo $this->Form->control('certificado');
                    echo $this->Form->control('inicio');
                    echo $this->Form->control('fim');
                    echo $this->Form->control('saida', ['label' => 'Data de Saída']);
                    echo $this->Form->control('placa', ['label' => 'Placa Carreta']);
                    echo $this->Form->control('p_inicial', ['label' => 'Pressão Inicial (bar)']);
                    echo $this->Form->control('p_final', ['label' => 'Pressão Final (bar)']);
                    echo $this->Form->control('carregamento', ['label' => 'Volume do Carregamento (m³)']);
                    if ($user_data['administrador_id'] || $user_data['supervisor_id']):
                        echo $this->Form->control('o2', ['label' => 'O₂ (%)']);
                        echo $this->Form->control('n2', ['label' => 'N₂ (%)']);
                        echo $this->Form->control('ch4', ['label' => 'CH₄ (%)']);
                        echo $this->Form->control('co2', ['label' => 'CO₂ (%)']);
                        echo $this->Form->control('soma', ['label' => 'Soma (%) CO₂ O₂ N₂']);
                        echo $this->Form->control('densidade', ['label' => 'Densidade (kg/m³)']);
                        echo $this->Form->control('ponto', ['label' => 'Ponto de orvalho (°C)']);
                        echo $this->Form->control('wobbe', ['label' => 'Wobbe (KJ/m³)']);
                        echo $this->Form->control('pcs', ['label' => 'PCS (Kcal/m³)']);
                        echo $this->Form->control('o2_media', ['label' => 'O₂ (%) Média Biogás']);
                        echo $this->Form->control('ch4_media', ['label' => 'CH₄ (%) Média Biogás']);
                        echo $this->Form->control('co2_media', ['label' => 'CO₂ (%) Média Biogás']);
                    endif;
                    echo $this->Form->control('observacoes', ['label' => 'Observações']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar Edição'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
