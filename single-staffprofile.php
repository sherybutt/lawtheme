<?php

//Remove By Default Genesis Loop
remove_action( 'genesis_loop', 'genesis_do_loop' );
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

//Add our custom Genesis Loop
add_action( 'genesis_loop', 'singlePageContent_function' );
function singlePageContent_function(){ ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div class="entry-content">
		<div class="single-staffImg">
			<?php the_post_thumbnail( array( 375 , 400 ) ); ?>
		</div>
		<?php the_content(); ?>
	</div>


<?php }

genesis();