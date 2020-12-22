<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'business_accounting_above_slider' ); ?>

	<?php if( get_theme_mod('business_accounting_banner_hide_show') != ''){ ?>
		<section id="banner">
			<div class="banner-svg">
				<svg viewBox="0 0 650 150" preserveAspectRatio="none"><path d="M200.62,-3.45 C200.36,120.06 85.55,62.66 0.00,150.5 L-2.25,143.58 L0.00,0.00 Z" style="stroke: none; "></path></svg>
			</div>
		    <?php $business_accounting_slider_pages = array();
	        $mod = intval( get_theme_mod( 'business_accounting_slider' ));
	        if ( 'page-none-selected' != $mod ) {
	          $business_accounting_slider_pages[] = $mod;
	        }
	      	if( !empty($business_accounting_slider_pages) ) :
		        $args = array(
		          	'post_type' => 'page',
		          	'post__in' => $business_accounting_slider_pages,
		          	'orderby' => 'post__in'
		        );
		        $query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        	<div class="row">
					        <div class="col-lg-6 col-md-6">
								<div class="slider-background"></div>
							</div>
			        		<div class="col-lg-6 col-md-6">
					        	<?php the_post_thumbnail(); ?>
					        </div>
						</div>
			            <div class="banner-content">
			            	<hr class="small-hr"><small><?php echo esc_html(get_theme_mod('business_accounting_slider_small_title','')); ?></small>
			              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
			              	<div class="read-btn">
			              		<a href="<?php the_permalink(); ?>"><?php echo esc_html('Read More', 'business-accounting') ?><i class="fas fa-angle-double-right"></i><span class="screen-reader-text"><?php echo esc_html('Read More', 'business-accounting') ?></span></a>
			              	</div>
			            </div>
			      	<?php endwhile; 
			      	wp_reset_postdata();?>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
		    endif;?>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('business_accounting_below_slider'); ?>

	<section id="our-features">
		<div class="container">
			<div class="features-title">
				<?php if (get_theme_mod('business_accounting_features_heading','')) { ?>
					<h2><?php echo esc_html(get_theme_mod('business_accounting_features_heading','')); ?></h2><hr class="title-hr">
				<?php } ?>
			</div>
			<div class="features-box">
	            <div class="row">
		      		<?php $business_accounting_catData1 =  get_theme_mod('business_accounting_category_setting');
      				if($business_accounting_catData1){ 
	      				$page_query = new WP_Query(array( 'category_name' => esc_html($business_accounting_catData1 ,'business-accounting')));?>
		        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
		          			<div class="col-lg-4 col-md-6">
		          				<div class="features-section">
		      						<div class="features-img">
					            		<a href="<?php the_permalink(); ?>" class="read-btn"><i class="fas fa-plus"></i></a>
							      		<?php the_post_thumbnail(); ?>
							  		</div>
	          						<div class="features-content">
					            		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					            		<p><?php $business_accounting_excerpt = get_the_excerpt(); echo esc_html( business_accounting_string_limit_words( $business_accounting_excerpt,12 ) ); ?></p>
		            				</div>	
		          				</div>
						    </div>
		          		<?php endwhile; 
		          	wp_reset_postdata();
		      		}?>
	      		</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>

	<?php do_action('business_accounting_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>