<?php

/*
Plugin Name: Meu Youtube
Plugin URI: http://exemplo.com
Description: Plugin desenvolvido para exibir botão de inscrição de canal
Version: 1.0
Author: José Pauloo de Carvalho
Author URI: https://fat32.com.br
Text Domain: meu-youtube
License: GPL2
*/

class Meu_Youtube
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

        add_shortcode(
            
            'youtube',
            
            [

                $this,
                
                'youtube'

            ]
        
        );//end add_shortcode
        
    }//END __construct





    public function youtube( $parametros )
    {

        $a = shortcode_atts(
            
            [

                'canal' => ''

            ],
            
            $parametros
        
        );

        $canal = $a['canal'];

        return '

        <script src="https://apis.google.com/js/platform.js"></script>

<div class="g-ytsubscribe" data-channel="GoogleDevelopers" data-layout="default" data-count="default"></div>

        ';

    }//END youtube


}//END class Meu_Youtube


Meu_Youtube::getInstance();
