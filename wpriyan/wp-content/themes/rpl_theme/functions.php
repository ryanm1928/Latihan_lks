
<?php 
//load script

function load_file()
{
    wp_enqueue_style('style',get_stylesheet_uri() );

    
}
add_action('wp_enqueue_scripts','load_file');


?>