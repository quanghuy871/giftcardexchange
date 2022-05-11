<?php

/* Template Name: Thank you booking */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <!--SECTION HEADER-->
  <div class="section-header">
    <div class="container">
      <div class="section-header__wrapper">
        <a href="<?= esc_url( get_home_url() ) ?>"><img class="img-fluid" src="<?= get_assets_path( 'images/logo-black.svg' ) ?>" alt="<?= esc_attr( get_the_title() ) ?>"></a>
      </div>
    </div>
  </div>

  <!--SECTION AMAZING-->
  <div class="section section-amazing section-head">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-5 order-md-1 order-2">
          <div class="section-amazing__content">
            <?= get_field( 'content' ) ?>

            <span>Pssst...there's also a little surprise in there. 😉</span>

            <div class="section-amazing__links">
              <a class="btn btn-purple" href="#">CREATE ACCOUNT</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-7 order-md-2 order-1">
          <div class="section-amazing__img">
            <img class="img-fluid w-100" src="<?= esc_url( get_the_post_thumbnail_url() ) ?>" alt="<?= esc_attr( get_the_title() ) ?>">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--SECTION TERM-->
  <div class="section-term">
    <div class="container">
      <div class="section-term__wrapper">
        <ul>
          <li><a href="#">Privacy</a></li>
          <li>•</li>
          <li><a href="#">Terms & Conditions</a></li>
          <li>•</li>
          <li><a href="#">Help</a></li>
        </ul>
      </div>
    </div>
  </div>

<?php endwhile; ?>

<?php get_footer();