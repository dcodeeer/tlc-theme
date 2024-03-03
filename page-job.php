<?php

$db_host = DB_HOST;
$db_name = DB_NAME;
$db_user = DB_USER;
$db_password = DB_PASSWORD;

$ID = get_query_var('vacancy_link');
if(isset($ID)){
  
} else {
  header('Location: /search-jobs');
  exit( );
}

try {
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT id, title, description, start_date, end_date, state_id,
            (SELECT state_name FROM api_states WHERE id = state_id) as state, city,
            (SELECT state_code FROM api_states WHERE id = state_id) as state_code,
            (SELECT name FROM api_duration_types WHERE id = duration) as duration,
            weekly_pay_range_low, weekly_pay_range_high, duration_length
          FROM api_vacancies WHERE vacancy_link = :vacancy_link";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':vacancy_link', $ID);
  $stmt->execute();

  $job = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if (count($job) == 0) {
    header('Location: /search-jobs');
    exit( );
  }
  $job = $job[0];

  $sql = "SELECT id, title, city, state_id,
            (SELECT state_code FROM api_states WHERE id = state_id) as state_code,
            (SELECT name FROM api_duration_types WHERE id = duration) as duration,
            weekly_pay_range_low, weekly_pay_range_high, duration_length
          FROM api_vacancies ORDER BY last_update_datetime DESC LIMIT 8";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();

  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
  die("Ошибка подключения к базе данных: " . $e->getMessage());
}


?>


<?php
  get_header();
  /* Template Name: single-job */
?>
<div class='jobs-page'>
<div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>
  <div class='first'>
    <div class='container'>
      <H1 class='H1'><?php echo $job['title']; ?></H1>
      <div class='H4'><?php echo $job['state']; ?></div>
      <div class='H4'>Job ID: <?php echo $job['id']; ?></div>
    </div>
  </div>

  <div class='second container'>
    <div class='detail-info'>
      <img src='<?php echo IMAGES . 'states/' . $job['state_id'] . '.jpg'; ?>' />

      <div class='content'>
        <div class='H3'><?php echo $job['title']; ?></div>

        <div class='segment body-2'>
          <div class='item'>
            <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M9.80076 7H11.4722C11.7118 6.99999 11.9184 6.99999 12.0886 7.01408C12.2683 7.02896 12.4469 7.06182 12.6188 7.15058C12.8749 7.28279 13.0841 7.4938 13.2151 7.75425C13.3027 7.92842 13.3351 8.10943 13.3498 8.2913C13.3637 8.46362 13.3636 8.67277 13.3636 8.91505V9.8427C13.4898 9.79953 13.617 9.78179 13.7443 9.77299C13.8866 9.76315 14.0587 9.76315 14.2581 9.76316H14.2871C14.4865 9.76315 14.6586 9.76315 14.8011 9.77299C14.951 9.78335 15.101 9.80614 15.2492 9.86832C15.5836 10.0086 15.8488 10.2779 15.9871 10.6161C16.0484 10.7662 16.0709 10.9181 16.0812 11.07C16.0909 11.2144 16.0909 11.3889 16.0909 11.5912V14.8289H16.5455C16.7965 14.8289 17 15.0351 17 15.2895C17 15.5438 16.7965 15.75 16.5455 15.75H7.45455C7.20351 15.75 7 15.5438 7 15.2895C7 15.0351 7.20351 14.8289 7.45455 14.8289H7.90909L7.90909 8.91656C7.90908 8.67378 7.90908 8.46431 7.92299 8.29177C7.93766 8.10969 7.97007 7.92853 8.05772 7.75425C8.18845 7.49429 8.39696 7.28304 8.65355 7.15058C8.82557 7.06178 9.00437 7.02895 9.18408 7.01408C9.35439 6.99999 9.56114 6.99999 9.80076 7ZM8.81818 14.8289H12.4545V11.5905C12.4545 11.5821 12.4545 11.5738 12.4545 11.5654V8.93279C12.4545 8.66778 12.4542 8.49662 12.4437 8.36632C12.4336 8.24137 12.4165 8.19507 12.4051 8.1724C12.3618 8.08625 12.2921 8.01565 12.2061 7.97125C12.1836 7.95962 12.1378 7.94229 12.0145 7.93207C11.8858 7.92141 11.7167 7.92105 11.4546 7.92105H9.81827C9.55621 7.92105 9.38693 7.92141 9.25809 7.93207C9.13452 7.9423 9.08871 7.95966 9.06627 7.97125C8.98074 8.0154 8.9113 8.08575 8.86772 8.1724C8.85629 8.19515 8.83915 8.24156 8.82906 8.36675C8.81854 8.49729 8.81818 8.66879 8.81818 8.9343V14.8289ZM13.3636 11.6053V14.8289H15.1818V11.6053C15.1818 11.3844 15.1816 11.2418 15.1742 11.1328C15.1671 11.0278 15.155 10.9878 15.1472 10.9686C15.1009 10.8555 15.0125 10.7659 14.9013 10.7193C14.8825 10.7113 14.843 10.6991 14.7392 10.6919C14.6314 10.6845 14.4906 10.6842 14.2726 10.6842C14.0546 10.6842 13.9139 10.6845 13.8061 10.6919C13.7025 10.6991 13.663 10.7113 13.6441 10.7193C13.5329 10.7659 13.4445 10.8556 13.3982 10.9686C13.3904 10.9878 13.3783 11.0278 13.3712 11.1327C13.3639 11.2418 13.3636 11.3844 13.3636 11.6053ZM9.27273 9.30263C9.27273 9.04829 9.47623 8.84211 9.72727 8.84211H11.5455C11.7965 8.84211 12 9.04829 12 9.30263C12 9.55697 11.7965 9.76316 11.5455 9.76316H9.72727C9.47623 9.76316 9.27273 9.55697 9.27273 9.30263ZM9.27273 10.6842C9.27273 10.4299 9.47623 10.2237 9.72727 10.2237H11.5455C11.7965 10.2237 12 10.4299 12 10.6842C12 10.9386 11.7965 11.1447 11.5455 11.1447H9.72727C9.47623 11.1447 9.27273 10.9386 9.27273 10.6842Z" fill="#606C77"/></svg></div>
            <span><?php echo $job['city'] . ', ' . $job['state_code']; ?></span>
          </div>
          <div class='item b'>
            <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.76923C14.315 8.13692 13.109 7.69754 12 7.66985M12 7.66985C10.68 7.63662 9.5 8.18769 9.5 9.69231C9.5 12.4615 15 11.0769 15 13.8462C15 15.4255 13.536 16.104 12 16.0532M12 7.66985V6M9 14.7692C9.644 15.5631 10.843 16.0154 12 16.0532M12 16.0532V18" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <H2 class='body-2'>Weekly Pay: $<?php echo $job['weekly_pay_range_low']; ?> - $<?php echo $job['weekly_pay_range_high']; ?></H2>
          </div>
          <!--<div class='item'>
            <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <span>4x12 Nights</span>
          </div>-->
          <div class='item'>
            <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
            <H3 class='body-2'><?php echo $job['duration_length'] . ' ' . $job['duration']; ?></H3>
          </div>
        </div>

        <div class='segment body-2'>
          <H3 class='body-2'>Start date - <?php echo $job['start_date']; ?></H3>
          <p>End date - <?php echo $job['end_date']; ?></p>
          <!-- <p>Float Required - NO</p>
          <!-- <p>Required Certifications for Submittal - N/A</p>-->
        </div>

        <div class='segment'>
          <p class='H5 description-title'>Job Description</p>
          <p class='body-2'><?php echo $job['description']; ?></p>
        </div>

        <a class='H5 apply button-2' href='#'>Apply now</a>
      </div>

    </div>
    <div class='right'>

      <!-- <form>
        <input class='body-2' type='text' name='email' placeholder='Email*' />
        <div class='agreement'>
          <input type='checkbox' id='checkbox' checked />
          <label for='checkbox'>By clicking "Submit", you acknowledge TLC will collect and use the personal information you provide in accordance with its Privacy Policy and Terms of Use and that you have read and agree to be bound by these policies. You also agree to receive emails, automated text messages and phone calls from or on behalf of TLC about employment opportunities, positions in which you have been placed, and your employment with TLC.</label>
        </div>
        <button class='button-3'>Get Start Now</button>
        <div class='search-jobs'>
          <div class='H4'>Not the right fit for you?</div>
          <a href='/search-jobs' class='btn body-3'>SEARCH JOBS</a>
        </div>
      </form> -->

      <div class='bottom body-2'>
        <div class='H4 blue'>Why travel with TLC Nursing</div>
        <p>Join TLC Nursing in an exciting journey across America with the finest selection of travel healthcare jobs. Offering a wealth of opportunities from bustling urban hospitals to serene rural clinics, we provide the perfect blend of professional development and adventurous exploration. Experience the unique satisfaction of enhancing your healthcare career while discovering the rich diversity of the United States.</p>
        <p>At TLC Nursing, we specialize in curating premium travel healthcare jobs to cater to every healthcare professional’s aspirations. Whether you are an experienced practitioner or a budding healthcare enthusiast, our carefully selected opportunities promise impactful work, competitive benefits, and the chance to make a difference in healthcare communities nationwide.</p>
        <p>Dive into the best travel healthcare jobs across America, provided by TLC Nursing. We present unparalleled professional growth opportunities coupled with a chance to explore the varied landscapes and cultures of America. Our carefully selected assignments are not just jobs, but a journey towards fulfilling your career goals while creating unforgettable memories.</p>
        <p>Choose TLC Nursing for a broad spectrum of travel healthcare jobs. We pride ourselves in serving a diverse range of healthcare specialties, offering the thrill of working in unique healthcare environments while simultaneously uncovering the many wonders of America</p>
        <p>Embrace the TLC Nursing advantage – an adventure-filled career, opportunities to upgrade your skills, and a chance to enrich lives in healthcare communities across the nation.</p>
      </div>
      
    </div>
  </div>

  <div class='third'>
    <div class='container'>
      <div class='top'>
        <div class='H2'>The latest open positions in this specialty in another States</div>
        <div class='buttons'>
          <button id='slider-prev'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.6">
            <rect x="59.5" y="59.5" width="59" height="59" rx="29.5" transform="rotate(-180 59.5 59.5)" stroke="#606C77"/>
            <path d="M35 16.25L22.5 30L35 43.75" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            </svg>
            </button>
          <button id='slider-next'><svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.6">
            <rect x="0.5" y="0.5" width="59" height="59" rx="29.5" stroke="#606C77"/>
            <path d="M25 43.75L37.5 30L25 16.25" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            </svg>
            </button>
        </div>
      </div>
      <div class='slider' id='slider'>
        <div class='swiper-wrapper'>

          <?php foreach ($posts as $post) : ?>
          <div class='swiper-slide block'>
            <div class='head'>
              <div class='H5'><?php echo $post['title']; ?></div>
              <svg width="50" height="50" viewBox="0 0 50 50" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M25.8822 10.3917V7.74465C25.8822 7.25734 25.4872 6.8623 24.9999 6.8623C24.5126 6.8623 24.1175 7.25734 24.1175 7.74465V10.3917H21.4705C20.9832 10.3917 20.5881 10.7867 20.5881 11.2741C20.5881 11.7614 20.9832 12.1565 21.4705 12.1565H24.1175V14.8035C24.1175 15.2908 24.5126 15.6858 24.9999 15.6858C25.4872 15.6858 25.8822 15.2908 25.8822 14.8035V12.1565H28.5293C29.0166 12.1565 29.4117 11.7614 29.4117 11.2741C29.4117 10.7867 29.0166 10.3917 28.5293 10.3917H25.8822Z" fill="currentColor"/><path d="M39.2173 18.3997L42.14 3.13555C42.1936 2.85473 42.1171 2.54642 41.9309 2.32658C41.7446 2.10693 41.4682 1.96094 41.1764 1.96094H9.80387C9.51211 1.96094 9.23569 2.10693 9.04942 2.32658C8.86315 2.54642 8.7866 2.84544 8.84025 3.12617L11.763 18.3954C10.0261 21.4413 9.03083 24.9582 8.85491 28.6496C8.82502 28.7697 8.8185 28.8955 8.83719 29.0191C8.82837 29.2915 8.82349 29.5651 8.82349 29.8391C8.82349 40.9558 16.3002 50.0002 25.4902 50.0002C34.6801 50.0002 42.1568 40.9563 42.1568 29.8395C42.1568 25.7125 41.1403 21.7704 39.2173 18.3997ZM10.9851 3.881H39.9952L37.4217 17.3216H13.5586L10.9851 3.881ZM25.4902 48.0804C17.3814 48.0804 10.7843 39.8977 10.7843 29.8396C10.7843 29.6958 10.7883 29.5529 10.791 29.4094C12.5658 28.3683 19.3512 24.7464 24.7587 26.7459C25.1895 27.6392 26.4176 29.9455 28.4735 31.9587C30.822 34.2586 33.4728 35.4233 36.2903 35.4232C37.3768 35.4232 38.488 35.2475 39.6161 34.8994C37.843 42.5029 32.1835 48.0804 25.4902 48.0804ZM39.8319 32.7886C36.1801 34.2188 32.8373 33.4949 29.8971 30.6373C27.5976 28.4028 26.4063 25.6568 26.3951 25.6304C26.297 25.3998 26.1108 25.2156 25.8762 25.1172C20.3979 22.8183 13.9531 25.51 10.9494 27.0898C11.2893 24.2733 12.1567 21.6417 13.5071 19.2416H37.4729C39.2539 22.3617 40.1959 25.9983 40.1959 29.8208C40.1959 30.8075 40.1304 31.7943 40.0081 32.739C39.949 32.7504 39.8899 32.7659 39.8319 32.7886Z" fill="currentColor"/></svg>
            </div>
            <div class='location'><?php echo $post['city'] . ', ' . $post['state_code']; ?></div>
            <div class='info body-2'>
              <div class='item'>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.76923C14.315 8.13692 13.109 7.69754 12 7.66985M12 7.66985C10.68 7.63662 9.5 8.18769 9.5 9.69231C9.5 12.4615 15 11.0769 15 13.8462C15 15.4255 13.536 16.104 12 16.0532M12 7.66985V6M9 14.7692C9.644 15.5631 10.843 16.0154 12 16.0532M12 16.0532V18" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span>$<?php echo $post['weekly_pay_range_low']; ?> to $<?php echo $post['weekly_pay_range_high']; ?> weekly</span>
              </div>
              <!--<div class='item'>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span>4x12 Nights</span>
              </div>-->
              <div class='item'>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span><?php echo $post['duration_length'] . ' ' . $post['duration']; ?></span>
              </div>
            </div>
            <a class='bottom' href='/job?id=<?php echo $post['id']; ?>'>
              <span>View Job</span>
              <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 17.5L15.5 12L10.5 6.5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>

</div>

<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', () => {
  const slider = new Swiper('#slider', {
    navigation: {
      nextEl: '#slider-next',
      prevEl: '#slider-prev',
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

  slider.init();
});
</script>

<?php get_footer(); ?>