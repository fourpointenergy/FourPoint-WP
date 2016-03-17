<?php
/**
 * Template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
global $theme;
get_header(); ?>
<header class="container">
   <div class="site-logo"><a href="/"><img src="<?php $theme->images_path() ?>/logo@2x.png" width="197" height="185" alt="Colorado | The state of craft beer"></a></div>
    <div class="page-title">
        <div class="page-title-inner">
            <h1>Page Not Found</h1>
        </div>
    </div>
</header>
<div class="content container">
    <p>Apologies, but the page you requested could not be found. <a href="/">Click here</a> to go the the homepage.</p>
</div>

<?php get_footer(); ?>