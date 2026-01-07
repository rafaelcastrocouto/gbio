<?php

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
    
?>
<!-- templates/element/submenu_navegacao.php -->
<script>
    addEventListener('load', () => {
        /* sub menu unselect */
        const navInputs = [...document.querySelectorAll('.toggle-input:not(#nav-toggler)')];
        const unselect = (inputBox) => { inputBox.checked = false };
        const unselectAll = (event) => { navInputs.forEach( (inputBox) => { 
            if (inputBox !== event.target) unselect(inputBox) 
        })};
        addEventListener('mouseup', unselectAll);
    });
</script>
    
<nav>
    <?php 
        $logo = $this->Html->image('icon.png', ['height' => '32', 'width' => '32', 'alt' => 'GBio']);
        echo $this->Html->link($logo . '<h1>GBio</h1>', '/',['escape' => false, 'full'=>true]); //$this->getRequest()->getRequestTarget() == '/' ? "http://www.gbio.com.br" : '/', ['escape' => false, 'full'=>true]

    ?>

    <label for="nav-toggler" class="responsive-toggle-label toggle-icon">☰</label>
    <input id="nav-toggler" type="checkbox" class="toggle-input" />
    
    <menu class="responsive-toggle-dropdown">

        <li><?php echo $this->Html->link("Abastecimentos", ['controller' => 'Abastecimentos', 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link("GNV", ['controller' => 'Abastecimentognvs', 'action' => 'index']); ?></li>
        
        
        <?php if ($user_data['administrador_id'] || $user_data['supervisor_id']): ?>
            <li><?php echo $this->Html->link("Relatórios", ['controller' => 'Relatorios', 'action' => 'index']); ?></li>
        <?php endif; ?>

        <li class="menu-consulta">
            <input id="menu-consulta-toggler" type="checkbox" class="toggle-input" />
            <label for="menu-consulta-toggler" class="toggle-label">Consulta <span class="toggle-more">▾</span><span class="toggle-less">◂</span></label>
            
            <menu class="toggle-dropdown">
                <li><?php echo $this->Html->link("Operadores", ['controller' => 'Operadores', 'action' => 'index']); ?></li>
                <li><?php echo $this->Html->link("Supervisores", ['controller' => 'Supervisores', 'action' => 'index']); ?></li>
                <li><?php echo $this->Html->link("Clientes", ['controller' => 'Clientes', 'action' => 'index']); ?></li>
            </menu>
        </li>
        
        <?php if ($user_data['administrador_id']): ?>
            <li class="menu-admin">
                <input id="menu-admin-toggler" type="checkbox" class="toggle-input" />
                <label for="menu-admin-toggler" class="toggle-label">Administração <span class="toggle-more">▾</span><span class="toggle-less">◂</span></label>
                
                <menu class="toggle-dropdown">
                    <li><?php echo $this->Html->link("Usuários", ['controller' => 'Users', 'action' => 'index']); ?></li>
                    <li><?php echo $this->Html->link("Instituições", ['controller' => 'Instituicoes', 'action' => 'index']); ?></li>
                    <li><?php echo $this->Html->link("Configurações", ['controller' => 'Configuracoes', 'action' => 'index']); ?></li>
                </menu>
            </li>
        <?php else: ?>
            <li><?php echo $this->Html->link('Fale conosco', 'mailto:adm@metagas.com.br'); ?></li>
        <?php endif; ?>

        <li class="menu-user">
            
            <input id="menu-user-toggler" type="checkbox" class="toggle-input" />
            <label for="menu-user-toggler" class="toggle-label">Usuário <span class="toggle-more">▾</span><span class="toggle-less">◂</span></label>
            
            <menu class="toggle-dropdown">
                
                <?php if ($user_session): ?>
                    <li><?php echo $this->Html->link("Minha conta", ['controller' => 'Users', 'action' => 'view', $user_session->id]); ?></li>
                    <li><?php echo $this->Html->link('Sair (' . $user_session->get('email') . ')', ['controller' => 'Users', 'action' => 'logout']); ?></li>
                <?php else: ?>
                    <li><?php echo $this->Html->link("Login", ['controller' => 'Users', 'action' => 'login']); ?></li>
                <?php endif; ?>
            </menu>  
        </li>    
    </menu>
</nav>
