<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

  <?php while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/content-cpt-case-study' );

  endwhile; ?>

<?php else : ?>

  <?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
