<?php
include_once("Model/Model.php");
include_once("Model/ModelCreerCompte.php");
$member = 'Peon';

class Controller {
     public $model;

     public function __construct()
     {
          $this->model = new Model();
     }

     public function invoke()
     {
          if (!isset($_GET['member']))
          {
               // no special member is requested, we'll show a list of all members
               $reponse = $this->model->getMemberList();
               include 'view/MemberList.php';
          }
          else
          {
               // show the requested member
               $member = $this->model->getMember($_GET['member']);
               include 'view/ViewMember.php';
          }
     }
}
?>
