<?php

class Acquisto extends Fattura
{

  const PEER = 'FatturaPeer';

  protected $color_stato = array(self::NON_PAGATA => 'important',
                                 self::PAGATA     => 'success',
                                 self::RIFIUTATA  => 'warning',
                                 self::INVIATA    => 'info');

  /**
   * Constructs a new Acquisto class, setting the class_key column to FatturaPeer::CLASSKEY_2.
   */
  public function __construct()
  {
    parent::__construct();
    $this->stato_string[self::NON_PAGATA] = 'non pagata';
    $this->setClassKey(FatturaPeer::CLASSKEY_2);
  }

  public function getTotale()
  {
      $totale = $this->imponibile + $this->imposte;

      if (isset($this->pie_di_lista))
      {
          $totale = $totale + $this->pie_di_lista;
      }

      if (isset($this->ritenuta_dacconto))
      {
          $totale = $totale - $this->ritenuta_dacconto;
      }

    return $totale ;
  }

  public function checkInRitardo()
  {
    return strtotime($this->getDataPagamento()) < time() && $this->getStato() == self::NON_PAGATA;
  }

  public function save(PropelPDO $con = null)
  {
    $this->setDataScadenza($this->getDataPagamento());
    return parent::save($con);
  }

  public function getRoutingRule()
  {
    return 'invoice/edit';
  }

  public function  addToCashFlow(CashFlow $cf)
  {
    $cash_flow_acquisto = new CashFlowPurchaseAdapter($this);
    $cf->addOutcoming($cash_flow_acquisto);
  }

  public function getData($format = 'd/m/Y')
  {
    return parent::getData($format);
  }

  public function  getDataStato($format = 'd/m/Y')
  {
    return parent::getDataStato($format);
  }

}
