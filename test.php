<?php
require_once('sqlQueryBuilder.php');

$query = new sqlQueryBuilder();
$query->select('test,test2')
      ->from('table')
      ->join('table','table2','price','price')
      ->where_array($_GET)
      ->orderBy('created','DESC')
      ->limit('30','5');
echo $query;
?>
