<?php
// auto-generated by sfPropelCrud
// date: 11/20/2005 19:11:09
?>
<?php use_helper('Javascript');?>
<?php use_helper('Object');?>

<table width="100%">
<tr>
<td valign="top" width="50%">

<h2 id="title-menu" class="menu-expand"> 
<?php echo link_to_function($fattura->toString().' del '.format_date($fattura->getData()),visual_effect('fade','title-menu',array('duration'=>0)).visual_effect('appear','menu',array('duration'=>0.5)),array('title'=>'Visualizza menu fattura')); ?>&nbsp;
<?php echo link_to(image_tag('icons_tango/print-pdf.png',array('alt'=>'Crea PDF Fattura','align'=>'top','style'=>'margin-left: 5px;')),'fattura/export?id='.$fattura->getID(),array('title'=>'Crea PDF Fattura','target'=>'_blank'))?>
</h2>

<div id="menu" style="display: none;">

<h2 id="title_menu" class="menu-collapse"> 
<?php echo link_to_function($fattura->toString().' del '.format_date($fattura->getData()),visual_effect('fade','menu',array('duration'=>0)).visual_effect('appear','title-menu',array('duration'=>0.5)),array('title'=>'Nascondi menu fattura')); ?>&nbsp;
<?php echo link_to_function(image_tag('icons_tango/open.png',array('alt'=>'Opzioni Fattura','align'=>'top')),'if(Element.getStyle(\'opzioni_fattura\',\'display\') == \'none\'){'.visual_effect('appear','opzioni_fattura').'}else{'.visual_effect('fade','opzioni_fattura',array('duration'=>0.2)).'}',array('title'=>'Opzioni Fattura'))?>&nbsp;
<?php echo link_to(image_tag('icons_tango/edit.png',array('alt'=>'Modifica Fattura','align'=>'top')),'fattura/edit?id='.$fattura->getID().'&id_cliente='.$fattura->getClienteID(),array('title'=>'Modifica Fattura'))?>&nbsp;
<?php echo link_to(image_tag('icons_tango/copy.png',array('alt'=>'Copia Fattura','align'=>'top')),'fattura/copia?id='.$fattura->getID().'&actions=show',array('title'=>'Copia Fattura'))?>&nbsp;
<?php echo link_to(image_tag('icons_tango/print-pdf.png',array('alt'=>'Crea PDF Fattura','align'=>'top')),'fattura/export?id='.$fattura->getID(),array('title'=>'Crea PDF Fattura','target'=>'_blank'))?>&nbsp;
<?php echo link_to(image_tag('icons_tango/trash-full.png',array('alt'=>'Elimina Fattura','align'=>'top')),'fattura/delete?id='.$fattura->getID(),array('title'=>'Elimina fattura','confirm' => 'Vuoi veramente eliminare la '.$fattura->toString().'?'))?>&nbsp;
</h2>
</div>

<div id="tags">
<span id="new_tag"><?php echo link_to_function(image_tag('icons/add.png',array('align'=>'absmiddle')),visual_effect('appear','new_tag_input'))?></span>
Tags: 
<?php $tags = $fattura->getTags()?>
<?php if(count($tags) > 0):?>
<?php foreach($tags as $index => $tag):?>
<?php if($index >= count($tags)-1):?>
<small>[<?php echo link_to_remote('x',array('update'=>'tags','url'=>'fattura/deleteTag?id_tag='.$tag->getId().'&id_fattura='.$tag->getIdFattura()))?>]</small>&nbsp;<?php echo link_to($tag->getTagNormalizzato(),'fattura/list?tag='.$tag->getTagNormalizzato(),'rel="tag"')?>
<?php else:?>
<small>[<?php echo link_to_remote('x',array('update'=>'tags','url'=>'fattura/deleteTag?id_tag='.$tag->getId().'&id_fattura='.$tag->getIdFattura()))?>]</small>&nbsp;<?php echo link_to($tag->getTagNormalizzato(),'fattura/list?tag='.$tag->getTagNormalizzato(),'rel="tag"')?>,
<?php endif?>
<?php endforeach?>
<?php else:?>
No Tags
<?php endif?>
</div>
<div id="new_tag_input" style="display: none;">
<?php echo form_remote_tag(array('url'=>'fattura/addTag?id_fattura='.$fattura->getId(),'update'=>'tags','complete'=>visual_effect('fade','new_tag_input').visual_effect('highlight','tags')))?>
<?php echo input_auto_complete_tag('new_tag', '', 'fattura/tagAutocomplete', 'autocomplete=off', 'use_style=true') ?>
<?php echo submit_tag('Tag') ?>
</form>
</div>

<div class="clear"></div>

<div id="data_stato_pagata" style="display: none;">
<?php echo form_tag('fattura/stato')?>
<small class="nomargin">Pagata il</small>
<?php echo object_input_date_tag($fattura, 'getDataStato',array('rich'=>true))?> <small class="nomargin">(dd/mm/yy)</small>
<div align="<?php echo $fattura->isProForma()?'left':'right'; ?>" class="data">
<?php if($fattura->isProForma()):?>
<input type="checkbox" name="regolare" value="y"><small style="margin-left: 5px">Trasforma in fattura regolare</small>
<?php endif?>
<?php echo submit_tag('Salva')?>&nbsp;
<input type="button" value="Annulla" onclick="<?php echo visual_effect('blind_up','data_stato_pagata',array('duration'=>0.5))?>">
</div>
<input type="hidden" name="stato" value="p">
<?php echo input_hidden_tag('id',$fattura->getID())?>
</form>
</div>

<div id="data_stato_rifiutata" style="display: none;">
<?php echo form_tag('fattura/stato')?>
<small class="nomargin">Rifiutata il</small>
<?php echo object_input_date_tag($fattura, 'getDataStato', array('rich' => true))?> <small class="nomargin">(dd/mm/yy)</small>
<div align="right" class="data">
<?php echo submit_tag('Salva')?>&nbsp;
<input type="button" value="Annulla" onclick="<?php echo visual_effect('blind_up','data_stato_rifiutata',array('duration'=>0.5))?>">
</div>
<input type="hidden" name="stato" value="r">
<?php echo input_hidden_tag('id',$fattura->getID())?>
</form>
</div>

<div id="data_stato_inviata" style="display: none;">
<?php echo form_tag('fattura/stato')?>
<small class="nomargin">Inviata il</small>
<?php echo object_input_date_tag($fattura, 'getDataStato', array('rich' => true))?> <small class="nomargin">(dd/mm/yy)</small>
<div align="right" class="data">
<?php echo submit_tag('Salva')?>&nbsp;
<input type="button" value="Annulla" onclick="<?php echo visual_effect('blind_up','data_stato_inviata',array('duration'=>0.5))?>">
</div>
<input type="hidden" name="stato" value="i">
<?php echo input_hidden_tag('id',$fattura->getID())?>
</form>

</div>


<h3 style="margin-left: 0px;"><?php echo link_to($fattura->getCliente()->toString(),'cliente/show?id='.$fattura->getClienteID(),array('title'=>'Gestione Cliente'))?></h3>
<?php include_partial('cliente/contatti',array('cliente'=>$fattura->getCliente(),'margin_left'=> '0px;'));?>


</td>
<td valign="top" align="right" width="50%">
<div id="stato-fattura" style="display: none;">
<ul class="stato">
		<li class="non_inviata"><?php echo link_to('Non Inviata','fattura/stato?stato=n&id='.$fattura->getID(),array('title'=>'Segna come non inviata'))?></li>
		<li class="inviata"><?php echo link_to_function('Inviata',visual_effect('fade','data_stato_rifiutata',array('duration'=>0)).visual_effect('fade','data_stato_pagata',array('duration'=>0)).visual_effect('appear','data_stato_inviata',array('duration'=>0.5)),array('title'=>'Segna come inviata'))?></li>
		<li class="pagata"><?php echo link_to_function('Pagata',visual_effect('fade','data_stato_rifiutata',array('duration'=>0)).visual_effect('fade','data_stato_inviata',array('duration'=>0)).visual_effect('appear','data_stato_pagata',array('duration'=>0.5)),array('title'=>'Segna come pagata'))?></li>
		<li class="rifiutata"><?php echo link_to_function('Rifiutata',visual_effect('fade','data_stato_pagata',array('duration'=>0)).visual_effect('fade','data_stato_inviata',array('duration'=>0)).visual_effect('appear','data_stato_rifiutata',array('duration'=>0.5)),array('title'=>'Segna come rifiutata'))?></li>
		</ul>
</div>
<div class="fattura_stato" style="float:right;border-color: <?php echo $fattura->getColorStato()?>;color:<?php echo $fattura->getColorStato()?>">
<?php echo link_to_function($fattura->getStato('true'),'if(Element.getStyle(\'stato-fattura\',\'display\') == \'none\'){'.visual_effect('appear','stato-fattura',array('duration'=>0.2)).';Element.removeClassName(\'link-stato\',\'menu-expand\');Element.addClassName(\'link-stato\',\'menu-collapse\');}else{'.visual_effect('fade','stato-fattura',array('duration'=>0.2)).';Element.removeClassName(\'link-stato\',\'menu-collapse\');Element.addClassName(\'link-stato\',\'menu-expand\');}',array('title'=>'Cambia Stato Fattura','style'=>'color:'.$fattura->getColorStato().';background-color: #fff;','class'=>'link_stato menu-expand','id'=>'link-stato'))?><?php echo ($fattura->getStato()=='p' || $fattura->getStato()=='r' || $fattura->getStato()=='i')?'<br/><span style="font-size: 12px">il '.format_date($fattura->getDataStato()).'</span>':''?>
</div>
</td>
</tr>
</table>

<div class="fattura_show">
<div width="100%"><?php include_partial('fattura/fattura',array('fattura'=>$fattura))?></div>
<div width="100%" class="dettagli_fattura"><?php include_partial('fattura/dettagli_fattura',array('fattura'=>$fattura,'viewSconto'=>$viewSconto))?></div>
</div>

<?php if($fattura->isProForma()):?>
<small>
<p>La presente non costituisce fattura a norma dell'articolo 21 del DTR numero 633/72 e non deve essere da voi annotata sul libro degli acquisti.</p>
<p>A ricevimento del saldo sar&agrave; emessa regolare fattura.</p>
</small>
<?php endif?>
