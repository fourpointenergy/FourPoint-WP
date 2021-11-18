<?php
/**
 * Login Form
 **/
get_header();
?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<header class="container">
        <div class="site-logo"><a href="/"><img src="<?php $fp_theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></a></div>
        <div class="page-title">
            <div class="page-title-inner">
                <h1><?php echo the_title(); ?></h1>
                <p><?php get_field('page_description') ?></p>
            </div>
        </div>
    </header>
    <div class="content container">
        <?php $args = array(
		        'echo'           => true,
		        'redirect' => '/brewer-admin',
		        'form_id'        => 'loginform',
		        'label_username' => __( 'Email' ),
		        'label_password' => __( 'Password' ),
		        'label_remember' => __( 'Remember Me' ),
		        'label_log_in'   => __( 'Log In' ),
		        'id_username'    => 'user_login',
		        'id_password'    => 'user_pass',
		        'id_remember'    => 'rememberme',
		        'id_submit'      => 'wp-submit',
		        'remember'       => true,
		        'value_username' => '',
		        'value_remember' => false
		);
			the_content();
        	wp_login_form( $args );
		?>
    </div>
<?php endwhile; ?> 
<?php get_footer(); ?>