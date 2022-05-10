<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

?>

<div class="no-results not-found">
  <div class="container">
    <h1><?php esc_html_e( 'Nothing Found', 'giftcardexchange' ); ?></h1>

    <?php
    if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

      <p><?php
        printf(
          wp_kses(
          /* translators: 1: link to WP admin new post page. */
            __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'giftcardexchange' ),
            array(
              'a' => array(
                'href' => array(),
              ),
            )
          ),
          esc_url( admin_url( 'post-new.php' ) )
        );
        ?></p>

    <?php elseif ( is_search() ) : ?>

      <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'Livelle' ); ?></p>
      <div class="search-wrapper search-in-page">
        <?php get_search_form(); ?>
      </div>

    <?php else : ?>

      <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'Livelle' ); ?></p>
      <div class="search-wrapper search-in-page">
        <?php get_search_form(); ?>
      </div>

    <?php endif; ?>
  </div>
</div><!-- .no-results -->
