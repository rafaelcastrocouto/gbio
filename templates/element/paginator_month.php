<!-- templates/element/paginator_count.php -->
<?php
use Cake\I18n\I18n;
$date = new DateTime();
$date->setDate(2000, $month, 1);
$formatter = new IntlDateFormatter(I18n::getLocale());
$formatter->setPattern('MMMM');
$monthName = $formatter->format($date);
?>
<p><?= $this->Paginator->counter(__('Mês de ' . $monthName . ', mostrando mês {{page}} de um total de {{pages}} meses')) ?></p>