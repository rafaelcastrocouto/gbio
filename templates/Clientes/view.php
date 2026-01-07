<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div>
    <div class="column">
        <div class="clientes view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Tem certeza que deseja deletar o cliente {0}?', $cliente->nome), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo Cliente'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Cliente</h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($cliente->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cliente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($cliente->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= ($cliente->email) ? $this->Text->autoLinkEmails($cliente->email) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($cliente->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($cliente->celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($cliente->observacoes) ?></td>
                </tr>
            </table>
            
        </div>            
    </div>
</div>
</div>
