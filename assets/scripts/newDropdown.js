class Dropdown {
  constructor(dropdown) {
    this.element = dropdown;
    this.select = dropdown.querySelector('.select');
    this.options = dropdown.querySelector('.options');
    this.hidden = dropdown.querySelector('.hidden');

    this.selectedOptions = {};
    this.values = [];

    dropdown.addEventListener('click', (e) => this.callback(e));
  }
  
  toggle() {
    this.options.classList.toggle('show');
  }

  hide() {
    this.options.classList.remove('show');
  }

  callback(e) {
    if (e.target.classList.contains('option')) {
      this.option(e);
    } else if (e.target.tagName === 'INPUT' && e.target.getAttribute('type') === 'checkbox') {
      this.checkbox(e);
    } else if (e.target.classList.contains('close-button')) {
      const id = e.target.parentNode.getAttribute('data-id');
      this.removeSelectedOption(id);
      this.renderOptions();
    } else if (this.select.contains(e.target)) {
      this.toggle();
    } else if (e.target.classList.contains('category')) {
      this.openProfessions(e);
    } else if (e.target.classList.contains('back-to-categories')) {
      this.backToCategories(e);
    } else if (e.target.classList.contains('profession-name')) {
      this.openSpecialities(e);
    }
  }

  backToCategories(e) {
    const categoryId = e.target.parentNode.getAttribute('data-category-id');
    console.log(categoryId)
    const professions = this.element.querySelector(`.professions[data-category-id='${categoryId}']`);

    professions.classList.remove('show');
    this.options.querySelector('.categories').classList.remove('hide');
  }

  openProfessions(e) {
    const categoryId = e.target.getAttribute('data-category-id');
    const professions = this.element.querySelector(`.professions[data-category-id='${categoryId}']`);

    professions.classList.add('show');
    e.target.parentNode.classList.add('hide');
  }

  openSpecialities(e) {
    const professionId = e.target.getAttribute('data-profession-id');
    const specialties = this.element.querySelector(`.specialities[data-profession-id='${professionId}']`);

    specialties.classList.add('show');
    e.target.parentNode.classList.add('hide');
  }
  
  option(e) {
    this.element.querySelector('.select input').value = e.target.innerText;
    this.element.querySelector('.hidden').setAttribute('data-name', e.target.getAttribute('data-name'));
    this.element.querySelector('.hidden').value = e.target.getAttribute('data-value');
    
    const changeEvent = new Event('change');
    this.element.querySelector('.hidden').dispatchEvent(changeEvent);

    this.hide();
  }

  checkbox(e) {
    const label = e.target.parentNode;
    const checkbox = e.target;

    if (this.hidden.value != '') {
      this.values = this.hidden.value.split(',');
    }

    const value = label.getAttribute('data-value');
    if (this.values.includes(value)) {
      this.removeSelectedOption(value);
      checkbox.checked = false;
    } else {
      checkbox.checked = true;
      this.values.push(value);
      this.hidden.value = this.values.join(',');
    }

    const more = this.element.querySelector('.more');
    if (more) {
      more.remove();
    }
    
    this.updateSelectedOptions();
    this.renderOptions();
  }

  updateSelectedOptions() {
    const labels = this.options.querySelectorAll('label');
    labels.forEach((label) => {
      const checkbox = label.querySelector('input[type="checkbox"]');
      if (checkbox && checkbox.checked) {
        const dataValue = label.getAttribute('data-value');
        const pContent = label.querySelector('p').textContent;
        this.selectedOptions[dataValue] = pContent;
      }
    });
  }

  renderOptions() {
    const selectedOptions = this.element.querySelector('.values');

    selectedOptions.innerHTML = '';

    const nameSizeLimit = 20;
    let nameSizeCount = 0;
    let visibleValueCount = 0;
    for (let key in this.selectedOptions) {
      if (this.selectedOptions.hasOwnProperty(key)) {
        let value = this.selectedOptions[key];
        nameSizeCount += value.length;
        if (nameSizeCount > nameSizeLimit) break;
        visibleValueCount++;
        
        const newSelectedOption = this.createSelectOption(key, value);
        selectedOptions.appendChild(newSelectedOption);
      }
    }

    console.log(visibleValueCount);

    if (this.values.length > visibleValueCount) {
      const moreText = this.addMoreText(this.values.length - visibleValueCount);
      this.element.querySelector('.values').appendChild(moreText);
    }
  };

  createSelectOption(id, name) {
    const selectedOption = document.createElement('div');
    selectedOption.classList.add('value');
    selectedOption.setAttribute('data-id', id);
  
    const span = document.createElement('span');
    span.innerHTML = name;
    
    const button = document.createElement('div');
    button.classList.add('close-button');
  
    selectedOption.appendChild(span);
    selectedOption.appendChild(button);
  
    return selectedOption;
  }

  removeSelectedOption(id) {
    delete this.selectedOptions[id];

    const index = this.values.indexOf(id);
    if (index !== -1) {
      this.values.splice(index, 1);
      this.hidden.value = this.values.join(',');
    }

    const option = document.querySelector(`div.value[data-id='${id}']`);
    if (option) {
      option.remove();
    };

    const label = document.querySelector(`label.checkbox[data-value='${id}']`);
    if (label) {
      label.querySelector('input').checked = false;
    };
  }

  addMoreText(count) {
    const text = document.createElement('div');
    text.classList.add('more');
    text.innerHTML = `+${count} more`;
    return text;
  }
}

const list = [];

const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach((dropdown) => {
  const instance = new Dropdown(dropdown);
  list.push(instance);
});

document.addEventListener('click', (e) => { 
  list.forEach((dropdown) => {
    if (!dropdown.element.contains(e.target)) dropdown.hide();
  });
});


///

const titles = document.querySelectorAll('.headline .title');
titles.forEach((title) => title.addEventListener('click', (e) => {
  e.stopPropagation();
  e.currentTarget.parentNode.querySelector('.list').classList.toggle('opened');
}));