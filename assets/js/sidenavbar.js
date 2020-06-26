/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("student-community-side-nav-id").style.width = "250px";
    document.getElementById("body").style.marginRight = "250px";
    document.getElementById("body").style.transition = "0.5s ease";
    document.body.style.background.toString = "rbga(0,0,0,0.2) !important";
  }
  
  /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
  function closeNav() {
    document.getElementById("student-community-side-nav-id").style.width = "0";
    document.getElementById("body").style.marginRight = "0";
    
  }