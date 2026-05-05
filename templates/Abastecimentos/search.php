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
$placa = $this->getRequest()->getQuery('placa');
$observacoes = $this->getRequest()->getQuery('observacoes');
     
?>

<div class="abastecimentos busca content">
    
    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>

    <div class="tabset">
        
        <input type="radio" name="tabs" id="tab_nome" <?= ($nome or (!$email and !$controle and !$nf and !$certificado and !$placa and !$observacoes)) ? 'checked' : '' ?> >
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
            <?php if ($placa):  ?><h3>Resultado da busca para a placa <?= $placa ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Resultado da busca em observações para o termo "<?= $observacoes ?>"</h3><?php endif; ?>
    
            <div class="paginator">
                <?= $this->element('paginator'); ?>
            </div>
            <div class="table_wrap">
                <table>
                    <thead class='thead-light'>
                        <tr>
                            <th class="actions"><?= __('Ações') ?></th>
                            <th><?= $this->Paginator->sort('id', 'ID'); ?></th>
                            <th><?= $this->Paginator->sort('nome', 'Nome'); ?></th>
                            <th><?= $this->Paginator->sort('email', 'E-mail'); ?></th>
                            <th><?= $this->Paginator->sort('controle', 'Controle'); ?></th>
                            <th><?= $this->Paginator->sort('nf', 'NF'); ?></th>
                            <th><?= $this->Paginator->sort('certificado', 'Certificado'); ?></th>
                            <th><?= $this->Paginator->sort('placa', 'Placa'); ?></th>
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
                            <td><?= $this->Html->link((string)$abastecimento->id, ['action' => 'view', $abastecimento->id]); ?></td>
                            <td><?= $this->Html->link($abastecimento->user->nome, ['controler' => 'Users', 'action' => 'view', $abastecimento->user->id]); ?></td>
                            <td><?= $this->Text->autoLinkEmails($abastecimento->user->email) ?></td>
                            <td><?= $abastecimento->controle; ?></td>
                            <td><?= $abastecimento->nf; ?></td>
                            <td><?= $abastecimento->certificado; ?></td>
                            <td><?= $abastecimento->placa; ?></td>
                            <td><?= $abastecimento->observacoes; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
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
            <?php if ($placa):  ?><h3>Nenhum resultado encontrado para a placa <?= $placa ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Nenhum resultado encontrado para em observacoes para o termo <?= $observacoes ?></h3><?php endif; ?>
        <?php endif; ?>
    
    <?php endif; ?>
</div>