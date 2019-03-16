<?php

/*
Plugin Name: Altera Rodapé
Plugin URI: http://exemplo.com
Description: Este Plugin altera o rodapé do Blog
Version: 1.0
Author: José Paulo de Carvalho
Author URI: http://fat32.com.br
Text Domain: altera_rodape
License: GPLv2
*/


function meu_plugin_altera_rodape()
{

    echo "Hello Wordpress World! - José Paulo de Carvalho";

}//end meu_plugin_altera_rodape



add_action('wp_footer', 'meu_plugin_altera_rodape');




function my_user_check()
{

    if( is_user_logged_in() )
    {
        # code...
        echo "<script> alert(1) </script>";

    }//end if

}//end my_user_check



//add_action('init', 'my_user_check');






?>