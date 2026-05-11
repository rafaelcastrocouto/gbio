<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento[]|\Cake\Collection\CollectionInterface $abastecimentos
 */

declare(strict_types=1);


$nome = $this->getRequest()->getQuery('nome');
$email = $this->getRequest()->getQuery('email');
$controle = $this->getRequest()->getQuery('controle');
$nf = $this->getRequest()->getQuery('nf');
$certificado = $this->getRequest()->getQuery('certificado');
$saida = $this->getRequest()->getQuery('saida');
$placa = $this->getRequest()->getQuery('placa');
$observacoes = $this->getRequest()->getQuery('observacoes');
     
?>

<div class="abastecimentos busca content">
    
    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>

    <div class="tabset">
        
        <input type="radio" name="tabs" id="tab_nome" <?= ($nome or (!$email and !$controle and !$nf and !$certificado and !$saida and !$placa and !$observacoes)) ? 'checked' : '' ?> >
        <label for="tab_nome">Busca por nome</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('nome', ['label' => ['text' => 'Digite o nome do autor do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_email" <?= ($email) ? 'checked' : '' ?> >
        <label for="tab_email">Busca por email</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('email', ['label' => ['text' => 'Digite o email do autor do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_controle" <?= ($controle) ? 'checked' : '' ?> >
        <label for="tab_controle">Busca por controle</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('controle', ['label' => ['text' => 'Digite o número de controle do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_nf" <?= ($nf) ? 'checked' : '' ?> >
        <label for="tab_nf">Busca por NF</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('nf', ['label' => ['text' => 'Digite o número da Nota Fiscal do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_certificado" <?= ($certificado) ? 'checked' : '' ?> >
        <label for="tab_certificado">Busca por certificado</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('certificado', ['label' => ['text' => 'Digite o certificado do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_saida" <?= ($saida) ? 'checked' : '' ?> >
        <label for="tab_saida">Busca por data</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('saida', ['label' => ['text' => 'Digite a data do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('saida', ['value' => (string)$saida, 'type' => 'text', 'label' => ['text' => 'Use esse campo para formulas (yyyy-mm-%)'], 'class' => 'form-control', 'placeholder' => 'yyyy-mm-dd']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_placa" <?= ($placa) ? 'checked' : '' ?> >
        <label for="tab_placa">Busca por placa</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('placa', ['label' => ['text' => 'Digite a placa do veículo'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_observacoes" <?= ($observacoes) ? 'checked' : '' ?> >
        <label for="tab_observacoes">Busca por observações</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimento_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('observacoes', ['label' => ['text' => 'Digite o termo na observação do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
    </div>
    
    <?php if (isset($abastecimentos)): ?>
    
        <?php if (iterator_count($abastecimentos)): ?>
    
            <?php if ($nome): ?><h3>Resultado da busca para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Resultado da busca para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($controle):  ?><h3>Resultado da busca para o número de controle <?= $controle ?></h3><?php endif; ?>
            <?php if ($nf):  ?><h3>Resultado da busca para o NF <?= $nf ?></h3><?php endif; ?>
            <?php if ($certificado):  ?><h3>Resultado da busca para o certificado <?= $certificado ?></h3><?php endif; ?>
            <?php if ($saida):  ?><h3>Resultado da busca para a data <?= $saida ?></h3><?php endif; ?>
            <?php if ($placa):  ?><h3>Resultado da busca para a placa <?= $placa ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Resultado da busca em observações para o termo "<?= $observacoes ?>"</h3><?php endif; ?>
    
            <div class="paginator">
                <?= $this->element('paginator'); ?>
            </div>
            <div class="table_wrap">
                <table id="tabela_abastecimento">
                    <thead class='thead-light'>
                        <tr>
                            <th class="actions"><?= __('Ações') ?></th>
                            <th><?= $this->Paginator->sort('id', 'ID'); ?></th>
                            <th><?= $this->Paginator->sort('nome', 'Autor'); ?></th>
                            <th><?= $this->Paginator->sort('email', 'E-mail'); ?></th>
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
                            <th><?= $this->Paginator->sort('observacoes', 'Observações'); ?></th>
                        </tr>
                    </thead>
                    <?php foreach ($abastecimentos as $abastecimento): ?>
                        <?php 
                          //pr($abastecimento);
                          // die();
                        ?>
                        <tr>    
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['action' => 'view', $abastecimento->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['action' => 'edit', $abastecimento->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $abastecimento->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimento->controle)]) ?>
                            </td>                        
                            <td><?= $this->Html->link((string)$abastecimento->id ?? 'id', ['action' => 'view', $abastecimento->id]); ?></td>
                            <td><?= $this->Html->link($abastecimento->user->nome ?? 'sem nome', ['controler' => 'Users', 'action' => 'view', $abastecimento->user->id]); ?></td>
                            <td><?= $abastecimento->user->email ? $this->Text->autoLinkEmails($abastecimento->user->email) : 'Erro: É necessário registrar um email' ?></td>
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
                            <td><?= h($abastecimento->observacoes) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?= $this->element('export_excel', ['id_da_tabela' => 'tabela_abastecimento']); ?>
            </div>
            <div class="paginator">
                <?= $this->element('paginator'); ?>
                <?= $this->element('paginator_count'); ?>
            </div>
        
        <?php else: ?>
            <?php if ($nome): ?><h3>Nenhum resultado encontrado para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Nenhum resultado encontrado para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($controle):  ?><h3>Nenhum resultado encontrado para o número de controle <?= $controle ?></h3><?php endif; ?>
            <?php if ($nf):  ?><h3>Nenhum resultado encontrado para o NF <?= $nf ?></h3><?php endif; ?>
            <?php if ($certificado):  ?><h3>Nenhum resultado encontrado para o certificado <?= $certificado ?></h3><?php endif; ?>
            <?php if ($saida):  ?><h3>Nenhum resultado encontrado para a data <?= $saida ?></h3><?php endif; ?>
            <?php if ($placa):  ?><h3>Nenhum resultado encontrado para a placa <?= $placa ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Nenhum resultado encontrado para em observacoes para o termo <?= $observacoes ?></h3><?php endif; ?>
        <?php endif; ?>
    
    <?php endif; ?>
</div>