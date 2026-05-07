<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\relatorio[]|\Cake\Collection\CollectionInterface $relatorios
 */

declare(strict_types=1);


$nome = $this->getRequest()->getQuery('nome');
$email = $this->getRequest()->getQuery('email');
$id = $this->getRequest()->getQuery('id');
$data = $this->getRequest()->getQuery('data');
$observacoes = $this->getRequest()->getQuery('observacoes');
     
?>

<div class="relatorios busca content">
    
    <?= $this->Html->link(__('Listar Relatórios'), ['action' => 'index'], ['class' => 'button']) ?>

    <div class="tabset">
        
        <input type="radio" name="tabs" id="tab_nome" <?= ($nome or (!$email and !$id and !$data and !$observacoes)) ? 'checked' : '' ?> >
        <label for="tab_nome">Busca por nome</label>
        <div class="tab-content">
            <?php echo $this->Form->create($relatorio_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('nome', ['label' => ['text' => 'Digite o nome do relatório'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_email" <?= ($email) ? 'checked' : '' ?> >
        <label for="tab_email">Busca por email</label>
        <div class="tab-content">
            <?php echo $this->Form->create($relatorio_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('email', ['label' => ['text' => 'Digite o email do relatório'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_id" <?= ($id) ? 'checked' : '' ?> >
        <label for="tab_id">Busca por ID</label>
        <div class="tab-content">
            <?php echo $this->Form->create($relatorio_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('id', ['type' => 'text', 'label' => ['text' => 'Digite o número de id do relatório'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_data" <?= ($data) ? 'checked' : '' ?> >
        <label for="tab_data">Busca por data</label>
        <div class="tab-content">
            <?php echo $this->Form->create($relatorio_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('data', ['label' => ['text' => 'Digite a data do relatório'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar data', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
            <?php echo $this->Form->create($relatorio_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('data', ['value' => (string)$saida, 'type' => 'text', 'label' => ['text' => 'Use esse campo para formulas (yyyy-mm-%)'], 'class' => 'form-control', 'placeholder' => 'yyyy-mm-dd']); ?>
            <?php echo $this->Form->submit('Buscar fórmula', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_observacoes" <?= ($observacoes) ? 'checked' : '' ?> >
        <label for="tab_observacoes">Busca por observações</label>
        <div class="tab-content">
            <?php echo $this->Form->create($relatorio_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('observacoes', ['label' => ['text' => 'Digite o termo na observação do relatório'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
    </div>
    
    <?php if (isset($relatorios)): ?>
    
        <?php if (iterator_count($relatorios)): ?>
    
            <?php if ($nome): ?><h3>Resultado da busca para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Resultado da busca para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($id):  ?><h3>Resultado da busca para o ID <?= $id ?></h3><?php endif; ?>
            <?php if ($data):  ?><h3>Resultado da busca para a data <?= $data ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Resultado da busca em observações para o termo "<?= $observacoes ?>"</h3><?php endif; ?>
    
            <div class="paginator">
                <?= $this->element('paginator'); ?>
            </div>
            <div class="table_wrap">
                <table id="tabela_relatorio">
                    <thead class='thead-light'>
                        <tr>
                            <th class="actions"><?= __('Ações') ?></th>
                            <th><?= $this->Paginator->sort('id', 'ID'); ?></th>
                            <th><?= $this->Paginator->sort('nome', 'Nome'); ?></th>
                            <th><?= $this->Paginator->sort('email', 'E-mail'); ?></th>
                            <th><?= $this->Paginator->sort('data', 'Data'); ?></th>
                            <th><?= $this->Paginator->sort('ch4_media_biogas', 'CH₄ Média') ?></th>
                            <th><?= $this->Paginator->sort('co2_media_biogas', 'CO₂ Média') ?></th>
                            <th><?= $this->Paginator->sort('o2_media_biogas', 'O₂ Média') ?></th>
                            <th><?= $this->Paginator->sort('ch4_media_metano', 'CH₄ Média') ?></th>
                            <th><?= $this->Paginator->sort('co2_media_metano', 'CO₂ Média') ?></th>
                            <th><?= $this->Paginator->sort('o2_media_metano', 'O₂ Média') ?></th>
                            <th><?= $this->Paginator->sort('n2_media_metano', 'N₂ Média') ?></th>
                            <th><?= $this->Paginator->sort('volume_biogas_dia', 'Total Dia') ?></th>
                            <th><?= $this->Paginator->sort('dispenser', 'Dispenser') ?></th>
                            <th><?= $this->Paginator->sort('energia', 'Energia (KW)') ?></th>
                            <th><?= $this->Paginator->sort('densidade', 'Densidade (Kg/m³)') ?></th>
                            <th><?= $this->Paginator->sort('observacoes', 'Observações'); ?></th>
                        </tr>
                    </thead>
                    <?php foreach ($relatorios as $relatorio): ?>
                        <?php 
                          //pr($relatorio);
                          // die();
                        ?>
                        <tr>    
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['action' => 'view', $relatorio->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['action' => 'edit', $relatorio->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $relatorio->id], ['confirm' => __('Tem certeza que deseja deletar o relatorio {0}?', $relatorio->cpf)]) ?>
                            </td>                        
                            <td><?= $this->Html->link((string)$relatorio->id, ['action' => 'view', $relatorio->id]); ?></td>
                            <td><?= $this->Html->link($relatorio->user->nome, ['controler' => 'Users', 'action' => 'view', $relatorio->user->id]); ?></td>
                            <td><?= $this->Text->autoLinkEmails($relatorio->user->email) ?></td>
                            <td><?= $relatorio->data; ?></td>
                            <td><?= h($relatorio->ch4_media_biogas) ?></td>
                            <td><?= h($relatorio->co2_media_biogas) ?></td>
                            <td><?= h($relatorio->o2_media_biogas) ?></td>
                            <td class="ch4_media_metano"><?= h($relatorio->ch4_media_metano) ?></td>
                            <td><?= h($relatorio->co2_media_metano) ?></td>
                            <td><?= h($relatorio->o2_media_metano) ?></td>
                            <td><?= h($relatorio->n2_media_metano) ?></td>
                            <td class="td_volume_biogas_dia"><?= h($relatorio->volume_biogas_dia) ?></td>
                            <td class="dispenser"><?= h($relatorio->dispenser) ?></td>
                            <td class="energia"><?= h($relatorio->energia) ?></td>
                            <td><?= h($relatorio->densidade) ?></td>
                            <td><?= $relatorio->observacoes; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?= $this->element('export_excel', ['id_da_tabela' => 'tabela_relatorio']); ?>
            </div>
            <div class="paginator">
                <?= $this->element('paginator'); ?>
                <?= $this->element('paginator_count'); ?>
            </div>
        
        <?php else: ?>
            <?php if ($nome): ?><h3>Nenhum resultado encontrado para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Nenhum resultado encontrado para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($id):  ?><h3>Nenhum resultado encontrado para o número de id <?= $id ?></h3><?php endif; ?>
            <?php if ($data):  ?><h3>Nenhum resultado encontrado para a data <?= $data ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Nenhum resultado encontrado para em observacoes para o termo <?= $observacoes ?></h3><?php endif; ?>
        <?php endif; ?>
    
    <?php endif; ?>
</div>