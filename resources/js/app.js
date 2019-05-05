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
