<?php

include_once(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new bfTestFunctional(new sfBrowser());
$browser->loadData();

$browser->
  login()->
  click('rubrica')->
  click('00 Azienda')->
  click('nuova fattura')->

  with('request')->begin()->
    isParameter('module', 'fattura')->
    isParameter('action', 'create')->
  end()->
  followRedirect()->

 info(' check if default invoice value is applied for the client')->
 with('response')->begin()->#debug()->
    isStatusCode(200)->
    checkElement('#col-left .title h2', '/Fattura n. 28/')->
    checkElement('#col-left h3', '/00 Azienda/')->
    checkElement('#col-right .ul-list li', '/auto/', array('position' => 5))->
    checkElement('#col-right .ul-list li', '/si/', array('position' => 6))->
    checkElement('#col-right .ul-list li', '/no/', array('position' => 7))->
 end();



?>