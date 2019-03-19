<?php

/*
Plugin Name: Newsletter
Plugin URI: http://exemplo.com
Description: Plugin de newsletter
Version: 1.0
Author: José Paulo de Carvalho
Author URI: https://fat32.com.br
Text Domain: newsletter
License: GPL2
*/

if(!defined('ABSPATH')) exit;

require_once(plugin_dir_path(__FILE__).'/includes/newsletter-scripts.php');
require_once(plugin_dir_path(__FILE__).'/includes/meu-newsletter-class.php');
require_once(plugin_dir_path(__FILE__).'/includes/newsletter-mailer.php');


function register_meu_newsletter()
{

    register_widget('Meu_Newsletter_Widget');

}//END register_meu_newsletter


add_action('widgets_init','register_meu_newsletter');