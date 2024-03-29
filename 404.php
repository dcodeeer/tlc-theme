<?php get_header(); ?>

<div class='not-found-page container'>
  <div class='left'>
    <div class='segment'>
      <div class='H1 blue'>Checking vitals, we’ll be back soon.</div>
      <div class='H4 blue'>IT LOOKS LIKE THIS PAGE IS OUT DOING ROUNDS AT THE MOMENT.</div>
      <div class='H4'>Visit our homepage, search below or <a href='contact' class='blue'>contact us</a> instead</div>
    </div>
    <form class='global-search-form'>
      <input type='text' name='' placeholder='Search' />
      <button><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.7422 14.3439C16.5329 13.2673 17 11.9382 17 10.5C17 6.91015 14.0899 4 10.5 4C6.91015 4 4 6.91015 4 10.5C4 14.0899 6.91015 17 10.5 17C11.9386 17 13.268 16.5327 14.3448 15.7415L14.3439 15.7422C14.3734 15.7822 14.4062 15.8204 14.4424 15.8566L18.2929 19.7071C18.6834 20.0976 19.3166 20.0976 19.7071 19.7071C20.0976 19.3166 20.0976 18.6834 19.7071 18.2929L15.8566 14.4424C15.8204 14.4062 15.7822 14.3734 15.7422 14.3439ZM16 10.5C16 13.5376 13.5376 16 10.5 16C7.46243 16 5 13.5376 5 10.5C5 7.46243 7.46243 5 10.5 5C13.5376 5 16 7.46243 16 10.5Z" fill="currentColor"/></svg></button>
    </form>
  </div>

  <img src='<?php echo IMAGES . '404.png' ?>' />
</div>

<?php get_footer(); ?>