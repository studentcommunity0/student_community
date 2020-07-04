function goToAddEvent(){
    location.href="newEvent.php";
}


function copy_page_link(){
    const url = new URL(location);
    let copy = url.href;
    
    var fullLink = document.createElement('input');
    document.body.appendChild(fullLink);
    fullLink.value =copy;
    fullLink.select();
    document.execCommand("copy", false);
    fullLink.remove();
    alert(copy+"is copied to clipboard");
}

