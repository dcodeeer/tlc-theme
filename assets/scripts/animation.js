gsap.registerPlugin(ScrollTrigger)
gsap.registerPlugin(ScrollToPlugin)

// global 
// gsap.fromTo('header', { y: -100, opacity: 0 }, { y: 0, opacity: 1 });

gsap.fromTo('.animate-header', { opacity: 0 },  { opacity: 1, delay: 0.5 });
gsap.fromTo('.animate-content', { y: 200, opacity: 0 },  { y: 0, opacity: 1, delay: 0.5 });

// index

// index first
const indexFirst = {};
indexFirst.trigger = {
  trigger: '.index-page .first',
  start: 'bottom bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexFirst.delay = 0.6;

gsap.fromTo(
  '.index-page .first .slider',
  { opacity: 0 },
  { opacity: 1, delay: indexFirst.delay},
);

gsap.fromTo(
  '.index-page .first .page-info',
  { opacity: 0 },
  { opacity: 1, delay: indexFirst.delay + 0.2},
);

gsap.fromTo(
  '.index-page .first .header',
  { y: 100, opacity: 0 },
  { y: 0,opacity: 1, delay: indexFirst.delay + 0.1},
);

gsap.fromTo(
  '.index-page .first .form',
  { y: 100, opacity: 0 },
  { y: 0,opacity: 1, delay: indexFirst.delay + 0.2 },
);

// index second 

const indexSecond = {};
indexSecond.trigger = {
  trigger: '.index-page .mission',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexSecond.delay = 0.7;

gsap.fromTo(
  '.index-page .mission .title',
  { y: 150, opacity: 0 },
  { y: 0, opacity: 1, delay: indexSecond.delay},
);

gsap.fromTo(
  '.index-page .mission .description',
  { y: 150, opacity: 0 },
  { y: 0, opacity: 1, delay: indexSecond.delay + 0.2},
);

// index third
const indexThird = {};
indexThird.trigger = {
  trigger: '.index-page .third',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexThird.delay = 0.6;

gsap.fromTo(
  '.index-page .third',
  { y: 150, opacity: 0 },
  { y: 0, opacity: 1, delay: indexThird.delay},
);

const thirdItems = document.querySelectorAll('.index-page .third .number');
gsap.from(thirdItems, {
  textContent: 0,
  duration: 4,
  ease: "power1.in",
  snap: { textContent: 1 },
  stagger: {
    each: 1.0,
    onUpdate: function() {
      this.targets()[0].innerHTML = numberWithCommas(Math.ceil(this.targets()[0].textContent));
    },
  }
});

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "");
}


// index fouth
const indexFouth = {};
indexFouth.trigger = {
  trigger: '.index-page .fouth',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexFouth.delay = 0.6;

gsap.fromTo(
  '.index-page .fouth .title',
  { y: 100, opacity: 0 },
  { y: 0, opacity: 1, delay: indexFouth.delay, scrollTrigger: indexFouth.trigger },
);

gsap.fromTo(
  '.index-page .fouth .image',
  { x: 150, opacity: 0 },
  { x: 0, opacity: 1, delay: indexFouth.delay, scrollTrigger: indexFouth.trigger },
);

gsap.fromTo(
  '.index-page .fouth .list',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexFouth.delay, scrollTrigger: indexFouth.trigger },
);

gsap.fromTo(
  '.index-page .fouth .more',
  { y: 100, opacity: 0 },
  { y: 0, opacity: 1, delay: indexFouth.delay, scrollTrigger: indexFouth.trigger },
);

// index sixth

const indexSixth = {};
indexSixth.trigger = {
  trigger: '.index-page .sixth',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexSixth.delay = 0.6;

gsap.fromTo(
  '.index-page .sixth .head',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexSixth.delay, scrollTrigger: indexSixth.trigger },
);

// index seventh

const indexSeventh = {};
indexSeventh.trigger = {
  trigger: '.index-page .seventh',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexSeventh.delay = 0.6;

gsap.fromTo(
  '.index-page .seventh .title',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexSeventh.delay, scrollTrigger: indexSeventh.trigger },
);

gsap.fromTo(
  '.index-page .seventh .list',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexSeventh.delay + 0.1, scrollTrigger: indexSeventh.trigger },
);

gsap.fromTo(
  '.index-page .seventh .more',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexSeventh.delay + 0.2, scrollTrigger: indexSeventh.trigger },
);

// index eighth

const indexEighth = {};
indexEighth.trigger = {
  trigger: '.index-page .eighth',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexEighth.delay = 0.6;

gsap.fromTo(
  '.index-page .eighth .title',
  { y: 100, opacity: 0 },
  { y: 0, opacity: 1, delay: indexEighth.delay, scrollTrigger: indexEighth.trigger },
);

gsap.fromTo(
  '.index-page .eighth img',
  { x: -100, opacity: 0 },
  { x: 0, opacity: 1, delay: indexEighth.delay, scrollTrigger: indexEighth.trigger },
);

gsap.fromTo(
  '.index-page .eighth .box',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexEighth.delay, scrollTrigger: indexEighth.trigger },
);


// index ninth

const indexNinth = {};
indexNinth.trigger = {
  trigger: '.index-page .ninth',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexNinth.delay = 0.6;

gsap.fromTo(
  '.index-page .ninth .title',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexNinth.delay, scrollTrigger: indexNinth.trigger },
);

gsap.fromTo(
  '.index-page .ninth .slider-wrapper',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexNinth.delay + 0.1, scrollTrigger: indexNinth.trigger },
);

gsap.fromTo(
  '.index-page .ninth .more',
  { y: 100, opacity: 0 },
  { y: 0, opacity: 1, delay: indexNinth.delay + 0.2, scrollTrigger: indexNinth.trigger },
);

// index tenth

const indexTenth = {};
indexTenth.trigger = {
  trigger: '.index-page .tenth',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: "play pause resume reset"
};
indexTenth.delay = 0.6;

gsap.fromTo(
  '.index-page .tenth .header',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexTenth.delay, scrollTrigger: indexTenth.trigger },
);

gsap.fromTo(
  '.index-page .tenth .slider',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexTenth.delay + 0.1, scrollTrigger: indexTenth.trigger },
);

// index eleventh

const indexEleventh = {};
indexEleventh.trigger = {
  trigger: '.index-page .eleventh',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: 'play pause resume reset'
};
indexEleventh.delay = 0.6;

gsap.fromTo(
  '.index-page .eleventh .title',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexEleventh.delay, scrollTrigger: indexEleventh.trigger },
);

gsap.fromTo(
  '.index-page .eleventh .form',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexEleventh.delay + 0.1, scrollTrigger: indexEleventh.trigger },
);

gsap.fromTo(
  '.index-page .eleventh .slider-wrapper',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexEleventh.delay + 0.2, scrollTrigger: indexEleventh.trigger },
);

gsap.fromTo(
  '.index-page .eleventh .more',
  { y: 100, opacity: 0 },
  { y: 0, opacity: 1, delay: indexEleventh.delay + 0.3, scrollTrigger: indexEleventh.trigger },
);

// index twelfth 
const indexTwelfth = {};
indexTwelfth.trigger = {
  trigger: '.index-page .twelfth',
  start: '0px bottom',
  end: 'bottom top',
  toggleActions: 'play pause resume reset'
};
indexTwelfth.delay = 0.6;

gsap.fromTo(
  '.index-page .twelfth .title',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexTwelfth.delay, scrollTrigger: indexTwelfth.trigger },
);

gsap.fromTo(
  '.index-page .twelfth .list',
  { y: 200, opacity: 0 },
  { y: 0, opacity: 1, delay: indexTwelfth.delay + 0.1, scrollTrigger: indexTwelfth.trigger },
);