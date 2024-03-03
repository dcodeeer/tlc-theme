<?php get_header(); ?>

<?php /* Template Name: why-tlc */ ?>

<div class='why-tlc-page'>

  <div class='animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>

    <div class='header'>
      <img src='<?php the_post_thumbnail_url( 'full' );?>' />
    </div>
  </div>

  <div class='animate-content'>
    <div class='first container'>
      <div class='title H1'><?php echo get_field('first_section_title'); ?></div>
      <div class='mini-title H3'><?php echo get_field('first_section_mini_title'); ?></div>
    </div>

    <div class='second container'>
      <img src='<?php echo get_field('second_section_image'); ?>' />
      <div class='right'>
        <div class='title H4'><?php echo get_field('second_section_title'); ?></div>
        <div class='list body-2'><?php echo wpautop(get_field('second_section_content')); ?></div>
      </div>
    </div>

    <div class='third'>
      <div class='container'>
        <div class='left'>
          <div class='title H4'><?php echo get_field('third_section_title'); ?></div>
          <div class='list body-2'><?php echo wpautop(get_field('third_section_content')); ?></div>
        </div>
        <img src='<?php echo get_field('third_section_image'); ?>' />
      </div>
      <div class='bottom H4 container'><?php echo get_field('third_section_bottom_text'); ?></div>
    </div>

    <div class='fifth'>
      <div class='container'>
        <div class='left'>
          <div class='top H3'>Awards</div>
          <div class='bottom'>
            <div class='H4'>Award-Winning Business,<br />Award-Winning Care </div>
            <span class='body-1'>With a mission focused on building relationships, it’s no wonder why we are the best in business of care! See why we’ve been the best in the business of staffing qualified caregivers for years running.</span>
          </div>
        </div>
        <div class='right'>
          <button id='awards-page-slider-left'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35 16.25L22.5 30L35 43.75" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>

          <div class='slider' id='awards-page-slider'>

            <div class='swiper-wrapper'>
              <?php
              $images = get_field('fourth_section_slider');
              foreach ($images as $image) {
              ?>
              <div class='swiper-slide'><img src='<?php echo $image; ?>' /></div>
              <?php } ?>
            </div>

            <div class='pagination' id='awards-page-slider-pagination'></div>
          </div>

          <button id='awards-page-slider-right'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25 43.75L37.5 30L25 16.25" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
        </div>
      </div>
    </div>

    <div class='fourth'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>

</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const awardsPageSlider = new Swiper('#awards-page-slider', {
    pagination: {
      el: '#awards-page-slider-pagination',
      clickable: true,
    },
    navigation: {
      prevEl: '#awards-page-slider-left',
      nextEl: '#awards-page-slider-right',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 10
      },
      768: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 30
      },
      1100: {
        slidesPerView: 3,
        slidesPerGroup: 3,
        spaceBetween: 30
      },
    },
  });

  awardsPageSlider.init();
});
</script>
<?php get_footer(); ?>