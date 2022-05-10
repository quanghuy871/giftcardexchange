<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>

<div class="section error-404 not-found" style="padding-top: 280px">
  <div class="container">
    <h1><?php esc_html_e( 'It looks like nothing was found at this location.', 'giftcardexchange' ); ?></h1>
  </div>
</div><!-- .error-404 -->

<?php get_footer(); ?>
