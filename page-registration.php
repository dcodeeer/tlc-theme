<?php
  $from = get_field('mail_from', 'option');
  $to = get_field('mail_to', 'option');
  $subject = 'New Message!!!';

  $firstname = trim($_POST['firstname']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $lastname = trim($_POST['lastname']);
  $location = trim($_POST['location']);
  $profession = trim($_POST['profession']);
  $specialisation = trim($_POST['specialisation']);

  if (
    !empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) &&
    !empty($profession) && !empty($specialisation) && !empty($location) 
  ) {
    $headers = array(
      'From: ' . $from,
    );
    $msg = "First Name: $firstname";
    $msg .= "\nLast Name: $lastname";
    $msg .= "\nEmail: $email";
    $msg .= "\nPhone: $phone";
    $msg .= "\nProfession: $profession";
    $msg .= "\nSpecialisation: $specialisation";
    $msg .= "\nLocation: $location";
       
    wp_mail($to, $subject, $msg, $headers);

    echo 'success';
    exit();
  };
?>

<?php
try {
  $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$categories = $pdo->query("SELECT id, name FROM api_professions_categories")->fetchAll(PDO::FETCH_ASSOC);
$professions = array();
foreach ($categories as $category) {
  $professions[$category['name']] = [];
  $sql = "SELECT id, name FROM api_professions WHERE category_id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $category['id']);
  $stmt->execute();
  $profs = $stmt->fetchAll(PDO::FETCH_ASSOC);
  for ($i = 0; $i < count($profs); $i++) {
    $professions[$category['name']][$i]['id'] = $profs[$i]['id'];
    $professions[$category['name']][$i]['name'] = $profs[$i]['name'];
  }
}

$specialties = array();
$stmt = $pdo->query("SELECT * FROM api_specialties");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  $professionId = $row['profession_id'];
  if (!isset($specialties[$professionId])) {
    $specialties[$professionId] = array();
  }
  $specialties[$professionId][] = $row;
}

$states = $pdo->query("SELECT id, state_name FROM api_states")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
  get_header();
  /* Template Name: registration */
?>

<div class='register-page'>
  <div class='page-info'>
    <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
  </div>
  <div class='first'>
    <div class='slider' id='slider'>
      <div class='swiper-wrapper'>
        <?php foreach (get_field('first_slider') as $item) : ?>
        <div class='swiper-slide'><img src='<?php echo $item; ?>' /></div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class='pagination' id='pagination'></div>
    <div class='H0 container'>Let’s Get Started</div>
  </div>

  <div class='second'>
    <div class='container'>
      <div class='H3'>Apply and build your dream career with Us!</div>

      <form id='form'>

        <div class='input-box'>

          <div class='input-item' id='firstname-input'>
            <label class='body-3'>First Name*</label>
            <input class='body-3' type='text' name='firstname' placeholder='First name' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid first name</span>
            </div>
          </div>

          <div class='input-item' id='email-input'>
            <label class='body-3'>Email *</label>
            <input class='body-3' type='text' name='email' placeholder='Email' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid email</span>
            </div>
          </div>

          <div class='input-item' id='phone-input'>
            <label class='body-3'>Phone *</label>
            <input class='body-3' type='text' name='phone' placeholder='Phone' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid phone number</span>
            </div>
          </div>

          <div class='input-item' id='lastname-input'>
            <label class='body-3'>Last Name*</label>
            <input class='body-3' type='text' name='lastname' placeholder='Last name' />
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid first name</span>
            </div>
          </div>

          <div class='input-item' id='profession-input'>
            <label class='body-3'>Profession*</label>
            <div class='dropdown'>
              <input id='profession-dropdown' class='hidden' type='hidden' name='profession' value='' />
              <div class='select'>
                <input type='text' readonly placeholder='Choose' />
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.5" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="#606C77"/></svg>
              </div>
              <div class='options'>
                <?php foreach ($professions as $category => $profs_array):  ?>
                <div class="headline">
                  <div class="title">
                    <span><?php echo $category; ?></span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.5" d="M6.20284 15.2013L11.1134 9.993L6.20284 4.7847C6.08566 4.66042 5.99272 4.51289 5.9293 4.35051C5.86589 4.18813 5.83325 4.0141 5.83325 3.83835C5.83325 3.66259 5.86589 3.48856 5.9293 3.32618C5.99272 3.16381 6.08566 3.01627 6.20284 2.89199C6.32001 2.76771 6.45911 2.66913 6.6122 2.60188C6.7653 2.53462 6.92938 2.5 7.09509 2.5C7.26079 2.5 7.42488 2.53462 7.57797 2.60188C7.73106 2.66913 7.87017 2.76771 7.98734 2.89199L13.7965 9.05336C13.9138 9.17755 14.0069 9.32506 14.0704 9.48744C14.1339 9.64983 14.1666 9.82391 14.1666 9.99972C14.1666 10.1755 14.1339 10.3496 14.0704 10.512C14.0069 10.6744 13.9138 10.8219 13.7965 10.9461L7.98734 17.1074C7.87025 17.2319 7.73118 17.3306 7.57807 17.398C7.42497 17.4653 7.26084 17.5 7.09509 17.5C6.92933 17.5 6.76521 17.4653 6.6121 17.398C6.459 17.3306 6.31992 17.2319 6.20284 17.1074C5.72191 16.5839 5.70925 15.7248 6.20284 15.2013Z" fill="#606C77"></path></svg>                      
                  </div>
                  <div class="list">
                    <?php foreach ($profs_array as $prof): ?>
                    <div class='option' data-value='<?php echo $prof['name']; ?>' data-name='<?php echo $prof['id']; ?>'><?php echo $prof['name']; ?></div>
                    <?php endforeach; ?>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid proffession</span>
            </div>
          </div>

          <div class='input-item' id='specialisation-input'>
            <label class='body-3'>Specialisation*</label>
            <div class='dropdown'>
              <input class='hidden' type='hidden' name='specialisation' value='' />
              <div class='select'>
                <input type='text' readonly placeholder='Choose' />
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.5" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="#606C77"/></svg>
              </div>
              <div class='options'>
                
              </div>
            </div>
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid specialisation</span>
            </div>
          </div>
          
          <div class='input-item' id='location-input'>
            <label class='body-3'>Location*</label>
            <div class='dropdown'>
              <input class='hidden' type='hidden' name='location' value='' />
              <div class='select'>
                <input type='text' readonly placeholder='Choose' />
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.5" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="#606C77"/></svg>
              </div>
              <div class='options'>
                <?php foreach ($states as $state): ?>
                <div class='option' data-value='<?php echo $state['state_name']; ?>'><?php echo $state['state_name']; ?></div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Invalid location</span>
            </div>
          </div>

          
        </div>

        <div class='agreement body-3'>
          <input type='checkbox' id='checkbox' checked />
          <label for='checkbox'>By clicking "Submit", you acknowledge TLC will collect and use the personal information you provide in accordance with its Privacy Policy and Terms of Use and that you have read and agree to be bound by these policies. You also agree to receive emails, automated text messages and phone calls from or on behalf of TLC about employment opportunities, positions in which you have been placed, and your employment with TLC.</label>
        </div>
        <button class='button-3'>Submit Application</button>
      </form>
    </div>
  </div>
  
</div>

<script type='text/javascript'>
const specialties = JSON.parse('<?php echo json_encode($specialties); ?>');
document.querySelector('#profession-dropdown').addEventListener('change', (e) => {
  const arr = specialties[e.currentTarget.getAttribute('data-name')];

  const dropdown = document.getElementById('specialisation-input');
  const options = dropdown.querySelector('.options');
  options.innerHTML = '';

  dropdown.querySelectorAll('input').forEach((input) => {
    input.value = '';
  });

  for (let i = 0; i < arr.length; i++) {
    const option = document.createElement('div');
    option.classList.add('option');
    option.setAttribute('data-value', arr[i]['name'].toString());
    option.innerHTML = arr[i]['name'].toString();
    options.append(option);
  };
});
</script>

<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', () => {
  const slider = new Swiper('#slider', {
		slidesPerView: 1,
    pagination: {
      el: '#pagination',
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

	slider.init();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/imask"></script>
<script type='text/javascript'>
  document.addEventListener('DOMContentLoaded', () => {
    var maskOptions = {
      mask: '+1 000-000-0000',
      lazy: false
    }

	const phoneInput = document.querySelector('#phone-input');
	var mask = new IMask(phoneInput.querySelector('input'), maskOptions);
  });
document.getElementById('form').addEventListener('submit', async (e) => {
  e.preventDefault();

  const inputs = [
    document.querySelector('#firstname-input'),
    document.querySelector('#lastname-input'),
    document.querySelector('#email-input'),
    document.querySelector('#phone-input'),
  ];

  const dropdowns = [
    document.querySelector('#profession-input'),
    document.querySelector('#specialisation-input'),
    document.querySelector('#location-input'),
    
  ];

  const isValidForm = formGuard(inputs, dropdowns);

  if (isValidForm) {
    openLoadingModal();
    var jsonBody = JSON.stringify(Object.fromEntries(new FormData(e.target).entries()));

				fetch('https://api.tlcnursing.com/api/v1/candidates/apply', {
					mode:  'cors',
					method: 'POST',
					headers: {
						'Content-Type': 'application/json', // Заголовок с указанием типа данных
						// Другие заголовки, если необходимо
					},
					body: jsonBody
					// Другие опции запроса, такие как параметры URL или тело запроса, могут быть добавлены сюда
				})
					.then(response => {
						if (!response.ok) {
							closeLoadingModal();
							openFailModal();
							throw new Error('Ошибка HTTP ' + response.status);
						}
						return response.json(); // Разбор ответа в формате JSON
					})
					.then(data => {
						closeLoadingModal();
						openSuccessModal();
						// Обработка данных, полученных от сервера
						console.log(data);
					})
					.catch(error => {
						// Обработка ошибок
						closeLoadingModal();
						openFailModal();
						console.error('Произошла ошибка:', error);
					});

				console.log(jsonBody);
  }
});
</script>

<?php get_footer(); ?>