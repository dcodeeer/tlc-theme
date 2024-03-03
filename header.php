<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8' />
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />

  <title><?php the_title(); ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&family=Montserrat:wght@500;600&family=Mulish&family=Roboto:wght@400;500;600&display=swap"
    rel="stylesheet"
  />
  <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.4.0/air-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/air-datepicker@3.4.0/air-datepicker.min.css">
  
  <?php wp_head(); ?>
</head>
<body>
  <header>
    <div class='container'>
      <a href='/'><img class='logo' src='<?php echo IMAGES . 'logo.png' ?>' /></a>
      
      <nav>
        
        <div class='item'>
          <span class='head'>
            <div>Travel</div>
            <span><svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.9922 0.3548L6.50606 5.06893L11.0199 0.3548C11.1276 0.242314 11.2555 0.153087 11.3962 0.0922102C11.537 0.0313336 11.6878 1.18523e-09 11.8401 0C11.9924 -1.18522e-09 12.1432 0.0313336 12.284 0.0922102C12.4247 0.153087 12.5526 0.242314 12.6603 0.3548C12.768 0.467285 12.8534 0.600824 12.9117 0.747793C12.97 0.894763 13 1.05228 13 1.21136C13 1.37044 12.97 1.52796 12.9117 1.67493C12.8534 1.8219 12.768 1.95544 12.6603 2.06792L7.32042 7.64469C7.21279 7.75732 7.08495 7.84668 6.94422 7.90765C6.80348 7.96862 6.65261 8 6.50025 8C6.34788 8 6.19701 7.96862 6.05628 7.90765C5.91554 7.84668 5.7877 7.75732 5.68007 7.64469L0.340219 2.06792C0.232371 1.95552 0.146808 1.82201 0.0884289 1.67503C0.0300494 1.52805 0 1.37049 0 1.21136C0 1.05224 0.0300494 0.894675 0.0884289 0.747695C0.146808 0.600715 0.232371 0.467202 0.340219 0.3548C0.793932 -0.106893 1.53849 -0.119043 1.9922 0.3548Z" fill="#606C77"/></svg></span>
          </span>
          <div class='details'>
            <div class='left'>
              <a href='/nursing' class='title'>NURSING</a>
              <a href='/career/search-jobs'>Search Jobs</a>
              <a href='/career/cna-lna-licensing'>CNA/LNA Licensing</a>
              <a href='/career/lpn-rn-licensing'>LNP/RN Licensing</a>
              <a href='/career/staff-testimonials'>Staff testimonials</a>
              <a href='/career/benefits'>Benefits</a>
              <a href='/team/referral'>Referral program</a>
              <a href='/career/getting-started-with-tlc'>Getting started with TLC Nursing</a>
              <a href='/faq'>FAQ</a>
              <a href='/team/paycheck'>Paycheck</a>
            </div>
            <div class='left right'>
              <a href='/allied' class='title'>ALLIED</a>
              <a href='/career/search-jobs'>Search Jobs</a>
              <a href='/career/staff-testimonials'>Staff testimonials</a>
              <a href='/career/benefits'>Benefits</a>
              <a href='/team/referral'>Referral program</a>
              <a href='/career/getting-started-with-tlc'>Getting started with TLC Nursing</a>
              <a href='/team/academy'>TLC Academy</a>
              <a href='/team/timesheet'>Timesheet</a>
              <a href='/team/paycheck'>Paycheck</a>
            </div>
          </div>
        </div>

        <a class='item' href='/team'>Team</a>

        <div class='item'>
          <span class='head'>
            <a href='/healthcare-staffing'>Healthcare Staffing</a>
            <span><svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.9922 0.3548L6.50606 5.06893L11.0199 0.3548C11.1276 0.242314 11.2555 0.153087 11.3962 0.0922102C11.537 0.0313336 11.6878 1.18523e-09 11.8401 0C11.9924 -1.18522e-09 12.1432 0.0313336 12.284 0.0922102C12.4247 0.153087 12.5526 0.242314 12.6603 0.3548C12.768 0.467285 12.8534 0.600824 12.9117 0.747793C12.97 0.894763 13 1.05228 13 1.21136C13 1.37044 12.97 1.52796 12.9117 1.67493C12.8534 1.8219 12.768 1.95544 12.6603 2.06792L7.32042 7.64469C7.21279 7.75732 7.08495 7.84668 6.94422 7.90765C6.80348 7.96862 6.65261 8 6.50025 8C6.34788 8 6.19701 7.96862 6.05628 7.90765C5.91554 7.84668 5.7877 7.75732 5.68007 7.64469L0.340219 2.06792C0.232371 1.95552 0.146808 1.82201 0.0884289 1.67503C0.0300494 1.52805 0 1.37049 0 1.21136C0 1.05224 0.0300494 0.894675 0.0884289 0.747695C0.146808 0.600715 0.232371 0.467202 0.340219 0.3548C0.793932 -0.106893 1.53849 -0.119043 1.9922 0.3548Z" fill="#606C77"/></svg></span>
          </span>
          <div class='details'>
            <div class='left'>
              <div class='title'>Healthcare staffing</div>
              <a href='/healthcare-staffing/joint-commission'>Joint Commission</a>
              <a href='/healthcare-staffing/staffing-request'>Staffing Request</a>
            </div>
            <div class='left right'></div>
          </div>
        </div>

        <div class='item'>
          <span class='head'>
            <div>About</div>
            <span><svg width="13" height="8" viewBox="0 0 13 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.9922 0.3548L6.50606 5.06893L11.0199 0.3548C11.1276 0.242314 11.2555 0.153087 11.3962 0.0922102C11.537 0.0313336 11.6878 1.18523e-09 11.8401 0C11.9924 -1.18522e-09 12.1432 0.0313336 12.284 0.0922102C12.4247 0.153087 12.5526 0.242314 12.6603 0.3548C12.768 0.467285 12.8534 0.600824 12.9117 0.747793C12.97 0.894763 13 1.05228 13 1.21136C13 1.37044 12.97 1.52796 12.9117 1.67493C12.8534 1.8219 12.768 1.95544 12.6603 2.06792L7.32042 7.64469C7.21279 7.75732 7.08495 7.84668 6.94422 7.90765C6.80348 7.96862 6.65261 8 6.50025 8C6.34788 8 6.19701 7.96862 6.05628 7.90765C5.91554 7.84668 5.7877 7.75732 5.68007 7.64469L0.340219 2.06792C0.232371 1.95552 0.146808 1.82201 0.0884289 1.67503C0.0300494 1.52805 0 1.37049 0 1.21136C0 1.05224 0.0300494 0.894675 0.0884289 0.747695C0.146808 0.600715 0.232371 0.467202 0.340219 0.3548C0.793932 -0.106893 1.53849 -0.119043 1.9922 0.3548Z" fill="#606C77"/></svg></span>
          </span>
          <div class='details'>
            <div class='left'>
              <div class='title'>About</div>
              <a href='/why-tlc'>Why TLC?</a>
              <a href='/career/staff-testimonials'>Staff testimonials</a>
              <a href='/awards'>Awards</a>
              <a href='/blog'>Blog</a>
              <a href='/career/getting-started-with-tlc'>Why partner with TLC Nursing</a>
            </div>
            <div class='left right'></div>
          </div>
        </div>

        <a class='item' href='/contact'>Contact Us</a>
        
      </nav>

      <!--<a class='user' href='#'>
        <img src='<?php echo IMAGES . 'user.png' ?>' />
      </a>-->
      
      <a class='search' href='<?php echo SEARCH_JOBS_LINK; ?>'>Search Jobs</a>
      <a class='signup' href='/apply-now'>Apply Now</a>
      
      <div class='mobile-icon'>
        <div class='burger' id='burger'>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 18C3.75 17.5858 4.08579 17.25 4.5 17.25H19.5C19.9142 17.25 20.25 17.5858 20.25 18C20.25 18.4142 19.9142 18.75 19.5 18.75H4.5C4.08579 18.75 3.75 18.4142 3.75 18Z" fill="#606C77"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 12C3.75 11.5858 4.08579 11.25 4.5 11.25H19.5C19.9142 11.25 20.25 11.5858 20.25 12C20.25 12.4142 19.9142 12.75 19.5 12.75H4.5C4.08579 12.75 3.75 12.4142 3.75 12Z" fill="#606C77"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.75 6C3.75 5.58579 4.08579 5.25 4.5 5.25H19.5C19.9142 5.25 20.25 5.58579 20.25 6C20.25 6.41421 19.9142 6.75 19.5 6.75H4.5C4.08579 6.75 3.75 6.41421 3.75 6Z" fill="#606C77"/>
          </svg>
        </div>
        <div class='close' id='close'>
          <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g><path d="M10.8033 9.6967L21.4099 20.3033M21.4099 9.6967L10.8033 20.3033" stroke="#606C77" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g>
          </svg>
        </div>
      </div>
      <div class='mobile-menu mobile-active'>

        <div class='list'>

          <div class='item'>
            <div class='title mobile-menu-open'>
              <span>Travel</span>
              <button class='header-mobile-chevron'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="currentColor"/></svg></button>
            </div>

            <div class='list mobile-menu-list body-2'>
              <a href='/nursing' class='title'>NURSING</a>
              <a href='/career/search-jobs'>Search Jobs</a>
              <a href='/career/cna-lna-licensing'>CNA/LNA Licensing</a>
              <a href='/career/lpn-rn-licensing'>LNP/RN Licensing</a>
              <a href='/career/staff-testimonials'>Staff testimonials</a>
              <a href='/career/benefits'>Benefits</a>
              <a href='/team/referral'>Referral program</a>
              <a href='/career/getting-started-with-tlc'>Getting started with TLC Nursing</a>
              <a href='/faq'>FAQ</a>
              <a href='/team/paycheck'>Paycheck</a>
              <a href='/allied' class='title'>ALLIED</a>
              <a href='/career/search-jobs'>Search Jobs</a>
              <a href='/career/staff-testimonials'>Staff testimonials</a>
              <a href='/career/benefits'>Benefits</a>
              <a href='/team/referral'>Referral program</a>
              <a href='/career/getting-started-with-tlc'>Getting started with TLC Nursing</a>
              <a href='/team/academy'>TLC Academy</a>
              <a href='/team/timesheet'>Timesheet</a>
              <a href='/team/paycheck'>Paycheck</a>
            </div>
          </div>

          <div class='item'>
            <div class='title mobile-menu-open'>
              <span>Healthcare Staffing</span>
              <button class='header-mobile-chevron'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="currentColor"/></svg></button>
            </div>

            <div class='list mobile-menu-list body-2'>
              <div class='title'>Healthcare Staffing</div>
              <a href='/healthcare-staffing/joint-commission'>Joint Commission</a>
              <a href='/healthcare-staffing/staffing-request'>Staffing Request</a>
            </div>
          </div>

          <a class='item' href='/team'>
            <div class='title mobile-menu-open'>
              <span>Team</span>
            </div>
          </a>

          <div class='item'>
            <div class='title mobile-menu-open'>
              <span>About</span>
              <button class='header-mobile-chevron'><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="1" d="M5.75843 7.4435L12.0084 13.3362L18.2584 7.4435C18.4075 7.30289 18.5845 7.19136 18.7794 7.11526C18.9742 7.03917 19.1831 7 19.394 7C19.6049 7 19.8137 7.03917 20.0086 7.11526C20.2034 7.19136 20.3805 7.30289 20.5296 7.4435C20.6787 7.58411 20.797 7.75103 20.8778 7.93474C20.9585 8.11845 21 8.31535 21 8.5142C21 8.71305 20.9585 8.90995 20.8778 9.09366C20.797 9.27737 20.6787 9.4443 20.5296 9.5849L13.136 16.5559C12.9869 16.6966 12.8099 16.8083 12.6151 16.8846C12.4202 16.9608 12.2113 17 12.0003 17C11.7894 17 11.5805 16.9608 11.3856 16.8846C11.1908 16.8083 11.0137 16.6966 10.8647 16.5559L3.47107 9.5849C3.32174 9.4444 3.20327 9.27751 3.12244 9.09378C3.04161 8.91006 3 8.71311 3 8.5142C3 8.3153 3.04161 8.11834 3.12244 7.93462C3.20327 7.75089 3.32174 7.584 3.47107 7.4435C4.09929 6.86638 5.13021 6.8512 5.75843 7.4435Z" fill="currentColor"/></svg></button>
            </div>

            <div class='list mobile-menu-list body-2'>
              <div class='title'>About</div>
              <a href='/why-tlc'>Why TLC?</a>
              <a href='/career/staff-testimonials'>Staff testimonials</a>
              <a href='/awards'>Awards</a>
              <a href='/blog'>Blog</a>
              <a href='/career/getting-started-with-tlc'>Why partner with TLC Nursing</a>
            </div>
          </div>

          <a class='item' href='/contact'>
            <div class='title mobile-menu-open'>
              <span>Contact Us</span>
            </div>
          </a>

        </div>
        <a class='search' href='<?php echo SEARCH_JOBS_LINK; ?>'>Search Jobs</a>
      </div>
    </div>
  </header>


<script>
  // menu
  const burger = document.querySelector('#burger');
  const close  = document.querySelector('#close');
  const menu   = document.querySelector('.mobile-menu');
  const body   = document.querySelector('body');

  const openListener = () => {
    burger.setAttribute('style', 'display:none;');
    close.setAttribute('style', 'display:flex;');

    window.scrollTo(0, 0);

    menu.classList.add('menu-active');
    
    body.style.overflow = 'hidden';

    burger.removeEventListener('click', openListener);
    close.addEventListener('click', closeListener);
  };

  const closeListener = () => {
    burger.setAttribute('style', 'display:flex;');
    close.setAttribute('style', 'display:none;');

    menu.classList.remove('menu-active');
    body.style.overflow = 'auto';
    
    close.removeEventListener('click', closeListener);
    burger.addEventListener('click', openListener);
  };

  burger.addEventListener('click', openListener);

  // menu end

  // mobile chevron

  const chevroneListener = (e) => {
    const list = e.currentTarget.parentNode.querySelector('.list');

    if (list.classList.contains('list-active')) {
      list.classList.remove('list-active');
    } else {
      const chevrones = document.querySelectorAll('.mobile-menu-list');
      chevrones.forEach(chevrone => chevrone.classList.remove('list-active'));

      list.classList.add('list-active');
    }
  };

  const chevrones = document.querySelectorAll('.mobile-menu-open');
  chevrones.forEach(chevrone => {
    chevrone.addEventListener('click', chevroneListener);
  });

</script>