const arrayContains = (arr, elem) => {
  return arr.indexOf(elem) != -1;
}

const addMoreText = (count) => {
  const text = document.createElement('div');
  text.classList.add('more');
  text.innerHTML = `+${count} more`;
  return text;
}
const dropdownListener = (e) => {
  const dropdown = e.currentTarget;
  console.log(dropdown);

  const options = dropdown.querySelector('.options');
  const toggleOptions = () => options.classList.toggle('show');

  console.log('click')
  
  // close listener
  const dropdownCloseListener = (eDrop) => {
    
    if (!dropdown.contains(eDrop.target)) {
      options.querySelectorAll('label').forEach(elem => elem.removeEventListener('change', checkListener));
      toggleOptions();
      document.removeEventListener('click', dropdownCloseListener);
    }
  }
  document.addEventListener('click', dropdownCloseListener);

  // checkbox for multiselect
  const checkListener = (labelEvent) => {

    const removeHiddenOption = () => {
      const index = hiddenValues.indexOf(labelValue);
      if (index !== -1) {
        hiddenValues.splice(index, 1);
        hiddenInput.value = hiddenValues.join(',')
      }
    };

    if (arrayContains(hiddenValues, labelValue)) {
      removeHiddenOption();
      removeSelectedOption(labelValue);
      checkbox.checked = false;
    } else {
      hiddenValues.push(labelValue);
      hiddenInput.value = hiddenValues.join(',');

      checkbox.checked = true;
    }


    // renderOptions();

    var dataObject = {};

    if (options) {
      var labels = options.querySelectorAll('label');
      labels.forEach((label) => {
        var checkbox = label.querySelector('input[type="checkbox"]');
        if (checkbox && checkbox.checked) {
          var dataValue = label.getAttribute('data-value');
          var pContent = label.querySelector('p').textContent;
          dataObject[dataValue] = pContent;
        }
      });
    }

    dropdown.querySelector('.values').innerHTML = '';


    const nameSizeLimit = 19;
    let nameSizeCount = 0;
    for (var key in dataObject) {
      if (dataObject.hasOwnProperty(key)) {
        var value = dataObject[key];
        nameSizeCount += value.length;
        if (nameSizeCount > nameSizeLimit) break;
        renderOptions(key, value);
      }
    } 

    if (hiddenValues.length > 2) {
      const moreText = addMoreText(hiddenValues.length - 2);
      dropdown.querySelector('.values').appendChild(moreText);
    }
  };

  // handle elem
  if (e.target.classList.contains('option')) {
    e.currentTarget.querySelector('.select input').value = e.target.innerText;
    e.currentTarget.querySelector('.hidden').setAttribute('data-name', e.target.getAttribute('data-name'));
    e.currentTarget.querySelector('.hidden').value = e.target.getAttribute('data-value');
    toggleOptions();

    // profession only
      const changeEvent = new Event('change');
      e.currentTarget.querySelector('.hidden').dispatchEvent(changeEvent);
    // profession only end

    options.querySelectorAll('.headline').forEach(elem => elem.querySelector('.list').classList.remove('opened'));
  } else if (options.contains(e.target)) {
    
  } else {
    toggleOptions(); 
    options.querySelectorAll('.headline').forEach(elem => elem.querySelector('.list').classList.remove('opened'));

    if (options.getAttribute('data-type') === 'multi') {
      options.querySelectorAll('label').forEach(elem => elem.addEventListener('change', checkListener));
    }
  }
};

const titles = document.querySelectorAll('.headline .title');
titles.forEach((title) => title.addEventListener('click', (e) => {
  e.stopPropagation();
  e.currentTarget.parentNode.querySelector('.list').classList.toggle('opened');
}));

const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach((dropdown) => dropdown.addEventListener('click', dropdownListener));