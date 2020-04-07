require('intersection-observer');
window.smoothScroll = require('./smoothscroll.min');
window.Vue = require('vue');

require('./scroller');
require('date-input-polyfill');

import Vue from 'vue';

const requireComponent = require.context('./components', true, /.vue$/)

requireComponent.keys().forEach(fileName => {
  const componentConfig = requireComponent(fileName);
  const componentName = fileName.replace(/^.*[\\\/]/, '').replace('.vue','');
  Vue.component(
    componentName, componentConfig.default || componentConfig
  );
});

var card = new Vue({
  el: '#app'
});


const footerElement = document.querySelector('.primary-footer');

if (footerElement && 'IntersectionObserver' in window) {
  document.body.classList.remove('intersectionless-footer');
  createObserver();
}

function createObserver() {
  var observer = new IntersectionObserver(
    handleIntersect,
    {
      root: null,
      rootMargin: '0px',
      threshold: [0.5,1],
    }
  );
  observer.observe(footerElement);
}

function handleIntersect(entry) {
  if(entry[0].intersectionRatio > 0.5) {
    document.body.classList.add('has-visible-footer');
  }
  else {
    document.body.classList.remove('has-visible-footer');
  }
}


//  Close buttons

const closeButton = document.querySelector('.alert .close');
if(closeButton) {
  closeButton.addEventListener('click',(e)=>{
    let alert = e.target.parentNode.parentNode;
    alert.parentNode.removeChild(alert);
  });
}


// Prevent form submit on enter

function stopReturnKey(evt) {
  if (evt.keyCode == 13) {
    if(evt.target.type == "text" || evt.target.type == "email" || evt.target.type == "password")  {
      return false;
    }
  }
}

var formsThatDontSubmitOnEnter = document.querySelector('.do-not-submit-on-return');
if(formsThatDontSubmitOnEnter) {
  for(var i = 0; i < formsThatDontSubmitOnEnter.length; i++) {
    formsThatDontSubmitOnEnter[i].onkeydown = stopReturnKey;
  }
}


var filterHeadings = document.querySelectorAll('.filter-heading');
if(filterHeadings) {
  for(var i = 0; i < filterHeadings.length; i++) {
    filterHeadings[i].addEventListener('click',function(e){
      if(e.target.nextElementSibling.classList.contains('expanded')) {
        e.target.nextElementSibling.classList.remove('expanded')
      }
      else {
        var currentPanel = document.querySelector('.expanded');
        if(currentPanel) currentPanel.classList.remove('expanded');
        e.target.nextElementSibling.classList.add('expanded');
      }
    });
  }
}


function smoothScroll(distance,duration) {
  let app = document.querySelector('#app');
  let i = 0;
  let frameRate = 16;
  let frames = duration/16;
  let distancePerFrame = distance/frames;
  setInterval(function(){
    i = i + distancePerFrame;
    if(i<distance) {
      app.scroll(0,i);
    }
  },frameRate);
};

// let recordButton = document.querySelector('#record-screen');
// if(recordButton) {
//   recordButton.addEventListener('click',function(){
//     smoothScroll(1000,4000);
//   });
// }

var limitedTextareas = document.getElementsByTagName('textarea');
 var counter = [];
 for (var i = 0, len = limitedTextareas.length; i < len; i++) {
   if(limitedTextareas[i].hasAttribute('maxlength')) {
     counter[i] = document.createElement('div');
     var textarea = limitedTextareas[i];
     var maxlength = textarea.getAttribute('maxlength');
     counter[i].className = 'badge badge-info badge-small form-counter';
     counter[i].innerHTML = (maxlength - textarea.value.length) + ' characters left';
     textarea.parentNode.prepend(counter[i]);
     textarea.addEventListener("keyup", function(e){
       e.target.parentNode.querySelector('.form-counter').innerHTML = (e.target.getAttribute('maxlength') - e.target.value.length) + ' characters left';
     });
   }
 }
