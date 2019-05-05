import Choices from 'choices.js/public/assets/scripts/choices.min.js';

document.addEventListener('DOMContentLoaded', function() {

  // const choicesElements = document.querySelectorAll('.choices-input');
  // let array = [];
  // for(var i = 0; i < choicesElements.length; i++) {
  //   array.push('choice-item-' + i);
  // }

  const amendableChoices = new Choices('.choices-input-amendable', {
    delimiter: ',',
    editItems: true,
    addChoices: true,
    removeItemButton: true,
    placeholder: true,
    placeholderValue: 'Select or enter something...'
  });

  const fixedChoices = new Choices('.choices-input-fixed', {
    delimiter: ',',
    editItems: true,
    removeItemButton: true,
    placeholder: true,
    placeholderValue: 'Select something...'
  });
});
