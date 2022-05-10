<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-header">
          <a class="entry-thumbnail" href="<?php the_permalink() ?>">
            <?php the_post_thumbnail( 'full', [ 'class' => 'img-responsive mb-20' ] ) ?>

            <div class="entry-thumbnail-inner">
              <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

              <?php echo date( 'd.m.Y', strtotime( $post->post_date ) ); ?>
            </div>
          </a>
        </div>

        <div class="entry-content">
          <?php the_excerpt(); ?>

          <p><a href="<?php the_permalink() ?>">Read more</a></p>
        </div>
      </article>

    <?php endwhile; ?>

    <?php
    the_posts_navigation( [
      'prev_text' => __( '&laquo; Older posts' ),
      'next_text' => __( 'Newer posts &raquo;' ),
    ] );
    ?>
  </div>

<?php else :

  get_template_part( 'template-parts/content', 'none' );

endif; ?>

<?php get_footer(); ?>
