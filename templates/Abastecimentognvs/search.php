<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimentognv[]|\Cake\Collection\CollectionInterface $abastecimentognvs
 */

declare(strict_types=1);


$nome = $this->getRequest()->getQuery('nome');
$email = $this->getRequest()->getQuery('email');
$motorista = $this->getRequest()->getQuery('motorista');
$rg = $this->getRequest()->getQuery('rg');
$saida = $this->getRequest()->getQuery('saida');
$placa = $this->getRequest()->getQuery('placa');
$prefixo = $this->getRequest()->getQuery('prefixo');
$observacoes = $this->getRequest()->getQuery('observacoes');

?>

<div class="abastecimentognvs busca content">
    
    <?= $this->Html->link(__('Listar Abastecimentos GNV'), ['action' => 'index'], ['class' => 'button']) ?>

    <div class="tabset">
        
        <input type="radio" name="tabs" id="tab_nome" <?= ($nome or (!$email and !$motorista and !$rg and !$saida and !$placa and !$prefixo and !$observacoes)) ? 'checked' : '' ?> >
        <label for="tab_nome">Busca por nome</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('nome', ['label' => ['text' => 'Digite o nome do autor do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_email" <?= ($email) ? 'checked' : '' ?> >
        <label for="tab_email">Busca por email</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('email', ['label' => ['text' => 'Digite o email do autor do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_motorista" <?= ($motorista) ? 'checked' : '' ?> >
        <label for="tab_motorista">Busca por motorista</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('motorista', ['label' => ['text' => 'Digite o nome do motorista do veículo'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_rg" <?= ($rg) ? 'checked' : '' ?> >
        <label for="tab_rg">Busca por RG</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('rg', ['label' => ['text' => 'Digite o RG do motorista do veículo'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_saida" <?= ($saida) ? 'checked' : '' ?> >
        <label for="tab_saida">Busca por data</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('saida', ['type' => 'date', 'label' => ['text' => 'Digite a data do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('saida', ['value' => (string)$saida, 'type' => 'text', 'label' => ['text' => 'Use esse campo para formulas (yyyy-mm-%)'], 'class' => 'form-control', 'placeholder' => 'yyyy-mm-dd']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_placa" <?= ($placa) ? 'checked' : '' ?> >
        <label for="tab_placa">Busca por placa</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('placa', ['label' => ['text' => 'Digite a placa do veículo'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_prefixo" <?= ($prefixo) ? 'checked' : '' ?> >
        <label for="tab_prefixo">Busca por prefixo</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('prefixo', ['label' => ['text' => 'Digite o prefixo do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_observacoes" <?= ($observacoes) ? 'checked' : '' ?> >
        <label for="tab_observacoes">Busca por observações</label>
        <div class="tab-content">
            <?php echo $this->Form->create($abastecimentognv_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('observacoes', ['label' => ['text' => 'Digite o termo na observação do abastecimento'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
    </div>
    
    <?php if (isset($abastecimentognvs)): ?>
    
        <?php if (iterator_count($abastecimentognvs)): ?>
    
            <?php if ($nome): ?><h3>Resultado da busca para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Resultado da busca para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($motorista):  ?><h3>Resultado da busca para o motorista <?= $motorista ?></h3><?php endif; ?>
            <?php if ($rg):  ?><h3>Resultado da busca para o RG <?= $rg ?></h3><?php endif; ?>
            <?php if ($saida):  ?><h3>Resultado da busca para a data <?= $saida ?></h3><?php endif; ?>
            <?php if ($placa):  ?><h3>Resultado da busca para a placa <?= $placa ?></h3><?php endif; ?>
            <?php if ($prefixo):  ?><h3>Resultado da busca para o prefixo <?= $prefixo ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Resultado da busca em observações para o termo "<?= $observacoes ?>"</h3><?php endif; ?>
    
            <div class="paginator">
                <?= $this->element('paginator'); ?>
            </div>
            <div class="table_wrap">
                <table id="tabela_abastecimentognv">
                    <thead class='thead-light'>
                        <tr>
                            <th class="actions"><?= __('Ações') ?></th>
                            <th><?= $this->Paginator->sort('id', 'ID'); ?></th>
                            <th><?= $this->Paginator->sort('nome', 'Nome'); ?></th>
                            <th><?= $this->Paginator->sort('email', 'E-mail'); ?></th>
                            <th><?= $this->Paginator->sort('motorista', 'Motorista'); ?></th>
                            <th><?= $this->Paginator->sort('rg', 'RG'); ?></th>
                            <th><?= $this->Paginator->sort('saida', 'Data'); ?></th>
                            <th><?= $this->Paginator->sort('placa', 'Placa'); ?></th>
                            <th><?= $this->Paginator->sort('prefixo', 'Prefixo'); ?></th>
                            <th><?= $this->Paginator->sort('p_inicial', ['label' => 'Pressão Inicial (bar)']) ?></th>
                            <th><?= $this->Paginator->sort('p_final', ['label' => 'Pressão Final (bar)']) ?></th>
                            <th><?= $this->Paginator->sort('volume', ['label' => 'Volume (m³)']) ?></th>
                            <th><?= $this->Paginator->sort('observacoes', 'Observações'); ?></th>
                        </tr>
                    </thead>
                    <?php foreach ($abastecimentognvs as $abastecimentognv): ?>
                        <?php 
                          //pr($abastecimentognv);
                          // die();
                        ?>
                        <tr>    
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['action' => 'view', $abastecimentognv->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['action' => 'edit', $abastecimentognv->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $abastecimentognv->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimentognv->controle)]) ?>
                            </td>                        
                            <td><?= $this->Html->link((string)$abastecimentognv->id ?? '', ['action' => 'view', $abastecimentognv->id]); ?></td>
                            <td><?= $this->Html->link($abastecimentognv->user->nome ?? '', ['controler' => 'Users', 'action' => 'view', $abastecimentognv->user->id]); ?></td>
                            <td><?= $abastecimentognv->user->email ? $this->Text->autoLinkEmails($abastecimentognv->user->email) : 'Erro: É necessário registrar um email' ?></td>
                            <td><?= $abastecimentognv->motorista; ?></td>
                            <td><?= $abastecimentognv->rg; ?></td>
                            <td><?= $abastecimentognv->saida; ?></td>
                            <td><?= h($abastecimentognv->placa) ?></td>
                            <td><?= h($abastecimentognv->prefixo) ?></td>
                            <td><?= h($abastecimentognv->p_inicial) ?></td>
                            <td><?= h($abastecimentognv->p_final) ?></td>
                            <td><?= h($abastecimentognv->volume) ?></td>
                            <td><?= h($abastecimentognv->observacoes) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?= $this->element('export_excel', ['id_da_tabela' => 'tabela_abastecimentognv']); ?>
            </div>
            <div class="paginator">
                <?= $this->element('paginator'); ?>
                <?= $this->element('paginator_count'); ?>
            </div>
        
        <?php else: ?>
            <?php if ($nome): ?><h3>Nenhum resultado encontrado para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Nenhum resultado encontrado para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($motorista):  ?><h3>Nenhum resultado encontrado para o motorista <?= $motorista ?></h3><?php endif; ?>
            <?php if ($rg):  ?><h3>Nenhum resultado encontrado para o RG <?= $rg ?></h3><?php endif; ?>
            <?php if ($saida):  ?><h3>Nenhum resultado encontrado para a data <?= $saida ?></h3><?php endif; ?>
            <?php if ($placa):  ?><h3>Nenhum resultado encontrado para a placa <?= $placa ?></h3><?php endif; ?>
            <?php if ($prefixo):  ?><h3>Nenhum resultado encontrado para o prefixo <?= $prefixo ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Nenhum resultado encontrado para em observacoes para o termo <?= $observacoes ?></h3><?php endif; ?>
        <?php endif; ?>
    
    <?php endif; ?>
</div>