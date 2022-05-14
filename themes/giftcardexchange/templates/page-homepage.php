<?php

/* Template Name: Homepage */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <!--SECTION BANNER-->
  <div class="section-banner">
    <div class="section-banner__wrapper" style="background-image: url('<?= esc_url( get_the_post_thumbnail_url() ) ?>')">
      <div class="section-banner__opening" style="background-image: url('<?= esc_url( get_the_post_thumbnail_url() ) ?>')">
        <h2><?= get_field( 'top_caption' ) ?></h2>
      </div>

      <div class="section-banner__container container">
        <p><?= get_field( 'middle_caption' ) ?></p>

        <h1><?= get_field( 'bottom_caption' ) ?></h1>

        <a target="form" class="btn btn-purple btn-redeem" href="#>">REDEEM</a>

        <span>(Limited Time Offer)</span>

        <a href="#">
          <img class="img-fluid" src="<?= get_assets_path( 'images/icons/goto-arrow.svg' ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
        </a>
      </div>
    </div>
  </div>

  <!--SECTION CARDS-->
  <div class="section section-cards">
    <? if ( ! empty( get_field( 'main_heading' ) ) ) : ?>
      <h2><?= get_field( 'main_heading' ) ?></h2>
    <? endif; ?>

    <div class="section-cards__banner" style="background-image: url('<?= esc_url( get_field( 'background_card' )['url'] ) ?>')">
      <div class="img__wrapper">
        <? if ( ! empty( get_field( 'main_card' ) ) ) : ?>
          <img class="img-fluid" src="<?= esc_url( get_field( 'main_card' )['url'] ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
        <? endif; ?>
      </div>
    </div>

    <div class="section-cards__content">
      <div class="container">
        <? if ( ! empty( get_field( 'sub_heading' ) ) ) : ?>
          <h3><?= get_field( 'sub_heading' ) ?></h3>
        <? endif; ?>

        <a target="form" class="btn btn-purple btn-redeem" href="#">REDEEM OFFER</a>

        <? if ( ! empty( get_field( 'description_card' ) ) ) : ?>
          <p><?= get_field( 'description_card' ) ?></p>
        <? endif; ?>
      </div>
    </div>
  </div>

  <!--SECTION ICONS-->
  <div class="section section-sm section-icons">
    <div class="container">
      <div class="row">
        <? $count = 1 ?>
        <? if ( have_rows( 'icons' ) ) : ?>
          <? while ( have_rows( 'icons' ) ): the_row() ?>
            <div class="col-12 col-md-6 <?= $count > 3 ? '' : 'col-lg-4' ?> section-icons__item">
              <div class="wrapper <?= $count === 4 ? 'wrapper--modified ml-0 ml-lg-auto' : '' ?> <?= $count === 5 ? 'wrapper--modified mr-0 mr-lg-auto' : '' ?>">
                <img class="img-fluid" src="<?= get_sub_field( 'icon' )['url'] ?>" alt="<?= get_sub_field( 'image' )['alt'] ?>">

                <h3><?= get_sub_field( 'heading' ) ?></h3>

                <p><?= get_sub_field( 'content' ) ?></p>
              </div>
            </div>
            <? $count ++; endwhile; ?>
        <? endif; ?>
      </div>
    </div>
  </div>

  <!--SECTION COMPARE-->
  <div class="section section-lg section-compare">
    <div class="container">
      <h2><?= get_field( 'heading' ) ?></h2>

      <!--DESKTOP ONLY-->
      <div class="row section-compare__wrapper wrapper d-none d-md-flex">
        <div class="col-6 p-0">
          <div class="wrapper-table">
            <div class="wrapper-tr">
              <h4>COMPARE</h4>

              <? if ( ! empty( get_field( 'main_card_image' ) ) ): ?>
                <? $image = get_field( 'main_card_image' ) ?>
                <div class="wrapper-title">
                  <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                  <h5><?= get_field( 'main_card_title' ) ?></h5>
                </div>
              <? endif; ?>
            </div>

            <? if ( have_rows( 'main_card_details' ) ) : ?>
              <? while ( have_rows( 'main_card_details' ) ) : the_row() ?>
                <div class="wrapper-tr align-items-center">
                  <h6><?= get_sub_field( 'main_name' ) ?></h6>

                  <div class="wrapper-tr__field">
                    <? if ( get_sub_field( 'main_choice' ) ) : ?>
                      <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/yes.svg' ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
                    <? else : ?>
                      <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/no.svg' ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
                    <? endif; ?>
                  </div>
                </div>
              <? endwhile; ?>
            <? endif; ?>
          </div>
        </div>

        <? if ( have_rows( 'cards' ) ) : ?>
          <? while ( have_rows( 'cards' ) ) : the_row() ?>
            <div class="col-3 p-0">
              <div class="wrapper-tr sub-tr">
                <? if ( ! empty( get_sub_field( 'image' ) ) ): ?>
                  <? $image = get_sub_field( 'image' ) ?>
                  <div class="wrapper-title">
                    <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                    <h5><?= get_sub_field( 'card_title' ) ?></h5>
                  </div>
                <? endif; ?>
              </div>

              <? if ( have_rows( 'features' ) ): ?>
                <? while ( have_rows( 'features' ) ) : the_row() ?>
                  <div class="wrapper-tr sub-tr align-items-center">
                    <div class="wrapper-tr__field">
                      <? if ( get_sub_field( 'choice' ) ) : ?>
                        <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/yes.svg' ) ?>" alt="Yes">
                      <? else: ?>
                        <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/no.svg' ) ?>" alt="No">
                      <? endif; ?>
                    </div>
                  </div>
                <? endwhile; ?>
              <? endif; ?>
            </div>
          <? endwhile; ?>
        <? endif; ?>
      </div>

      <!--MOBILE ONLY-->
      <div class="row section-compare__mobile d-flex d-md-none">
        <div class="col-6 pr-0">
          <h4>COMPARE</h4>

          <div class="card-img d-flex">
            <div class="card-img_item">
              <? if ( ! empty( get_field( 'main_card_image' ) ) ): ?>
                <? $image = get_field( 'main_card_image' ) ?>
                <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">

                <h5><?= get_field( 'main_card_title' ) ?></h5>
              <? endif; ?>
            </div>
          </div>

          <? if ( have_rows( 'main_card_details' ) ) : ?>
            <? while ( have_rows( 'main_card_details' ) ) : the_row() ?>
              <div class="card-field">
                <h6><?= get_sub_field( 'main_name' ) ?></h6>

                <div class="card-field__wrapper d-flex">
                  <div class="card-field-item">
                    <? if ( get_sub_field( 'main_choice' ) ) : ?>
                      <td><img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/yes.svg' ) ?>" alt=""></td>
                    <? else : ?>
                      <td><img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/no.svg' ) ?>" alt=""></td>
                    <? endif; ?>
                  </div>
                </div>
              </div>
            <? endwhile; ?>
          <? endif; ?>
        </div>

        <div class="col-6 compare--right pl-0 position-relative">
          <div class="swiper mySwiper-3">
            <div class="swiper-wrapper">
              <? if ( have_rows( 'cards' ) ) : ?>
                <? while ( have_rows( 'cards' ) ) : the_row() ?>

                  <div class="swiper-slide">
                    <h4>COMPARE</h4>

                    <div class="card-img d-flex">
                      <div class="card-img_item">
                        <img class="img-fluid" src="<?= get_sub_field( 'image' )['url'] ?>" alt="<?= get_sub_field( 'image' )['alt'] ?>">
                        <h5><?= get_sub_field( 'card_title' ) ?></h5>
                      </div>
                    </div>

                    <? if ( have_rows( 'features' ) ) : ?>
                      <? while ( have_rows( 'features' ) ) : the_row() ?>
                        <div class="card-field">
                          <div class="bg-light-gray">
                            <h6>SHIPPING</h6>
                          </div>

                          <div class="card-field__wrapper d-flex">
                            <div class="card-field-item">
                              <? if ( get_sub_field( 'choice' ) ) : ?>
                                <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/yes.svg' ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
                              <? else: ?>
                                <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/no.svg' ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
                              <? endif; ?>
                            </div>
                          </div>
                        </div>
                      <? endwhile; ?>
                    <? endif; ?>
                  </div>

                <? endwhile; ?>
              <? endif; ?>
            </div>
          </div>

          <div class="swiper-button-next swiper-button-next-compare"></div>
        </div>
      </div>
    </div>
  </div>

  <!--SECTION DEALS-->
  <div class="section section-lg section-compare section-deals">
    <div class="container">
      <?= get_field( 'heading_cost' ) ?>

      <!--DESKTOP ONLY-->
      <div class="row section-compare__wrapper wrapper d-none d-md-flex">
        <div class="col-6 p-0">
          <div class="wrapper-table">
            <div class="wrapper-tr">
              <h4>COSTS</h4>

              <? if ( ! empty( get_field( 'main_cost_image' ) ) ): ?>
                <? $image = get_field( 'main_cost_image' ) ?>
                <div class="wrapper-title">
                  <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                  <h5><?= get_field( 'main_cost_title' ) ?> <br>$<?= get_field( 'main_price' ) ?></h5>
                </div>
              <? endif; ?>
            </div>

            <? if ( have_rows( 'main_cost_details' ) ) : ?>
              <? while ( have_rows( 'main_cost_details' ) ) : the_row() ?>
                <div class="wrapper-tr align-items-center">
                  <h6><?= get_sub_field( 'main_name' ) ?></h6>

                  <div class="wrapper-tr__field">
                    <? if ( ! empty( get_sub_field( 'main_price' ) ) ) : ?>
                      <p>$<?= get_sub_field( 'main_price' ) ?></p>
                    <? else: ?>
                      <p>$0</p>
                    <? endif; ?>
                  </div>
                </div>
              <? endwhile; ?>
            <? endif; ?>

            <div class="wrapper-tr align-items-center total--field">
              <h6>TOTAL</h6>

              <div class="wrapper-tr__field">
                <p class="dark-green">$50</p>
              </div>
            </div>
          </div>
        </div>

        <? if ( have_rows( 'costs' ) ) : ?>
          <? while ( have_rows( 'costs' ) ) : the_row() ?>
            <div class="col-3 p-0">
              <div class="wrapper-tr sub-tr">
                <? if ( ! empty( get_sub_field( 'image' ) ) ): ?>
                  <? $image = get_sub_field( 'image' ) ?>
                  <div class="wrapper-title">
                    <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                    <h5><?= get_sub_field( 'card_title' ) ?><br>$<?= get_sub_field( 'card_price' ) ?></h5>
                  </div>
                <? endif; ?>
              </div>

              <? if ( have_rows( 'prices' ) ) : ?>
                <? while ( have_rows( 'prices' ) ) : the_row() ?>
                  <div class="wrapper-tr sub-tr align-items-center">
                    <div class="wrapper-tr__field">
                      <? if ( ! empty( get_sub_field( 'price' ) ) ) : ?>
                        <p>$<?= get_sub_field( 'price' ) ?></p>
                      <? else: ?>
                        <p>$0</p>
                      <? endif; ?>
                    </div>
                  </div>
                <? endwhile; ?>
              <? endif; ?>

              <div class="wrapper-tr sub-tr align-items-center total--field">
                <div class="wrapper-tr__field">
                  <p class="smoke-black">$<?= get_sub_field( 'total' ) ?></p>
                </div>
              </div>

              <div class="wrapper-tr sub-tr align-items-center">
                <div class="wrapper-tr__field">
                  <span class="link">*Source: <a href="<? esc_url( get_sub_field( 'url' ) ) ?>"><?= get_sub_field( 'link_text' ) ?></a></span>
                </div>
              </div>
            </div>
          <? endwhile; ?>
        <? endif; ?>
      </div>

      <!--MOBILE ONLY-->
      <div class="row section-compare__mobile d-flex d-md-none">
        <div class="col-6 pr-0">
          <h4>COSTS</h4>

          <div class="card-img d-flex">
            <div class="card-img_item">
              <? if ( ! empty( get_field( 'main_cost_image' ) ) ): ?>
                <? $image = get_field( 'main_cost_image' ) ?>
                <img class="img-fluid" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">

                <h5><?= get_field( 'main_cost_title' ) ?> <br>$<?= get_field( 'main_price' ) ?></h5>
              <? endif; ?>
            </div>
          </div>

          <? if ( have_rows( 'main_cost_details' ) ) : ?>
            <? while ( have_rows( 'main_cost_details' ) ) : the_row() ?>
              <div class="card-field">
                <h6><?= get_sub_field( 'main_name' ) ?></h6>

                <div class="card-field__wrapper d-flex">
                  <div class="card-field-item">
                    <? if ( get_sub_field( 'main_price' ) ) : ?>
                      <p>$<?= get_sub_field( 'main_price' ) ?></p>
                    <? else: ?>
                      <p>$0</p>
                    <? endif; ?>
                  </div>
                </div>
              </div>
            <? endwhile; ?>
          <? endif; ?>

          <div class="card-field total--field">
            <h6>TOTAL</h6>

            <div class="card-field__wrapper d-flex">
              <div class="card-field-item">
                <p class="dark-green">$50</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6 compare--right pl-0 position-relative">
          <div class="swiper mySwiper-4">
            <div class="swiper-wrapper">
              <? if ( have_rows( 'costs' ) ) : ?>
                <? while ( have_rows( 'costs' ) ) : the_row() ?>

                  <div class="swiper-slide">
                    <h4>COSTS</h4>

                    <div class="card-img d-flex">
                      <div class="card-img_item">
                        <img class="img-fluid" src="<?= get_sub_field( 'image' )['url'] ?>" alt="<?= get_sub_field( 'image' )['alt'] ?>">
                        <h5><?= get_sub_field( 'card_title' ) ?> <br>$<?= get_sub_field( 'card_price' ) ?></h5>
                      </div>
                    </div>

                    <? if ( have_rows( 'prices' ) ) : ?>
                      <? while ( have_rows( 'prices' ) ) : the_row() ?>
                        <div class="card-field">
                          <div class="bg-light-gray">
                            <h6>SHIPPING</h6>
                          </div>

                          <div class="card-field__wrapper d-flex">
                            <div class="card-field-item">
                              <? if ( get_sub_field( 'price' ) ) : ?>
                                <p>$<?= get_sub_field( 'price' ) ?></p>
                              <? else: ?>
                                <p>$0</p>
                              <? endif; ?>
                            </div>
                          </div>
                        </div>
                      <? endwhile; ?>
                    <? endif; ?>

                    <div class="card-field total--field">
                      <div class="bg-light-gray">
                        <h6>SHIPPING</h6>
                      </div>

                      <div class="card-field__wrapper d-flex">
                        <div class="card-field-item">
                          <? if ( get_sub_field( 'total' ) ) : ?>
                            <p>$<?= get_sub_field( 'total' ) ?></p>
                          <? else: ?>
                            <p>$0</p>
                          <? endif; ?>
                          <span class="link">*Source: <a href="<? esc_url( get_sub_field( 'url' ) ) ?>"><?= get_sub_field( 'link_text' ) ?></a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                <? endwhile; ?>
              <? endif; ?>
            </div>
          </div>

          <div class="swiper-button-next swiper-button-next-deals"></div>
        </div>
      </div>

      <!--LINKS-->
      <div class="section-deals__link text-center">
        <a target="form" class="btn btn-purple btn-redeem" href="#">REDEEM OFFER</a>
      </div>
    </div>
  </div>

  <!--SECTION WORKS-->
  <div class="section section-lg section-works bg-green">
    <h2><?= get_field( 'heading_works' ) ?></h2>

    <div class="container">
      <div class="swiper mySwiper-2">
        <div class="swiper-wrapper">
          <? if ( have_rows( 'steps' ) ) : ?>
            <? while ( have_rows( 'steps' ) ): the_row() ?>
              <div class="swiper-slide section-works__item balance-elements">
                <img class="img-fluid" src="<?= get_sub_field( 'icon' )['url'] ?>" alt="<? get_sub_field( 'icon' )['alt'] ?>">

                <? if ( ! empty( get_sub_field( 'step' ) ) ) : ?>
                  <h3><?= get_sub_field( 'step' ) ?></h3>
                <? endif; ?>

                <? if ( ! empty( get_sub_field( 'content' ) ) ) : ?>
                  <p><?= get_sub_field( 'content' ) ?></p>
                <? endif; ?>
              </div>
            <? endwhile; ?>
          <? endif; ?>
        </div>

        <div class="swiper-pagination"></div>
      </div>
    </div>
  </div>

  <!--SECTION EXPERIENCES-->
  <div class="section section-lg section-experience">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-7">
          <h2><?= get_field( 'heading_experiences' ) ?></h2>

          <? if ( have_rows( 'experiences' ) ) : ?>
            <ul class="list-unstyled">
              <? while ( have_rows( 'experiences' ) ) : the_row() ?>
                <li>
                  <img class="img-fluid" src="<?= the_assets_path( 'images/icons/success.svg' ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
                  <span><?= get_sub_field( 'experience' ) ?></span>
                </li>
              <? endwhile; ?>
            </ul>
          <? endif; ?>
        </div>

        <div class="col-12 col-md-6 col-lg-5">
          <div class="section-experience__animation">
            <img class="img-fluid" src="<?= the_assets_path( 'images/iphone.svg' ) ?>" alt="<?= esc_attr( get_bloginfo( 'name' ) ) ?>">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--SECTION FORM-->
  <div class="section section-form" style="background-image: url('<?= get_field( 'background' )['url'] ?>')">
    <div class="container">
      <?= get_field( 'heading_content_form' ) ?>

      <div id="form" class="section-form__wrapper">
        <div class="form--addons">
          <a class="btn btn-transparent btn-offer" href="#">GET OFFER</a>
          <a class="btn btn-transparent btn-demo" href="#">BOOK DEMO</a>
        </div>

        <div class="form--offer">
          <?= do_shortcode( '[gravityform id="1" title="true" description="true"]' ); ?>
        </div>

        <div class="form--demo">
          <?= do_shortcode( '[gravityform id="2" title="true" description="true"]' ); ?>
        </div>

        <span><?= get_field( 'promo_text_form' ) ?></span>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<?php endwhile; ?>


<?php get_footer();