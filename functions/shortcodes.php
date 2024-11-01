<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function wpbtr_buildgrid($atts, $content = null) {
    
    $maindivc = $atts['columns'];
    $maindivr = $atts['rows'];
    $mainstyle = $atts['style'];
    
    $maindivid = $atts['class'];
    

    $sel = '<style type="text/css">
    .' . $maindivid . '{
    display:grid;
    grid-template-columns: ' . $maindivc . ';
    grid-template-rows: ' . $maindivr . ';
    }
    ';
        
    $sel = $sel . '@media (max-width:768px){
        .' . $maindivid . '{
            grid-template-rows:auto;
            grid-template-columns:1fr;
        }
        .' . $maindivid . ' > *{
            grid-area:auto / 1 / span 1 / span 1;
        }}
        </style>' . 
        '<div class="' . $maindivid . '" style="' . $mainstyle . '">';
        
    return do_shortcode($sel . $content . '</div>');
}
add_shortcode('wpbtr_grid','wpbtr_buildgrid');


function wpbtr_buildcell($atts, $content = null) {
    
    $mainarea = $atts['area'];
    $cellstyle = $atts['style'];
    $maincellid = $atts['class'];
    
    $sel = '<style type="text/css">
    .' . $maincellid . '{grid-area: '. $mainarea . ';}
    @media (max-width:768px){
        .' . $maincellid . '{
            grid-area: auto / 1 / span 1 / span 1;
        }}
        </style>';
    $sel = $sel . '<div class="' . $maincellid . '"  style="' . $cellstyle . '">';
    return do_shortcode($sel . $content . '</div>');
}
add_shortcode('wpbtr_cell','wpbtr_buildcell');



function wpbtr_buildrows($atts, $content = null) {
    
    $maindivr = $atts['rows'];
    $mainstyle = $atts['style'];
    
    $maindivid = $atts['class'];
    

    $sel = '<style type="text/css">
    .' . $maindivid . '{
    display:grid;
    grid-template-columns: 1fr;
    grid-template-rows: ' . $maindivr . ';
    }
    ';
        
    $sel = $sel . '@media (max-width:768px){
        .' . $maindivid . '{
            grid-template-rows:auto;
            grid-template-columns:1fr;
        }
        .' . $maindivid . ' > *{
            grid-area:auto / 1 / span 1 / span 1;
        }}
        </style>' . 
        '<div class="' . $maindivid . '" style="' . $mainstyle . '">';
        
    return do_shortcode($sel . $content . '</div>');
}
add_shortcode('wpbtr_rows','wpbtr_buildrows');


function wpbtr_buildrowcell($atts, $content = null) {
    
    $cellstyle = $atts['style'];
    $maincellid = $atts['class'];
    
    $sel = '<style type="text/css">
    @media (max-width:768px){
        .' . $maincellid . '{
            grid-area: auto / 1 / span 1 / span 1;
        }}
        </style>';
    $sel = $sel . '<div class="' . $maincellid . '"  style="' . $cellstyle . '">';
    return do_shortcode($sel . $content . '</div>');
}
add_shortcode('wpbtr_rowchild','wpbtr_buildrowcell');


function wpbtr_buildcols($atts, $content = null) {
    
    $maindivr = $atts['cols'];
    $mainstyle = $atts['style'];
    
    $maindivid = $atts['class'];
    

    $sel = '<style type="text/css">
    .' . $maindivid . '{
    display:grid;
    grid-template-columns: ' . $maindivr . ';
    grid-template-rows: auto;
    }
    ';
        
    $sel = $sel . '@media (max-width:768px){
        .' . $maindivid . '{
            grid-template-rows:auto;
            grid-template-columns:1fr;
        }
        .' . $maindivid . ' > *{
            grid-area:auto / 1 / span 1 / span 1;
        }}
        </style>' . 
        '<div class="' . $maindivid . '" style="' . $mainstyle . '">';
        
    return do_shortcode($sel . $content . '</div>');
}
add_shortcode('wpbtr_cols','wpbtr_buildcols');


function wpbtr_buildcolcell($atts, $content = null) {
    
    $cellstyle = $atts['style'];
    $maincellid = $atts['class'];
    
    $sel = '<style type="text/css">
    @media (max-width:768px){
        .' . $maincellid . '{
            grid-area: auto / 1 / span 1 / span 1;
        }}
        </style>';
    $sel = $sel . '<div class="' . $maincellid . '"  style="' . $cellstyle . '">';
    return do_shortcode($sel . $content . '</div>');
}
add_shortcode('wpbtr_colchild','wpbtr_buildcolcell');




/*
add_action( 'media_buttons', function($editor_id){
    $imgurl = plugins_url( 'wpicon.png', __FILE__ );
    add_thickbox();
    echo '<a href="' . plugins_url( 'convert2.html', __FILE__ ) . '?TB_iframe=true&width=600&height=550" class="thickbox button"><span style="background: url(' . $imgurl . ') left no-repeat;background-size: cover;display: inline-block;width: 16px;height: 16px;vertical-align: text-top;margin: 1px 4px 0 -4px;"></span>WP Better Pages</a>';

} );
*/