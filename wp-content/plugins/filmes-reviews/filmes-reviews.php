<?php
require_once dirname(__FILE__) . '/lib/class-tgm-plugin-activation.php';


/*
Plugin Name: Filmes Reviews
Plugin URI: http://exemplo.com
Description: Plugin reviews de filmes
Version: 1.0
Author: José Paulo de Carvalho
Author URI: http://fat32.com.br
Text Domain: filmes-reviews
License: GPL2
*/


class Filmes_Reviews
{

    const TEXT_DOMAIN = 'filmes-reviews';

    private static $instance;




    public static function getInstance()
    {

        if( self::$instance === NULL )
        {
            # code...
            self::$instance = new Filmes_Reviews();

        }//end if

    }//getInstance




    private function __construct()
    {

        

        add_action(
            
            'init', 
            
            [
                //Referencia a classe dentro do action
                $this,

                'Filmes_Reviews::register_post_type'
            ]
        
        );//end add_action





        add_action(
            
            'tgmpa_register', 
            
            [
                //Referencia a classe dentro do action
                $this,

                'check_required_plugins'
            ]
        
        );//end add_action



        


    }//END __construct





    public static function register_post_type()
    {

        register_post_type(
            
            'filmes-reviews',

            [

                'labels'=>[

                    'name'=>'Filmes Reviews',
                    'singular_name'=>'Filme Review'

                ],

                'description'=>'Post para cadastro de reviews',

                'supports'=>[

                    'title',
                    'editor',
                    'excerpt',
                    'author',
                    'revisions',
                    'thumbnail',
                    'custom-fields'

                ],

                'public'=>true,

                'menu_icon'=>'dashicons-format-video',

                'menu_position'=>4

            ]
        
        );//end register_post_type

    }//END register_post_type





    /**Checar Plugins Necessários */
    public function check_required_plugins()
    {

        $plugins = [

            [

                'name'=>'Meta Box',
                'slug'=>'meta-box',
                'required'=>true,
                'force_activation'=>false,
                'force_desactivation'=>false,

            ]

        ];//end $plugins


        $config  = array(

            'domain'           => Filmes_Reviews::TEXT_DOMAIN,

            'default_path'     => '',
            
            'parent_slug'      => 'plugins.php',
            
            'capability'       => 'update_plugins',
            
            'menu'             => 'install-required-plugins',
            
            'has_notices'      => true,
            
            'is_automatic'     => false,
            
            'message'          => '',
            
            'strings'          => array(

                'page_title'                      => __( 'Instalar plugins requeridos', Filmes_Reviews::TEXT_DOMAIN ),
                'menu_title'                      => __( 'Instalar Plugins', Filmes_Reviews::TEXT_DOMAIN),
                'installing'                      => __( 'Instalando Plugin: %s', Filmes_Reviews::TEXT_DOMAIN),
                'oops'                            => __( 'Algo deu errado com a API do plug-in.', Filmes_Reviews::TEXT_DOMAIN ),
                'notice_can_install_required'     => _n_noop( 'O Comentário do plugin Filmes Reviews depende do seguinte plugin:%1$s.', 'Os Comentários do plugin Filmes Reviews depende dos seguintes plugins:%1$s.' ),
                'notice_can_install_recommended'  => _n_noop( 'O plugin Filmes review recomenda o seguinte plugin: %1$s.', 'O plugin Filmes review recomenda os seguintes plugins: %1$s.' ),
                'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
                'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
                'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
                'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
                'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
                'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
                'install_link'                    => _n_noop( 'Comece a instalação de plug-in', 'Comece a instalação dos plugins' ),
                'activate_link'                   => _n_noop( 'Ativar o plugin instalado', 'Ativar os plugins instalados' ),
                'return'                          => __( 'Voltar parapara os plugins requeridos instalados', 'filmes-reviews' ),
                'plugin_activated'                => __( 'Plugin ativado com sucesso.', 'filmes-reviews' ),
                'complete'                        => __( 'Todos os plugins instalados e ativados com sucesso. %s', 'filmes-reviews' ),
                'nag_type'                        => 'updated',
            
            )//end array

        );//end array

        tgmpa( $plugins, $config );

    }//END check_required_plugins



    public static function activate()
    {

        self::register_post_type();

        flush_rewrite_rules();
        

    }//END activate




}//END class Filmes_Reviews




Filmes_Reviews::getInstance();

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'Filmes_Reviews::activate' );




?>