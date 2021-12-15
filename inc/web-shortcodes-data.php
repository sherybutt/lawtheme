<?php

//Shortcode for FAQs
function faq_shortcode($atts){
	$a=$atts['id'];
	$args = [
		'post_type' => 'faq',
		'posts_per_page' => -1,
		'order'=>'ASC',
		'tax_query' => [
			[
			    'taxonomy' => 'categories',
			    'terms' => $a,
			 
			],
		],
	];

	$faq_html.='<div class="faqs-container" itemscope itemtype="https://schema.org/FAQPage">';
	$query = new WP_Query($args);
	    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
	        $faq_html.='<div class="faq-singular" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">';
	        $faq_html.='    <h2 class="faq-question" itemprop="name">'.get_the_title().'</h2>';
	        $faq_html.='    <div class="faq-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">';
	        $faq_html.='      <div itemprop="text">';
	        $faq_html.=         get_the_content();
	        $faq_html.='      </div>';
	        $faq_html.='   </div>';
	        $faq_html.='  </div>';

	endwhile;
	endif;
	$faq_html.='</div>';

	return  $faq_html;
	
	wp_reset_query();

}
add_shortcode('custom-faq','faq_shortcode');