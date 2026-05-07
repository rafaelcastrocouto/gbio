<?php 
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\operador[]|\Cake\Collection\CollectionInterface $operadores
 */

declare(strict_types=1);

$id = $this->getRequest()->getQuery('id');
$nome = $this->getRequest()->getQuery('nome');
$cpf = $this->getRequest()->getQuery('cpf');
$email = $this->getRequest()->getQuery('email');
$endereco = $this->getRequest()->getQuery('endereco');
$celular = $this->getRequest()->getQuery('celular');
$observacoes = $this->getRequest()->getQuery('observacoes');
     
?>

<div class="operadores busca content">
    
    <?= $this->Html->link(__('Listar Operadores'), ['action' => 'index'], ['class' => 'button']) ?>

    <div class="tabset">
        
        <input type="radio" name="tabs" id="tab_nome" <?= ($nome or (!$email and !$id and !$cpf and !$endereco and !$celular and !$observacoes)) ? 'checked' : '' ?> >
        <label for="tab_nome">Busca por nome</label>
        <div class="tab-content">
            <?php echo $this->Form->create($operador_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('nome', ['label' => ['text' => 'Digite o nome do operador'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_email" <?= ($email) ? 'checked' : '' ?> >
        <label for="tab_email">Busca por email</label>
        <div class="tab-content">
            <?php echo $this->Form->create($operador_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('email', ['label' => ['text' => 'Digite o email do operador'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_id" <?= ($id) ? 'checked' : '' ?> >
        <label for="tab_id">Busca por ID</label>
        <div class="tab-content">
            <?php echo $this->Form->create($operador_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('id', ['type' => 'text', 'label' => ['text' => 'Digite o número de ID do operador'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_cpf" <?= ($cpf) ? 'checked' : '' ?> >
        <label for="tab_cpf">Busca por CPF</label>
        <div class="tab-content">
            <?php echo $this->Form->create($operador_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('cpf', ['label' => ['text' => 'Digite o número do CPF do operador'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_endereco" <?= ($endereco) ? 'checked' : '' ?> >
        <label for="tab_endereco">Busca por endereco</label>
        <div class="tab-content">
            <?php echo $this->Form->create($operador_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('endereco', ['label' => ['text' => 'Digite o endereço do operador'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_celular" <?= ($celular) ? 'checked' : '' ?> >
        <label for="tab_celular">Busca por celular</label>
        <div class="tab-content">
            <?php echo $this->Form->create($operador_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('celular', ['label' => ['text' => 'Digite o celular do operador'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
        <input type="radio" name="tabs" id="tab_observacoes" <?= ($observacoes) ? 'checked' : '' ?> >
        <label for="tab_observacoes">Busca por observações</label>
        <div class="tab-content">
            <?php echo $this->Form->create($operador_vazio, ['type' => 'get', 'valueSources' => ['query', 'context']]) ?>
            <?php echo $this->Form->control('observacoes', ['label' => ['text' => 'Digite o termo na observação do operador'], 'class' => 'form-control']); ?>
            <?php echo $this->Form->submit('Buscar', ['type' => 'Submit', 'class' => 'button']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        
    </div>
    
    <?php if (isset($operadores)): ?>
    
        <?php if (iterator_count($operadores)): ?>
    
            <?php if ($nome): ?><h3>Resultado da busca para o termo "<?= $nome ?>"</h3><?php endif; ?>
            <?php if ($email):  ?><h3>Resultado da busca para o email <?= $email ?></h3><?php endif; ?>
            <?php if ($id):  ?><h3>Resultado da busca para o ID <?= $id ?></h3><?php endif; ?>
            <?php if ($cpf):  ?><h3>Resultado da busca para o CPF <?= $cpf ?></h3><?php endif; ?>
            <?php if ($endereco):  ?><h3>Resultado da busca para o endereco <?= $endereco ?></h3><?php endif; ?>
            <?php if ($celular):  ?><h3>Resultado da busca para o celular <?= $celular ?></h3><?php endif; ?>
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
                            <th><?= $this->Paginator->sort('cpf', 'CPF'); ?></th>
                            <th><?= $this->Paginator->sort('email', 'E-mail'); ?></th>
                            <th><?= $this->Paginator->sort('endereco', 'Endereço'); ?></th>
                            <th><?= $this->Paginator->sort('celular', 'Celular'); ?></th>
                            <th><?= $this->Paginator->sort('observacoes', 'Observações'); ?></th>
                        </tr>
                    </thead>
                    <?php foreach ($operadores as $operador): ?>
                        <?php 
                          //pr($operador);
                          // die();
                        ?>
                        <tr>    
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['action' => 'view', $operador->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['action' => 'edit', $operador->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $operador->id], ['confirm' => __('Tem certeza que deseja deletar o operador {0}?', $operador->cpf)]) ?>
                            </td>                        
                            <td><?= $this->Html->link((string)$operador->id, ['action' => 'view', $operador->id]); ?></td>
                            <td><?= $this->Html->link($operador->user->nome, ['controler' => 'Users', 'action' => 'view', $operador->user->id]); ?></td>
                            <td><?= $operador->cpf; ?></td>
                            <td><?= $this->Text->autoLinkEmails($operador->user->email) ?></td>
                            <td><?= $operador->endereco; ?></td>
                            <td><?= $operador->celular; ?></td>
                            <td><?= $operador->observacoes; ?></td>
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
            <?php if ($id):  ?><h3>Nenhum resultado encontrado para o número de id <?= $id ?></h3><?php endif; ?>
            <?php if ($cpf):  ?><h3>Nenhum resultado encontrado para o CPF <?= $cpf ?></h3><?php endif; ?>
            <?php if ($endereco):  ?><h3>Nenhum resultado encontrado para o endereco <?= $endereco ?></h3><?php endif; ?>
            <?php if ($celular):  ?><h3>Nenhum resultado encontrado para o celular <?= $celular ?></h3><?php endif; ?>
            <?php if ($observacoes):  ?><h3>Nenhum resultado encontrado para em observacoes para o termo <?= $observacoes ?></h3><?php endif; ?>
        <?php endif; ?>
    
    <?php endif; ?>
</div>