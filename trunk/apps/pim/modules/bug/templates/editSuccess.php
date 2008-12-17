<?php
// auto-generated by sfPropelCrud
// date: 2006/09/21 23:32:23
?>
<?php use_helper('Object') ?>

<?php echo form_tag('bug/update') ?>

<?php echo object_input_hidden_tag($bug, 'getId') ?>

<h2>Segnala il Bug</h2>

<?php if ($sf_request->hasErrors()): ?>
<div class="validate-error">
  <p>I dati inseriti non sono corretti.
  Correggi i seguenti errori e salva i dati di nuovo:</p>
</div>
<?php endif ?>

<p><?php echo link_to('Visualizza i miei bug','bug/list')?></p>

<fieldset>
<legend>Bug</legend>
<table class="banca">
<tr>
  <th>Priorita:</th>
  <td><?php echo select_tag('priorita',options_for_select(array('bassa'=>'Bassa','media'=>'Media','alta'=>'Alta'))) ?></td>
</tr>
<tr>
  <th>Modulo:</th>
  <td><?php echo select_tag('modulo',options_for_select(array('bacheca'=>'Bacheca','clienti'=>'Clienti','prodotti'=>'Prodotti','fatture'=>'Fatture','opzioni'=>'Opzioni'),'')) ?></td>
</tr>
<tr>
  <th>Testo:</th>
  <td><?php echo object_textarea_tag($bug, 'getTesto', array (
  'size' => '50x10',
)) ?></td>
<?php if($sf_request->hasError('testo')):?>
<td class="validate-error">
<?php echo image_tag('icons/icon_alert.gif')?>&nbsp;<?php echo $sf_request->getError('testo')?>
</td>
<?php endif?>
</tr>
<tr>
<td align="right" colspan="2"><?php echo submit_tag('Salva') ?></td>
</tr>
</table>
</fieldset>

</form>
