<?php

/* Template Name: Reports Archive */

//Remove By Default Genesis Loop
remove_action( 'genesis_loop', 'genesis_do_loop' );


//Add our custom Genesis Loop
add_action( 'genesis_loop', 'wpmd_archiveContent_function' );
function wpmd_archiveContent_function(){
	$args = array(
		'post_type' => 'report',
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
        <div class="rep-container">			
        <?php while (have_posts() ) : the_post(); ?>
	<div class="report">	
		<div class="rep-img">
				<?php echo '<img src="'.get_the_post_thumbnail_url().'" alt="'.get_the_title().'">'; ?>
		</div>
		<div class="head-style">
			<h2><?php echo '<a href="'.get_field('reports_pdf').'" title="' . get_the_title() . '" target="_blank" download>' . get_the_title() . '</a>' ; ?></h2>
		</div>
		<div class="report-content">
			<?php
			$excerpt = get_the_excerpt();
    			echo '<p>'.wp_trim_words($excerpt,25).'....</p>';
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