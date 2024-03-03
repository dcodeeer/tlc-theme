<?php
get_header();
/* Template Name: career */
?>

<div class='career'>
  <div class='career-first animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>

    <img src='<?php the_post_thumbnail_url('full'); ?>' />
  </div>
  <div class='animate-content'>
    <div class='career-second container'>
      <div class='title H0'><?php echo get_field('first_section_title'); ?></div>
      <div class='description H3'><?php echo wpautop(get_field('first_section_description')); ?></div>
    </div>
    <div class='career-third container'>
      <div class='left'>
        <div class='title H1'><?php echo get_field('second_section_title'); ?></div>
        <div class='content'><?php echo wpautop(get_field('second_section_content')); ?></div>
        
      </div>
      <img src='<?php echo get_field('second_section_image'); ?>' />
    </div>
    <div class='career-fourth'>
      <div class='container'>
        <div class='title H1'><?php echo get_field('third_section_title'); ?></div>

        <div class='slider' id='career-page-slider'>

          <div class='swiper-wrapper'>
            <?php
            $my_posts = get_posts(array(
              'numberposts' => -1,
              'category'    => 0,
              'orderby'     => 'date',
              'order'       => 'ASC',
              'include'     => array(),
              'exclude'     => array(),
              'meta_key'    => '',
              'meta_value'  => '',
              'post_type'   => 'testimonials',
              'suppress_filters' => true,
            ));
    
            foreach ($my_posts as $post) {
              setup_postdata($post);?>
            <div class='swiper-slide'>
              <div class='top'>
                <img src='<?php the_post_thumbnail_url('full'); ?>' />
                <div class='info'>
                  <div class='name'><?php the_title(); ?></div>
                  <div class='from'><?php echo get_field('location'); ?></div>
                  <div class='bot'>
                    <div class='score'>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0008 1.25L7.15703 7.0125L0.800781 7.93125L5.40078 12.4188L4.31328 18.75L10.0008 15.7625L15.6883 18.75L14.6008 12.4188L19.2008 7.9375L12.8445 7.0125L10.0008 1.25Z" fill="#FFBF39"/></svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0008 1.25L7.15703 7.0125L0.800781 7.93125L5.40078 12.4188L4.31328 18.75L10.0008 15.7625L15.6883 18.75L14.6008 12.4188L19.2008 7.9375L12.8445 7.0125L10.0008 1.25Z" fill="#FFBF39"/></svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0008 1.25L7.15703 7.0125L0.800781 7.93125L5.40078 12.4188L4.31328 18.75L10.0008 15.7625L15.6883 18.75L14.6008 12.4188L19.2008 7.9375L12.8445 7.0125L10.0008 1.25Z" fill="#FFBF39"/></svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0008 1.25L7.15703 7.0125L0.800781 7.93125L5.40078 12.4188L4.31328 18.75L10.0008 15.7625L15.6883 18.75L14.6008 12.4188L19.2008 7.9375L12.8445 7.0125L10.0008 1.25Z" fill="#FFBF39"/></svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0008 1.25L7.15703 7.0125L0.800781 7.93125L5.40078 12.4188L4.31328 18.75L10.0008 15.7625L15.6883 18.75L14.6008 12.4188L19.2008 7.9375L12.8445 7.0125L10.0008 1.25Z" fill="#FFBF39"/></svg>
                    </div>
                    <div class='date'><?php echo get_field('date'); ?></div>
                  </div>
                </div>
                
              </div>
              <div class='bottom body-2'>“<?php echo get_field('content'); ?>”</div>
            </div>
            <?php } wp_reset_postdata();?>

          </div>

          <div class='pagination' id='career-page-slider-pagination'></div>

        </div>
      </div>
    </div>
    <div class='career-fifth container'>
      <div class='left'>
        <img src='<?php echo get_field('fourth_section_image'); ?>' />
        <div class='info H5'><?php echo get_field('fourth_section_text'); ?></div>
      </div>
      <div class='right'>
        <div class='title H2'>Our Promise to You</div>
        
        <div class='list'>

          <div class='block'>
            <div class='icon'><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M32.4834 16.8496C31.442 16.168 30.1845 15.8819 28.9449 16.0445C27.7053 16.2071 26.5678 16.8073 25.744 17.7336L22.4414 21.442C22.1524 20.6617 21.6276 19.9873 20.9374 19.5095C20.2473 19.0318 19.4251 18.7737 18.5814 18.7699H17.6216C17.1033 18.7691 16.5969 18.6171 16.1664 18.333C14.306 17.1148 12.0749 16.5677 9.8514 16.7844C7.62794 17.001 5.54905 17.9682 3.96736 19.5217L0.303522 23.1286C0.10918 23.3199 0 23.5794 0 23.85C0 24.1205 0.10918 24.38 0.303522 24.5713C0.497865 24.7627 0.761449 24.8701 1.03629 24.8701C1.31113 24.8701 1.57472 24.7627 1.76906 24.5713L5.4329 20.9645C6.67372 19.7395 8.30805 18.9767 10.0568 18.8062C11.8054 18.6357 13.56 19.0682 15.0208 20.0298C15.7907 20.5354 16.6961 20.8042 17.6216 20.8019H18.5814C19.1289 20.8019 19.6539 21.016 20.041 21.3971C20.4281 21.7782 20.6456 22.295 20.6456 22.834H13.4211C13.1474 22.834 12.8849 22.941 12.6913 23.1315C12.4978 23.3221 12.389 23.5805 12.389 23.85C12.389 24.1194 12.4978 24.3779 12.6913 24.5684C12.8849 24.7589 13.1474 24.866 13.4211 24.866H21.6776C21.8232 24.8631 21.9665 24.8299 22.0982 24.7686C22.2298 24.7074 22.3468 24.6193 22.4414 24.5104L27.2818 19.0645C27.6599 18.6426 28.1493 18.3319 28.6958 18.1669C29.2423 18.0019 29.8245 17.9891 30.378 18.1298L23.1225 27.7108C22.8341 28.0894 22.4602 28.3966 22.0302 28.6083C21.6003 28.8199 21.1262 28.93 20.6456 28.93H12.0381C11.36 28.9289 10.6883 29.0593 10.0614 29.3138C9.43451 29.5683 8.86472 29.942 8.38461 30.4134L7.528 31.2567C7.43126 31.3512 7.35448 31.4635 7.30208 31.5874C7.24969 31.7112 7.22271 31.844 7.22271 31.9781C7.22271 32.1122 7.24969 32.245 7.30208 32.3688C7.35448 32.4926 7.43126 32.605 7.528 32.6995C7.62394 32.7947 7.73809 32.8703 7.86385 32.9219C7.98962 32.9734 8.12452 33 8.26076 33C8.39701 33 8.53191 32.9734 8.65767 32.9219C8.78344 32.8703 8.89759 32.7947 8.99353 32.6995L9.85015 31.8562C10.4302 31.2844 11.2172 30.9628 12.0381 30.9621H20.6456C21.4467 30.9621 22.2368 30.7785 22.9533 30.4258C23.6699 30.0731 24.2932 29.561 24.7738 28.93L32.824 18.3635C32.9792 18.122 33.0346 17.8311 32.9788 17.5507C32.9085 17.2642 32.7317 17.0141 32.4834 16.8496Z" fill="currentColor"/><path d="M22 14H18C17.7348 14 17.4804 13.8946 17.2929 13.7071C17.1054 13.5196 17 13.2652 17 13V10H14C13.7348 10 13.4804 9.89464 13.2929 9.70711C13.1054 9.51957 13 9.26522 13 9V5C13 4.73478 13.1054 4.48043 13.2929 4.29289C13.4804 4.10536 13.7348 4 14 4H17V1C17 0.734784 17.1054 0.48043 17.2929 0.292893C17.4804 0.105357 17.7348 0 18 0L22 0C22.2652 0 22.5196 0.105357 22.7071 0.292893C22.8946 0.48043 23 0.734784 23 1V4H26C26.2652 4 26.5196 4.10536 26.7071 4.29289C26.8946 4.48043 27 4.73478 27 5V9C27 9.26522 26.8946 9.51957 26.7071 9.70711C26.5196 9.89464 26.2652 10 26 10H23V13C23 13.2652 22.8946 13.5196 22.7071 13.7071C22.5196 13.8946 22.2652 14 22 14ZM19 12H21V9C21 8.73478 21.1054 8.48043 21.2929 8.29289C21.4804 8.10536 21.7348 8 22 8H25V6H22C21.7348 6 21.4804 5.89464 21.2929 5.70711C21.1054 5.51957 21 5.26522 21 5V2H19V5C19 5.26522 18.8946 5.51957 18.7071 5.70711C18.5196 5.89464 18.2652 6 18 6H15V8H18C18.2652 8 18.5196 8.10536 18.7071 8.29289C18.8946 8.48043 19 8.73478 19 9V12Z" fill="currentColor"/></svg></div>
            <div class='text body-1'>Our staff will treat each client with respect and dignity.</div>
          </div>

          <div class='block'>
            <div class='icon'><svg xmlns="http://www.w3.org/2000/svg" width="28" height="25" viewBox="0 0 28 25" fill="none"><path d="M15.1429 8H12.8571V10.5H10V12.5H12.8571V15H15.1429V12.5H18V10.5H15.1429V8Z" fill="currentColor"/><path d="M26.8901 3.57984C26.2889 2.6012 25.4653 1.77094 24.4832 1.15338C23.501 0.53582 22.3866 0.147526 21.2262 0.0185694C20.2914 -0.044916 19.3525 0.0546852 18.4534 0.312716C16.957 0.768234 15.5634 1.49921 14.3479 2.46629L13.9932 2.77094L13.8643 2.66589C13.2314 2.15887 12.5554 1.70551 11.8437 1.31071C10.3206 0.390454 8.54908 -0.0598326 6.76024 0.0185694C6.24147 0.0576584 5.72922 0.156389 5.23411 0.312716C4.11168 0.698114 3.10133 1.34329 2.28933 2.19315C1.85341 2.62259 1.45441 3.08639 1.09637 3.57984C-2.98764 9.3262 5.29859 18.0245 10.2101 22.3947C10.812 22.941 11.3709 23.4452 11.8437 23.8024C12.5423 24.3907 13.0689 24.8004 13.3269 25H14.6596C16.4759 23.6028 32.2638 11.0806 26.8901 3.57984ZM13.9932 22.8254L13.4773 22.3947C12.9722 21.985 12.4026 21.5123 11.8437 20.9975C6.82472 16.5223 -0.0750978 8.90599 2.88043 4.78794C3.49189 3.86831 4.32622 3.11051 5.30934 2.58184C5.81367 2.32431 6.36528 2.16719 6.93219 2.11961C7.06453 2.10918 7.19751 2.10918 7.32985 2.11961C8.01214 2.12645 8.68822 2.24724 9.32886 2.47679L9.82324 2.66589C10.5356 2.97382 11.2128 3.3541 11.8437 3.80045C12.3349 4.13574 12.7984 4.50806 13.2302 4.914H14.767C15.8121 3.92413 17.0367 3.13324 18.3782 2.58184C19.2182 2.22868 20.1305 2.07047 21.0435 2.11961C21.1579 2.10946 21.273 2.10946 21.3874 2.11961C22.1573 2.28023 22.8851 2.59454 23.5249 3.04285C24.1648 3.49116 24.7031 4.0638 25.106 4.72491C28.5129 9.54681 18.7973 18.928 13.9932 22.8254Z" fill="currentColor"/></svg></div>
            <div class='text body-1'>Our staff will give care you can count on.</div>
          </div>

          <div class='block'>
            <div class='icon'><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.6875 7.4375H22.3125V15.9375V28.6875H20.1875V19.125H13.8125V28.6875H11.6875V20.1875V7.4375ZM15.9375 28.6875H18.0625V21.25H15.9375V28.6875ZM22.3125 30.8125H11.6875H9.5625H3.1875V20.1875H9.5625V5.3125H24.4375V15.9375H30.8125V30.8125H24.4375H22.3125ZM9.5625 22.3125V28.6875H5.3125V22.3125H9.5625ZM24.4375 28.6875H28.6875V18.0625H24.4375V28.6875ZM15.9375 10.625V11.6875H14.875V13.8125H15.9375V14.875H18.0625V13.8125H19.125V11.6875H18.0625V10.625H15.9375Z" fill="currentColor"/></svg></div>
            <div class='text body-1'>Our staff will respect each client’s privacy.</div>
          </div>

          <div class='block'>
            <div class='icon'><svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17 4.45C11.7349 4.45 7.46667 8.66972 7.46667 13.875C7.46667 17.7933 9.8852 21.1531 13.3269 22.575H13.3341V22.578C14.4627 23.0431 15.701 23.3 17 23.3C18.2996 23.3 19.5385 23.0429 20.6675 22.5773V22.575H20.6731C24.1148 21.1531 26.5333 17.7933 26.5333 13.875C26.5333 8.66972 22.2651 4.45 17 4.45ZM22.1341 23.4952C25.6228 21.6718 28 18.0478 28 13.875C28 7.86888 23.0752 3 17 3C10.9248 3 6 7.86888 6 13.875C6 18.0485 8.37798 21.6729 11.8675 23.4961V31.275C11.8675 31.5424 12.0163 31.7881 12.2547 31.9142C12.4932 32.0404 12.7825 32.0265 13.0076 31.8783L17.0008 29.2464L20.994 31.8783C21.2191 32.0265 21.5084 32.0404 21.7469 31.9142C21.9853 31.7881 22.1341 31.5424 22.1341 31.275V23.4952ZM20.6675 24.1309C19.5204 24.5318 18.286 24.75 17 24.75C15.7146 24.75 14.4808 24.5321 13.3341 24.1315V29.9203L16.594 27.7717C16.8404 27.6094 17.1613 27.6094 17.4076 27.7717L20.6675 29.9203V24.1309ZM17.0008 8.8C14.1657 8.8 11.8675 11.0721 11.8675 13.875C11.8675 16.6778 14.1657 18.95 17.0008 18.95C19.8359 18.95 22.1341 16.6778 22.1341 13.875C22.1341 11.0721 19.8359 8.8 17.0008 8.8ZM10.4008 13.875C10.4008 10.2713 13.3557 7.35 17.0008 7.35C20.6459 7.35 23.6008 10.2713 23.6008 13.875C23.6008 17.4787 20.6459 20.4 17.0008 20.4C13.3557 20.4 10.4008 17.4787 10.4008 13.875Z" fill="currentColor"/></svg></div>
            <div class='text body-1'>Our staff will strive for excellence in their work.</div>
          </div>

          <div class='block'>
            <div class='icon'><svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none"><path d="M4 17.5L12.6667 26L30 9" stroke="#15D199" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <div class='text body-1'>Our staff will continuously adapt to improve the quality of care delivered.</div>
          </div>

        </div>

        <a class='button-6' href='#'>Get quote</a>
      </div>
    </div>
    <div class='career-sixth container'>
      <?php
      $list = get_field('fifth_section');
      foreach ($list as $item) {
      ?>
      <div class='block'>
        <div class='title H2'><?php echo $item['title']; ?></div>
        <p class='body-2'><?php echo $item['description']; ?></p>
      </div>

      <?php } ?>

    </div>
    <div class='career-seventh container'>
      <div class='left'>
        <div class='title H1'><?php echo get_field('sixth_section_title'); ?></div>

        <div class='content'>
          <div class='H4'><?php echo get_field('sixth_section_description'); ?></div>

          <div class='H4'><?php echo get_field('sixth_section_mini_title_1'); ?></div>
          <ul class='list body-2'>
            <?php 
            $list = get_field('sixth_section_list_1');
            foreach ($list as $item) {
            ?>
            <li><?php echo $item['item']; ?></li>
            <?php } ?>
          </ul>

          <div class='H4'><?php echo get_field('sixth_section_mini_title_2'); ?></div>
          <ul class='list body-2'>
            <?php 
            $list =  get_field('sixth_section_list_2');
            foreach ($list as $item) {
            ?>
            <li><?php echo $item['item']; ?></li>
            <?php } ?>
          </ul>

          <div class='H4'><?php echo get_field('sixth_section_bottom_text'); ?></div>

        </div>

      </div>

      <img src='<?php echo get_field('sixth_section_image'); ?>' />
    </div>
    <div class='eighth'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>
</div>

<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', function() {
  const careerPageSlider = new Swiper('#career-page-slider', {
    pagination: {
      el: '#career-page-slider-pagination',
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      1100: {
        slidesPerView: 3,
        spaceBetween: 30
      },
    },
	});

	careerPageSlider.init();
});
</script>

<?php get_footer(); ?>