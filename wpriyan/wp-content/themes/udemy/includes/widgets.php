<?php

function fz_widgets()
{
    register_sidebar([
        'name'              =>  __( 'My First theme sidebar', 'udemy' ),
        'id'                =>  'fz_sidebar',
        'description'       =>  __( 'Sidebar for the theme udemy', 'udemy' ),
        'before_widget'     =>  '<div id="%1$s" class="widget clearfix %2$s">',
        'after_widget'      =>  '</div>',
        'before_title'      =>  '<h4>',
        'after_title'       =>  '</h4>'
    ]);
}