<?php
try {
  $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Ошибка подключения к базе данных: " . $e->getMessage());
}

$paged = isset($_GET['paged']) && is_numeric($_GET['paged']) ? $_GET['paged'] : 1;
$offset = isset($_GET['paged']) && is_numeric($_GET['paged']) ? ($_GET['paged']-1) * 30 : 0;
$query = isset($_GET['query']) ? $_GET['query'] . '%' : '';

$sql = "SELECT api_specialties.* FROM api_specialties
          JOIN api_professions ON api_specialties.profession_id = api_professions.id
          JOIN api_professions_categories ON api_professions.category_id = api_professions_categories.id
        WHERE api_professions_categories.id = 1";

if ($query != '') $sql .= " AND api_specialties.name LIKE :name";

$sql .= ' LIMIT 30 OFFSET :offset;';
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
if ($query != '') $stmt->bindParam(':name', $query, PDO::PARAM_STR);

$stmt->execute();
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT COUNT(api_specialties.id) as count FROM api_specialties
JOIN api_professions ON api_specialties.profession_id = api_professions.id
JOIN api_professions_categories ON api_professions.category_id = api_professions_categories.id
WHERE api_professions_categories.id = 1";
if ($query != '') $sql .= " AND api_specialties.name LIKE :name";
$stmt = $pdo->prepare($sql);
if ($query != '') $stmt->bindParam(':name', $query, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$total_pages = ceil($result['count'] / 30);
?>

<?php
/* Template Name: nursing-jobs-by-specialty */
get_header();
?>

<div class='jobs-page'>
  <div class='first'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>
    <div class='container'>
      <div class='title H1'>Join the TLC Nursing Family!</div>
      <form class='global-search-form' autocomplete='off'>
        <input type='text' name='query' placeholder='Specialty...' />
        <button><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7422 14.3439C16.5329 13.2673 17 11.9382 17 10.5C17 6.91015 14.0899 4 10.5 4C6.91015 4 4 6.91015 4 10.5C4 14.0899 6.91015 17 10.5 17C11.9386 17 13.268 16.5327 14.3448 15.7415L14.3439 15.7422C14.3734 15.7822 14.4062 15.8204 14.4424 15.8566L18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L15.8566 14.4424C15.8204 14.4062 15.7822 14.3734 15.7422 14.3439ZM16 10.5C16 13.5376 13.5376 16 10.5 16C7.46243 16 5 13.5376 5 10.5C5 7.46243 7.46243 5 10.5 5C13.5376 5 16 7.46243 16 10.5Z" fill="currentColor"/></svg></button>
      </form>
    </div>
  </div>
  
  <div class='second container'>
    <div class='letters'>
      <?php
      $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      foreach (str_split($alphabet) as $letter):
      ?>
      <a href='<?php echo strtok($_SERVER['REQUEST_URI'], '?') . '?query=' . $letter; ?>'><?php echo $letter; ?></a>
      <?php endforeach; ?>
    </div>

    <div class='list'>

      <?php foreach ($jobs as $job): ?>
      <div class='item H5'>
        <div class='content'><?php echo $job['name']; ?></div>
        <a class='link' href='/nursing-jobs-by-specialty/<?php echo $job['link']; ?>'>
          <span>View jobs</span>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.5L15 12L10 6.5" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>
      <?php endforeach; ?>

    </div>
    <?php if ($result['count'] == 0) { ?><center><div class='empty'>No results</div></center><?php } ?>

    <?php if ($total_pages > 1) { ?>
    <div class='page-pagination'>
      <div class='wrapper'>
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
        
        if ($paged != 1) { ?>
          <a href='<?php echo newPagedUrl($paged-1) ?>' class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
        <?php } else { ?>
          <div class='item'><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M14 6.5L9 12L14 17.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
        <?php }
          for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $paged) {?>
            <div class='item active'><?php echo $i ?></div>
            <?php } else {?>
            <a class='item' href='<?php echo newPagedUrl($i); ?>'><?php echo $i ?></a>
            <?php }
          }
          if ($paged != $total_pages) {
          ?>
            <a href='<?php echo newPagedUrl($paged+1) ?>' class='item'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.5L15 12L10 6.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
          <?php } else {?>
            <div class='item'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 17.5L15 12L10 6.5" stroke="#606C77" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <?php } ?>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php get_footer(); ?>