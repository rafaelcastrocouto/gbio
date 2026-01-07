<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador $operador
 */
?>
<div>
    <div class="column">
        <div class="operadores view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Operadores'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Operador'), ['action' => 'edit', $operador->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Operador'), ['action' => 'delete', $operador->id], ['confirm' => __('Tem certeza que deseja deletar o operador {0}?', $operador->nome), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo Operador'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Operador</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($operador->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($operador->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($operador->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($operador->celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($operador->observacoes) ?></td>
                </tr>
            </table>
            
            <?php if (!empty($operador->user)) : ?>
            <div class="related">
                <h4><?= __('Usuário') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Actions') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Email') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['controller' => 'Users', 'action' => 'view', $operador->user->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['controller' => 'Users', 'action' => 'edit', $operador->user->id]) ?>
                                <?= $this->Html->link(__('🔑'), ['controller' => 'Users', 'action' => 'editpassword', $operador->user->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['controller' => 'Users', 'action' => 'delete', $operador->user->id], ['confirm' => __('Tem certeza que deseja deletar o usuário {0}?', $operador->user->email)]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$operador->user->id, ['controller' => 'Users', 'action' => 'view', $operador->user->id]) ?></td>
                            <td><?= $this->Html->link($operador->user->nome, ['controller' => 'Users', 'action' => 'view', $operador->user->id]) ?></td>
                            <td><?= $operador->user->email ? $this->Text->autoLinkEmails($operador->user->email) : '' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            
        </div>            
    </div>
</div>
</div>
