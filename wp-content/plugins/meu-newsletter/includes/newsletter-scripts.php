<?php

function ns_add_scripts()
{

    wp_enqueue_style('ns-main-style', plugins_url().'/meu-newsletter/css/style.css');
    wp_enqueue_script('ns-main-scripts', plugins_url().'/meu-newsletter/js/main.js', array('jquery'));

    
}//END ns_add_scripts 
 

add_action('wp_enqueue_scripts', 'ns_add_scripts');



?>