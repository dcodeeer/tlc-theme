<?php
  get_header();
  /* Template Name: cookies */
?>

<div class='cookies-page'>
  <div class='animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>
    <div class='first'>
      <div class='container'>
        <div class='title H1'><?php echo get_field('first_title'); ?></div>
        <div class='description body-1'><?php echo get_field('first_description'); ?></div>
      </div>
    </div>
  </div>

  <div class='animate-content'>
    <div class='second container'>
      <div class='list'>
        <?php
          $items = get_field('second_list');
          foreach ($items as $item):
        ?>
        <div class='item'>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="35 18 40 40"><g id="Icon/"><g id="Ellipse 1" filter="url(#filter0_ddddd_266_75445)"><circle cx="55" cy="38" r="20" fill="transparent"></circle><circle cx="55" cy="38" r="19" stroke="#15D199" stroke-width="2"></circle></g><path id="Vector" d="M55.5385 32L62 38.5M62 38.5L55.5385 45M62 38.5H48" stroke="#15D199" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><filter id="filter0_ddddd_266_75445" x="0.73008" y="0.457059" width="108.54" height="113.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_266_75445" result="effect2_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_266_75445" result="effect3_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_266_75445" result="effect4_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_266_75445" result="effect5_dropShadow_266_75445"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_266_75445" result="shape"></feBlend></filter></defs></svg>
          <span class='body-2'><?php echo $item['text']; ?></span>
        </div>
        <?php endforeach; ?>
      </div>
      <div class='title H3'><?php echo get_field('second_title_1'); ?></div>
      <div class='list'>
        <?php
          $items = get_field('second_list_1');
          foreach ($items as $item):
        ?>
        <div class='item'>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="35 18 40 40"><g id="Icon/"><g id="Ellipse 1" filter="url(#filter0_ddddd_266_75445)"><circle cx="55" cy="38" r="20" fill="transparent"></circle><circle cx="55" cy="38" r="19" stroke="#15D199" stroke-width="2"></circle></g><path id="Vector" d="M55.5385 32L62 38.5M62 38.5L55.5385 45M62 38.5H48" stroke="#15D199" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><filter id="filter0_ddddd_266_75445" x="0.73008" y="0.457059" width="108.54" height="113.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_266_75445" result="effect2_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_266_75445" result="effect3_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_266_75445" result="effect4_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_266_75445" result="effect5_dropShadow_266_75445"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_266_75445" result="shape"></feBlend></filter></defs></svg>
          <span class='body-2'><?php echo $item['text']; ?></span>
        </div>
        <?php endforeach; ?>
      </div>
      <div class='title H3'><?php echo get_field('second_title_2'); ?></div>
      <div class='list'>
        <?php
          $items = get_field('second_list_2');
          foreach ($items as $item):
        ?>
        <div class='item'>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="35 18 40 40"><g id="Icon/"><g id="Ellipse 1" filter="url(#filter0_ddddd_266_75445)"><circle cx="55" cy="38" r="20" fill="transparent"></circle><circle cx="55" cy="38" r="19" stroke="#15D199" stroke-width="2"></circle></g><path id="Vector" d="M55.5385 32L62 38.5M62 38.5L55.5385 45M62 38.5H48" stroke="#15D199" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><filter id="filter0_ddddd_266_75445" x="0.73008" y="0.457059" width="108.54" height="113.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_266_75445" result="effect2_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_266_75445" result="effect3_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_266_75445" result="effect4_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_266_75445" result="effect5_dropShadow_266_75445"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_266_75445" result="shape"></feBlend></filter></defs></svg>
          <span class='body-2'><?php echo $item['text']; ?></span>
        </div>
        <?php endforeach; ?>
      </div>
      <div class='title H3'><?php echo get_field('second_title_3'); ?></div>
      <div class='list'>
        <?php
          $items = get_field('second_list_3');
          foreach ($items as $item):
        ?>
        <div class='item'>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="35 18 40 40"><g id="Icon/"><g id="Ellipse 1" filter="url(#filter0_ddddd_266_75445)"><circle cx="55" cy="38" r="20" fill="transparent"></circle><circle cx="55" cy="38" r="19" stroke="#15D199" stroke-width="2"></circle></g><path id="Vector" d="M55.5385 32L62 38.5M62 38.5L55.5385 45M62 38.5H48" stroke="#15D199" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><filter id="filter0_ddddd_266_75445" x="0.73008" y="0.457059" width="108.54" height="113.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_266_75445" result="effect2_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_266_75445" result="effect3_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_266_75445" result="effect4_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_266_75445" result="effect5_dropShadow_266_75445"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_266_75445" result="shape"></feBlend></filter></defs></svg>
          <span class='body-2'><?php echo $item['text']; ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class='third container'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>