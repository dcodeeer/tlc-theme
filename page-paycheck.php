<?php get_header(); ?>

<?php /* Template Name: paycheck */ ?>

<div class='paycheck-page'>

  <div class='animate-header'>
    <div class='page-info'>
      <div class='text'><?php echo do_shortcode('[breadcrumbs]'); ?></div>
    </div>

    <div class='header'>
      <div class='container'>
        <div class='title H1'><?php echo get_field('first_section_title'); ?></div>
        <div class='description body-1'><?php echo get_field('first_section_description'); ?></div>
      </div>
    </div>
  </div>

  <div class='first animate-content'>
    <div class='container'>
      <div class='video'>
        <iframe  src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>

      <div class='list body-1'>

        <div class='item'>
          <div class='number H4'>1</div>
          <div class='content'>
            <p>In order to begin, employees should access <a href='https://workforcenow.adp.com/public/index.htm' target='_blank'>https://workforcenow.adp.com/public/index.htm</a> and then click on <span class='blue'>Register Here</span> under the <span class='blue'>First Time User</span> section.</p>
          </div>
        </div>

        <div class='item'>
          <div class='number H4'>2</div>
          <div class='content'>
            <p>Next, employees will need to enter <span class='blue'>tlcnursinc-ess</span> under the <span class='blue'>Registration Code</span>, then click <span class='blue'>Next</span> and confirm they do want to set up an account.</p>
          </div>
        </div>

        <div class='item'>
          <div class='number H4'>3</div>
          <div class='content'>
            <span class='blue'>On the next page, employees should enter:</span>
            <ol>
              <li>First Name</li>
              <li>Last Name</li>
              <li>Check off the indicator next to SSN/EIN or ITIN, then enter SSN</li>
              <li>Date of Birth</li>
            </ol>
          </div>
        </div>

        <div class='item'>
          <div class='number H4'>4</div>
          <div class='content'>
            <p>After this, check off I Am Not A Robot then Confirm</p>
          </div>
        </div>

        <div class='item'>
          <div class='number H4'>5</div>
          <div class='content'>
            <p>Next, employees will choose to either obtain a Personal Registration Code or indicate if they want to answer identity questions <span class='blue'>REGISTRATION PROCESS ( ACTION REQUIRED )</span></p>
          </div>
        </div>

      </div>

      <div class='bottom-text body-1'>As part of the registration process you will receive a <span class='blue'>Personal Registration Code ( PIC )</span>. This PIC Code will be required to complete the registration process. Your Personal Registration Code (PIC) is provided Separately (via e-mail)</div>

    </div>
  </div>

</div>

<?php get_footer(); ?>