<?php

/* Template Name: Newsletters Archive */

//Remove By Default Genesis Loop
remove_action( 'genesis_loop', 'genesis_do_loop' );


//Add our custom Genesis Loop
add_action( 'genesis_loop', 'wpmd_archiveContent_function' );
function wpmd_archiveContent_function(){
	$args = array(
		'post_type' => 'newsletter',
		'order'=>'ASC',
		'posts_per_page' => 9,
		'post_status' => 'publish',
		'paged' => get_query_var( 'paged' )
	);

	global $wp_query;
	$wp_query = new WP_Query( $args );
	?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div class="entry-content">
	<?php
	if ( have_posts() ):?>
        <div class="wpmd-gcpts-container">			
        <?php while (have_posts() ) : the_post(); ?>
	<div class="wpmd-gsingle-cpt-holder">	
		<div class="head-style">
			<h2><?php echo '<a href="'.get_the_permalink().'" title="' . get_the_title() . '">' . get_the_title() . '</a>' ; ?></h2>
		</div>
		<div class="wpmd-gcontent">
			<?php
    			echo get_the_content();
			?>
		</div>
	</div>
	<?php endwhile; ?>
	</div>
<?php
	do_action( 'genesis_after_endwhile' );
	wp_reset_query();
    else:
  		echo "<h3>Coming Soon</h3>";
		endif;
?>
	</div>

<?php
}

genesis();