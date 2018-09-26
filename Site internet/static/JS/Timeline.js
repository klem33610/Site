$(function(){
  $("#timeline").find('ol').css("position", "relative").animate({left: - 800,});
})

function slide_left() {
  var position = $("#timeline").find('ol').position();
  var translate = (position.left - 800)
  console.log($("#timeline").find('ol'))
  $("#timeline").find('ol').animate({"left": translate,});
}

function slide_right() {
  var position = $("#timeline").find('ol').position();
  var translate = (position.left + 800)
  $("#timeline").find('ol').animate({"left": translate,});
}
  // // VARIABLES
  // var timeline = document.querySelector(".timeline ol"),
  //     elH = document.querySelectorAll(".timeline li > div"),
  //     arrows = document.querySelectorAll(".timeline .arrows .arrow"),
  //     arrowPrev = document.querySelector(".timeline .arrows .arrow__prev"),
  //     arrowNext = document.querySelector(".timeline .arrows .arrow__next"),
  //     firstItem = document.querySelector(".timeline li:first-child"),
  //     lastItem = document.querySelector(".timeline li:last-child"),
  //     xScrolling = 1000,
  //     disabledClass = "";
  //
  // // START
  // window.addEventListener("load", init);
  //
  // function init() {
  //   // animateTl(xScrolling, arrows, timeline);
  //   setKeyboardFn(arrowPrev, arrowNext);
  // }
  //
  // // CHECK IF AN ELEMENT IS IN VIEWPORT
  // function isElementInViewport(el) {
  //   var rect = el.getBoundingClientRect();
  //   return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth);
  // }
  //
  // // // SET STATE OF PREV/NEXT ARROWS
  // // function setBtnState(el) {
  // //   var flag = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  // //   if (flag) {
  // //     el.classList.add();
  // //   } else {
  // //     if (el.classList.contains()) {
  // //       el.classList.remove();
  // //     }
  // //     el.disabled = false;
  // //   }
  // // }
  //
  // // ANIMATE TIMELINE
  // function animateTl(scrolling, el, tl) {
  //   var counter = 0;
  //   for (var i = 0; i < el.length; i++) {
  //     el[i].addEventListener("click", function () {
  //       // if (!arrowPrev.disabled) {
  //       //   arrowPrev.disabled = true;
  //       // }
  //       // if (!arrowNext.disabled) {
  //       //   arrowNext.disabled = true;
  //       // }
  //       var sign = this.classList.contains("arrow__prev") ? "" : "-";
  //       if (counter === 0) {
  //         tl.style.transform = "translateX(-" + scrolling + "px)";
  //       } else {
  //         var tlStyle = getComputedStyle(tl);
  //         // add more browser prefixes if needed here
  //         var tlTransform = tlStyle.getPropertyValue("-webkit-transform") || tlStyle.getPropertyValue("transform");
  //         var values = parseInt(tlTransform.split(",")[4]) + parseInt("" + sign + scrolling);
  //         tl.style.transform = "translateX(" + values + "px)";
  //       }
  //
  //       // setTimeout(function () {
  //       //   isElementInViewport(firstItem) ? setBtnState(arrowPrev) : setBtnState(arrowPrev, false);
  //       //   isElementInViewport(lastItem) ? setBtnState(arrowNext) : setBtnState(arrowNext, false);
  //       // }, 1100);
  //
  //       counter++;
  //     });
  //   }
  // }
  //
  // // ADD BASIC KEYBOARD FUNCTIONALITY
  // function setKeyboardFn(prev, next) {
  //   document.addEventListener("keydown", function (e) {
  //     if (e.which === 37 || e.which === 39) {
  //       var timelineOfTop = timeline.offsetTop;
  //       var y = window.pageYOffset;
  //       if (timelineOfTop !== y) {
  //         window.scrollTo(0, timelineOfTop);
  //       }
  //       if (e.which === 37) {
  //         prev.click();
  //       } else if (e.which === 39) {
  //         next.click();
  //       }
  //     }
  //   });
  // }
