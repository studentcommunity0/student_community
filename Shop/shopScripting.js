function getTheItems(){
    xml = new XMLHttpRequest();
    xml.open("GET","getAllItems.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("shop-main").innerHTML=xml.responseText;
        }
    }
}

function addItemForm(){
    location.href="addItemForm.php"
}

var itemType = "Book";
function setType(type){
    itemType = type;
}

function addItem(){
    var Item = document.getElementById("item-name").value;
    var type = itemType;
    var price = document.getElementById("item-price").value;
    var description = document.getElementById("item-disc").value;
    var contact = document.getElementById("item-contact").value;
    
    if(Item=="" || price=="" || contact==""){
        document.getElementById("shop-error-message").style.visibility = "";
        if(item==""){
            document.getElementById("item-name").style.borderColor = "red";
        }
        if(price==""){
            document.getElementById("item-price").style.borderColor = "red";
        }
        if(contact==""){
            document.getElementById("item-contact").style.borderColor = "red";
        }
    }
    else{
        xml = new XMLHttpRequest();
        xml.open("GET","addItem.php?Item="+Item+"&price="+price+"&description="+description+"&contact="+contact+"&type="+type,true);
        xml.send();

        xml.onreadystatechange=function(){
            if(xml.readyState==4){
                alert(xml.responseText);
                document.getElementById('item-alert').innerHTML="";
                const alert = document.querySelector('#item-alert');
                alert.appendChild(createAlert(xml.responseText));
            }
        }
    }
}

function createAlert(name) {
    let div = document.createElement('div');
    div.classList = "alert alert-warning alert-dismissible fade show";
    let a = document.createElement('a');
    a.textContent = name;
    div.appendChild(a);
    return div;
}

function myItems(){
    xml = new XMLHttpRequest;
    xml.open("GET","getMyItems.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("shop-main").innerHTML=xml.responseText;
        }
    }

}

function changeStatus(s,ID){
    var status = s;
    var id = ID
    xml = new XMLHttpRequest;
    xml.open("GET","chnageStatus.php?status="+status+"&id="+id,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            alert(xml.responseText);
        }
    }
}

function search(){
    var input = document.getElementById('search-items-input').value;
    xml = new XMLHttpRequest;
    xml.open("GET","itemsSearch.php?input="+input,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("shop-main").innerHTML=xml.responseText;
        }
    }    
}