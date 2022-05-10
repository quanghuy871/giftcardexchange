<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

?>
</main><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>

<footer class="footer">
  <div class="container">
    <h2>FOLLOW US</h2>

    <div class="footer-socials">
      <a target="_blank" href="<?= esc_url( get_field( 'facebook_link' ) ) ?>">
        <img class="img-fluid" src="<?= get_assets_path( 'images/icons/social-facebook.svg' ) ?>" alt="Facebook">
      </a>

      <a target="_blank" href="<?= esc_url( get_field( 'instagram_link' ) ) ?>">
        <img class="img-fluid" src="<?= get_assets_path( 'images/icons/social-instagram.svg' ) ?>" alt="Facebook">
      </a>

      <a target="_blank" href="<?= esc_url( get_field( 'linkedin_link' ) ) ?>">
        <img class="img-fluid" src="<?= get_assets_path( 'images/icons/social-linkedin.svg' ) ?>" alt="Facebook">
      </a>
    </div>

    <div class="footer-copyright">
      <p>©2022 Gift Card Exchange (GCX) | All rights reserved</p>
    </div>
  </div>
</footer>

</html>
