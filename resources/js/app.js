require('intersection-observer');
// require('./bootstrap');


// const geoLocationButton = document.querySelector('.geolocation-button');
// if(geoLocationButton) {
//   geoLocationButton.onclick = function() {
//     var startPos;
//     var nudge = document.getElementById("nudge");
//
//     var showNudgeBanner = function() {
//       nudge.style.display = "block";
//     };
//
//     var hideNudgeBanner = function() {
//       nudge.style.display = "none";
//     };
//
//     var nudgeTimeoutId = setTimeout(showNudgeBanner, 5000);
//
//     var geoSuccess = function(position) {
//       hideNudgeBanner();
//       // We have the location, don't display banner
//       clearTimeout(nudgeTimeoutId);
// console.log('success');
//       // Do magic with location
//       startPos = position;
//       document.getElementById('startLat').innerHTML = startPos.coords.latitude;
//       document.getElementById('startLon').innerHTML = startPos.coords.longitude;
//     };
//     var geoError = function(error) {
//       nudge.innerHTML = 'Error code ' + error.code;
//       switch(error.code) {
//         case error.TIMEOUT:
//           // The user didn't accept the callout
//           showNudgeBanner();
//           break;
//       }
//     };
//
//     navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
//   };
//
// }

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

let recordButton = document.querySelector('#record-screen');
if(recordButton) {
  recordButton.addEventListener('click',function(){
    smoothScroll(1000,4000);
  });
}
