<?php

/*
Plugin Name: Personalizar Painel
Plugin URI: http://exemplo.com
Description: Este Plugin personaliza o Painel
Version: 1.0
Author: José Paulo de Carvalho
Author URI: http://fat32.com.br
Text Domain: segundo-plugin
License: GPL2
*/


class Segundo_Plugin
{

    const TEXT_DOMAIN = 'segundo-plugin';

    private static $instance;




    public static function getInstance()
    {

        if( self::$instance === NULL )
        {
            # code...
            self::$instance = new self();

        }//end if

    }//getInstance




    private function __construct()
    {

        # Desativar a Action welcome_panel
        remove_action('welcome_panel', 'wp_welcome_panel');

        add_action(
            
            'welcome_panel', 
            
            [
                //Referencia a classe dentro do action
                $this,

                'welcome_panel'
            ]
        
        );//end add_action


        add_action(
            
            'admin_enqueue_scripts',
        
            [

                $this,

                'add_css'

            ]
        
        );//end add_action


        add_action(
            
            'init',
        
            [

                $this,

                'load_text_domain'

            ]
        
        );//end add_action




    }//end __construct





    public function load_text_domain()
    {

        load_plugin_textdomain(
            
            self::TEXT_DOMAIN, 
            false, 
            dirname(plugin_basename(__FILE__))
        
        );//end load_plugin_textdomain

    }//END load_text_domain





    public function welcome_panel()
    {
        ?>
            <div class='welcome-panel-content'>
                <h3>
                    <?= __('Seja bem vindo ao Painel Fat32Admin','segundo-plugin') ?>
                </h3>
                <p>
                    <?= __('Siga-nos nas redes sociais','segundo-plugin') ?>
                </p>
                <div id='icons'>
                    <a href='#' target='_blank'>
                        <img src='http://plugin.com.br/wp-content/uploads/2019/03/1474968161-youtube-circle-color.png'>
                    </a>
                    <a href='#' target='_blank'>
                        <img src='http://plugin.com.br/wp-content/uploads/2019/03/1474968150-facebook-circle-color.png'>
                    </a>
                </div>
            </div>
        
        <?php

    }//end my_welcome_panel




    function add_css()
    {

        wp_register_style(
            
            'segundo-plugin',
            
            // caminho para a pasta de plugins do tema
            plugin_dir_url(__FILE__) . 'css/segundo-plugin.css' 

        );//end wp_register_style

        wp_enqueue_style('segundo-plugin');

    }//end add_css



}//END class Segundo_Plugin




Segundo_Plugin::getInstance();






?>