<?php
 namespace App\Algorithm\Database;
/**
 *
 */
class Check
{

  public static function Database($argument)
  {
      return file_exists('../app/Model/'.$argument.'.php');
  }
}

 ?>
