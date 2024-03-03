<?php
  get_header();
  /* Template Name: lpn-rn-licensing */
?>

<div class='career-licensing-page'>
  <!-- <div class='animate-header'>
    <div class='career-licensing-first'>
      <div class='page-info'>
        <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
      </div>
      <div class='container'>
        <div class='title H1'><?php echo get_field('first_title'); ?></div>
        <form class='global-search-form'>
          <input type='text' name='' placeholder='<?php echo get_field('first_input_placeholder'); ?>' />
          <button><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7422 14.3439C16.5329 13.2673 17 11.9382 17 10.5C17 6.91015 14.0899 4 10.5 4C6.91015 4 4 6.91015 4 10.5C4 14.0899 6.91015 17 10.5 17C11.9386 17 13.268 16.5327 14.3448 15.7415L14.3439 15.7422C14.3734 15.7822 14.4062 15.8204 14.4424 15.8566L18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L15.8566 14.4424C15.8204 14.4062 15.7822 14.3734 15.7422 14.3439ZM16 10.5C16 13.5376 13.5376 16 10.5 16C7.46243 16 5 13.5376 5 10.5C5 7.46243 7.46243 5 10.5 5C13.5376 5 16 7.46243 16 10.5Z" fill="currentColor"/></svg></button>
        </form>
      </div>
    </div>
  </div> -->
  <div class='animate-content'>
    <div class='career-licensing-second container body-2'>

      <div class='segment'>
        <div class='title H1 blue'><?php echo get_field('second_title'); ?></div>

        <div class='info'>
          <div class='left H4'>
            <div class='blue'><?php echo get_field('second_by'); ?></div>
            <div><?php echo get_field('second_position'); ?></div>
          </div>
          <div class='right H5'>
            <div class='content'>
              <div><?php echo get_field('second_updated'); ?></div>
              <div><?php echo get_field('second_published'); ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class='segment'><?php echo nl2br(get_field('second_segment')); ?></div>

      <div class='segment image'>
        <img src='<?php echo get_field('second_image'); ?>' />
      </div>

      <div class='segment'>
        <div class='H1 blue'><?php echo get_field('third_title'); ?></div>
      </div>

      <div class='segment'>
        <div class='H3'><?php echo get_field('third_mini_title_1'); ?></div>
        <div><?php echo nl2br(get_field('third_content_1')); ?></div>
      </div>

      <div class='segment'>
        <div class='H3'><?php echo get_field('third_mini_title_2'); ?></div>
        <div><?php echo get_field('third_content_2'); ?></div>
      </div>

      <div class='segment'>
        <div class='H3'><?php echo get_field('third_mini_title_3'); ?></div>
        <div><?php echo get_field('third_content_3'); ?></div>
      </div>

      <div class='table'>
        <table>
          <tr>
            <th>STATE</th>
            <th>COMPACT</th>
            <th>TEMP PROCESSING TIME</th>
            <th>PERM PROCESSING TIME</th>
            <th>RN FEE</th>
            <th>LPN FEE</th>
          </tr>
          <?php
          $items = get_field('third_table');
          foreach ($items as $item):
          ?>
          <tr>
            <td><?php echo $item['state']; ?></td>
            <td><?php echo $item['compact']; ?></td>
            <td><?php echo $item['temp_processing_time']; ?></td>
            <td><?php echo $item['perm_processing_time']; ?></td>
            <td><?php echo $item['rn_fee']; ?></td>
            <td><?php echo $item['lpn_fee']; ?></td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class='segment'><?php echo get_field('third_content_4'); ?></div>

      <div class='segment'>
        <div class='H3 blue'><?php echo get_field('fourth_title'); ?></div>
        <div><?php echo get_field('fourth_content'); ?></div>
      </div>

      <div class='segment'>
        <div class='H4'><?php echo get_field('fourth_mini_title_1'); ?></div>
        <div><?php echo get_field('fourth_content_1'); ?></div>
      </div>

      <div class='segment'>
        <div class='H4'><?php echo get_field('fourth_mini_title_2'); ?></div>
        <div><?php echo get_field('fourth_content_2'); ?></div>
      </div>

      <div class='segment'>
        <div class='H4'><?php echo get_field('fourth_mini_title_3'); ?></div>
        <div><?php echo nl2br(get_field('fourth_content_3')); ?></div>
      </div>

      <div class='segment'>
        <div class='H4'><?php echo get_field('fourth_mini_title_4'); ?></div>
        <div><?php echo nl2br(get_field('fourth_content_4')); ?></div>
      </div>

      <div class='segment'>
        <div class='H4'><?php echo get_field('fourth_mini_title_5'); ?></div>
        <div><?php echo nl2br(get_field('fourth_content_5')); ?></div>
      </div>

      <div class='segment'>
        <div class='H3 blue'><?php echo get_field('fourth_bottom_title'); ?></div>
        <p><?php echo get_field('fourth_bottom_text'); ?></p>
      </div>

    </div>
    
    <div class='career-licensing-third'>
      <div class='container'>
        <div class='title H1'><?php echo get_field('fifth_title'); ?></div>
        <div class='mini-title H3'><?php echo get_field('fifth_mini_title'); ?></div>
        
        <div class='list'>

          <?php
          $items = get_field('fifth_list');
          for ($i = 1; $i < (count($items) + 1); $i++) {
          ?>
          <div class='accordion'>
            <div class='accordion-content'>
              <div class='number'><?php echo $i; ?>.</div>
              <div class='information'>
                <div class='name'><?php echo $items[$i-1]['title']; ?></div>
                <div class='description'><?php echo $items[$i-1]['text']; ?></div>
              </div>
            </div>
            <button class='faq-page-accordion' data-page='faq-page'><div class='icon'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="currentColor"/></svg></div></button>
          </div> 
          <?php } ?> 

        </div>

      </div>
    </div>

    <div class='fourth'>
      <?php echo do_shortcode('[work_us]'); ?>
    </div>
  </div>
</div>

<script type='text/javascript'>
const faqPageAccordianListener = (e) => {
  e.currentTarget.classList.toggle('faq-page-accordion-active');

  const content = e.currentTarget.previousElementSibling.querySelector('.description');

  content.classList.toggle('active');
};

const faqPageAccordian = document.querySelectorAll('.faq-page-accordion[data-page="faq-page"]');

faqPageAccordian.forEach(e => {
  e.addEventListener('click', faqPageAccordianListener);
});
</script>

<?php get_footer(); ?>