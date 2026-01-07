<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supervisor $supervisor
 */
?>
<div>
    <div class="column">
        <div class="supervisores view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Supervisores'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Supervisor'), ['action' => 'edit', $supervisor->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Supervisor'), ['action' => 'delete', $supervisor->id], ['confirm' => __('Tem certeza que deseja deletar o supervisor {0}?', $supervisor->nome), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo Supervisor'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Supervisor</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($supervisor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($supervisor->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($supervisor->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($supervisor->celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($supervisor->observacoes) ?></td>
                </tr>
            </table>
            
            <?php if (!empty($supervisor->user)) : ?>
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
                                <?= $this->Html->link(__('🔍'), ['controller' => 'Users', 'action' => 'view', $supervisor->user->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['controller' => 'Users', 'action' => 'edit', $supervisor->user->id]) ?>
                                <?= $this->Html->link(__('🔑'), ['controller' => 'Users', 'action' => 'editpassword', $supervisor->user->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['controller' => 'Users', 'action' => 'delete', $supervisor->user->id], ['confirm' => __('Tem certeza que deseja deletar o usuário {0}?', $supervisor->user->email)]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$supervisor->user->id, ['controller' => 'Users', 'action' => 'view', $supervisor->user->id]) ?></td>
                            <td><?= $this->Html->link($supervisor->user->nome, ['controller' => 'Users', 'action' => 'view', $supervisor->user->id]) ?></td>
                            <td><?= $supervisor->user->email ? $this->Text->autoLinkEmails($supervisor->user->email) : '' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            
        </div>            
    </div>
</div>
</div>
