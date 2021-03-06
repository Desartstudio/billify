<?php
include_once(dirname(__FILE__).'/../bootstrap/unit.php');

class CashFlow
{
  public function addDocuments($docs)
  {
    $this->docs = $docs;
  }
  
  public function getRows()
  {
    return $this->docs;
  }

  public function setCriteria($criteria)
  {
    $this->criteria = $criteria;
  }

  public function init(){ }
}

$test = new lime_test(18, new lime_output_color());

$cf = new CashFlow();
$cf->addDocuments(array(1, 2, 3, 4, 5));

$paginator = new CashFlowPager();
$paginator->setCashFlow($cf);
$paginator->setLimit(2);
$paginator->setPage(1);
$paginator->init();

$test->is($paginator->getCountAllResults(), 5, '->getCountAllResults() returns right cashflow rows number');
$test->is($paginator->getCountPages(), 3, '->getCountPages() return right pages count');
$test->is(count($paginator->getPage()), 1, '->getPage() return right selected page');

$results = $paginator->getResults();
$test->is(count($results), 2, '->getResults() returns right number rows');
$test->is($results[0], 1, '->getResults() return right first row');
$test->is($results[1], 2, '->getResults() return right second row');

$paginator->setLimit(2);
$paginator->setPage(3);
$paginator->init();
$results = $paginator->getResults();
$test->is(count($results), 1, '->getResults() returns right number rows');
$test->is($results[0], 5, '->getResults() return right first row');
$test->is(isset($results[1]), false, '->getResults() doesn\'t return not set item');

$test->comment('A lot of documents');

$documents = array();
for($i = 1; $i <= 1009; $i++)
{
  $documents[]=$i;
}

$cf = new CashFlow();
$cf->addDocuments($documents);

$paginator = new CashFlowPager($cf);
$paginator->setCashFlow($cf);
$paginator->setLimit(10);
$paginator->setPage(1);
$paginator->init();

$test->is($paginator->getCountPages(), 101, '->getCountPages() return right pages count');
$results = $paginator->getResults();
$test->is(count($results), 10, '->getResults() returns right number rows');

$paginator->setPage(83);
$paginator->init();

$results = $paginator->getResults();
$test->is(count($results), 10, '->getResults() returns right number rows');
$test->is($results[0], 821, '->getResults() return right first row');
$test->is($results[9], 830, '->getResults() return right second row');

$paginator->setPage(101);
$paginator->init();

$results = $paginator->getResults();
$test->is(count($results), 9, '->getResults() returns right number rows');
$test->is($paginator->haveToPaginate(), true, '->haveToPaginate() returns right value');

$paginator->setPage('all');
$paginator->init();
$results = $paginator->getResults();
$test->is(count($results), 1009, '->getResults() returns right number rows');
$test->is($paginator->haveToPaginate(), false, '->haveToPaginate() returns right value');

$paginator->setCriteria(new Criteria());












