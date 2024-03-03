<?php
  get_header();

  /* Template Name: awards */
?>

<div class='awards-page'>
  <div class='animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>

    <div class='header'>
      <div class='container'>
        <div class='title H1'><?php echo get_field('first_section_title'); ?></div>
        <div class='description body-1'><?php echo wpautop(get_field('first_section_description')); ?></div>
      </div>
    </div>
  </div>

  <div class='animate-content'>
    <div class='first'>
      <div class='container'>
        <button id='awards-page-slider-left'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35 16.25L22.5 30L35 43.75" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></button>

        <div class='slider' id='awards-page-slider'>

          <div class='swiper-wrapper'>
            <?php
            $images = get_field('second_section_awards');
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

    <div class='bottom'>
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