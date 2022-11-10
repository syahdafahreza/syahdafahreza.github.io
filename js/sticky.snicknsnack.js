window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var pgcontent = document.getElementById("page-content");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    pgcontent.classList.add("page-content-sticky");
  } else {
    header.classList.remove("sticky");
    pgcontent.classList.remove("page-content-sticky");
  }
}