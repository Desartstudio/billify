<?php
// auto-generated by sfPropelCrud
// date: 2006/09/24 16:12:02
?>
<?php use_helper('Object') ?>

<?php echo form_tag('modipagamento/update') ?>

<?php echo object_input_hidden_tag($modo_pagamento, 'getId') ?>

<h2><?php if($modo_pagamento->isNew()):?>Nuova Tipologia<?php else:?>Modifica Tipologia<?php endif?></h2>

<?php if ($sf_request->hasErrors()): ?>
<div class="validate-error">
  <p>I dati inseriti non sono corretti.
  Correggi i seguenti errori e salva i dati di nuovo:</p>
</div>
<?php endif ?>

<fieldset>
<legend>Pagamento</legend>
<table class="banca">
<tbody>
<tr>
  <th>Num giorni:</th>
  <td><?php echo object_input_tag($modo_pagamento, 'getNumGiorni', array (
  'size' => 7,
)) ?></td>
<?php if($sf_request->hasError('num_giorni')):?>
<td class="validate-error">
<?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('num_giorni')?>
</td>
<?php endif?>
</tr>
<tr>
  <th>Descrizione:</th>
  <td><?php echo object_input_tag($modo_pagamento, 'getDescrizione', array (
  'size' => 20,
)) ?></td>
<?php if($sf_request->hasError('descrizione')):?>
<td class="validate-error">
<?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('descrizione')?>
</td>
<?php endif?>
</tr>
<tr>
<td colspan="2" align="right"><?php echo submit_tag('Salva') ?></td>
</tr>
</tbody>
</table>

</fieldset>

</form>
