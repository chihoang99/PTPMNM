<?php
/**
 * The header for our theme
 *
 * @subpackage Business Accounting
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'business-accounting' ); ?></a>

<div id="header">
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<?php if (get_theme_mod('business_accounting_mail','')) {?>
						<div class="mail">
							<a href="mailto:<?php echo esc_attr(get_theme_mod('business_accounting_mail','')); ?>"><i class="far fa-envelope"></i><?php echo esc_html(get_theme_mod('business_accounting_mail','')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('business_accounting_mail','')); ?></span></a>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-8 col-md-8">
					<?php if(get_theme_mod('business_accounting_facebook_url','') || get_theme_mod('business_accounting_twitter_url','') || get_theme_mod('business_accounting_linkedin_url','') || get_theme_mod('business_accounting_rss_url','') || get_theme_mod('business_accounting_youtube_url','')){ ?>
						<div class="social-icons">
							<?php if(get_theme_mod('business_accounting_facebook_url','')){ ?>
								<a href="<?php echo esc_url(get_theme_mod('business_accounting_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'business-accounting'); ?></span></a>
							<?php }?>
							<?php if(get_theme_mod('business_accounting_twitter_url','')){ ?>
								<a href="<?php echo esc_url(get_theme_mod('business_accounting_twitter_url','')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'business-accounting'); ?></span></a>
							<?php }?>
							<?php if(get_theme_mod('business_accounting_linkedin_url','')){ ?>
								<a href="<?php echo esc_url(get_theme_mod('business_accounting_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'business-accounting'); ?></span></a>
							<?php }?>
							<?php if(get_theme_mod('business_accounting_rss_url','')){ ?>
								<a href="<?php echo esc_url(get_theme_mod('business_accounting_rss_url','')); ?>"><i class="fas fa-rss"></i><span class="screen-reader-text"><?php echo esc_html('RSS', 'business-accounting'); ?></span></a>
							<?php }?>
							<?php if(get_theme_mod('business_accounting_youtube_url','')){ ?>
								<a href="<?php echo esc_url(get_theme_mod('business_accounting_youtube_url','')); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php echo esc_html('Youtube', 'business-accounting'); ?></span></a>
							<?php }?>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-header">
		<div class="container">
			<div class="row m-0">
				<div class="logo col-lg-3 col-md-5">
					<?php if ( has_custom_logo() ) : ?>
	            		<?php the_custom_logo(); ?>
		            <?php endif; ?>
	             	<?php if (get_theme_mod('business_accounting_show_site_title',true)) {?>
              			<?php $blog_info = get_bloginfo( 'name' ); ?>
		                <?php if ( ! empty( $blog_info ) ) : ?>
		                  	<?php if ( is_front_page() && is_home() ) : ?>
		                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                  	<?php else : ?>
	                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                  		<?php endif; ?>
		                <?php endif; ?>
		            <?php }?>
		            <?php if (get_theme_mod('business_accounting_show_tagline',true)) {?>
		                <?php
	                  		$description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) :
		                ?>
	                  	<p class="site-description">
	                    	<?php echo esc_attr($description); ?>
	                  	</p>
	              		<?php endif; ?>
              		<?php }?>
				</div>
				<div class="menu-section col-lg-5 col-md-2 col-6">
					<div class="toggle-menu responsive-menu">
						<?php if(has_nav_menu('primary')){ ?>
			            	<button onclick="business_accounting_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','business-accounting'); ?></span></button>
			            <?php }?>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'business-accounting' ); ?>">
		                  	<?php if(has_nav_menu('primary')){
			                    wp_nav_menu( array( 
									'theme_location' => 'primary',
									'container_class' => 'main-menu-navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
			                    ) ); 
		                  	} ?>
		                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="business_accounting_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','business-accounting'); ?></span></a>
		                </nav>
		            </div>
				</div>
				<div class="col-lg-1 col-md-1 col-6">
					<div class="search-box">
						<button  onclick="business_accounting_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
					</div>
				</div>
				<div class="search-outer">
					<div class="search-inner">
			        	<?php get_search_form(); ?>
		        	</div>
		        	<button onclick="business_accounting_search_close()" class="search-close"><i class="fas fa-times"></i></button>
		        </div>
				<div class="col-lg-3 col-md-4">
					<?php if (get_theme_mod('business_accounting_call','')) {?>
						<div class="call">
							<span><a href="tel:<?php echo esc_attr(get_theme_mod('business_accounting_call','')); ?>"><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('business_accounting_call','')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('business_accounting_call','')); ?></span></a></span>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>