<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Administrador $administrador
 */
?>
<div>
    <div class="column">
        <div class="administradores view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Administradores'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Administrador</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($administrador->id) ?></td>
                </tr>
            </table>
            
            <?php if (!empty($administrador->user)) : ?>
            <div class="related">
                <h4><?= __('Usuário') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Ações') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Data') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['controller' => 'Users', 'action' => 'view', $administrador->user->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['controller' => 'Users', 'action' => 'edit', $administrador->user->id]) ?>
                                <?= $this->Html->link(__('🔑'), ['controller' => 'Users', 'action' => 'editpassword', $administrador->user->id]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$administrador->user->id, ['controller' => 'Users', 'action' => 'view', $administrador->user->id]) ?></td>
                            <td><?= $administrador->user->email ? $this->Text->autoLinkEmails($administrador->user->email) : '' ?></td>
                            <td><?= h($administrador->user->created) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>
