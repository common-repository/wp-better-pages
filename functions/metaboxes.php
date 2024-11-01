<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action("add_meta_boxes", "wpbtr_add_custom_meta_box");

function wpbtr_add_custom_meta_box() {
    
    global $post;
    if(!empty($post))
    {
        if ( 'pages/wpbtr_customwidth.php' == get_post_meta( $post->ID, '_wp_page_template', true )) 
        {
            add_meta_box("wpbtr-custom-width-meta-box", "WP Better Custom Width Settings", "wpbtr_custom_width_meta_box_callback", "page", "normal", "high", null);
        }
        
        if ( 'pages/wpbtr_fullwidth.php' == get_post_meta( $post->ID, '_wp_page_template', true )) 
        {
            add_meta_box("wpbtr-full-width-meta-box", "WP Better Full Width Settings", "wpbtr_full_width_meta_box_callback", "page", "normal", "high", null);
        }
        
        if ( 'pages/wpbtr_toplogo.php' == get_post_meta( $post->ID, '_wp_page_template', true )) 
        {
            add_meta_box("wpbtr-top-logo-meta-box", "WP Better Top Logo Settings", "wpbtr_top_logo_meta_box_callback", "page", "normal", "high", null);
        }
    }
    
}

function wpbtr_custom_width_meta_box_callback($object) {
            wp_nonce_field(basename(__FILE__), 'custom-width-nonce');

    ?>
    <div>
        <table style="width:40%">
          <tr>
            <th>Setting</th>
            <th>Value</th> 
          </tr>
          <tr style="text-align:center;">
            <td>Page Background Color : </td>
            <td><input type="text" name="wpbtr_customwidth_pagebgcolor" value="<?php echo get_post_meta($object->ID, "wpbtr_customwidth_pagebgcolor", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Page CSS Style : </td>
            <td><input type="text" name="wpbtr_customwidth_pagecssstyle" value="<?php echo get_post_meta($object->ID, "wpbtr_customwidth_pagecssstyle", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Width : </td>
            <td><input type="text" name="wpbtr_customwidth_containerwidth" value="<?php echo get_post_meta($object->ID, "wpbtr_customwidth_containerwidth", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Padding : </td>
            <td><input type="text" name="wpbtr_customwidth_containerpadding" value="<?php echo get_post_meta($object->ID, "wpbtr_customwidth_containerpadding", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Background Color : </td>
            <td><input type="text" name="wpbtr_customwidth_containerbgcolor" value="<?php echo get_post_meta($object->ID, "wpbtr_customwidth_containerbgcolor", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container CSS Style : </td>
            <td><input type="text" name="wpbtr_customwidth_extracssstyle" value="<?php echo get_post_meta($object->ID, "wpbtr_customwidth_extracssstyle", true); ?>"></td> 
          </tr>
        </table>
    </div>
    <?php
}

function wpbtr_full_width_meta_box_callback($object) {
    wp_nonce_field(basename(__FILE__), 'full-width-nonce');

    ?>
    <div>
        <table style="width:40%">
          <tr>
            <th>Setting</th>
            <th>Value</th> 
          </tr>
          <tr style="text-align:center;">
            <td>Page Background Color : </td>
            <td><input type="text" name="wpbtr_fullwidth_pagebgcolor" value="<?php echo get_post_meta($object->ID, "wpbtr_fullwidth_pagebgcolor", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Page CSS Style : </td>
            <td><input type="text" name="wpbtr_fullwidth_pagecssstyle" value="<?php echo get_post_meta($object->ID, "wpbtr_fullwidth_pagecssstyle", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Margin : </td>
            <td><input type="text" name="wpbtr_fullwidth_containermargin" value="<?php echo get_post_meta($object->ID, "wpbtr_fullwidth_containermargin", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Padding : </td>
            <td><input type="text" name="wpbtr_fullwidth_containerpadding" value="<?php echo get_post_meta($object->ID, "wpbtr_fullwidth_containerpadding", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Background Color : </td>
            <td><input type="text" name="wpbtr_fullwidth_containerbgcolor" value="<?php echo get_post_meta($object->ID, "wpbtr_fullwidth_containerbgcolor", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container CSS Style : </td>
            <td><input type="text" name="wpbtr_fullwidth_extracssstyle" value="<?php echo get_post_meta($object->ID, "wpbtr_fullwidth_extracssstyle", true); ?>"></td> 
          </tr>
        </table>
    </div>
    <?php
}

function wpbtr_top_logo_meta_box_callback($object) {
    wp_nonce_field(basename(__FILE__), 'top-logo-nonce');

    ?>
    <div>
        <table style="width:40%">
          <tr>
            <th>Setting</th>
            <th>Value</th> 
          </tr>
          <tr style="text-align:center;">
            <td>Page Background Color : </td>
            <td><input type="text" name="wpbtr_toplogo_pagebgcolor" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_pagebgcolor", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Page CSS Style : </td>
            <td><input type="text" name="wpbtr_toplogo_pagecss" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_pagecss", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Logo Background Margin : </td>
            <td><input type="text" name="wpbtr_toplogo_logomargin" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_logomargin", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Logo CSS Style : </td>
            <td><input type="text" name="wpbtr_toplogo_css" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_css", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Logo Image : </td>
            <td><input type="text" name="wpbtr_toplogo_logoimage" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_logoimage", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Logo Padding : </td>
            <td><input type="text" name="wpbtr_toplogo_logopadding" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_logopadding", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Logo Background Color : </td>
            <td><input type="text" name="wpbtr_toplogo_logobgcolor" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_logobgcolor", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Padding : </td>
            <td><input type="text" name="wpbtr_toplogo_containerpadding" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_containerpadding", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Margin : </td>
            <td><input type="text" name="wpbtr_toplogo_containermargin" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_containermargin", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container CSS : </td>
            <td><input type="text" name="wpbtr_toplogo_containercss" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_containercss", true); ?>"></td> 
          </tr>
          <tr style="text-align:center;">
            <td>Container Background Color : </td>
            <td><input type="text" name="wpbtr_toplogo_containerbgcolor" value="<?php echo get_post_meta($object->ID, "wpbtr_toplogo_containerbgcolor", true); ?>"></td> 
          </tr>
        </table>
    </div>
    <?php
}

add_action( "save_post", "save_wpbtr_custom_meta_box" );
function save_wpbtr_custom_meta_box($post_id) {
    
    global $post;
    if(!empty($post))
    {
        if ( 'pages/wpbtr_customwidth.php' == get_post_meta( $post->ID, '_wp_page_template', true )) 
        {
             /* Verify the nonce before proceeding. For security */
            if (!isset($_POST["custom-width-nonce"]) || !wp_verify_nonce($_POST["custom-width-nonce"], basename(__FILE__)))
                return;
          
            $customwidth_box_pagebgcolor = "";
            $customwidth_box_containerwidth = "";
            $customwidth_box_containerpadding = "";
            $customwidth_box_containerbgcolor = "";
            $customwidth_box_extracssstyle = "";
            $customwidth_box_pagecssstyle = "";

            if (isset($_POST["wpbtr_customwidth_pagebgcolor"])) {
                $customwidth_box_pagebgcolor = sanitize_hex_color($_POST["wpbtr_customwidth_pagebgcolor"]);
            }
            if (isset($_POST["wpbtr_customwidth_containerwidth"])) {
                $customwidth_box_containerwidth = sanitize_text_field($_POST["wpbtr_customwidth_containerwidth"]);
            }
            if (isset($_POST["wpbtr_customwidth_containerpadding"])) {
                $customwidth_box_containerpadding = sanitize_text_field($_POST["wpbtr_customwidth_containerpadding"]);
            }
            if (isset($_POST["wpbtr_customwidth_containerbgcolor"])) {
                $customwidth_box_containerbgcolor = sanitize_hex_color($_POST["wpbtr_customwidth_containerbgcolor"]);
            }
            if (isset($_POST["wpbtr_customwidth_extracssstyle"])) {
                $customwidth_box_extracssstyle = sanitize_text_field($_POST["wpbtr_customwidth_extracssstyle"]);
            }
            if (isset($_POST["wpbtr_customwidth_pagecssstyle"])) {
                $customwidth_box_pagecssstyle = sanitize_text_field($_POST["wpbtr_customwidth_pagecssstyle"]);
            }
            
            update_post_meta($post_id, "wpbtr_customwidth_pagebgcolor", $customwidth_box_pagebgcolor);
            update_post_meta($post_id, "wpbtr_customwidth_containerwidth", $customwidth_box_containerwidth);
            update_post_meta($post_id, "wpbtr_customwidth_containerpadding", $customwidth_box_containerpadding);
            update_post_meta($post_id, "wpbtr_customwidth_containerbgcolor", $customwidth_box_containerbgcolor);
            update_post_meta($post_id, "wpbtr_customwidth_extracssstyle", $customwidth_box_extracssstyle);
            update_post_meta($post_id, "wpbtr_customwidth_pagecssstyle", $customwidth_box_pagecssstyle);
        }
        
        if ( 'pages/wpbtr_fullwidth.php' == get_post_meta( $post->ID, '_wp_page_template', true )) 
        {
            /* Verify the nonce before proceeding. For security */
            if (!isset($_POST["full-width-nonce"]) || !wp_verify_nonce($_POST["full-width-nonce"], basename(__FILE__)))
                return;
                
            $fullwidth_box_pagebgcolor = "";
            $fullwidth_box_pagebgcolor = "";
            $fullwidth_box_containermargin = "";
            $fullwidth_box_containerpadding = "";
            $fullwidth_box_pagecssstyle = "";
            $fullwidth_box_extracssstyle = "";

            if (isset($_POST["wpbtr_fullwidth_pagebgcolor"])) {
                $fullwidth_box_pagebgcolor = sanitize_hex_color($_POST["wpbtr_fullwidth_pagebgcolor"]);
            }
            if (isset($_POST["wpbtr_fullwidth_containermargin"])) {
                $fullwidth_box_containermargin = sanitize_text_field($_POST["wpbtr_fullwidth_containermargin"]);
            }
            if (isset($_POST["wpbtr_fullwidth_containerpadding"])) {
                $fullwidth_box_containerpadding = sanitize_text_field($_POST["wpbtr_fullwidth_containerpadding"]);
            }
            if (isset($_POST["wpbtr_fullwidth_containerbgcolor"])) {
                $fullwidth_box_containerbgcolor = sanitize_hex_color($_POST["wpbtr_fullwidth_containerbgcolor"]);
            }
            if (isset($_POST["wpbtr_fullwidth_pagecssstyle"])) {
                $fullwidth_box_pagecssstyle = sanitize_text_field($_POST["wpbtr_fullwidth_pagecssstyle"]);
            }
            if (isset($_POST["wpbtr_fullwidth_extracssstyle"])) {
                $fullwidth_box_extracssstyle = sanitize_text_field($_POST["wpbtr_fullwidth_extracssstyle"]);
            }
            
            update_post_meta($post_id, "wpbtr_fullwidth_pagebgcolor", $fullwidth_box_pagebgcolor);
            update_post_meta($post_id, "wpbtr_fullwidth_containermargin", $fullwidth_box_containermargin);
            update_post_meta($post_id, "wpbtr_fullwidth_containerpadding", $fullwidth_box_containerpadding);
            update_post_meta($post_id, "wpbtr_fullwidth_containerbgcolor", $fullwidth_box_containerbgcolor);
            update_post_meta($post_id, "wpbtr_fullwidth_pagecssstyle", $fullwidth_box_pagecssstyle);
            update_post_meta($post_id, "wpbtr_fullwidth_extracssstyle", $fullwidth_box_extracssstyle);
        }
        
        if ( 'pages/wpbtr_toplogo.php' == get_post_meta( $post->ID, '_wp_page_template', true )) 
        {
            /* Verify the nonce before proceeding. For security */
            if (!isset($_POST["top-logo-nonce"]) || !wp_verify_nonce($_POST["top-logo-nonce"], basename(__FILE__)))
                return;
                
            $toplogo_box_pagebgcolor = "";
            $toplogo_box_pagecss= "";
            $toplogo_box_logomargin = "";
            $toplogo_box_logocss = "";
            $toplogo_box_logoimage = "";
            $toplogo_box_logopadding = "";
            $toplogo_box_logobgcolor = "";
            $toplogo_box_containerpadding = "";
            $toplogo_box_containermargin = "";
            $toplogo_box_containercss = "";
            $toplogo_box_containerbgcolor = "";

            if (isset($_POST["wpbtr_toplogo_pagebgcolor"])) {
                $toplogo_box_pagebgcolor = sanitize_hex_color($_POST["wpbtr_toplogo_pagebgcolor"]);
            }
            if (isset($_POST["wpbtr_toplogo_pagecss"])) {
                $toplogo_box_pagecss = sanitize_text_field($_POST["wpbtr_toplogo_pagecss"]);
            }
            if (isset($_POST["wpbtr_toplogo_logomargin"])) {
                $toplogo_box_logomargin = sanitize_text_field($_POST["wpbtr_toplogo_logomargin"]);
            }
            if (isset($_POST["wpbtr_toplogo_css"])) {
                $toplogo_box_logocss = sanitize_text_field($_POST["wpbtr_toplogo_css"]);
            }
            if (isset($_POST["wpbtr_toplogo_logoimage"])) {
                $toplogo_box_logoimage = sanitize_text_field($_POST["wpbtr_toplogo_logoimage"]);
            }
            if (isset($_POST["wpbtr_toplogo_logopadding"])) {
                $toplogo_box_logopadding = sanitize_text_field($_POST["wpbtr_toplogo_logopadding"]);
            }
            if (isset($_POST["wpbtr_toplogo_logobgcolor"])) {
                $toplogo_box_logobgcolor = sanitize_hex_color($_POST["wpbtr_toplogo_logobgcolor"]);
            }
            if (isset($_POST["wpbtr_toplogo_containerpadding"])) {
                $toplogo_box_containerpadding = sanitize_text_field($_POST["wpbtr_toplogo_containerpadding"]);
            }
            if (isset($_POST["wpbtr_toplogo_containermargin"])) {
                $toplogo_box_containermargin = sanitize_text_field($_POST["wpbtr_toplogo_containermargin"]);
            }
            if (isset($_POST["wpbtr_toplogo_containercss"])) {
                $toplogo_box_containercss = sanitize_text_field($_POST["wpbtr_toplogo_containercss"]);
            }
            if (isset($_POST["wpbtr_toplogo_containerbgcolor"])) {
                $toplogo_box_containerbgcolor = sanitize_hex_color($_POST["wpbtr_toplogo_containerbgcolor"]);
            }
            
            update_post_meta($post_id, "wpbtr_toplogo_pagebgcolor", $toplogo_box_pagebgcolor);
            update_post_meta($post_id, "wpbtr_toplogo_pagecss", $toplogo_box_pagecss);
            update_post_meta($post_id, "wpbtr_toplogo_logomargin", $toplogo_box_logomargin);
            update_post_meta($post_id, "wpbtr_toplogo_css", $toplogo_box_logocss);
            update_post_meta($post_id, "wpbtr_toplogo_logoimage", $toplogo_box_logoimage);
            update_post_meta($post_id, "wpbtr_toplogo_logopadding", $toplogo_box_logopadding);
            update_post_meta($post_id, "wpbtr_toplogo_logobgcolor", $toplogo_box_logobgcolor);
            update_post_meta($post_id, "wpbtr_toplogo_containerpadding", $toplogo_box_containerpadding);
            update_post_meta($post_id, "wpbtr_toplogo_containermargin", $toplogo_box_containermargin);
            update_post_meta($post_id, "wpbtr_toplogo_containercss", $toplogo_box_containercss);
            update_post_meta($post_id, "wpbtr_toplogo_containerbgcolor", $toplogo_box_containerbgcolor);
            
        }
    }
    

}