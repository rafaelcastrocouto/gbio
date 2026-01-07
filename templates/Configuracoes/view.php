<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Configuracao $configuracao
 */
?>
<div>
    <div class="column">
        <div class="configuracoes view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Editar Configuracao'), ['action' => 'edit', $configuracao->id], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Administradores'), ['controller' => 'Administradores', 'action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>Configurações</h3>
            <table>
                <tr>
                    <th><?= __('Instituição') ?></th>
                    <td><?= h($configuracao->instituicao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Descrição') ?></th>
                    <td><?= h($configuracao->descricao) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
