<?php

class FatturaPeer extends BaseFatturaPeer
{
  static $instance;
  static $user_id;

  public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
  {
    $criteria->add(FatturaPeer::ID_UTENTE, self::$user_id);
    return parent::doSelectStmt($criteria, $con);
  }

  public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
  {
    $criteria->add(FatturaPeer::ID_UTENTE, self::$user_id);
    return parent::doCount($criteria, $distinct, $con);
  }

  public static function doCountJoinAllExceptModoPagamento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
  {
    $criteria->add(FatturaPeer::ID_UTENTE, FatturaPeer::$user_id);
    return parent::doCountJoinAllExceptModoPagamento($criteria, $distinct, $con);
  }
  
  public static function doSelectJoinAllExceptModoPagamento(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
  {
    $criteria->add(FatturaPeer::ID_UTENTE, self::$user_id);
    return parent::doSelectJoinAllExceptModoPagamento($criteria, $con, $join_behavior);
  }

  public static function retrieveUserId()
  {
    return FatturaPeer::$user_id;
  }
  
  public static function getFatturaOrCreate($fattura_id = 0, Cliente $cliente = null)
  {
    if (!$fattura_id) 
    {
      $fattura = new Vendita();
      $fattura->setData(time());
      $fattura->setNewNumFattura();
      
      if ($cliente)               
      {
        $fattura->setModoPagamentoId($cliente->getModoPagamentoID());
      }
      
    } 
    else {
      $fattura = VenditaPeer::retrieveByPk($fattura_id);      
    }

    return $fattura;
  }
  
  public static function getFattureDaIncassare()
  {
    $criteria = FatturaPeer::getSqlFattureEmesse();
    $criteria->add(FatturaPeer::STATO, Vendita::INVIATA);

    return VenditaPeer::doSelectJoinAllExceptModoPagamento($criteria);
  }
  
  public static function getFattureDaInviare()
  {
    $criteria = FatturaPeer::getSqlFattureEmesse();
    $criteria->add(FatturaPeer::STATO, Vendita::NON_PAGATA);

    return VenditaPeer::doSelectJoinAllExceptModoPagamento($criteria);
  }
  
  public static function getSqlFattureEmesse(Criteria $criteria = null)
  {
    
    if (!$criteria) {
      $criteria = new Criteria();
    }
    
    $criteria->addAsColumn('integer_num_fattura', 'CONVERT('.FatturaPeer::NUM_FATTURA.', signed)');
    $criteria->addAscendingOrderByColumn('YEAR(data)');
    $criteria->addAscendingOrderByColumn('integer_num_fattura');

    return $criteria;
  }
  

}
