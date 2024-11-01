<!DOCTYPE html>
<html>
<head>
  
  <?php wp_head(); ?>
  
  <?php 
  $pagebgcol1 = get_post_meta( get_the_ID(), 'wpbtr_customwidth_pagebgcolor', true );
  $contwidth1 = get_post_meta( get_the_ID(), 'wpbtr_customwidth_containerwidth', true );
  $contpadding1 = get_post_meta( get_the_ID(), 'wpbtr_customwidth_containerpadding', true );
  $contbg1 = get_post_meta( get_the_ID(), 'wpbtr_customwidth_containerbgcolor', true );
  $contcss1 = get_post_meta( get_the_ID(), 'wpbtr_customwidth_extracssstyle', true );
  $pagecss1 = get_post_meta( get_the_ID(), 'wpbtr_customwidth_pagecssstyle', true );
  
  if ( ! empty( $pagebgcol1 ) ) 
  {
    $pagebgcol=$pagebgcol1;
  }
  else
  {
    $pagebgcol="#e6e6e6";
  }
  
  if ( ! empty( $contwidth1 ) ) 
  {
    $contwidth=$contwidth1;
  }
  else
  {
    $contwidth="90%";
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
  
  if ( ! empty( $contcss1 ) ) 
  {
    $contcss=$contcss1;
  }
  else
  {
    $contcss=""; 
  }
  if ( ! empty( $pagecss1 ) ) 
  {
    $pagecss=$pagecss1;
  }
  else
  {
    $pagecss=""; 
  }
  
  ?>
  
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <style>
	.wpbtr_lp2_body {
	display: grid;
  	grid-template-columns: 1fr;
  	grid-template-rows: auto;
  	background-color: <?php echo $pagebgcol; ?>;
	}
	.wpbtr_lp2_container {
    width: <?php echo $contwidth; ?>;
	height: auto;
	margin: 0 auto;
	padding: <?php echo $contpadding; ?>;
	background: <?php echo $contbg; ?>;
	}  
  </style>
</head>

<body class="wpbtr_lp2_body" style="<?php echo $pagecss; ?>"> 
<div class="wpbtr_lp2_container" style="<?php echo $contcss; ?>"> 

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
