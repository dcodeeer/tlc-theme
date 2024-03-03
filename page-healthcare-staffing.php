<?php
  $from = get_field('mail_from', 'option');
  $to = get_field('mail_to', 'option');
  $subject = 'New Message!!!';

  $fullname = trim($_POST['fullname']);
  $email = trim($_POST['email']);
  $email_2 = trim($_POST['email-2']);
  $best_time = trim($_POST['best_time']);

  if (!empty($fullname) && !empty($email) && !empty($email_2) && !empty($best_time)) {
    $headers = array(
      'From: ' . $from,
    );
    $msg = "fullname: $fullname \n email: $email \n email_2: $email_2 \n best time: $best_time";
       
    wp_mail($to, $subject, $msg, $headers);

    echo 'success';
    exit();
  };
?>

<?php
  get_header();
  /* Template Name: healthcare-staffing */
?>

<div class='healthcare-staffing-page'>
  <div class='animate-header'>
    <div class='healthcare-staffing-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>
      <img src='<?php the_post_thumbnail_url( 'full' );?>' />
    </div>
  </div>

  <div class='animate-content'>

    <div class='healthcare-staffing-second container'>
      <div class='title H1'><?php echo get_field('first_section_title'); ?></div>
      <div class='description H3'><?php echo get_field('first_section_mini_title'); ?></div>
    </div>

    <div class='healthcare-staffing-third container'>
      <img src='<?php echo get_field('second_section_image'); ?>' />

      <div class='info'>
        <div class='title H4 blue'><?php echo get_field('second_section_title'); ?></div>
        
        <div class='description body-2'>
          <?php echo wpautop(get_field('second_section_content')); ?>
        </div>

        <div class='list body-2'>
          <?php
          $list = get_field('second_section_list');          
          foreach ($list as $item) { ?>
          <div class='item'>
            <div class='icon'><svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="35 18 37 37"><g filter=""><circle cx="53.5" cy="36.5" r="18.5" fill="white"></circle><circle cx="53.5" cy="36.5" r="17.5" stroke="#15D199" stroke-width="2"></circle></g><path d="M61.8177 28.3633C59.399 28.6712 55.5622 32.0987 52.3656 37.0537C52.1184 37.4345 51.8835 37.8154 51.6606 38.1922C51.6606 38.1922 51.6606 38.1922 51.6566 38.1881C51.6525 38.1922 51.6525 38.1962 51.6485 38.2003C51.1299 37.6817 50.5708 37.1631 49.9793 36.6567C49.7038 36.4217 49.4283 36.1948 49.1568 35.972L45 38.6014C46.9001 39.4927 48.5572 40.5542 49.8456 41.6521C49.8456 41.6481 49.8496 41.644 49.8496 41.64C50.6235 42.3004 51.2676 42.977 51.7457 43.6374C51.9564 43.3254 52.1711 43.0134 52.3939 42.6974C52.8801 42.0046 53.3744 41.3402 53.8687 40.7081L53.8727 40.7122C57.1706 36.4784 60.4483 33.6829 62 33.8004L61.8177 28.3633Z" fill="#15D199"></path><defs><filter id="filter0_ddddd_5604_22454" x="0.73008" y="0.457059" width="105.54" height="110.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_5604_22454"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_5604_22454" result="effect2_dropShadow_5604_22454"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_5604_22454" result="effect3_dropShadow_5604_22454"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_5604_22454" result="effect4_dropShadow_5604_22454"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_5604_22454" result="effect5_dropShadow_5604_22454"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_5604_22454" result="shape"></feBlend></filter></defs></svg></div>
            <p><?php echo $item['item']; ?></p>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class='healthcare-staffing-fourth'>
      <div class='container'>

        <div class='title H1'><?php echo get_field('third_section_title'); ?></div>
        <p class='body-2'><?php echo get_field('third_section_description'); ?></p>

        <div class='partners'>
          <?php
          $list = get_field('third_section_partners_images');
          foreach ($list as $item) { ?>
          <div class='block'><img src='<?php echo $item; ?>' /></div>
          <?php } ?>
        </div>

        <div class='title H2'><?php echo get_field('third_section_title_2'); ?></div>
        <ul class='list H5'>
          <?php 
          $list = get_field('third_section_list');
          foreach ($list as $item) {
          ?>
          <li><?php echo $item['item']; ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>

    <div class='healthcare-staffing-fifth container'>
      <div class='left'>
        <div class='title H2'><?php echo get_field('fourth_section_title'); ?></div>
        <p class='body-2'><?php echo get_field('fourth_section_description'); ?></p>
        <ul class='list body-2'>
        <?php 
          $list = get_field('fourth_section_list');
          foreach ($list as $item) {
          ?>
          <li><?php echo $item['item']; ?></li>
          <?php } ?>
        </ul>
      </div>
      <img src='<?php echo get_field('fourth_section_image'); ?>' />
    </div>

    <div class='healthcare-staffing-sixth'>
      <div class='container'>
        <img src='<?php echo get_field('fifth_section_image'); ?>' />

        <div class='right'>
          <div class='H2 blue'><?php echo get_field('fifth_section_title'); ?></div>
          <p class='body-2'><?php echo get_field('fifth_section_description'); ?></p>
          <div class='H4 blue'><?php echo get_field('fifth_section_mini_title'); ?></div>
          <ul class='list body-2'>
          <?php 
          $list = get_field('fifth_section_list');
          foreach ($list as $item) {
          ?>
          <li><?php echo $item['item']; ?></li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </div>

    <div class='healthcare-staffing-seventh container'>
      <form class='form' id='form'>
        <div class='title H2'>Questions about staffing?</div>

        <div class='inputs'>
          <div class='input-item' id='fullname-input'>
            <input type='text' name='fullname' placeholder='First name & last name*' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid input</span>
            </div>
          </div>
          <div class='input-item' id='email-input'>
            <input type='email' name='email' placeholder='Email*' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid input</span>
            </div>
          </div>
          <div class='input-item' id='email-2-input'>
            <input type='email' name='email-2' placeholder='Email' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid input</span>
            </div>
          </div>
          <div class='input-item' id='best-time-input'>
            <input type='text' name='best_time' placeholder='Best time to reach You' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid input</span>
            </div>
          </div>
        </div>

        <div class='bottom'>
          <button>Submit</button>
          <p class='body-3'>* - required field<br />& Get approved in 24 Hours!</p>
        </div>
      </form>
    </div>

  </div>
</div>

<script type='text/javascript'>
document.getElementById('form').addEventListener('submit', async (e) => {
  e.preventDefault();

  const inputs = [
    document.querySelector('#fullname-input'),
    document.querySelector('#email-input'),
    document.querySelector('#email-2-input'),
    document.querySelector('#best-time-input'),
  ];

  const isValidForm = formGuard(inputs);

  if (isValidForm) {
    openLoadingModal();
    const body = new FormData(e.target);
    console.log(body);
    
    const res = await fetch('', { method: 'POST', body: body });
    const response = await res.text();
    console.log(response);
    closeLoadingModal();
    if (response == 'success') {
      openSuccessModal();
    } else openFailModal();
  }
});
</script>

<?php get_footer(); ?>