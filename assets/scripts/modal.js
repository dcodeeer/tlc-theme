const openModal = (elem) => {
  const modal = elem;
  modal.classList.add('show-modal');

  const body = document.querySelector('body');

  body.style.overflow = 'hidden';

  const close = modal.querySelector('.close');
  close.addEventListener('click', () => { 
    modal.classList.remove('show-modal');
    body.style.overflow = 'auto';
  });
};

const openSuccessModal = () => openModal(document.querySelector('#success-modal'));
const openFailModal = () => openModal(document.querySelector('#fail-modal'));
const openLoadingModal = () => {
  document.querySelector('#loading-modal').classList.add('show-modal');
  document.querySelector('body').style.overflow = 'hidden';
};
const closeLoadingModal = () => {
  document.querySelector('#loading-modal').classList.remove('show-modal');
  document.querySelector('body').style.overflow = 'auto';
};

const formGuard = (inputs = [], dropdowns = []) => {
  let isValid = true;

  document.querySelectorAll('input').forEach((input) => input.classList.remove('error'));
  document.querySelectorAll('.error-message').forEach((message) => message.classList.remove('error-show'));
  document.querySelectorAll('.dropdown').forEach((dropdown) => dropdown.classList.remove('error'));

  inputs.forEach((input) => {
    if (input.querySelector('input').value.trim() == '') {
      input.querySelector('input').classList.add('error');
      input.querySelector('.error-message').classList.add('error-show');
      isValid = false;
    }
  });

  dropdowns.forEach((dropdown) => {
    if (dropdown.querySelector('input').value.trim() == '') {
      dropdown.querySelector('.dropdown').classList.add('error');
      dropdown.querySelector('.error-message').classList.add('error-show');
      isValid = false;
    }
  });

  return isValid;
};