<?php
  $from = get_field('mail_from', 'option'); 
  $to = get_field('mail_to', 'option');
  $subject = 'New Message!!!';

  $fullname = trim($_POST['fullname']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);

  if (!empty($fullname) && !empty($email) && !empty($phone)) {
    $headers = array(
      'From: ' . $from,
    );
    $msg = "fullname: $fullname \n email: $email \n phone: $phone";
       
    wp_mail($to, $subject, $msg, $headers);

    echo 'success';
    exit();
  };
?>

<?php
  get_header();
  /* Template Name: joint-commission */
?>

<div class='joint-commission'>

  <div class='header animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>
    <img src='<?php the_post_thumbnail_url('full');?>' />
  </div>

  <div class='content container animate-content'>
    
    <form class='form' id='form'>
      <div class='title'>Have questions? <br />Contact Us</div>
        
      <div class='input-item' id='fullname-input'>
        <input type='text' name='fullname' placeholder='First name & last name*' />
        <div class='error-message'>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
          <span>Invalid input</span>
        </div>
      </div>
      
      <div class='input-item' id='email-input'>
        <input type='text' name='email' placeholder='Email*' />
        <div class='error-message'>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
          <span>Invalid input</span>
        </div>
      </div>
      
      <div class='input-item' id='phone-input'>
        <input type='text' name='phone' placeholder='Phone' />
        <div class='error-message'>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
          <span>Invalid input</span>
        </div>
      </div>

      <div class='bottom'>
        <button>Submit</button>
        <p>* - required field <br />& Get approved in 24 Hours!</p>
      </div>
    </form>

    <div class='box'>

      <div class='title'><?php echo get_field('title'); ?></div>

      <div class='list'>
        
        <?php
          $list = get_field('items');
          foreach ($list as $item) {
        ?>
        <a href='<?php echo $item['link']; ?>' target='_blank' class='block'>
          <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.5 9H13.5V3H4.5V21H19.5V9ZM18.879 7.5L15 3.621V7.5H18.879ZM3.75 1.5H15L21 7.5V21.75C21 21.9489 20.921 22.1397 20.7803 22.2803C20.6397 22.421 20.4489 22.5 20.25 22.5H3.75C3.55109 22.5 3.36032 22.421 3.21967 22.2803C3.07902 22.1397 3 21.9489 3 21.75V2.25C3 2.05109 3.07902 1.86032 3.21967 1.71967C3.36032 1.57902 3.55109 1.5 3.75 1.5Z" fill="white"/><path d="M12.75 13.25V11.25C12.75 10.8358 12.4142 10.5 12 10.5C11.5858 10.5 11.25 10.8358 11.25 11.25V13.25H9.25C8.83579 13.25 8.5 13.5858 8.5 14C8.5 14.4142 8.83579 14.75 9.25 14.75H11.25V17.25C11.25 17.6642 11.5858 18 12 18C12.4142 18 12.75 17.6642 12.75 17.25V14.75H15C15.4142 14.75 15.75 14.4142 15.75 14C15.75 13.5858 15.4142 13.25 15 13.25H12.75Z" fill="white"/></svg></div>
          <div class='text'><?php echo $item['item']; ?></div>
        </a>
        <?php } ?>

      </div>

      <div class='bottom-block'>
        <div class='wrap'>
          <div class='left'>
            <div class='title'>Certified by The Joint Commission</div>
            <div class='description'>To Report a Concern, Click Here</div>
          </div>
          <img src='<?php echo IMAGES . 'img-award.png'; ?>' />
        </div>
      </div>

    </div>

  </div>

</div>

<script type='text/javascript'>
document.getElementById('form').addEventListener('submit', async (e) => {
  e.preventDefault();

  const inputs = [
    document.querySelector('#fullname-input'),
    document.querySelector('#email-input'),
    document.querySelector('#phone-input'),
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