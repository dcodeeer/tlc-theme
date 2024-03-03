<?php
  get_header(); 
  /* Template Name: staff-testimonials */
?>

<div class='staff-testimonials-page'>
  <div class='animate-header'>
    <div class='staff-testimonials-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>

      <div class='container'>
        <div class='H1'><?php echo get_field('first_section_title'); ?></div>
        <div class='body-1'><?php echo get_field('first_section_description'); ?>​</div>
      </div>
    </div>
  </div>
  
  <div class='animate-content'>

    <div class='staff-testimonials-second container'>
      <div class='slider' id='staff-testimonials-slider'>
        <div class='swiper-wrapper'>

          <?php
          $images = get_field('second_section_slider');
          if (!$images) $images = array();
          foreach ($images as $image) {
          ?>
            <div class='swiper-slide'><img src='<?php echo $image; ?>' /></div>
          <?php } ?>

        </div>

        <div class='pagination' id='staff-testimonials-slider-pagination'></div>
      </div>
    </div>

    <div class='fifth container'>
      <div class='H1'>Our revreviews</div>
      <div class='list'>
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

    <div class='sixth container'>
      <?php 
      $items = get_field('sixth');
      foreach ($items as $item):
      ?>
      <a class='block' href='https://www.google.com/search?q=tlc+nursing&rlz=1C5CHFA_enNL1037NL1043&oq=&gs_lcrp=EgZjaHJvbWUqCQgAECMYJxjqAjIJCAAQIxgnGOoCMgkIARAjGCcY6gIyCQgCECMYJxjqAjIJCAMQIxgnGOoCMgkIBBAjGCcY6gIyCQgFECMYJxjqAjIJCAYQIxgnGOoCMgkIBxAjGCcY6gLSAQkxMjU1ajBqMTWoAgiwAgE&sourceid=chrome&ie=UTF-8#lrd=0x4cca7bd794725d67:0x501e03a85c9f2cf8,1'>
        <div class='top'>
          <img src='<?php echo $item['image']; ?>' />
          <div class='H4'><?php echo $item['name']; ?></div>
          <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.6355 9.20438H19.8971V9.16634H11.6471V12.833H16.8277C16.0719 14.9675 14.041 16.4997 11.6471 16.4997C8.60976 16.4997 6.14714 14.037 6.14714 10.9997C6.14714 7.9623 8.60976 5.49967 11.6471 5.49967C13.0492 5.49967 14.3247 6.02859 15.2959 6.89255L17.8887 4.29976C16.2516 2.77397 14.0616 1.83301 11.6471 1.83301C6.58484 1.83301 2.48047 5.93738 2.48047 10.9997C2.48047 16.062 6.58484 20.1663 11.6471 20.1663C16.7094 20.1663 20.8138 16.062 20.8138 10.9997C20.8138 10.385 20.7506 9.78509 20.6355 9.20438Z" fill="#FFC107"/><path d="M3.53906 6.73305L6.55077 8.94176C7.36569 6.92417 9.33927 5.49967 11.6488 5.49967C13.0509 5.49967 14.3264 6.02859 15.2976 6.89255L17.8904 4.29976C16.2532 2.77397 14.0633 1.83301 11.6488 1.83301C8.1279 1.83301 5.07448 3.8208 3.53906 6.73305Z" fill="#FF3D00"/><path d="M11.6489 20.167C14.0167 20.167 16.1681 19.2609 17.7947 17.7873L14.9576 15.3866C14.0064 16.11 12.844 16.5013 11.6489 16.5003C9.26466 16.5003 7.2402 14.98 6.47753 12.8584L3.48828 15.1615C5.00536 18.1301 8.08628 20.167 11.6489 20.167Z" fill="#4CAF50"/><path d="M20.6368 9.20503H19.8984V9.16699H11.6484V12.8337H16.829C16.4674 13.8495 15.8162 14.7372 14.9558 15.387L14.9571 15.3861L17.7942 17.7869C17.5935 17.9693 20.8151 15.5837 20.8151 11.0003C20.8151 10.3857 20.7519 9.78574 20.6368 9.20503Z" fill="#1976D2"/></svg>
        </div>
        <div class='content'>
          <div class='stars'>
            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.50076 0.21875L6.72811 5.83719L0.530762 6.73297L5.01576 11.1083L3.95545 17.2812L9.50076 14.3684L15.0461 17.2812L13.9858 11.1083L18.4708 6.73906L12.2734 5.83719L9.50076 0.21875Z" fill="#FFBF39"/></svg>
          </div>
          <div class='date body-3'><?php echo $item['date']; ?></div>
          <div class='bottom'>
            <svg class='left' width="18" height="13" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.213 7.25C6.129 8.024 5.905 8.642 5.515 9.19C4.992 9.921 4.115 10.604 2.665 11.33C2.57198 11.3709 2.48824 11.4303 2.41886 11.5045C2.34948 11.5787 2.29591 11.6663 2.2614 11.7619C2.2269 11.8575 2.21217 11.9591 2.21812 12.0605C2.22407 12.1619 2.25057 12.2611 2.29601 12.352C2.34146 12.4429 2.40489 12.5236 2.48248 12.5892C2.56006 12.6548 2.65017 12.704 2.74733 12.7337C2.84449 12.7635 2.94669 12.7732 3.04771 12.7622C3.14873 12.7513 3.24647 12.7199 3.335 12.67C4.885 11.896 6.008 11.079 6.735 10.06C7.476 9.024 7.75 7.857 7.75 6.5V2C7.75 1.53587 7.56563 1.09075 7.23744 0.762563C6.90925 0.434375 6.46413 0.25 6 0.25H2C1.53587 0.25 1.09075 0.434375 0.762563 0.762563C0.434375 1.09075 0.25 1.53587 0.25 2V5.5C0.25 6.466 1.034 7.25 2 7.25H6.213ZM16.213 7.25C16.129 8.024 15.905 8.642 15.515 9.19C14.992 9.921 14.115 10.604 12.665 11.33C12.572 11.3709 12.4882 11.4303 12.4189 11.5045C12.3495 11.5787 12.2959 11.6663 12.2614 11.7619C12.2269 11.8575 12.2122 11.9591 12.2181 12.0605C12.2241 12.1619 12.2506 12.2611 12.296 12.352C12.3415 12.4429 12.4049 12.5236 12.4825 12.5892C12.5601 12.6548 12.6502 12.704 12.7473 12.7337C12.8445 12.7635 12.9467 12.7732 13.0477 12.7622C13.1487 12.7513 13.2465 12.7199 13.335 12.67C14.885 11.896 16.008 11.079 16.735 10.06C17.476 9.024 17.75 7.857 17.75 6.5V2C17.75 1.53587 17.5656 1.09075 17.2374 0.762563C16.9092 0.434375 16.4641 0.25 16 0.25H12C11.5359 0.25 11.0908 0.434375 10.7626 0.762563C10.4344 1.09075 10.25 1.53587 10.25 2V5.5C10.25 6.466 11.034 7.25 12 7.25H16.213Z" fill="#4D9FFF"/></svg>
            <p class='body-2'><?php echo $item['text']; ?></p>
            <svg class='right' width="19" height="13" viewBox="0 0 19 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.4354 5.75C12.5194 4.976 12.7434 4.358 13.1334 3.81C13.6564 3.079 14.5334 2.396 15.9834 1.67C16.0765 1.62911 16.1602 1.56974 16.2296 1.49549C16.299 1.42125 16.3525 1.33368 16.387 1.23811C16.4215 1.14253 16.4363 1.04094 16.4303 0.939505C16.4244 0.838065 16.3979 0.738893 16.3524 0.648006C16.307 0.55712 16.2435 0.476417 16.166 0.410793C16.0884 0.34517 15.9983 0.295996 15.9011 0.266256C15.8039 0.236517 15.7017 0.226833 15.6007 0.237791C15.4997 0.248749 15.402 0.280119 15.3134 0.33C13.7634 1.104 12.6404 1.921 11.9134 2.94C11.1724 3.976 10.8984 5.143 10.8984 6.5V11C10.8984 11.4641 11.0828 11.9092 11.411 12.2374C11.7392 12.5656 12.1843 12.75 12.6484 12.75H16.6484C17.1126 12.75 17.5577 12.5656 17.8859 12.2374C18.2141 11.9092 18.3984 11.4641 18.3984 11V7.5C18.3984 6.534 17.6144 5.75 16.6484 5.75L12.4354 5.75ZM2.43544 5.75C2.51944 4.976 2.74344 4.358 3.13344 3.81C3.65644 3.079 4.53344 2.396 5.98344 1.67C6.07646 1.62911 6.1602 1.56974 6.22958 1.49549C6.29896 1.42125 6.35253 1.33368 6.38703 1.23811C6.42154 1.14253 6.43627 1.04094 6.43032 0.939505C6.42437 0.838065 6.39787 0.738893 6.35242 0.648006C6.30698 0.55712 6.24354 0.476417 6.16596 0.410793C6.08838 0.34517 5.99827 0.295996 5.90111 0.266256C5.80394 0.236517 5.70175 0.226833 5.60073 0.237791C5.49971 0.248749 5.40197 0.280119 5.31344 0.33C3.76344 1.104 2.64044 1.921 1.91344 2.94C1.17244 3.976 0.898438 5.143 0.898438 6.5V11C0.898438 11.4641 1.08281 11.9092 1.411 12.2374C1.73919 12.5656 2.18431 12.75 2.64844 12.75H6.64844C7.11257 12.75 7.55769 12.5656 7.88587 12.2374C8.21406 11.9092 8.39844 11.4641 8.39844 11V7.5C8.39844 6.534 7.61444 5.75 6.64844 5.75H2.43544Z" fill="#4D9FFF"/></svg>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class='fourth'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
      const staffTestSlider = new Swiper('#staff-testimonials-slider', {
      autoplay: {
        delay: 3000,
      },

      pagination: {
        el: '#staff-testimonials-slider-pagination',
        clickable: true,
      },
      
      breakpoints: {
        320: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 10,
          grid: {
            rows: 2,
            fill: 'row',
          },
        },
        768: {
          slidesPerView: 2,
          slidesPerGroup: 2,
          spaceBetween: 30,
          grid: {
            rows: 2,
            fill: 'row',
          },
        },
        1100: {
          slidesPerView: 2,
          slidesPerGroup: 2,
          spaceBetween: 30,
          grid: {
            rows: 2,
            fill: 'row',
          },
        }
      }
    });
      staffTestSlider.init();
});

    
    </script>
  </div>
</div>


<?php get_footer(); ?>