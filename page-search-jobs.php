<?php
  $from = get_field('mail_from', 'option');
  $to = get_field('mail_to', 'option');
  $subject = 'New Message!!!';

  $email = trim($_POST['email']);
  $speciality = trim($_POST['speciality']);
  $get_email = trim($_POST['get-email']);

  if (!empty($email) && !empty($speciality) && !empty($get_email)) {
    $headers = array(
      'From: ' . $from,
    );
    $msg = "email: $email \n speciality: $speciality \n phone: $get_email";
       
    wp_mail($to, $subject, $msg, $headers);

    echo 'success';
    exit();
  };
?>

<?php 
function newPagedUrl($paged) {
  $currentUrl = strtok($_SERVER['REQUEST_URI'], '?');

  // Параметры, которые вы хотите добавить или изменить
  $newParams = array('paged' => $paged);
  
  parse_str($_SERVER['QUERY_STRING'], $queryParams);
  $mergedParams = array_merge($queryParams, $newParams);
  $newQueryString = http_build_query($mergedParams);
  $newUrl = $currentUrl . '?' . $newQueryString;
  return $newUrl;
}
?>

<?php

$db_host = DB_HOST;
$db_name = DB_NAME;
$db_user = DB_USER;
$db_password = DB_PASSWORD;

try {
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$states = $pdo->query("SELECT id, state_name FROM api_states")->fetchAll(PDO::FETCH_ASSOC);
$categories = $pdo->query("SELECT id, name FROM api_professions_categories")->fetchAll(PDO::FETCH_ASSOC);

$items = array();

foreach ($categories as $category) {
  $professions = array();

  $id = $category['id'];
  $profs = $pdo->query("SELECT id, name FROM api_professions WHERE category_id = $id")->fetchAll(PDO::FETCH_ASSOC);

  foreach ($profs as $prof) {
    $specialties = array();

    $id = $prof['id'];
    $rows = $pdo->query("SELECT id, name FROM api_specialties WHERE profession_id = $id")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
      $specialties[] = [
        'id' => $row['id'],
        'name' => $row['name'],
      ];
    }

    $professions[] = [
      'id' => $prof['id'],
      'name' => $prof['name'],
      'specialties' => $specialties,
    ];
  }

  $items[] = [
    'id'   => $category['id'],
    'name' => $category['name'],
    'professions' => $professions,
  ];
}

// current parameters
$currentSpecialities = [];

$specialtiesFromParam = $_GET['specialties'];
$specialtyFromVar = get_query_var('specialty_link');

if (isset($specialtiesFromParam) && $specialtiesFromParam != '') {
  $arrayFromParam = explode(',', $specialtiesFromParam);
  $specialtiesCount = $pdo->query("SELECT COUNT(id) as count FROM `api_specialties` WHERE id IN ($specialtiesFromParam)")->fetch(PDO::FETCH_ASSOC);
  if (intval($specialtiesCount['count']) == count($arrayFromParam)) {
    $currentSpecialities = $arrayFromParam;
  }
} else if ($specialtyFromVar != '') {
  $row = $pdo->query("SELECT id, name FROM api_specialties WHERE link = '$specialtyFromVar'")->fetch(PDO::FETCH_ASSOC);
  if (count($row) > 0) {
    $currentSpecialities[] = $row;
  }
}

$currentStates = [];

$statesFromParam = $_GET['location'];
$stateFromVar = get_query_var('state');

if (isset($statesFromParam) && $statesFromParam != '') {
  $arrayFromParam = explode(',', $statesFromParam);
  $row = $pdo->query("SELECT COUNT(id) as count FROM api_states WHERE id IN ($statesFromParam)")->fetch(PDO::FETCH_ASSOC);
  if (intval($row['count']) == count($arrayFromParam)) {
    $currentStates = $arrayFromParam;
  }
} else if ($stateFromVar != '') {
  $row = $pdo->query("SELECT id FROM api_states WHERE state_link = '$stateFromVar'")->fetch(PDO::FETCH_ASSOC);
  if (count($row) > 0) {
    $currentStates[] = $row['id'];
  }
}

// current parameters end

$paged = isset($_GET['paged']) && is_numeric($_GET['paged']) ? $_GET['paged'] : 1;
$offset = isset($_GET['paged']) && is_numeric($_GET['paged']) ? ($_GET['paged']-1) * 6 : 0;

$sql = "SELECT id, title, description, start_date, end_date, state_id,
          (SELECT state_name FROM api_states WHERE id = state_id) as state, city,
          (SELECT state_code FROM api_states WHERE id = state_id) as state_code,
          (SELECT name FROM api_duration_types WHERE id = duration) as duration,
          weekly_pay_range_low, weekly_pay_range_high, duration_length, vacancy_link
        FROM api_vacancies WHERE 1 ";

if (count($currentStates) > 0) $sql .= " AND state_id IN ($statesFromParam)";
if (count($currentSpecialities) > 0) $sql .= " AND specialty_id IN ($specialtiesFromParam)";

$stmt = $pdo->prepare($sql . " ORDER BY weekly_pay_range_low DESC LIMIT 6 OFFSET :offset");

$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// pagination
$total_pages = 1;

$sql = "SELECT COUNT(id) as count FROM api_vacancies WHERE 1 ";
if (count($currentStates) > 0) $sql .= " AND state_id IN ($statesFromParam)";
if (count($currentSpecialities) > 0) $sql .= " AND specialty_id IN ($specialtiesFromParam)";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_pages = ceil($result['count'] / 6);
?>

<?php
  get_header();
  /* Template Name: search-jobs */
?>

<div class='search-jobs-page'>

  <div class='animate-header'>
    <div class='search-jobs-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>
      <div class='container'>
        <div class='H1'><?php echo get_field('first_title'); ?></div>
        <p class='body-1'><?php echo get_field('first_description'); ?></p>
      </div>
    </div>
  </div>
  <div class='animate-content'>
    <div class='search-jobs-second container body-2'>
      
      <form class='top' autocomplete="off">
        <div class='left'>
          
          <div class='dropdown'>
            <input id='profession-dropdown' class='hidden' type='hidden' name='specialties' value='<?php echo $specialtiesFromParam; ?>' />
            <div class='select' data-placeholder='Select Specialties by Profession'>
              <div class='values'>
                <div class='placeholder'>Select Specialties by Profession</div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.5" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="#606C77"/></svg>
            </div>
            <div class='options' data-type='multi'>

              <div class='categories'>
                <?php foreach ($items as $category): ?>
                <div class='category H5' data-category-id='<?php echo $category['id'] ?>'><?php echo $category['name'] ?></div>
                <?php endforeach; ?>
              </div>

              <?php foreach ($items as $category): ?>
              <div class='professions' data-category-id='<?php echo $category['id']; ?>'>
                <div class='back-to-categories body-3'>Back to Profession Type</div>
                <div class='item H5'><?php echo $category['name']; ?></div>
                <div class='list body-2'>
                  <?php foreach ($category['professions'] as $profession): ?>
                  <div class='item profession-name' data-profession-id='<?php echo $profession['id']; ?>'><?php echo $profession['name']; ?></div>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php endforeach; ?>
              
              <?php
              foreach ($items as $category):
                foreach ($category['professions'] as $profession):
              ?>
              <div class='specialities' data-profession-id='<?php echo $profession['id'] ?>'>
                <div class='back-to-professions body-3' data-category-id='<?php echo $category['id'] ?>'>Back to <?php echo $category['name'] ?> Professions</div>
                <div class='item H5'><?php echo $category['name'] ?></div>
                <div class='list'>
                  <?php foreach ($profession['specialties'] as $specialty): ?>
                  <label class='item checkbox' data-value='<?php echo $specialty['id'] ?>'>
                    <p><?php echo $specialty['name']; ?></p>
                    <?php 
                    $isChecked = '';
                    $condition = in_array(intval($specialty['id']), $currentSpecialities);
                    if ($condition) {
                      $isChecked = 'checked="true"';
                    }
                    ?>
                    <input type='checkbox' <?php echo $isChecked; ?> />
                  </label>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php endforeach;
            endforeach; ?>

            </div>
          </div>

          <div class='dropdown'>
            <input class='hidden' type='hidden' name='location' value='<?php echo $statesFromParam; ?>' />
            <div class='select' data-placeholder='Location'>
              <div class='values'>
                <div class='placeholder'>Location</div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.5" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="#606C77"/></svg>
            </div>
            <div class='options'>
              <div class='states-title H5'>STATES</div>
              <?php foreach ($states as $state) : ?>
              <label class='checkbox' data-value='<?php echo $state['id']; ?>'>
                <p><?php echo $state['state_name']; ?></p>
                <?php 
                $isChecked = '';
                $condition = in_array(intval($state['id']), $currentStates);
                if ($condition) {
                  $isChecked = 'checked="true"';
                }
                ?>
                <input type='checkbox' <?php echo $isChecked; ?> />
              </label>
              <?php endforeach; ?>
            </div>
          </div>

        </div>
        <div class='right'>
          <button class='search button'>
            <div class='icon'><Search /></div>
            <span>Find Vacancies</span>
          </button>
          <a href='<?php echo strtok($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], '?'); ?>' class='reset button-2 H5'>Clear all</a>
        </div>
      </form>

      <!-- <div class='middle'>
        <div class='enabled'>
          <span>Enabled</span>
          <div class='icon'><svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M10.8033 9.6967L21.4099 20.3033M21.4099 9.6967L10.8033 20.3033" stroke="#606C77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg></div>
        </div>
        <div class='clear'>
          <span>Clear all</span>
          <div class='icon'><svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M10.8033 9.6967L21.4099 20.3033M21.4099 9.6967L10.8033 20.3033" stroke="#606C77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg></div>
        </div>
      </div> -->

      <div class='bottom'>

        <div class='list'>

          <?php if ($result['count'] == 0) { ?><div class='empty'>No results</div><?php } ?>

          <?php foreach ($jobs as $job): ?>

          <div class='block'>
            <img src='<?php echo IMAGES . 'states/' . $job['state_id'] . '.jpg'; ?>' />
            <div class='content body-2'>
              <a class='H4 blue' href='/travel-nursing-job/<?php echo $job['vacancy_link']; ?>'><?php echo $job['title']; ?></a>

              <div class='item'>
                <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M9.80076 7H11.4722C11.7118 6.99999 11.9184 6.99999 12.0886 7.01408C12.2683 7.02896 12.4469 7.06182 12.6188 7.15058C12.8749 7.28279 13.0841 7.4938 13.2151 7.75425C13.3027 7.92842 13.3351 8.10943 13.3498 8.2913C13.3637 8.46362 13.3636 8.67277 13.3636 8.91505V9.8427C13.4898 9.79953 13.617 9.78179 13.7443 9.77299C13.8866 9.76315 14.0587 9.76315 14.2581 9.76316H14.2871C14.4865 9.76315 14.6586 9.76315 14.8011 9.77299C14.951 9.78335 15.101 9.80614 15.2492 9.86832C15.5836 10.0086 15.8488 10.2779 15.9871 10.6161C16.0484 10.7662 16.0709 10.9181 16.0812 11.07C16.0909 11.2144 16.0909 11.3889 16.0909 11.5912V14.8289H16.5455C16.7965 14.8289 17 15.0351 17 15.2895C17 15.5438 16.7965 15.75 16.5455 15.75H7.45455C7.20351 15.75 7 15.5438 7 15.2895C7 15.0351 7.20351 14.8289 7.45455 14.8289H7.90909L7.90909 8.91656C7.90908 8.67378 7.90908 8.46431 7.92299 8.29177C7.93766 8.10969 7.97007 7.92853 8.05772 7.75425C8.18845 7.49429 8.39696 7.28304 8.65355 7.15058C8.82557 7.06178 9.00437 7.02895 9.18408 7.01408C9.35439 6.99999 9.56114 6.99999 9.80076 7ZM8.81818 14.8289H12.4545V11.5905C12.4545 11.5821 12.4545 11.5738 12.4545 11.5654V8.93279C12.4545 8.66778 12.4542 8.49662 12.4437 8.36632C12.4336 8.24137 12.4165 8.19507 12.4051 8.1724C12.3618 8.08625 12.2921 8.01565 12.2061 7.97125C12.1836 7.95962 12.1378 7.94229 12.0145 7.93207C11.8858 7.92141 11.7167 7.92105 11.4546 7.92105H9.81827C9.55621 7.92105 9.38693 7.92141 9.25809 7.93207C9.13452 7.9423 9.08871 7.95966 9.06627 7.97125C8.98074 8.0154 8.9113 8.08575 8.86772 8.1724C8.85629 8.19515 8.83915 8.24156 8.82906 8.36675C8.81854 8.49729 8.81818 8.66879 8.81818 8.9343V14.8289ZM13.3636 11.6053V14.8289H15.1818V11.6053C15.1818 11.3844 15.1816 11.2418 15.1742 11.1328C15.1671 11.0278 15.155 10.9878 15.1472 10.9686C15.1009 10.8555 15.0125 10.7659 14.9013 10.7193C14.8825 10.7113 14.843 10.6991 14.7392 10.6919C14.6314 10.6845 14.4906 10.6842 14.2726 10.6842C14.0546 10.6842 13.9139 10.6845 13.8061 10.6919C13.7025 10.6991 13.663 10.7113 13.6441 10.7193C13.5329 10.7659 13.4445 10.8556 13.3982 10.9686C13.3904 10.9878 13.3783 11.0278 13.3712 11.1327C13.3639 11.2418 13.3636 11.3844 13.3636 11.6053ZM9.27273 9.30263C9.27273 9.04829 9.47623 8.84211 9.72727 8.84211H11.5455C11.7965 8.84211 12 9.04829 12 9.30263C12 9.55697 11.7965 9.76316 11.5455 9.76316H9.72727C9.47623 9.76316 9.27273 9.55697 9.27273 9.30263ZM9.27273 10.6842C9.27273 10.4299 9.47623 10.2237 9.72727 10.2237H11.5455C11.7965 10.2237 12 10.4299 12 10.6842C12 10.9386 11.7965 11.1447 11.5455 11.1447H9.72727C9.47623 11.1447 9.27273 10.9386 9.27273 10.6842Z" fill="#606C77"/></svg></div>
                <span><?php echo $job['city'] . ', ' . $job['state_code']; ?></span>
              </div>
              <div class='item b'>
                <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.76923C14.315 8.13692 13.109 7.69754 12 7.66985M12 7.66985C10.68 7.63662 9.5 8.18769 9.5 9.69231C9.5 12.4615 15 11.0769 15 13.8462C15 15.4255 13.536 16.104 12 16.0532M12 7.66985V6M9 14.7692C9.644 15.5631 10.843 16.0154 12 16.0532M12 16.0532V18" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <span>Weekly Pay: $<?php echo $job['weekly_pay_range_low']; ?> - $<?php echo $job['weekly_pay_range_high']; ?></span>
              </div>
              <div class='item'>
                <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                <span><?php echo $job['duration_length'] . ' ' . $job['duration']; ?></span>
              </div>

              <div class='buttons'>
                <a href='/apply-now' class='H5 apply button-2'>Apply now</a>
                <button class='H5 details button-2 deatils-open-button'>Details</button>
              </div>
            </div>
            <div class='detail-info' style='display: none;'>
              <div class='close-detail'><svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M10.8033 9.6967L21.4099 20.3033M21.4099 9.6967L10.8033 20.3033" stroke="#606C77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g></svg></div>
              <div class='segment'>
                <div class='mini-title'>Details</div>
                <div class='H3 blue'><?php echo $job['title']; ?></div>
              </div>
      
              <div class='segment'>
                <div class='item'>
                  <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M9.80076 7H11.4722C11.7118 6.99999 11.9184 6.99999 12.0886 7.01408C12.2683 7.02896 12.4469 7.06182 12.6188 7.15058C12.8749 7.28279 13.0841 7.4938 13.2151 7.75425C13.3027 7.92842 13.3351 8.10943 13.3498 8.2913C13.3637 8.46362 13.3636 8.67277 13.3636 8.91505V9.8427C13.4898 9.79953 13.617 9.78179 13.7443 9.77299C13.8866 9.76315 14.0587 9.76315 14.2581 9.76316H14.2871C14.4865 9.76315 14.6586 9.76315 14.8011 9.77299C14.951 9.78335 15.101 9.80614 15.2492 9.86832C15.5836 10.0086 15.8488 10.2779 15.9871 10.6161C16.0484 10.7662 16.0709 10.9181 16.0812 11.07C16.0909 11.2144 16.0909 11.3889 16.0909 11.5912V14.8289H16.5455C16.7965 14.8289 17 15.0351 17 15.2895C17 15.5438 16.7965 15.75 16.5455 15.75H7.45455C7.20351 15.75 7 15.5438 7 15.2895C7 15.0351 7.20351 14.8289 7.45455 14.8289H7.90909L7.90909 8.91656C7.90908 8.67378 7.90908 8.46431 7.92299 8.29177C7.93766 8.10969 7.97007 7.92853 8.05772 7.75425C8.18845 7.49429 8.39696 7.28304 8.65355 7.15058C8.82557 7.06178 9.00437 7.02895 9.18408 7.01408C9.35439 6.99999 9.56114 6.99999 9.80076 7ZM8.81818 14.8289H12.4545V11.5905C12.4545 11.5821 12.4545 11.5738 12.4545 11.5654V8.93279C12.4545 8.66778 12.4542 8.49662 12.4437 8.36632C12.4336 8.24137 12.4165 8.19507 12.4051 8.1724C12.3618 8.08625 12.2921 8.01565 12.2061 7.97125C12.1836 7.95962 12.1378 7.94229 12.0145 7.93207C11.8858 7.92141 11.7167 7.92105 11.4546 7.92105H9.81827C9.55621 7.92105 9.38693 7.92141 9.25809 7.93207C9.13452 7.9423 9.08871 7.95966 9.06627 7.97125C8.98074 8.0154 8.9113 8.08575 8.86772 8.1724C8.85629 8.19515 8.83915 8.24156 8.82906 8.36675C8.81854 8.49729 8.81818 8.66879 8.81818 8.9343V14.8289ZM13.3636 11.6053V14.8289H15.1818V11.6053C15.1818 11.3844 15.1816 11.2418 15.1742 11.1328C15.1671 11.0278 15.155 10.9878 15.1472 10.9686C15.1009 10.8555 15.0125 10.7659 14.9013 10.7193C14.8825 10.7113 14.843 10.6991 14.7392 10.6919C14.6314 10.6845 14.4906 10.6842 14.2726 10.6842C14.0546 10.6842 13.9139 10.6845 13.8061 10.6919C13.7025 10.6991 13.663 10.7113 13.6441 10.7193C13.5329 10.7659 13.4445 10.8556 13.3982 10.9686C13.3904 10.9878 13.3783 11.0278 13.3712 11.1327C13.3639 11.2418 13.3636 11.3844 13.3636 11.6053ZM9.27273 9.30263C9.27273 9.04829 9.47623 8.84211 9.72727 8.84211H11.5455C11.7965 8.84211 12 9.04829 12 9.30263C12 9.55697 11.7965 9.76316 11.5455 9.76316H9.72727C9.47623 9.76316 9.27273 9.55697 9.27273 9.30263ZM9.27273 10.6842C9.27273 10.4299 9.47623 10.2237 9.72727 10.2237H11.5455C11.7965 10.2237 12 10.4299 12 10.6842C12 10.9386 11.7965 11.1447 11.5455 11.1447H9.72727C9.47623 11.1447 9.27273 10.9386 9.27273 10.6842Z" fill="#606C77"/></svg></div>
                  <span><?php echo $job['city'] . ', ' . $job['state_code']; ?></span>
                </div>
                <div class='item b'>
                  <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15 8.76923C14.315 8.13692 13.109 7.69754 12 7.66985M12 7.66985C10.68 7.63662 9.5 8.18769 9.5 9.69231C9.5 12.4615 15 11.0769 15 13.8462C15 15.4255 13.536 16.104 12 16.0532M12 7.66985V6M9 14.7692C9.644 15.5631 10.843 16.0154 12 16.0532M12 16.0532V18" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                  <span>Weekly Pay: $<?php echo $job['weekly_pay_range_low']; ?> - $<?php echo $job['weekly_pay_range_high']; ?></span>
                </div>
                <div class='item'>
                  <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 6V12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/><path d="M16.24 16.24L12 12" stroke="#606C77" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
                  <span><?php echo $job['duration_length'] . ' ' . $job['duration']; ?></span>
                </div>
              </div>
      
              <div class='segment'>
                <p>Start date - <?php echo $job['start_date']; ?></p>
                <p>End date -<?php echo $job['end_date']; ?></p>
              </div>
      
              <div class='segment'>
                <div class='H5 blue'>Job Description</div>
                <p><?php echo $job['description']; ?></p>
              </div>
      
              <a href='/apply-now' class='H5 apply button-2'>Apply now</a>
      
            </div>
          </div>

          <?php endforeach; ?>

        </div>

        <div class='box' id='right-box'>
          <!-- <form id='search-jobs-form'>
            <div class='H3'>Create Job Alert</div>
            <div class='input-item' id='email-input'>
              <input type='email' name='email' placeholder='Email*' />
              <div class='error-message'>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
                <span>Invalid input</span>
              </div>
            </div>
            <div class='input-item' id='speciality-input'>
              <input type='text' name='speciality' placeholder='Speciality*' />
              <div class='error-message'>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
                <span>Invalid input</span>
              </div>
            </div>
            <div class='row'>
              <div>You'll get emails</div>
              <div class='input-item' id='get-email-input'>
                <div class='dropdown'>
                  <input class='hidden' type='hidden' name='get-email' value='' />
                  <div class='select'>
                    <input type='text' readonly placeholder='Choose' />
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.5" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="#606C77"/></svg>
                  </div>
                  <div class='options'>
                    <div class='option' data-value='Daily'>Daily</div>
                    <div class='option' data-value='Weekly'>Weekly</div>
                    <div class='option' data-value='Monthly'>Monthly</div>
                  </div>
                </div>
                <div class='error-message'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
                  <span>Empty field</span>
                </div>
              </div>   
            </div>
            <div class='bot'>
              <button class='button'>Create</button>
              <p class='body-3'>* - required field</p>
            </div>
          </form> -->
        </div>

      </div>

      <?php
      
      $itemsPerPage = 6;
      $page = $paged;
      $totalItems = $result['count'];
      $totalPages = ceil($totalItems / $itemsPerPage);

      $visiblePages = 5;

      $startVisible = max(1, $page - floor($visiblePages / 2));
      $endVisible = min($startVisible + $visiblePages - 1, $totalPages);
      
      // Определение начального и конечного индексов для текущей страницы
      $startIndex = max(0, min(($page - 1) * $itemsPerPage, $totalItems - $itemsPerPage));
      $endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);
      if ($total_pages > 1) {
      ?>

      <div class='page-pagination'>
        <div class='wrapper'>
        <?php
        if ($paged != 1) { ?>
          <a href='<?php echo newPagedUrl($paged-1) ?>' class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <?php } else { ?>
          <div class='item inactive'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <?php }
          if ($startVisible > 1) {
            if ($i == $paged) {?>
            <div class='item active'>1</div>
            <?php } else {?>
            <a class='item' href='<?php echo newPagedUrl(1); ?>'>1</a>
            <?php }
            echo '...';
          }
          
          for ($i = $startVisible; $i <= $endVisible; $i++) {
            if ($i == $paged) {?>
            <div class='item active'><?php echo $i ?></div>
            <?php } else {?>
            <a class='item' href='<?php echo newPagedUrl($i); ?>'><?php echo $i ?></a>
            <?php }
          }
          
          if ($endVisible < $totalPages) {
            echo '...';
            if ($totalPages == $paged) {?>
            <div class='item active'><?php echo $totalPages ?></div>
            <?php } else {?>
            <a class='item' href='<?php echo newPagedUrl($totalPages); ?>'><?php echo $totalPages ?></a>
            <?php }
          }
          if ($paged != $total_pages) {
          ?>
            <a href='<?php echo newPagedUrl($paged+1) ?>' class='item'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.5L15 12L10 6.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <?php } else {?>
            <div class='item inactive'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.5L15 12L10 6.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>

      <!-- <form id='search-jobs-from-two'>
        <div class='H3'>Create Job Alert</div>
        <div class='input-item' id='email-input-2'>
          <input type='email' name='email' placeholder='Email*' />
          <div class='error-message'>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
            <span>Invalid input</span>
          </div>
        </div>
        <div class='input-item' id='speciality-input-2'>
          <input type='text' name='speciality' placeholder='Speciality*' />
          <div class='error-message'>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
            <span>Invalid input</span>
          </div>
        </div>
        <div class='row'>
          <div>You'll get emails</div>
          <div class='input-item' id='get-email-input-2'>
            <div class='dropdown'>
              <input class='hidden' type='hidden' name='get-email' value='' />
              <div class='select'>
                <input type='text' readonly placeholder='Choose' />
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.5" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="#606C77"/></svg>
              </div>
              <div class='options'>
                <div class='option' data-value='Daily'>Daily</div>
                <div class='option' data-value='Weekly'>Weekly</div>
                <div class='option' data-value='Monthly'>Monthly</div>
              </div>
            </div>
            <div class='error-message'>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><g clip-path="url(#clip0_271_22126)"><path d="M12 4C10.4178 4 8.87104 4.46919 7.55544 5.34824C6.23985 6.22729 5.21447 7.47672 4.60897 8.93853C4.00347 10.4003 3.84504 12.0089 4.15372 13.5607C4.4624 15.1126 5.22433 16.538 6.34315 17.6569C7.46197 18.7757 8.88743 19.5376 10.4393 19.8463C11.9911 20.155 13.5997 19.9965 15.0615 19.391C16.5233 18.7855 17.7727 17.7602 18.6518 16.4446C19.5308 15.129 20 13.5823 20 12C20 9.87827 19.1572 7.84344 17.6569 6.34315C16.1566 4.84286 14.1217 4 12 4ZM11.0067 8C11.0067 7.73478 11.112 7.48043 11.2996 7.29289C11.4871 7.10536 11.7415 7 12.0067 7C12.2719 7 12.5262 7.10536 12.7138 7.29289C12.9013 7.48043 13.0067 7.73478 13.0067 8V12.5933C13.0067 12.7247 12.9808 12.8547 12.9306 12.976C12.8803 13.0973 12.8066 13.2076 12.7138 13.3004C12.6209 13.3933 12.5107 13.467 12.3894 13.5172C12.268 13.5675 12.138 13.5933 12.0067 13.5933C11.8754 13.5933 11.7453 13.5675 11.624 13.5172C11.5027 13.467 11.3924 13.3933 11.2996 13.3004C11.2067 13.2076 11.133 13.0973 11.0828 12.976C11.0325 12.8547 11.0067 12.7247 11.0067 12.5933V8ZM12 17C11.7732 17 11.5515 16.9328 11.363 16.8068C11.1744 16.6808 11.0274 16.5017 10.9406 16.2921C10.8538 16.0826 10.8311 15.8521 10.8754 15.6296C10.9196 15.4072 11.0288 15.2029 11.1892 15.0425C11.3496 14.8822 11.5539 14.7729 11.7763 14.7287C11.9987 14.6845 12.2293 14.7072 12.4388 14.794C12.6483 14.8807 12.8274 15.0277 12.9534 15.2163C13.0794 15.4049 13.1467 15.6265 13.1467 15.8533C13.1467 16.1575 13.0259 16.4491 12.8108 16.6642C12.5958 16.8792 12.3041 17 12 17Z" fill="#CE1515"/></g><defs><clipPath id="clip0_271_22126"><rect width="24" height="24" fill="white"/></clipPath></defs></svg>
              <span>Empty field</span>
            </div>
          </div>   
        </div>
        <div class='bot'>
          <button class='button'>Create</button>
          <p class='body-3'>* - required field</p>
        </div>
      </form> -->

    </div>
  </div>

</div>

<script type='text/javascript'>
const detailOpenListener = (e) => {
  const toHides = document.querySelectorAll('.toHide');
  toHides.forEach(e => e.remove())

  const newElem = e.currentTarget.parentElement.parentElement.parentElement.querySelector('.detail-info').cloneNode(true);
  newElem.removeAttribute('style');
  newElem.classList.add('toHide');

  if (window.innerWidth > 912) {
    const box = document.querySelector('#right-box');
    box.insertBefore(newElem, document.querySelector('#search-jobs-form'));
    document.querySelector('.top').scrollIntoView();
  } else {
    const box = e.currentTarget.parentElement.parentElement.parentElement.parentElement;
    box.insertBefore(newElem, e.currentTarget.parentElement.parentElement.parentElement.nextSibling);
  }

  const closeListener = (e) => {
    e.currentTarget.parentNode.remove();
    document.querySelectorAll('.close-detail').forEach(e => e.addEventListener('click', closeListener));
  };
  const closes = document.querySelectorAll('.close-detail');
  closes.forEach(e => e.addEventListener('click', closeListener));
};

const details = document.querySelectorAll('.deatils-open-button');
details.forEach(e => e.addEventListener('click', detailOpenListener))
</script>

<script type='text/javascript'>
document.getElementById('search-jobs-form').addEventListener('submit', async (e) => {
  e.preventDefault();

  const inputs = [
    document.querySelector('#email-input'),
    document.querySelector('#speciality-input'),
  ];
  const dropdowns = [
    document.querySelector('#get-email-input'),
  ];

  const isValidForm = formGuard(inputs, dropdowns);

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

document.getElementById('search-jobs-from-two').addEventListener('submit', async (e) => {
  e.preventDefault();

  const inputs = [
    document.querySelector('#email-input-2'),
    document.querySelector('#speciality-input-2'),
  ];
  const dropdowns = [
    document.querySelector('#get-email-input-2'),
  ];

  const isValidForm = formGuard(inputs, dropdowns);

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