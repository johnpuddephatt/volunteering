var scrollers = document.querySelectorAll('.scroller-outer');

for (var i = 0; i < scrollers.length; i++) {

  let scrollerInner = scrollers[i].querySelector('.scroller-inner');
  let nextButton = scrollers[i].querySelector('.scroller-next');
  let prevButton = scrollers[i].querySelector('.scroller-previous');
  // let margin = scrollerInner.firstElementChild.offsetLeft;
  let margin = (scrollerInner.firstElementChild.offsetLeft - scrollerInner.offsetLeft);
  let slideBy = scrollers[i].dataset.slideby || .5;
  function themeScroll(direction) {
    let dir = 1;
    if(direction == 'backwards') {
      dir = -1;
    }
    // let newScroll = scrollerInner.scrollLeft - scrollerInner.clientWidth * .5 * dir;
    let newScroll = scrollerInner.scrollLeft - (scrollerInner.clientWidth * slideBy - (margin * slideBy)) * dir;

    smoothScroll(newScroll,500,null,scrollerInner,'horizontal');
  }



  if(scrollerInner && nextButton) {
    var body = document.querySelector('body');
    var curYPos, curXPos, curDown, dragging = false;

    scrollerInner.addEventListener('scroll', function(e) {
      if ((this.scrollWidth - this.clientWidth - this.scrollLeft) === 0) {
        nextButton.setAttribute('tabindex', '-1');
        prevButton.removeAttribute('tabindex');
      }
      else if (this.scrollLeft == 0) {
        prevButton.setAttribute('tabindex', '-1');
        nextButton.removeAttribute('tabindex');
      }
      else {
        nextButton.removeAttribute('tabindex');
        prevButton.removeAttribute('tabindex');
      }
    });


    scrollerInner.addEventListener('mousemove', function mouseMoveScroller(e) {
      if (curDown) {
        dragging = true;
        scrollerInner.classList.add('grabbing');

        //curXPos is where the click begins
        scrollerInner.scrollLeft = curLeft - 1.35 * (e.pageX - curXPos);
        if(Math.abs(e.pageY - curYPos) > 60) {
          curDown = false;
        }
      }
    });


    scrollerInner.addEventListener('mousedown', function mouseDownScroller(e) {
      curXPos = e.pageX;
      curYPos = e.pageY;
      curDown = true;
      curLeft = scrollerInner.scrollLeft;
      dragging = false;
    });

    scrollerInner.addEventListener('mouseup', function mouseUpScroller(e) {
      curDown = false;
      scrollerInner.classList.remove('grabbing');
    });

    scrollerInner.addEventListener('mouseleave', function mouseLeaveScroller(e) {
      curDown = false;
      scrollerInner.classList.remove('grabbing');
    });


    var hasTouch;
    window.addEventListener('touchstart', function setHasTouch () {
        hasTouch = true;
        // Remove event listener once fired, otherwise it'll kill scrolling
        // performance
        window.removeEventListener('touchstart', setHasTouch);
        scrollerInner.removeEventListener('mousemove', mouseMoveScroller);
        scrollerInner.removeEventListener('mousedown', mouseDownScroller);
        scrollerInner.removeEventListener('mouseup', mouseUpScroller);
        scrollerInner.removeEventListener('mouseleave', mouseLeaveScroller);

    }, false);

    nextButton.addEventListener('click', ()=> {
      themeScroll('backwards');
    });

    prevButton.addEventListener('click', ()=>{
      themeScroll();
    });

  }


}
