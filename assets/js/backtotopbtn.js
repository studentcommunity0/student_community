let backtotop = document.getElementById("back-to-top-btn");

window.scroll = function(){scrolltotop()};

function scrolltotop(){
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backtotop.style.display = "block";
      } else {
        backtotop.style.display = "none";
      }
}


function totop() {
    $('html,body').animate({ scrollTop: 0 }, 400);
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    
  }