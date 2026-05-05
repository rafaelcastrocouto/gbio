<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Instituicao[]|\Cake\Collection\CollectionInterface $instituicoes
 */
declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }

?>
<div class="instituicoes index content">
	<aside>
		<div class="nav">    
        	<?php if ($user_data['administrador_id']): ?>
                <?= $this->Html->link(__('Nova Instituição'), ['action' => 'add'], ['class' => 'button']) ?>
            <?php endif; ?>
		</div>
	</aside>
    
    <h3><?= __('Lista de Instituições') ?></h3>
    
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div class="inline-block">
        <table id="tabela_instituicoes">
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('nome', 'Nome') ?></th>
                    <th><?= $this->Paginator->sort('cnpj', 'CNPJ') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                    <th><?= $this->Paginator->sort('url', 'Link') ?></th>
                    <th><?= $this->Paginator->sort('observacoes', 'Observações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($instituicoes as $instituicao): ?>
                <tr>
		    <?php if ($user_data['administrador_id']): ?>
                        <td class="actions">
                            <?= $this->Html->link(__('🔍'), ['action' => 'view', $instituicao->id]) ?>
                            <?= $this->Html->link(__('✏️'), ['action' => 'edit', $instituicao->id]) ?>
                            <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $instituicao->id], ['confirm' => __('Tem certeza que deseja deletar a instituição {0}?', $instituicao->nome)]) ?>
                        </td>
                        <td><?= $this->Html->link((string)$instituicao->id, ['action' => 'view', $instituicao->id]) ?></td>                    
                    <?php endif; ?>
                    <td><?= $this->Html->link($instituicao->nome, ['controller' => 'instituicoes', 'action' => 'view', $instituicao->id]) ?></td>
                    <td><?= h($instituicao->cnpj) ?></td>
                    <td><?= $instituicao->email ? $this->Text->autoLinkEmails($instituicao->email) : '' ?></td>
                    <td><?= $instituicao->url ? $this->Html->link($instituicao->url) : '' ?></td>
                    <td><?= h($instituicao->observacoes) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Html->script('excellentexport') ?>
        <a id="excelexport" download="instituicoes.xls" class="button" href="#" onclick="return ExcellentExport.excel(this, 'tabela_instituicoes_export', 'Supervisores');">Exportar para Excel</a>
        <script>
            // formata uma copia da tabela para exportar para excel
            const formula_table = document.querySelector('#tabela_instituicoes').cloneNode(true);
            formula_table.id = 'tabela_instituicoes_export';
            formula_table.classList.add('hidden');
            document.currentScript.before(formula_table);
            
            //remove a 1a coluna de acoes
            const actions = document.querySelectorAll('#tabela_instituicoes_export .actions');
            for (let a of actions) a.remove();
        </script>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
