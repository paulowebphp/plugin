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

    const FIELD_PREFIX = 'fr_';

    const TEXT_DOMAIN = 'filmes-reviews';

    const REVIEW_RATING = 'review_rating';

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
            
            'Filmes_Reviews::register_post_type'
        
        );//end add_action

        

        add_action(
            
            'init', 
            
            'Filmes_Reviews::register_taxonomies'
        
        );//end add_action





        add_action(
            
            'tgmpa_register', 
            
            [
                //Referencia a classe dentro do action
                $this,

                'check_required_plugins'
            ]
        
        );//end add_action



        add_filter( 
            
            'rwmb_meta_boxes', 
            
            [

                $this,
                
                'metabox_custom_fields'

            ] 
        
        );//end add_filter



        add_action(
            
            'template_include',
            
            [

                $this,
                
                'add_cpt_template'
                
            ]
        
        );//end add_action




        add_action(
            
            'wp_enqueue_scripts',
            
            [

                $this,
                
                'add_style_scripts'

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





    public static function register_taxonomies()
    {

        register_taxonomy(

            'tipos_filmes',

            [

                self::TEXT_DOMAIN

            ],

            [

                'labels'=> [

                    'name'=>__( 'Tipos de Filmes' ),
                    'singular_name'=>__( 'Tipo de Filme' )

                ],

                'public'=>true,

                'hierarchical'=>true,

                'rewrite'=> [

                    'slug'=>'tipos-filmes'

                ]

            ]

        );//end register_taxonomy


    }//END register_taxonomies




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

            'domain'           => self::TEXT_DOMAIN,

            'default_path'     => '',
            
            'parent_slug'      => 'plugins.php',
            
            'capability'       => 'update_plugins',
            
            'menu'             => 'install-required-plugins',
            
            'has_notices'      => true,
            
            'is_automatic'     => false,
            
            'message'          => '',
            
            'strings'          => array(

                'page_title'                      => __( 'Instalar plugins requeridos', self::TEXT_DOMAIN ),

                'menu_title'                      => __( 'Instalar Plugins', self::TEXT_DOMAIN),

                'installing'                      => __( 'Instalando o Plugin: %s', self::TEXT_DOMAIN),

                'oops'                            => __( 'Algo deu errado com a API do plugin.', self::TEXT_DOMAIN ),

                'notice_can_install_required'     => _n_noop( 'O plugin Movie Reviews depende do seguinte plugin: %1$s.', 'O plugin Movie Reviews depende do seguinte plugins: %1$s.' ),

                'notice_can_install_recommended'  => _n_noop( 'O plugin Movie Reviews recomenda o seguinte plugin: %1$s.', 'O plugin Movie Reviews recomenda o seguinte plugins: %1$s.' ),

                'notice_cannot_install'           => _n_noop( 'Desculpe, mas você não tem as permissões corretas para instalar o plugin %s. Entre em contato com o administrador deste site para obter ajuda sobre como instalar o plugin.', 'Desculpe, mas você não tem as permissões corretas para instalar os plugins %s. Entre em contato com o administrador deste site para obter ajuda sobre como instalar os plugins.' ),

                'notice_can_activate_required'    => _n_noop( 'O plugin requerido está inativo no momento: %1$s.', 'Os plugins requeridos estão inativos no momento: %1$s.' ),

                'notice_can_activate_recommended' => _n_noop( 'O seguinte plugin recomendado está inativo no momento: %1$s.', 'Os seguintes plugins recomendados estão inativos no momento: %1$s.' ),

                'notice_cannot_activate'          => _n_noop( 'Desculpe, mas você não tem as permissões corretas para ativar o plugin %s. Entre em contato com o administrador deste site para obter ajuda sobre como ativar o plugin.', 'Desculpe, mas você não tem as permissões corretas para ativar os plugins %s. Entre em contato com o administrador deste site para obter ajuda sobre como ativar os plugins.' ),

                'notice_ask_to_update'            => _n_noop( 'O seguinte plugin precisa ser atualizado para sua versão mais recente para garantir a máxima compatibilidade com este tema: %1$s.', 'Os seguintes plugins precisam ser atualizados para suas versões mais recentes para garantir a máxima compatibilidade com este tema: %1$s.' ),

                'notice_cannot_update'            => _n_noop( 'Desculpe, mas você não tem as permissões corretas para atualizar o plugin %s. Entre em contato com o administrador deste site para obter ajuda sobre como atualizar o plugin.', 'Desculpe, mas você não tem as permissões corretas para atualizar os plugins %s. Entre em contato com o administrador deste site para obter ajuda sobre como atualizar os plugins.' ),

                'install_link'                    => _n_noop( 'Começar a instalar plugin', 'Começar a instalar plugins' ),

                'activate_link'                   => _n_noop( 'Ativar plugin instalado', 'Ativar plugins instalados' ),

                'return'                          => __( 'Retornar ao Instalador de Plugins Requeridos', self::TEXT_DOMAIN ),

                'plugin_activated'                => __( 'Plugin ativado com sucesso', self::TEXT_DOMAIN ),

                'complete'                        => __( 'Todos os plugins instalados e ativados com sucesso. %s', self::TEXT_DOMAIN ),

                'nag_type'                        => 'updated',
            
            )//end array

        );//end array

        tgmpa( $plugins, $config );

    }//END check_required_plugins







    public function metabox_custom_fields()
    {

        $meta_boxes[] = array(
  
            'id'=>'data_filme',

            'title'=> __('Informações Adicionais', self::TEXT_DOMAIN),

            'pages'=> array(

                self::TEXT_DOMAIN,
                
                'post'
            
            ),
            
            'context'=>'normal',

            'priority'=>'high',
            
            'fields'=> array(

                array(

                    'name' => __('Ano de laçamento',self::TEXT_DOMAIN),
                    'desc' => __('Ano em que o filme foi lançano',self::TEXT_DOMAIN),
                    'id'   => self::FIELD_PREFIX . 'filme_ano',
                    'type' => 'number',
                    'std'  => date('Y'),
                    'min'  => '1880'

                ),

                array(

                    'name' => __('Diretor',self::TEXT_DOMAIN),
                    'desc' => __('Quem dirigiu o filme',self::TEXT_DOMAIN),
                    'id'   => self::FIELD_PREFIX . 'filme_diretor',
                    'type' => 'text',
                    'std' => ''

                ),

                array(

                    'name' => 'Site',
                    'desc' => 'Link do site do filme',
                    'id'   => self::FIELD_PREFIX . 'filme_site',
                    'type' => 'url',
                    'std'  => ''

                )         

            )

        );


        $meta_boxes[] = array(

            'id'        => 'review_data',

            'title'     => __('Filme Review',self::TEXT_DOMAIN),

            'pages'     => array( self::TEXT_DOMAIN ),

            'context'   => 'side',

            'priority'  => 'high',

            'fields'    => array(

                array(

                    'name' => __( 'Classificação:',self::TEXT_DOMAIN ),

                    'desc' => __('Em uma escala de 1 - 10 , sendo que 10 é a melhor nota',self::TEXT_DOMAIN),

                    'id'   => self::FIELD_PREFIX . self::REVIEW_RATING,

                    'type' => 'select',

                    'options' => array(

                        '' => __('Avalie Aqui',self::TEXT_DOMAIN),
                        '1'  => __('1 - Gostei um pouco',self::TEXT_DOMAIN),
                        '2'  => __('2 - Eu gostei mais ou menos',self::TEXT_DOMAIN),
                        '3'  => __('3 - Não recomendo',self::TEXT_DOMAIN),
                        '4'  => __('4 - Deu pra assistir tudo',self::TEXT_DOMAIN),
                        '5'  => __('5 - Filme decente',self::TEXT_DOMAIN),
                        '6'  => __('6 - Filme legal',self::TEXT_DOMAIN),
                        '7'  => __('7 - Legal, recomendo',self::TEXT_DOMAIN),
                        '8'  => __('8 - O meu favorito',self::TEXT_DOMAIN),
                        '9'  => __('9 - Amei um dos meus melhores filmes',self::TEXT_DOMAIN),
                        '10' => __('10 - O melhor filme de todos os tempos, recomendo!!',self::TEXT_DOMAIN)

                    ), 

                    'std' => ''
                
                )
            
            )     
        
        );

        return $meta_boxes;

    }//END metabox_custom_fields







    public function add_cpt_template( $template )
    {

        if( is_singular( self::TEXT_DOMAIN ) )
        {
    
            if( file_exists( get_stylesheet_directory() . 'single-filme-review.php' ) )
            {
    
                  return get_stylesheet_directory() . 'single-filme-review.php';
    
            }//end if
    
            return plugin_dir_path(__FILE__) . 'templates/single-filme-review.php';

        }//end if
    
        return $template;
    
    }//END add_cpt_template






    
      public function add_style_scripts()
      {
    
        wp_enqueue_style(
            
            'filme-review-style',
            
            plugin_dir_url(__FILE__). 'public/css/filme-review.css'
        
        );//end wp_enqueue_style


      }//END add_style_scripts




    




    public static function activate()
    {

        self::register_post_type();

        self::register_taxonomies();

        flush_rewrite_rules();
        

    }//END activate



}//END class Filmes_Reviews




Filmes_Reviews::getInstance();

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'Filmes_Reviews::activate' );




?>