<!DOCTYPE html>
<html>
<head>
  <?php wp_head(); ?>
  
  <?php 
  $pagebgcolor1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_pagebgcolor', true );
  $pagecss1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_pagecss', true );
  $logomargin1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_logomargin', true );
  $logocss1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_css', true );
  $logoimage1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_logoimage', true );
  $logopadding1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_logopadding', true );
  $logobgcolor1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_logobgcolor', true );
  $containerpadding1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_containerpadding', true );
  $containermargin1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_containermargin', true );
  $containercss1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_containercss', true );
  $containerbgcolor1 = get_post_meta( get_the_ID(), 'wpbtr_toplogo_containerbgcolor', true );
  
  
  if ( ! empty( $pagebgcolor1 ) ) 
  {
    $pagebgcolor=$pagebgcolor1;
  }
  else
  {
    $pagebgcolor="#e6e6e6";
  }
  
  if ( ! empty( $pagecss1 ) ) 
  {
    $pagecss=$pagecss1;
  }
  else
  {
    $pagecss="";
  }
  
  if ( ! empty( $logomargin1 ) ) 
  {
    $logomargin=$logomargin1;
  }
  else
  {
    $logomargin="10px";
  }
  
  if ( ! empty( $logocss1 ) ) 
  {
    $logocss=$logocss1;
  }
  else
  {
    $logocss="";
  }
  
  if ( ! empty( $logoimage1 ) ) 
  {
    $logoimage=$logoimage1;
  }
  else
  {
    $logoimage=""; 
  }
  if ( ! empty( $logopadding1 ) ) 
  {
    $logopadding=$logopadding1;
  }
  else
  {
    $logopadding="10px";
  }
  
  if ( ! empty( $logobgcolor1 ) ) 
  {
    $logobgcolor=$logobgcolor1;
  }
  else
  {
    $logobgcolor="#fff";
  }
  
  if ( ! empty( $containerpadding1 ) ) 
  {
    $containerpadding=$containerpadding1;
  }
  else
  {
    $containerpadding="10px";
  }
  
  if ( ! empty( $containermargin1 ) ) 
  {
    $containermargin=$containermargin1;
  }
  else
  {
    $containermargin="10px"; 
  }
  
  if ( ! empty( $containercss1 ) ) 
  {
    $containercss=$containercss1;
  }
  else
  {
    $containercss="";
  }
  
  if ( ! empty( $containerbgcolor1 ) ) 
  {
    $containerbgcolor=$containerbgcolor1;
  }
  else
  {
    $containerbgcolor="#fff"; 
  }
  
  ?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <style>
	.wpbtr_lp2_body {
	display: grid;
  	grid-template-columns: 1fr;
  	grid-template-rows: auto;
  	background-color: <?php echo $pagebgcolor; ?>;
	}
	.wpbtr_lp2_logo{
	margin: <?php echo $logomargin; ?>;
	padding: <?php echo $logopadding; ?>;
	grid-area: auto / 1 / span 1 / span 1;
	display: flex;
  	justify-content: center;
  	align-items: center;
	background-color: <?php echo $logobgcolor; ?>;
	box-shadow: 0 3px 8px 1px rgba(0,0,0,.25);
	}
	.wpbtr_lp2_main_section {
	grid-area: auto / 1 / span 1 / span 1;
	padding: <?php echo $containerpadding; ?>;
	margin: <?php echo $containermargin; ?>;
	box-shadow: 0 3px 8px 1px rgba(0,0,0,.25);
    background-color: <?php echo $containerbgcolor; ?>;
	}
  </style>
</head>

<body class="wpbtr_lp2_body" style="<?php echo $pagecss; ?>"> 

<div class="wpbtr_lp2_logo" style="<?php echo $logocss; ?>">
	<img src="<?php echo $logoimage; ?>" width="auto" height="auto"/>
</div>

<div class="wpbtr_lp2_main_section" style="<?php echo $containercss; ?>">
        
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
