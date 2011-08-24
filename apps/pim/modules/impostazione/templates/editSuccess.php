<?php
// auto-generated by sfPropelCrud
// date: 2006/08/16 01:08:07
?>

<div class="title">
  <h2><?php echo __('Impostazioni')?>
  <?php if($sf_request->hasParameter('success')):?>
    <span class="notice">- <?php echo $sf_request->getParameter('success')?></span>
  <?php endif?>
  </h2>
</div>

<?php use_helper('Object') ?>

<?php echo form_tag('impostazione/update') ?>
<?php echo object_input_hidden_tag($impostazione, 'getIdUtente', array('name' => 'impostazione[id_utente]')) ?>

<?php if ($sf_request->hasErrors()): ?>
<div class="validate-error">
  <p><?php echo __('I dati inseriti non sono corretti. Correggi i seguenti errori e salva i dati di nuovo:')?></p>
  <?php echo $impostazione_form->renderGlobalErrors(); ?>
  <?php echo $impostazione_form->getErrorSchema(); ?>
  <?php echo $impostazione_form; ?>
</div>
<?php endif ?>

<div class="title">
  <h3><?php echo __('Paginazione')?></h3>
</div>

<table class="edit" id="paginazione" width="100%">
<tbody>
<tr>
  <th>Num clienti:</th>
  <td><?php echo object_input_tag($impostazione, 'getNumClienti', array (
  'size' => 7, 'name' => 'impostazione[num_clienti]'
)) ?></td>
<?php if($sf_request->hasError('impostazione[num_clienti]')):?>
<td class="validate-error">
<?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('impostazione[num_clienti]')?>
</td>
<?php endif?>
</tr>
<tr>
  <th>Num fatture:</th>
  <td><?php echo object_input_tag($impostazione, 'getNumFatture', array (
  'size' => 7, 'name' => 'impostazione[num_fatture]'
)) ?></td>
<?php if($sf_request->hasError('impostazione[num_fatture]')):?>
<td class="validate-error">
<?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('impostazione[num_fatture]')?>
</td>
<?php endif?>
</tr>
<tr>
  <th>Righe dettagli:</th>
  <td><?php echo object_input_tag($impostazione, 'getRigheDettagli', array (
  'size' => 7, 'name' => 'impostazione[righe_dettagli]'
)) ?></td>
<?php if($sf_request->hasError('impostazione[righe_dettagli]')):?>
<td class="validate-error">
<?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('impostazione[righe_dettagli]')?>
</td>
<?php endif?>
</tr>
<tr>
<td align="right" colspan="2"><?php echo submit_tag('Salva') ?></td>
</tr>
</tbody>
</table>

<div class="title">
  <h3><?php echo __('Features')?></h3>
</div>

<table class="edit" id="features" width="100%">
<tbody>
<tr>
  <th>Tipo numero fattura:</th>
  <td>
    <?php echo select_tag('invoice_decorator_type', options_for_select(ImpostazionePeer::$available_decorator_classes_text, $impostazione->getInvoiceDecoratorType()), array('name' => 'impostazione[invoice_decorator_type]')); ?>
  </td>
</tr>
<tr>
  <th>Consegna commercialista:</th>
  <td>
  <?php echo radiobutton_tag('consegna_commercialista','s', ($impostazione->getConsegnaCommercialista()=='s'?true:false), array('name' => 'impostazione[consegna_commercialista]'))?>&nbsp;Si
  <?php echo radiobutton_tag('consegna_commercialista','n', ($impostazione->getConsegnaCommercialista()=='n'?true:false), array('name' => 'impostazione[consegna_commercialista]'))?>&nbsp;No
</td>
</tr>
<tr>
  <th>Fattura automatica:</th>
  <td>
  <?php echo radiobutton_tag('fattura_automatica','s',($impostazione->getFatturaAutomatica()=='s'?true:false), array('name' => 'impostazione[fattura_automatica]'))?>&nbsp;Si
  <?php echo radiobutton_tag('fattura_automatica','n',($impostazione->getFatturaAutomatica()=='n'?true:false), array('name' => 'impostazione[fattura_automatica]'))?>&nbsp;No
  </td>
</tr>
<tr>
  <th>Ritenuta acconto:</th>
  <td>
  <?php list($percentuale, $perc_imponibile) = explode('/',$impostazione->getRitenutaAcconto())?>
  il <?php echo input_tag('impostazione[percentuale_ra]',$percentuale,array('size'=>4))?>% del <?php echo input_tag('impostazione[percentuale_imponibile_ra]',$perc_imponibile,array('size'=>4))?>% dell'imponibile
  </td>
  <?php if($sf_request->hasError('impostazione[percentuale_ra]') || $sf_request->hasError('impostazione[percentuale_imponibile_ra]')):?>
  <td class="validate-error">

  <?php if($sf_request->hasError('impostazione[percentuale_ra]')):?>
  <?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('impostazione[percentuale_ra]')?><br/>
  <?php endif?>

  <?php if($sf_request->hasError('impostazione[percentuale_imponibile_ra]')):?>
  <?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('impostazione[percentuale_imponibile_ra]')?>
  <?php endif?>
  </td>
<?php endif?>
</tr>
<tr>
  <th>Tipo ritenuta:</th>
  <td>
  <?php echo select_tag('tipo_ritenuta',options_for_select(array('credito'=>'credito','debito'=>'debito'), $impostazione->getTipoRitenuta()), array('name' => 'impostazione[tipo_ritenuta]'))?>
</td>
</tr>
<tr>
<td align="right" colspan="2"><?php echo submit_tag('Salva') ?></td>
</tr>
</tbody>
</table>

<div class="title">
  <h3><?php echo __('Label fattura')?></h3>
</div>

<table class="edit" id="label-fattura" width="100%">
<tbody>
<tr>
  <th>Label imponibile:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelImponibile', array (
  'size' => 20, 'name' => 'impostazione[label_imponibile]'
)) ?></td>
</tr>
<tr>
  <th>Label spese:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelSpese', array (
  'size' => 20, 'name' => 'impostazione[label_spese]'
)) ?></td>
</tr>
<tr>
  <th>Label imponibile iva:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelImponibileIva', array (
  'size' => 20, 'name' => 'impostazione[label_imponibile_iva]'
)) ?></td>
</tr>
<tr>
  <th>Label iva:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelIva', array (
  'size' => 20, 'name' => 'impostazione[label_iva]'
)) ?></td>
</tr>
<tr>
  <th>Label totale fattura:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelTotaleFattura', array (
  'size' => 20, 'name' => 'impostazione[label_totale_fattura]'
)) ?></td>
</tr>
<tr>
  <th>Label ritenuta acconto:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelRitenutaAcconto', array (
  'size' => 20, 'name' => 'impostazione[label_ritenuta_acconto]'
)) ?></td>
</tr>
<tr>
  <th>Label netto liquidare:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelNettoLiquidare', array (
  'size' => 20, 'name' => 'impostazione[label_netto_liquidare]'
)) ?></td>
</tr>
<tr>
<td align="right" colspan="2"><?php echo submit_tag('Salva') ?></td>
</tr>
</tbody>
</table>

<div class="title">
  <h3><?php echo __('Label dettagli fattura')?></h3>
</div>

<table class="edit" id="label-dettagli-fattura" width="100%">
<tbody>
<tr>
  <th>Label quantita:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelQuantita', array (
  'size' => 20, 'name' => 'impostazione[label_quantita]'
)) ?></td>
</tr>
<tr>
  <th>Label descrizione:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelDescrizione', array (
  'size' => 20, 'name' => 'impostazione[label_descrizione]'
)) ?></td>
</tr>
<tr>
  <th>Label prezzo singolo:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelPrezzoSingolo', array (
  'size' => 20, 'name' => 'impostazione[label_prezzo_singolo]'
)) ?></td>
</tr>
<tr>
  <th>Label prezzo totale:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelPrezzoTotale', array (
  'size' => 20, 'name' => 'impostazione[label_prezzo_totale]'
)) ?></td>
</tr>
<tr>
  <th>Label sconto:</th>
  <td><?php echo object_input_tag($impostazione, 'getLabelSconto', array (
  'size' => 20, 'name' => 'impostazione[label_sconto]'
)) ?></td>
</tr>
<tr>
<td align="right" colspan="2"><?php echo submit_tag('Salva') ?></td>
</tr>
</tbody>
</table>

<?php slot('sidebar')?><?php include_partial('impostazione/sidebar')?><?php end_slot()?>
