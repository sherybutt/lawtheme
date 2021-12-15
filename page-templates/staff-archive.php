<?php

/* Template Name: Staff Archive */

//Remove By Default Genesis Loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

//Add our custom Genesis Loop
add_action( 'genesis_loop', 'wpmd_archiveContent_function' );
function wpmd_archiveContent_function(){
	$args = array(
		'post_type' => 'staffprofile',
		'order'=>'ASC',
		'posts_per_page' => 6,
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
        <div class="staffProfiles-container">			
        <?php while (have_posts() ) : the_post(); ?>
        	<div class="singleStaff-holder">
        		<div class="upper-Holder">
        			<div class="imgHolder">
        				<img src="<?php the_post_thumbnail_url(); ?>" alt="Profile Image">
        			</div>
        			<div class="infoHolder">
        				<span><?php echo wp_trim_words(get_the_excerpt(), 25); ?></span>
        			</div>
        		</div>
        			<div class="lower-holder">
        				<span class="staff-meta">
        					<i class="fas fa-user-circle"></i><span class="staff-nm"><?php the_title(); ?></span>
        				</span><br>
        				<a href="<?php the_permalink(); ?>" class="button">Read More</a>
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