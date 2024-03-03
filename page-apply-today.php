<?php
  get_header();
  /* Template Name: apply-today */
?>

<?php

$db_host = DB_HOST;
$db_name = DB_NAME;
$db_user = DB_USER;
$db_password = DB_PASSWORD;

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, title, city, (SELECT state_code FROM api_states WHERE id = state_id) as state_code, weekly_pay_range_low, weekly_pay_range_high, duration_length, (SELECT name FROM api_duration_types WHERE id = duration) as duration, vacancy_link FROM api_vacancies ORDER BY last_update_datetime DESC LIMIT 8";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$jobs_by_states = $pdo->query("SELECT state_id, (SELECT state_name FROM api_states WHERE id = state_id) as state_name, COUNT(id) AS count FROM api_vacancies GROUP BY state_id;")->fetchAll(PDO::FETCH_ASSOC);

?>

<div class='apply-today-page'>
  <div class='first'>
    <img src='<?php the_post_thumbnail_url('full');?>' />
    <div class='container'>
      <div class='title H1'><?php echo get_field('first_title'); ?></div>
    </div>
  </div>

  <div class='second body-2 container'>
    <div><?php echo nl2br(get_field('second_content')); ?></div>
    <div class='title H1'><?php echo get_field('second_title'); ?></div>
  </div>
  
  <div class='third'>

    <div class='slider' id='background-slider'>
      <div class='swiper-wrapper'>
        <?php
        $items = get_field('third_slider');
        foreach ($items as $item):
        ?>
        <div class='swiper-slide'><img src='<?php echo $item; ?>' /></div>
        <?php endforeach; ?>
      </div>
    </div>


    <div class='container'>
      <div class='title H0'>The latest open positions</div>

      <form class='global-search-bar'>
        <input type='text' placeholder='Search' />
        <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="currentColor"/></svg></div>
        <button><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7422 14.3439C16.5329 13.2673 17 11.9382 17 10.5C17 6.91015 14.0899 4 10.5 4C6.91015 4 4 6.91015 4 10.5C4 14.0899 6.91015 17 10.5 17C11.9386 17 13.268 16.5327 14.3448 15.7415L14.3439 15.7422C14.3734 15.7822 14.4062 15.8204 14.4424 15.8566L18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L15.8566 14.4424C15.8204 14.4062 15.7822 14.3734 15.7422 14.3439ZM16 10.5C16 13.5376 13.5376 16 10.5 16C7.46243 16 5 13.5376 5 10.5C5 7.46243 7.46243 5 10.5 5C13.5376 5 16 7.46243 16 10.5Z" fill="currentColor"/></svg></button>
      </form>

      <div class='slider-wrapper'>
        <button class='arrow' id='main-eleventh-prev'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M35 16.25L22.5 30L35 43.75" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="59.5" y="59.5" width="59" height="59" rx="29.5" transform="rotate(-180 59.5 59.5)" stroke="currentColor"></rect></g></svg></button>
        <div class='slider' id='slider'>
          <div class='swiper-wrapper'>

            <?php foreach ($posts as $post) : ?>
            <div class='swiper-slide block'>
              <div class='head'>
                <div class='H5'><?php echo $post['title']; ?></div>
                <svg width="50" height="50" viewBox="0 0 50 50" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M25.8822 10.3917V7.74465C25.8822 7.25734 25.4872 6.8623 24.9999 6.8623C24.5126 6.8623 24.1175 7.25734 24.1175 7.74465V10.3917H21.4705C20.9832 10.3917 20.5881 10.7867 20.5881 11.2741C20.5881 11.7614 20.9832 12.1565 21.4705 12.1565H24.1175V14.8035C24.1175 15.2908 24.5126 15.6858 24.9999 15.6858C25.4872 15.6858 25.8822 15.2908 25.8822 14.8035V12.1565H28.5293C29.0166 12.1565 29.4117 11.7614 29.4117 11.2741C29.4117 10.7867 29.0166 10.3917 28.5293 10.3917H25.8822Z" fill="currentColor"/><path d="M39.2173 18.3997L42.14 3.13555C42.1936 2.85473 42.1171 2.54642 41.9309 2.32658C41.7446 2.10693 41.4682 1.96094 41.1764 1.96094H9.80387C9.51211 1.96094 9.23569 2.10693 9.04942 2.32658C8.86315 2.54642 8.7866 2.84544 8.84025 3.12617L11.763 18.3954C10.0261 21.4413 9.03083 24.9582 8.85491 28.6496C8.82502 28.7697 8.8185 28.8955 8.83719 29.0191C8.82837 29.2915 8.82349 29.5651 8.82349 29.8391C8.82349 40.9558 16.3002 50.0002 25.4902 50.0002C34.6801 50.0002 42.1568 40.9563 42.1568 29.8395C42.1568 25.7125 41.1403 21.7704 39.2173 18.3997ZM10.9851 3.881H39.9952L37.4217 17.3216H13.5586L10.9851 3.881ZM25.4902 48.0804C17.3814 48.0804 10.7843 39.8977 10.7843 29.8396C10.7843 29.6958 10.7883 29.5529 10.791 29.4094C12.5658 28.3683 19.3512 24.7464 24.7587 26.7459C25.1895 27.6392 26.4176 29.9455 28.4735 31.9587C30.822 34.2586 33.4728 35.4233 36.2903 35.4232C37.3768 35.4232 38.488 35.2475 39.6161 34.8994C37.843 42.5029 32.1835 48.0804 25.4902 48.0804ZM39.8319 32.7886C36.1801 34.2188 32.8373 33.4949 29.8971 30.6373C27.5976 28.4028 26.4063 25.6568 26.3951 25.6304C26.297 25.3998 26.1108 25.2156 25.8762 25.1172C20.3979 22.8183 13.9531 25.51 10.9494 27.0898C11.2893 24.2733 12.1567 21.6417 13.5071 19.2416H37.4729C39.2539 22.3617 40.1959 25.9983 40.1959 29.8208C40.1959 30.8075 40.1304 31.7943 40.0081 32.739C39.949 32.7504 39.8899 32.7659 39.8319 32.7886Z" fill="currentColor"/></svg>
              </div>
              <div class='location'><?php echo $post['city'] . ', ' . $post['state_code']; ?></div>
              <div class='info'>
                <div class='item'>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.76923C14.315 8.13692 13.109 7.69754 12 7.66985M12 7.66985C10.68 7.63662 9.5 8.18769 9.5 9.69231C9.5 12.4615 15 11.0769 15 13.8462C15 15.4255 13.536 16.104 12 16.0532M12 7.66985V6M9 14.7692C9.644 15.5631 10.843 16.0154 12 16.0532M12 16.0532V18" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <span>$<?php echo $post['weekly_pay_range_low']; ?> to $<?php echo $post['weekly_pay_range_high']; ?> weekly</span>
                </div>
                <div class='item'>
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <span><?php echo $post['duration_length'] . ' ' . $post['duration']; ?></span>
                </div> 
              </div>
              <a class='bottom' href='/travel-nursing-job/<?php echo $post['vacancy_link']; ?>'>
                <span>View Job</span>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 17.5L15.5 12L10.5 6.5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </a>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
        <button class='arrow' id='main-eleventh-next'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M25 43.75L37.5 30L25 16.25" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="currentColor"></rect></g></svg></button>
        <div class='buttons'>
          <button id='main-eleventh-prev'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M35 16.25L22.5 30L35 43.75" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="59.5" y="59.5" width="59" height="59" rx="29.5" transform="rotate(-180 59.5 59.5)" stroke="currentColor"></rect></g></svg></button>
          <button id='main-eleventh-next'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M25 43.75L37.5 30L25 16.25" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="currentColor"></rect></g></svg></button>
        </div>
      </div>

      <a class='button' href='#'>See all jobs</a>
    </div>

  </div>

  <div class='fourth'>
    <div class='container'>

      <div class='title H1'>Choose where you want to go next job trip</div>

      <form class='global-search-bar'>
        <input type='text' placeholder='Search' />
        <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="currentColor"/></svg></div>
        <button><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7422 14.3439C16.5329 13.2673 17 11.9382 17 10.5C17 6.91015 14.0899 4 10.5 4C6.91015 4 4 6.91015 4 10.5C4 14.0899 6.91015 17 10.5 17C11.9386 17 13.268 16.5327 14.3448 15.7415L14.3439 15.7422C14.3734 15.7822 14.4062 15.8204 14.4424 15.8566L18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L15.8566 14.4424C15.8204 14.4062 15.7822 14.3734 15.7422 14.3439ZM16 10.5C16 13.5376 13.5376 16 10.5 16C7.46243 16 5 13.5376 5 10.5C5 7.46243 7.46243 5 10.5 5C13.5376 5 16 7.46243 16 10.5Z" fill="currentColor"/></svg></button>
      </form>

      <div class='slider-wrapper'>
        <button class='arrow' id='bottom-slider-prev'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M35 16.25L22.5 30L35 43.75" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="59.5" y="59.5" width="59" height="59" rx="29.5" transform="rotate(-180 59.5 59.5)" stroke="currentColor"></rect></g></svg></button>
        <div class='slider' id='bottom-slider'>
          <div class='swiper-wrapper'>

            <?php foreach ($jobs_by_states as $job): ?>
            <div class='swiper-slide'>
              <img src='<?php echo IMAGES . 'states/' . $job['state_id'] . '.jpg'; ?>' />
              <div class='content'>
                <div class='location'><?php echo $job['state_name']; ?></div>
                <div class='count body-2'><?php echo $job['count']; ?> vacancies</div >
              </div>
            </div>
            <?php endforeach; ?>

          </div>
        </div>
        <button class='arrow' id='bottom-slider-next'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M25 43.75L37.5 30L25 16.25" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="currentColor"></rect></g></svg></button>
        <div class='buttons'>
          <button id='bottom-slider-prev'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M35 16.25L22.5 30L35 43.75" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="59.5" y="59.5" width="59" height="59" rx="29.5" transform="rotate(-180 59.5 59.5)" stroke="currentColor"></rect></g></svg></button>
          <button id='bottom-slider-next'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg"><g opacity="0.6"><path d="M25 43.75L37.5 30L25 16.25" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path><rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="currentColor"></rect></g></svg></button>
        </div>
      </div>

      <a class='button' href='#'>Search travel jobs</a>

    </div>
  </div>

</div>

<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', () => {
  const eleventhSlider = new Swiper('#background-slider', {
    slidesPerView: 1,
		loop: false, // true
		effect: 'fade',
		speed: 1000,
		autoplay: {
			delay: 3000,
		},
		allowTouchMove: false,
  });

  eleventhSlider.init();

  const eleventhSliderSt = new Swiper('#slider', {
    navigation: {
      nextEl: '#main-eleventh-next',
      prevEl: '#main-eleventh-prev',
    },
    breakpoints: {
      480: {
        slidesPerView: 1,
        spaceBetween: 50
      },
      481: {
        slidesPerView: 2,
        spaceBetween: 10,
      },
      1100: {
        slidesPerView: 3,
        spaceBetween: 10,
      },
      1250: {
        slidesPerView: 4,
        spaceBetween: 10,
      }
    }
  });

  eleventhSliderSt.init();

  const ninthSlider = new Swiper('#bottom-slider', {
    navigation: {
      nextEl: '#bottom-slider-next',
      prevEl: '#bottom-slider-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      480: {
        slidesPerView: 2,
        spaceBetween: 30
      },
      640: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      1160: {
        slidesPerView: 4,
        spaceBetween: 30
      }
    }
  });

  ninthSlider.init();
});
</script>

<?php get_footer(); ?>