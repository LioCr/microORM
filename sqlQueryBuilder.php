<?php
error_reporting(E_ALL);

class sqlQueryBuilder{

  public $query;
  protected $where = false;
  protected $table;

  public function select($col='*'){
    $this->query = 'SELECT '.$col.' ';
    return $this;
  }
  public function from($table){
    $this->table = $table;
    $this->query .= 'FROM '.$table.' ';
    return $this;
  }
  public function join($from,$join,$keyFrom,$keyJoin,$type='LEFT'){
    $this->query .= $type.' JOIN '.$join.'.'.$keyJoin.' ON '.$from.'.'.$keyFrom.' ';
    return $this;
  }
  public function where($key,$value,$cond='AND '){
    if(!$this->where){
      $this->query .= 'WHERE '.$key.' = '.$value.' ';
      $this->where = true;
    }else{
      $this->query .= $cond.' '.$key.' = '.$value.' ';
    }
    return $this;
  }

public function where_array($key_val,$cond='AND '){
    foreach($key_val as $key => $val){
        if(!$this->where){
          $this->query .= 'WHERE '.$key.' = '.$val.' ';
          $this->where = true;
        }else{
          $this->query .= $cond.' '.$key.' = '.$val.' ';
        }
    }
    return $this;
  }
  public function orderBy($val,$dir='ASC '){
    $this->query .= 'ORDER BY '.$val.' '.$dir.' ';
    return $this;
  }
  public function limit($max,$offset=0){
    $this->query .= 'LIMIT '.$max.' '.$offset;
    return $this;
  }
  public function __toString(){
    return $this->query;
  }
}
?>
