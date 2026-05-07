<!-- templates/element/export_excel.php -->
<?php /* requires previous <table id="id_da_tabela"> */ ?>
<?php /* $this->element('export_excel', ['id_da_tabela' => 'tabela_abastecimento']); */ ?>

<?= $this->Html->script('excellentexport') ?>
<a id="excelexport" download="<?= $id_da_tabela.'.xls' ?>" class="button" href="#" onclick="return ExcellentExport.excel(this, '<?= $id_da_tabela.'_export' ?>', '<?= $id_da_tabela ?>');">Exportar para Excel</a>
<script>
    // formata uma copia da tabela para exportar para excel
    const export_table = document.getElementById("<?= $id_da_tabela ?>").cloneNode(true);
    export_table.id = "<?= $id_da_tabela.'_export' ?>";
    export_table.classList.add('hidden');
    document.currentScript.before(export_table);
    
    //remove a 1a coluna de acoes
    const actions = document.querySelectorAll("<?= '#'.$id_da_tabela.'_export .actions' ?>");
    for (let a of actions) a.remove();
</script>