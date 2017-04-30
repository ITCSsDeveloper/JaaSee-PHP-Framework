<?php
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

function dbms_CheckValue($value)
{
 $value = ' ' . $value . ' ';
 $var  =  0;
 $var +=  strpos($value,'<?');
 $var +=  strpos($value,'<?php');
 $var +=  strpos($value,'?>');
 $var +=  strpos($value,'script');
 $var +=  strpos($value,'SCRIPT');
 $var +=  strpos($value,'php');
 $var +=  strpos($value,'PHP');
 if($var != 0){  return true;  } 
 return false;
}

foreach($_POST as $key => $value) 
{
  $_POST[$key] = trim(addslashes(strip_tags($value)));
  
  if(dbms_CheckValue($value))
  {
    echo 'Detected Script injection !!!<br>Program end.';
    exit();
  }
}
foreach($_GET as $key => $value) 
{
  $_GET[$key] = trim(addslashes(strip_tags($value)));
  
  if(dbms_CheckValue($value))
  {
    echo 'Detected Script injection !!!<br>Program end.';
    exit();
  }
}

class dbms
{
  private $host = '';
  private $data = '';
  private $user = '';
  private $pass = '';

  public function configDatabase($_host = '', $_data = '', $_user = '', $_pass = '')
  {
    $this->host = $_host;
    $this->data = $_data;
    $this->user = $_user;
    $this->pass = $_pass;
  }

  public function _connect()
  {
    mysql_connect($this->host,$this->user,$this->pass) or die ('Can\'t Connect Database');
    mysql_select_db($this->data) or die ('Can\'t Select Database');
    mysql_query('SET utf8 COLLATE utf8_general_ci');
    mysql_query('SET NAMES UTF8');
    return true;
  }

  private function _core($sql_command)
  {
    if($this->_connect())
    {
      return mysql_query($sql_command);
      die('Invalid query: ' . mysql_error());
    }
    return null;
  }

  public function dbms_Insert($sql_command)
  {
   _core($sql_command);
 }
 public function dbms_Update($sql_command)
 {
   _core($sql_command);
 }
 public function dbms_Delete($sql_command)
 {
   _core($sql_command);
 }
 public function dbms_Select($sql_command)
 {
    if($this->_connect())
    {
      $result = _core($sql_command);
      $array_1 = array();
      while ($var = mysql_fetch_object($result))
      {
        $array_1[] = $var;
      }
      return $array_1;
    }
    return null;
  }
}
@include ('../config.php');
@include ('config.php');

$obj = new dbms();
$obj->configDatabase($servername,$dbname,$username,$password);
?>