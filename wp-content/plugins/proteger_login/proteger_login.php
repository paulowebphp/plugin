<?php
/*
Plugin Name: Proteger Login
Plugin URI: http://exemplo.com
Description: Plugin desenvolvido para proteger tela de login do administrador
Version: 1.0
Author:Jose Paulo de Carvalho
Author URI: http://meusite.com.br
Text Domain: proteger-login
License: GPL2
*/

if(!defined('ABSPATH'))exit;
class Proteger_login {
  private static $instance;

  public static function getInstance() {
    if (self::$instance == NULL) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  private function __construct() {
    
    add_action('login_form_login',array($this,'pt_login'));
  }

  public function pt_login(){

     if($_SERVER['SCRIPT_NAME'] == '/wordpress/wp-login.php'){

          //echo "<script> alert(1); </script>";
     
          $minuto = Date('i');

          if(!isset($_GET['empresa'.$minuto])){

              header('Location:http://localhost/wordpress/');
          }
     }

  }

}

Proteger_login::getInstance();