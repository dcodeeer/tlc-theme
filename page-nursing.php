<?php
get_header();
/* Template Name: nursing */
?>
<div class='nursing-page'>

<div class='breadcrumbs'>
  <div class='container H5'>
    <a href='<?php echo SEARCH_JOBS_LINK; ?>'>Search Jobs</a>
    <a href='/career/cna-lna-licensing'>CNA/LNA Licensing</a>
    <a href='/career/lpn-rn-licensing'>LNP/RN Licensing</a>
    <a href='/career/staff-testimonials'>Staff testimonials</a>
    <a href='/career/benefits'>Benefits</a>
    <a href='/team/referral'>Referral program</a>
    <a href='/career/getting-started-with-tlc'>Getting started with Us</a>
    <a href='/faq'>FAQ</a>
    <a href='/team/paycheck'>Paycheck</a>
  </div>
</div>

<div class='first'>
  <div class='container'>
    <div class='left'>
      <div class='H2'><?php echo get_field('first_title') ?></div>
      <div class='body-2'><?php echo get_field('first_text') ?></div>
      <a class='button' href='/'>SEARCH TRAVEL JOBS</a>
    </div>
    <div class='right'>
      <img src='<?php echo get_field('first_image_1') ?>' />
      <img src='<?php echo get_field('first_image_2') ?>' />
    </div>
  </div>
</div>

<div class='second container'>
  <div class='left'>
    <div class='H1 blue'><?php echo get_field('second_title') ?></div>
    <div class='body-2'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</div>
    <div class='body-2 blue'>To fully address the demands of Home Health in Vermont and New Hampshire, our staff is made up of:</div>
  </div>
  <div class='right'>
    <iframe
        src="https://www.youtube.com/embed/<?php echo get_field('second_youtube_video_id') ?>"
        title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen></iframe>
  </div>
</div>

<div class='third container'>
  <div class='H2'><?php echo get_field('third_title') ?></div>
  <div class='box H4'>
    <div class='left'>ADVANTAGES</div>
    <div class='right'>
      <?php foreach (get_field('third_list') as $row): ?>
      <div class='row'>
        <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.7533 0.667969C19.4809 1.08456 14.29 5.72183 9.96521 12.4256C9.63084 12.9408 9.31292 13.4561 9.01144 13.9659C9.01144 13.9659 9.01144 13.9659 9.00596 13.9604C9.00048 13.9659 9.00048 13.9714 8.995 13.9768C8.29338 13.2752 7.53694 12.5736 6.73665 11.8884C6.36392 11.5705 5.99118 11.2635 5.62393 10.9621L0 14.5195C2.57078 15.7254 4.81268 17.1615 6.55577 18.647C6.55577 18.6415 6.56125 18.636 6.56125 18.6306C7.6082 19.524 8.47974 20.4394 9.12655 21.3329C9.41158 20.9108 9.7021 20.4888 10.0036 20.0612C10.6613 19.1239 11.3301 18.2249 11.9988 17.3698L12.0043 17.3753C16.4662 11.6472 20.9006 7.86506 23 8.02402L22.7533 0.667969Z" fill="#15D199"/></svg>
        <div class='text'><?php echo $row['text']; ?></div>
      </div>
      <?php endforeach; ?>
      
    </div>
  </div>
</div>

<div class='fourth container'>
  <div class='left'>
    <div class='content'>
      <div class='slider-wrapper'>
        <div class='slider-container' id='slider'>
          <div class='swiper-wrapper'>
            <div class='swiper-slide'>
              <div class='H3'>What Our Staffs Say</div>
              <div class='body-2'>“I enjoy being here in the Green Mountain State! I love the different weather and the people are nice! I love the TLC brand and their staff has been wonderful every time! I enjoy working in Assisted Living and meeting new clients and their families!”</div>
              <div class='author'>Phyllis Meadows, LPN</div>
            </div>
            <div class='swiper-slide'>
              <div class='H3'>What Our Staffs Say</div>
              <div class='body-2'>“Brittney and the staff are great to work with. My contract is going exactly as I expected and the process to renew my contract was easy thanks to the TLC staff. I look forward to my next assignment. Additional for today”</div>
              <div class='author'>Keith Mulligan, MNT</div>
            </div>
            <div class='swiper-slide'>
              <div class='H3'>What Our Staffs Say</div>
              <div class='body-2'>“I've been with TLC for two years and it's been a positive experience. Brittany, my recruiter, is particularly supportive. I hope for more state options in the future, but I've enjoyed my contracts so far and plan to continue”</div>
              <div class='author'>Valencia, LNA</div>
            </div>
          </div>
          <div class='pagination'></div>
        </div>
        <button id='next'><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="34.84 18 37 37"><g opacity="0.3"><g filter="url(#filter0_ddddd_5393_21140)"><circle cx="53.3423" cy="36.5" r="18.5" fill="#EEF5FF"></circle><circle cx="53.3423" cy="36.5" r="17.5" stroke="#91C3FF" stroke-width="2"></circle></g><path d="M53.3807 29L59.8423 35.5M59.8423 35.5L53.3807 42M59.8423 35.5H45.8423" stroke="#91C3FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><filter id="filter0_ddddd_5393_21140" x="0.572365" y="0.457059" width="105.54" height="110.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_5393_21140"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_5393_21140" result="effect2_dropShadow_5393_21140"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_5393_21140" result="effect3_dropShadow_5393_21140"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_5393_21140" result="effect4_dropShadow_5393_21140"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_5393_21140" result="effect5_dropShadow_5393_21140"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_5393_21140" result="shape"></feBlend></filter></defs></svg></button>
      </div>
      <a class='button H4' href='/career/staff-testimonials'>READ OUR REVIEWS</a>
    </div>
    <img id='slider-image'src='' />
  </div>
  <div class='right'>
    <div class='block'>
      <div class='top'>
        <div class='head'>
        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="17.5" cy="17.5" r="17.5" fill="#4C9FFF"/><path d="M15.5662 27.563V18.801C15.8212 18.824 16.0662 18.836 16.3242 18.836C17.5472 18.836 18.6982 18.516 19.6742 17.943V27.561C19.6742 28.383 19.4792 28.99 19.0992 29.395C18.7212 29.798 18.2192 30 17.6082 30C17.0082 30 16.5312 29.798 16.1402 29.382C15.7622 28.979 15.5662 28.372 15.5662 27.563ZM15.5892 6.56598C18.1342 5.67298 21.0312 5.72098 23.2082 7.55298C23.6132 7.92198 24.0752 8.38598 24.2592 8.93298C24.4792 9.62498 23.4892 8.85998 23.3532 8.76598C22.6432 8.31298 21.9352 7.93298 21.1412 7.67198C16.8602 6.38698 12.8122 8.70898 10.2952 12.315C9.24319 13.909 8.55819 15.587 7.99519 17.432C7.93519 17.634 7.88619 17.897 7.77519 18.074C7.66319 18.277 7.72719 17.528 7.72719 17.504C7.81119 16.741 7.97119 16.004 8.16819 15.267C9.33019 11.337 11.8972 8.06598 15.5902 6.56598M20.5182 13.625C20.5182 14.4259 20.2 15.1941 19.6337 15.7604C19.0673 16.3268 18.2991 16.645 17.4982 16.645C16.6972 16.645 15.9291 16.3268 15.3627 15.7604C14.7964 15.1941 14.4782 14.4259 14.4782 13.625C14.4782 12.824 14.7964 12.0559 15.3627 11.4895C15.9291 10.9232 16.6972 10.605 17.4982 10.605C18.2991 10.605 19.0673 10.9232 19.6337 11.4895C20.2 12.0559 20.5182 12.824 20.5182 13.625Z" fill="currentColor"/></svg>
          <div class='H4'>Indeed</div>
        </div>
        <div class='stars'>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
        </div>
      </div>
      <div class='bottom body-2'>
        <a href='<?php echo get_field('fourth_indeed_see_link'); ?>'>See all Indeed reviews</a>
        <a href='<?php echo get_field('fourth_indeed_write_link'); ?>'>Write a Indeed review</a>
      </div>
    </div>
    <div class='block'>
      <div class='top'>
        <div class='head'>
          <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35 17.5439C35 7.85965 27.16 0 17.5 0C7.84 0 0 7.85965 0 17.5439C0 26.0351 6.02 33.1053 14 34.7368V22.807H10.5V17.5439H14V13.1579C14 9.77193 16.7475 7.01754 20.125 7.01754H24.5V12.2807H21C20.0375 12.2807 19.25 13.0702 19.25 14.0351V17.5439H24.5V22.807H19.25V35C28.0875 34.1228 35 26.6491 35 17.5439Z" fill="#4D9FFF"/></svg>
          <div class='H4'>Google</div>
        </div>
        <div class='stars'>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
        </div>
      </div>
      <div class='bottom body-2'>
        <a href='<?php echo get_field('fourth_google_see_link'); ?>'>See all Google reviews</a>
        <a href='<?php echo get_field('fourth_google_write_link'); ?>'>Write a Google review</a>
      </div>
    </div>
    <div class='block'>
      <div class='top'>
        <div class='head'>
          <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="17.5" cy="17.5" r="17.5" fill="#4C9FFF"/><path d="M21.4294 25.1419H10.0006C10.0003 25.8995 10.3009 26.6262 10.8363 27.1621C11.3717 27.6981 12.098 27.9995 12.8556 28H21.4269C21.8022 28.0001 22.1739 27.9262 22.5207 27.7826C22.8675 27.639 23.1826 27.4285 23.4481 27.1631C23.7135 26.8976 23.924 26.5825 24.0676 26.2357C24.2112 25.8889 24.2851 25.5172 24.285 25.1419V13.41C24.2852 13.3962 24.2826 13.3826 24.2774 13.3699C24.2722 13.3571 24.2645 13.3455 24.2548 13.3358C24.2451 13.3261 24.2335 13.3184 24.2208 13.3132C24.208 13.308 24.1944 13.3055 24.1806 13.3056H21.5306C21.5171 13.3058 21.5038 13.3086 21.4914 13.314C21.4791 13.3193 21.4679 13.3271 21.4585 13.3368C21.4491 13.3465 21.4418 13.358 21.4369 13.3705C21.432 13.3831 21.4297 13.3965 21.43 13.41V25.145L21.4294 25.1419ZM21.4294 8C22.187 8.0005 22.9133 8.30188 23.4487 8.83786C23.9841 9.37385 24.2847 10.1005 24.2844 10.8581H12.8588V22.59C12.8581 22.6175 12.8469 22.6437 12.8275 22.6631C12.808 22.6825 12.7819 22.6937 12.7544 22.6944H10.1044C10.0767 22.6942 10.0503 22.6832 10.0308 22.6636C10.0112 22.6441 10.0002 22.6176 10 22.59V10.8581C9.99967 10.1005 10.3003 9.37385 10.8357 8.83786C11.3711 8.30188 12.0974 8.0005 12.855 8H21.4294Z" fill="currentColor"/></svg>
          <div class='H4'>Glassdoor</div>
        </div>
        <div class='stars'>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
        </div>
      </div>
      <div class='bottom body-2'>
        <a href='<?php echo get_field('fourth_glassdoor_see_link'); ?>'>See all Glassdoor reviews</a>
        <a href='<?php echo get_field('fourth_glassdoor_write_link'); ?>'>Write a Glassdoor review</a>
      </div>
    </div>
  </div>
</div>

<div class='fifth container'>
  <img src='<?php echo get_field('fifth_image'); ?>' />
  <div class='content'>
    <div class='H3'>BLOG</div>
    <div class='box'>
      <?php
        $args = array(
          'numberposts' => 6,
          'category'    => 0,
          'orderby'     => 'date',
          'order'       => 'DESC',
          'include'     => array(),
          'exclude'     => array(),
          'meta_key'    => '',
          'meta_value'  => '',
          'post_type'   => 'post',
          'suppress_filters' => true,
          'post_status' => 'publish',
        );
      
          $posts = get_posts($args);
          foreach ($posts as $post) :
            setup_postdata( $post );
      
        ?>
      <div class='row'>
        <a href='<?php the_permalink(); ?>' class='H4'>
          <span><?php the_title(); ?></span>
          <svg width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_5393_20997)"><path d="M1.06055 5.62305H13.4739" stroke="#616F8A" stroke-width="2.375" stroke-miterlimit="20" stroke-linecap="square"/><path d="M8.9541 10.5107L14.2874 5.62262L8.9541 0.733116" stroke="#616F8A" stroke-width="2.375" stroke-miterlimit="20"/></g><defs><clipPath id="clip0_5393_20997"><rect width="16" height="11" fill="white" transform="translate(0.140625 0.046875)"/></clipPath></defs></svg>
        </a>
        <div class='body-2'><?php echo wp_get_post_categories(get_the_ID(), array('fields' => 'names'))[0]; ?></div>
      </div>
      <?php
          endforeach;
          wp_reset_postdata();
        ?>
    </div>
  </div>
</div>

<div class='sixth'>
  <div class='container'>
    <img src='<?php echo get_field('sixth_image'); ?>' />
    <div class='right'>
      <div class='H1'><?php echo get_field('sixth_title'); ?></div>
      <div class='body-1'><?php echo get_field('sixth_text'); ?></div>
      <div class='markets'>
        <a class='market' href='<?php the_field('appstore_link', 'option'); ?>'>
          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.497 24.997C20.1401 26.3162 18.6586 26.1079 17.2325 25.483C15.7233 24.8442 14.3388 24.8164 12.7465 25.483C10.7527 26.344 9.70042 26.0941 8.50968 24.997C1.75294 18.0117 2.74983 7.3742 10.4204 6.98536C12.2896 7.08257 13.5911 8.013 14.6849 8.09633C16.3187 7.76303 17.8833 6.80482 19.6278 6.92981C21.7186 7.09645 23.297 7.92968 24.3354 9.42949C20.0155 12.0264 21.0401 17.734 25 19.331C24.2108 21.4141 23.1862 23.4833 21.4832 25.0109L21.497 24.997ZM14.5464 6.90203C14.3388 3.8052 16.8448 1.24997 19.7248 1C20.1263 4.58288 16.4848 7.24921 14.5464 6.90203Z" fill="white"/>
          </svg>
          <div class='right'>
            <div class='body-3'>Download on the</div>
            <div class='H4'>App Store</div>
          </div>
        </a>
        <a class='market' href='<?php the_field('google_play_link', 'option'); ?>'>
          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.5 15L5 23.2547C5.10327 23.6063 5.28886 23.9305 5.54257 24.2026C5.79628 24.4747 6.1114 24.6874 6.46383 24.8246C6.81627 24.9618 7.1967 25.0198 7.57603 24.9941C7.95537 24.9684 8.32357 24.8597 8.65248 24.6764L19 19.0157L14.5 15Z" fill="#EA4335"/>
            <path d="M5.08578 6.5C5.02784 6.67984 4.99899 7.36541 5.00003 7.55171V22.4482C5.00063 22.6345 5.02944 23.3199 5.08578 23.5L15 14.7841L5.08578 6.5Z" fill="#4285F4"/>
            <path d="M23.6857 13.1793L19.1291 11L14.5 15.0116L19 19L23.6719 16.8441C24.0725 16.669 24.408 16.4056 24.6421 16.0826C24.8762 15.7596 25 15.3892 25 15.0116C25 14.6341 24.8762 14.2637 24.6421 13.9407C24.408 13.6177 24.0725 13.3543 23.6719 13.1792L23.6857 13.1793Z" fill="#FBBC04"/>
            <path d="M14.5 15L19 11L8.68138 5.31875C8.29315 5.11107 7.85159 5.00109 7.40168 5C6.2852 4.99802 5.30363 5.67486 5 6.65629L14.5 15Z" fill="#34A853"/>
            </svg>            
          <div class='right'>
            <div class='body-3'>Get it on</div>
            <div class='H4'>Google Play</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

</div>

<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', () => {
  const slider = new Swiper('#slider', {
    init: false,
    navigation: {
      nextEl: '#next',
    },
    pagination: {
      el: '.pagination'
    },
    loop: true,
  });

  const images = [
    '<?php echo IMAGES . 'nursing/1.png'; ?>',
    '<?php echo IMAGES . 'nursing/2.png'; ?>',
    '<?php echo IMAGES . 'nursing/3.png'; ?>',
  ];

  slider.on('slideChange', (swiper) => {
    document.querySelector('#slider-image').src = images[swiper.realIndex];
  });

  slider.on('init', (swiper) => {
    document.querySelector('#slider-image').src = images[0];
  });

  slider.init();
});
</script>
<?php get_footer(); ?>