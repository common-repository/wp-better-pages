<!DOCTYPE html>
<html>
<head>
    <?php wp_head(); ?>
    
    <?php 
  $pagebgcol1 = get_post_meta( get_the_ID(), 'wpbtr_fullwidth_pagebgcolor', true );
  $contmargin1 = get_post_meta( get_the_ID(), 'wpbtr_fullwidth_containermargin', true );
  $contpadding1 = get_post_meta( get_the_ID(), 'wpbtr_fullwidth_containerpadding', true );
  $contbg1 = get_post_meta( get_the_ID(), 'wpbtr_fullwidth_containerbgcolor', true );
  $pagecss1 = get_post_meta( get_the_ID(), 'wpbtr_fullwidth_pagecssstyle', true );
  $contcss1 = get_post_meta( get_the_ID(), 'wpbtr_fullwidth_extracssstyle', true );
  
  if ( ! empty( $pagebgcol1 ) ) 
  {
    $pagebgcol=$pagebgcol1;
  }
  else
  {
    $pagebgcol="#e6e6e6";
  }
  
  if ( ! empty( $contmargin1 ) ) 
  {
    $contmargin=$contmargin1;
  }
  else
  {
    $contmargin="10px 10px 20px 20px";
  }
  
  if ( ! empty( $contpadding1 ) ) 
  {
    $contpadding=$contpadding1;
  }
  else
  {
    $contpadding="10px 10px 20px 20px";
  }
  
  if ( ! empty( $contbg1 ) ) 
  {
    $contbg=$contbg1;
  }
  else
  {
    $contbg="#fff"; 
  }
  
  if ( ! empty( $pagecss1 ) ) 
  {
    $pagecss=$pagecss1;
  }
  else
  {
    $pagecss=""; 
  }
  
  if ( ! empty( $contcss1 ) ) 
  {
    $contcss=$contcss1;
  }
  else
  {
    $contcss=""; 
  }
  
  ?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <style>
	.wpbtr_lp1_body {
  	background-color: <?php echo $pagebgcol; ?>;
	}
	.wpbtr_lp1_main_section {
	padding: <?php echo $contpadding; ?>;
    margin: <?php echo $contmargin; ?>;
	box-shadow: rgba(0, 0, 0, 0.14) 0px 0px 8px;
    background-color: <?php echo $contbg; ?>;
	}
  </style>
</head>

<body class="wpbtr_lp1_body" style="<?php echo $pagecss; ?>"> 
<div class="wpbtr_lp1_main_section" style="<?php echo $contcss; ?>">
    
        
        <?php 
        
    wp_reset_query(); // necessary to reset query
    while ( have_posts() ) : the_post();
        the_content();
    endwhile; // End of the loop.
    
        ?>
       
</div>

<?php wp_footer(); ?>

</body>
</html>