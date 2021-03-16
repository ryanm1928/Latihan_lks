
<?php 
//load script

function load_file()
{
    wp_register_style("bootstrapcss", get_theme_file_uri()."/assets/css/bs.css");


    wp_enqueue_style('bootstrapcss');

    wp_register_script("bsjs", get_theme_file_uri()."/assets/js/bs.js");

    
}
add_action('wp_enqueue_scripts','load_file');


?>