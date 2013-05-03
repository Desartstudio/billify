<div class="title">
  <h4><?php echo __('info fattura')?></h4>
</div>

<ul class="ul-list nomb">
  <li>
    <strong><?php echo __('stato')?>:</strong>
    <?php echo  $fattura->getStato('true') ?>
    <?php echo ($fattura->getStato()=='p' || $fattura->getStato()=='a' || $fattura->getStato()=='r' || $fattura->getStato()=='i') ? 'il '.format_date($fattura->getDataStato()) : ''?>
    </li>
    <li>
    <?php echo ($fattura->getStato()=='a') ? "<strong>". __('parziale') .":</strong>". $fattura->getPagatoParzialmente() : '' ?>
  </li>
  <?php include_partial('fattura/fattura', array('fattura' => $fattura));?>
</ul>

<div id="stato-fattura" style="display: none;">
  <div class="title">
    <h4><?php echo __('seleziona stato')?></h4>
  </div>
  <ul class="ul-list nomb">
		<li class="non_inviata">+ <?php echo link_to('non inviata', 'fattura/stato?stato=n&id='.$fattura->getID(), array('title' => 'Segna come non inviata'))?></li>
		<li class="inviata">
		  + <?php echo link_to_function('inviata',
		                                visual_effect('fade', 'data_stato_rifiutata', array('duration' => 0)).
		                                visual_effect('fade','data_stato_pagata', array('duration' => 0)).
                                         visual_effect('fade','data_stato_parziale', array('duration' => 0)).
		                                visual_effect('appear', 'data_stato_inviata', array('duration' => 0)),
		                                array('title'=>'Segna come inviata'))?>
		</li>
		<li class="pagata">
		  + <?php echo link_to_function('pagata',
		                                visual_effect('fade','data_stato_rifiutata', array('duration' => 0)).
		                                visual_effect('fade','data_stato_inviata', array('duration' => 0)).
                                         visual_effect('fade','data_stato_parziale', array('duration' => 0)).
		                                visual_effect('appear','data_stato_pagata', array('duration' => 0)),
		                                array('title'=>'Segna come pagata'))?>
    </li>
    	<li class="pagata_parziale">
		  + <?php echo link_to_function('pagata parziale',
		                                visual_effect('fade','data_stato_rifiutata', array('duration' => 0)).
		                                visual_effect('fade','data_stato_inviata', array('duration' => 0)).
		                                visual_effect('fade','data_stato_pagata', array('duration' => 0)).
		                                visual_effect('appear','data_stato_parziale', array('duration' => 0)),
		                                array('title'=>'Segna come pagata'))?>
        </li>
		<li class="rifiutata">
		  + <?php echo link_to_function('rifiutata',
		                                visual_effect('fade','data_stato_pagata', array('duration' => 0)).
		                                visual_effect('fade','data_stato_inviata', array('duration' => 0)).
                                         visual_effect('fade','data_stato_parziale', array('duration' => 0)).
		                                visual_effect('appear','data_stato_rifiutata', array('duration' => 0)),
		                                array('title' => 'Segna come rifiutata'))?>
    </li>
	</ul>
</div>

<div id="data_stato_pagata" style="display: none;" class="box">
  <div class="title" style="margin-bottom: 10px;">
    <h4>Data pagamento</h4>
  </div>
  <?php echo form_tag('fattura/stato')?>
    <small class="nomargin">Pagata il</small>
    <?php echo object_input_date_tag($fattura, 'getDataStato',array('rich'=>true, 'id' => 'button_data_stato_pagata'))?> <small class="nomargin">(dd/mm/yy)</small>

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
  <div class="title" style="margin-bottom: 10px;">
    <h4>Data rifiuto</h4>
  </div>
  <?php echo form_tag('fattura/stato')?>
    <small class="nomargin">Rifiutata il</small>
    <?php echo object_input_date_tag($fattura, 'getDataStato', array('rich' => true, 'id' => 'button_data_stato_rifiutata'))?> <small class="nomargin">(dd/mm/yy)</small>
    <div align="right" class="data">
      <?php echo submit_tag('Salva')?>&nbsp;
      <input type="button" value="Annulla" onclick="<?php echo visual_effect('blind_up','data_stato_rifiutata',array('duration'=>0.5))?>">
    </div>
    <input type="hidden" name="stato" value="r">
    <?php echo input_hidden_tag('id',$fattura->getID())?>
  </form>
</div>

<div id="data_stato_inviata" style="display: none;">
  <div class="title" style="margin-bottom: 10px;">
    <h4>Data invio</h4>
  </div>
  <?php echo form_tag('fattura/stato')?>
    <small class="nomargin">Inviata il</small>
    <?php echo object_input_date_tag($fattura, 'getDataStato', array('rich' => true, 'id' => 'button_data_stato_inviata'))?> <small class="nomargin">(dd/mm/yy)</small>
    <div align="right" class="data">
      <?php echo submit_tag('Salva')?>&nbsp;
      <input type="button" value="Annulla" onclick="<?php echo visual_effect('blind_up','data_stato_inviata',array('duration'=>0.5))?>">
    </div>
    <input type="hidden" name="stato" value="i">
    <?php echo input_hidden_tag('id',$fattura->getID())?>
  </form>
</div>

<div id="data_stato_parziale" style="display: none;" class="box">
  <div class="title" style="margin-bottom: 10px;">
    <h4>Data pagamento parziale</h4>
  </div>
    <div align="right" class="data">
        <?php echo form_tag('fattura/stato')?>
        <small class="nomargin">Pagata parzialmente il</small>
        <?php echo object_input_date_tag($fattura, 'getDataStato',array('rich'=>true, 'id' => 'button_data_stato_pagata'))?>
    </div>
    <small class="nomargin">Importo di</small>
    <?php echo object_input_tag($fattura, 'getPagatoParzialmente',array('rich'=>true, 'id' => 'button_data_stato_pagata'))?>

    <div align="<?php echo $fattura->isProForma()?'left':'right'; ?>" class="data">
      <?php if($fattura->isProForma()):?>
        <input type="checkbox" name="regolare" value="y"><small style="margin-left: 5px">Trasforma in fattura regolare</small>
      <?php endif?>
      <?php echo submit_tag('Salva')?>&nbsp;
      <input type="button" value="Annulla" onclick="<?php echo visual_effect('blind_up','data_stato_pagata',array('duration'=>0.5))?>">
    </div>
    <input type="hidden" name="stato" value="a">
    <?php echo input_hidden_tag('id',$fattura->getID())?>
  </form>
</div>