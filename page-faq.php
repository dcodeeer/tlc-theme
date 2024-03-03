<?php
  get_header();

  /* Template Name: faq */
?>

<div class='faq-page'>
  <div class='header animate-header'>

    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>

    <div class='slider' id='faq-page-slider'>
      <div class='swiper-wrapper'>
        <?php
        $images = get_field('slider_images');
        foreach ($images as $image) {
        ?>
        <div class='swiper-slide'><img src='<?php echo $image; ?>' /></div>
        <?php } ?>
      </div>
      <div class='swiper-pagination' id='faq-page-slider-pagination'></div>
    </div>

  </div>

  <div class='animate-content'>
    <div class='content container'>
      <div class='title'>More Questions? Contact Us Today</div>

      <div class='list'>

        <?php
        $faq = get_field('faq');
        for ($i = 1; $i < (count($faq) + 1); $i++) {
        ?>
        <div class='accordion'>
          <div class='accordion-content'>
            <div class='number'><?php echo $i; ?>.</div>
            <div class='information'>
              <div class='name'><?php echo $faq[$i-1]['title']; ?></div>
              <div class='description '>
                <p><?php echo nl2br($faq[$i-1]['description']); ?></p>
              </div>
            </div>
          </div>
          <button class='faq-page-accordion' data-page='faq-page'>
            <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="currentColor"/></svg></div>
          </button>
        </div>
        <?php } ?>

      </div>

    </div>

    <div class='bottom'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>
</div>

<script is:inline>
const faqPageAccordianListener = (e) => {
  e.currentTarget.classList.toggle('faq-page-accordion-active');

  const content = e.currentTarget.previousElementSibling.querySelector('.description');

  content.classList.toggle('active');
};

const faqPageAccordian = document.querySelectorAll('.faq-page-accordion[data-page="faq-page"]');

faqPageAccordian.forEach(e => {
  e.addEventListener('click', faqPageAccordianListener);
});


// slider
document.addEventListener('DOMContentLoaded', function() {
  const faqPageSlider = new Swiper('#faq-page-slider', {
    slidesPerView: 1,
    pagination: {
      el: '#faq-page-slider-pagination',
      clickable: false,
    },
    loop: false, // true
    effect: 'fade',
    speed: 500,
    autoplay: {
      delay: 3000,
    },
    allowTouchMove: false,
  });

  faqPageSlider.init();
});
</script>

<?php get_footer(); ?>