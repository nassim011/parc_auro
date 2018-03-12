<?php


class traitement_form_log
{
   private $name;
   private $pass;


  function __construct($v1 ,$v2){

      $this->verifie_char_name($v1);
      $this->verifie_char_pass($v2);

  }

  private function verifie_char_name($donne){
      htmlspecialchars($donne);
      strip_tags($donne);
      $this->name = $donne;
    }

    private function verifie_char_pass($donne){
        htmlspecialchars($donne);
        strip_tags($donne);
        $this->pass=$donne;
      }

      public function getid(){
        return $this->id;
        }
      public function setid($var){
        $this->id=$var;
          }

    public function getname(){
      return $this->name;
      }

    public function getpass(){
      return $this->pass;

    }

}
 ?>
