<?php
require_once(dirname(__FILE__).'/widget/meu-widget.php');
/*
Plugin Name: Fat32 Widget
Description: Plugin simples para testar publicação na loja do Wordpress
Version: 1.0
Author: José Paulo de Carvalho
Author URI: https://fat32.com.br
Text Domain: fat32-widget
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class Minhas_Redes
{
    
    private static $instance;
  



    public static function getInstance()
    {

      if( self::$instance == NULL )
      {

        self::$instance = new self();
        
      }//end if
  
      return self::$instance;


    }//END getInstance
  




    private function __construct()
    {

        add_action(
            
            'widgets_init', 
            
            [
                //Referencia a classe dentro do action
                $this,

                'register_widgets'
            ]
        
        );//end add_action
     
    }//END __construct




    public function register_widgets()
    {

        register_widget('Meu_Widget');

    }//END register_widgets




}//END class Minhas_Redes


Minhas_Redes::getInstance();




?>