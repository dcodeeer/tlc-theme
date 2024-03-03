<?php
  get_header();
  /* Template Name: search-jobs-career */
?>

<div class='career-search-jobs-page'>
  <div class='animate-header'>
    <div class='career-search-jobs-first'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>
    <img src='<?php the_post_thumbnail_url('full'); ?>' />
  </div>
  </div>
  <div class='animate-content'>
    <div class='career-search-jobs container'>
      <div class='title H1'><?php echo get_field('first_title'); ?></div>
      <div class='description H3'><?php echo get_field('first_description'); ?></div>
    </div>
    <div class='career-search-jobs-third container'>
      <!--<img src='/pictures/career-search-jobs/2.png' />-->
    </div>
    <div class='career-search-jobs-fourth'>
      <div class='container'>

        <div class='top'>
          <div class='left'>
            <div class='title H3'><?php echo get_field('second_title'); ?></div>
            <div class='body-2'><?php echo nl2br(get_field('second_content_1')); ?></div>
          </div>
          <img src='<?php echo get_field('second_image'); ?>' />
        </div>

        <div class='bottom body-2'><?php echo nl2br(get_field('second_content_2')); ?></div>

      </div>
    </div>
    <div class='career-search-jobs-fifth container'>
      <div class='title H3'><?php echo get_field('third_title'); ?></div>
      <p class='body-2'><?php echo get_field('third_text_1'); ?></p>
      <p class='body-2'><?php echo get_field('third_text_2'); ?></p>

      <div class='list'>
        
        <?php 
          $items = get_field('third_list');
          foreach ($items as $item):
        ?>
        <div class='block'>
          <div class='top'>
            <div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 5.25H15.75V11.25V20.25H14.25V13.5H9.75V20.25H8.25V14.25V5.25ZM11.25 20.25H12.75V15H11.25V20.25ZM15.75 21.75H8.25H6.75H2.25V14.25H6.75V3.75H17.25V11.25H21.75V21.75H17.25H15.75ZM6.75 15.75V20.25H3.75V15.75H6.75ZM17.25 20.25H20.25V12.75H17.25V20.25ZM11.25 7.5V8.25H10.5V9.75H11.25V10.5H12.75V9.75H13.5V8.25H12.75V7.5H11.25Z" fill="white"/></svg></div>
            <div class='title H5'><?php echo $item['title']; ?></div>
          </div>
          <p class='body-2'><?php echo $item['text']; ?></p>
        </div>

        <?php endforeach; ?>

      </div>

      <p class='body-2'><?php echo get_field('third_text_3'); ?></p>
    </div>
    <div class='career-search-jobs-sixth'>
      <div class='container body-2'>
        <div class='title H3'><?php echo get_field('fourth_title'); ?>​</div>
        <div class='body-2'><?php echo nl2br(get_field('fourth_content')); ?></div>
      </div>
    </div>
    <div class='career-search-jobs-seventh container body-2'>
      <div class='title H3'><?php echo get_field('fifth_title'); ?></div>
      <p><?php echo get_field('fifth_text_1'); ?></p>

      <div class='list body-2'>
        
        <?php
          $items = get_field('fifth_list');
          foreach ($items as $item):
        ?>
        <div class='item'>
          <div class='icon'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="35 18 40 40"><g id="Icon/"><g id="Ellipse 1" filter="url(#filter0_ddddd_266_75445)"><circle cx="55" cy="38" r="20" fill="transparent"></circle><circle cx="55" cy="38" r="19" stroke="#15D199" stroke-width="2"></circle></g><path id="Vector" d="M55.5385 32L62 38.5M62 38.5L55.5385 45M62 38.5H48" stroke="#15D199" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><filter id="filter0_ddddd_266_75445" x="0.73008" y="0.457059" width="108.54" height="113.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_266_75445" result="effect2_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_266_75445" result="effect3_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_266_75445" result="effect4_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_266_75445" result="effect5_dropShadow_266_75445"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_266_75445" result="shape"></feBlend></filter></defs></svg></div>
          <p><?php echo $item['text']; ?></p>
        </div>
        <?php endforeach; ?>

      </div>

      <p><?php echo get_field('fifth_text_2'); ?></p>
    </div>
    <div class='career-search-jobs-eighth'>
      <div class='container body-2'>

        <div class='title H3'><?php echo get_field('sixth_title'); ?></div>
        <p><?php echo get_field('sixth_text_1'); ?></p>

        <div class='list'>

          <?php
            $items = get_field('sixth_list');
            foreach ($items as $item):
          ?>
          <div class='block'>
            <img src='<?php echo $item['image']; ?>' />
            <div class='content'><?php echo $item['text']; ?></div>
          </div>
          <?php endforeach; ?>

        </div>

        <div class='body-2'><?php echo nl2br(get_field('sixth_text_2')); ?></div>

      </div>
    </div>
    <div class='career-search-jobs-ninth container body-2'>
      <div class='title H3'><?php echo get_field('seventh_title'); ?></div>
      <p><?php echo get_field('seventh_text_1'); ?></p>

      <div class='list body-2'>

        <?php
          $items = get_field('seventh_list');
          foreach ($items as $item):
        ?>
        <div class='item'>
          <div class='icon'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="35 18 40 40"><g id="Icon/"><g id="Ellipse 1" filter="url(#filter0_ddddd_266_75445)"><circle cx="55" cy="38" r="20" fill="transparent"></circle><circle cx="55" cy="38" r="19" stroke="#15D199" stroke-width="2"></circle></g><path id="Vector" d="M55.5385 32L62 38.5M62 38.5L55.5385 45M62 38.5H48" stroke="#15D199" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><filter id="filter0_ddddd_266_75445" x="0.73008" y="0.457059" width="108.54" height="113.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset></feOffset><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="1.22393"></feOffset><feGaussianBlur stdDeviation="5.71165"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.03 0"></feColorMatrix><feBlend mode="normal" in2="effect1_dropShadow_266_75445" result="effect2_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="5.30368"></feOffset><feGaussianBlur stdDeviation="10.6074"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect2_dropShadow_266_75445" result="effect3_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="11.8313"></feOffset><feGaussianBlur stdDeviation="14.6871"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.02 0"></feColorMatrix><feBlend mode="normal" in2="effect3_dropShadow_266_75445" result="effect4_dropShadow_266_75445"></feBlend><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix><feOffset dy="21.2147"></feOffset><feGaussianBlur stdDeviation="17.135"></feGaussianBlur><feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.01 0"></feColorMatrix><feBlend mode="normal" in2="effect4_dropShadow_266_75445" result="effect5_dropShadow_266_75445"></feBlend><feBlend mode="normal" in="SourceGraphic" in2="effect5_dropShadow_266_75445" result="shape"></feBlend></filter></defs></svg></div>
          <p><?php echo $item['text'] ?></p>
        </div>
        <?php endforeach; ?>

      </div>

      <div class='body-2'><?php echo nl2br(get_field('seventh_text_2')); ?></div>
    </div>
    <div class='tenth'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>