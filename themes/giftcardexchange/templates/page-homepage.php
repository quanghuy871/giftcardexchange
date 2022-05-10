<?php

/* Template Name: Homepage */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

  <!--SECTION BANNER-->
  <div class="section-banner">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <? if ( have_rows( 'banners' ) ) : ?>
          <? while ( have_rows( 'banners' ) ) : the_row() ?>
            <div class="swiper-slide section-banner__wrapper" style="background-image: url('<?= get_sub_field( 'background' )['url'] ?>')">
              <div class="section-banner__opening" style="background-image: url('<?= get_sub_field( 'background' )['url'] ?>')">
                <h2><?= get_sub_field( 'top_caption' ) ?></h2>
              </div>

              <div class="section-banner__container container">
                <p><?= get_sub_field( 'middle_caption' ) ?></p>

                <h1><?= get_sub_field( 'bottom_caption' ) ?></h1>

                <? if ( ! empty( get_sub_field( 'url' ) ) ) : ?>
                  <a class="btn btn-purple" href="<?= esc_url( get_sub_field( 'url' ) ) ?>"><?= get_sub_field( 'link_text' ) ?></a>
                <? endif; ?>

                <span>(Limited Time Offer)</span>

                <a href="#">
                  <img class="img-fluid" src="<?= get_assets_path( 'images/icons/goto-arrow.svg' ) ?>" alt="">
                </a>
              </div>
            </div>
          <? endwhile; ?>
        <? endif; ?>
      </div>
    </div>
  </div>

  <!--SECTION CARDS-->
  <div class="section section-cards">
    <h2>REDEEM YOUR GIFT CARDS AT <span>100+ DIFFERENT</span> STORES</h2>

    <div class="section-cards__banner" style="background-image: url('<?= get_assets_path( 'images/cards.svg' ) ?>')">
      <div class="img__wrapper">
        <img class="img-fluid" src="<?= get_assets_path( 'images/exchange-card.svg' ) ?>" alt="">
      </div>
    </div>

    <div class="section-cards__content">
      <div class="container">
        <h3>Buy an Exchange Card and you can swap it for hundreds of brands!</h3>

        <a class="btn btn-purple" href="#">REDEEM OFFER</a>

        <p>SAVE up to $50 per order</p>
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
                      <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/yes.svg' ) ?>" alt="">
                    <? else : ?>
                      <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/no.svg' ) ?>" alt="">
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
                                <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/yes.svg' ) ?>" alt="">
                              <? else: ?>
                                <img class="img-fluid fa" src="<?= get_assets_path( 'images/icons/no.svg' ) ?>" alt="">
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

          <div class="swiper-button-next"></div>
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

          <div class="swiper-button-next"></div>
        </div>
      </div>

      <!--LINKS-->
      <div class="section-deals__link text-center">
        <a class="btn btn-purple" href="#">REDEEM OFFER</a>
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
                  <img class="img-fluid" src="<?= the_assets_path( 'images/icons/success.svg' ) ?>" alt="">
                  <span><?= get_sub_field( 'experience' ) ?></span>
                </li>
              <? endwhile; ?>
            </ul>
          <? endif; ?>
        </div>

        <div class="col-12 col-md-6 col-lg-5">
          <div class="section-experience__animation">
            <img class="img-fluid" src="<?= the_assets_path( 'images/iphone.svg' ) ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--SECTION FORM-->
  <div class="section section-form" style="background-image: url('<?= get_assets_path( 'images/istock.png' ) ?>')">
    <div class="container">
      <h2>DON’T MISS OUT</h2>

      <p>GET 10% off YOUR FIRST GIFT CARD PURCHASE
        UP TO $500, BEST ONLINE DEAL GUARANTEED!</p>

      <div class="section-form__wrapper">
        <div class="form--addons">
          <a class="btn btn-purple" href="#">GET OFFER</a>
          <a class="btn btn-transparent" href="#">BOOK DEMO</a>
        </div>

        <? the_content(); ?>

        <span>SAVE $50 on $500 worth of Gift Cards</span>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script>
    let swiper = new Swiper('.mySwiper', {});

    let swiper2 = new Swiper('.mySwiper-2', {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 8,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
    });

    let swiper3 = new Swiper('.mySwiper-3', {
      loop: true,
      navigation: {
        prevEl: '.swiper-button-prev',
        nextEl: '.swiper-button-next',
      },
    });

    let swiper4 = new Swiper('.mySwiper-4', {
      loop: true,
      navigation: {
        prevEl: '.swiper-button-prev',
        nextEl: '.swiper-button-next',
      },
    });
  </script>

<?php endwhile; ?>

<?php get_footer();