function add(n){
    location.href = "newCompany.php";
}

function addCompany(){
    var companyName = document.getElementById("company-name").value;
    var companyURL = document.getElementById("company-url").value;
    var companyDisc = document.getElementById("company-disc").value;

    if(companyName=="" || companyDisc=="" || companyURL==""){
        document.getElementById("error-message").style.visibility = "";
        if(companyName==""){
            document.getElementById("company-name").style.borderColor = "red";
        }
        if(companyURL==""){
            document.getElementById("company-url").style.borderColor = "red";
        }
        if(companyDisc==""){
            document.getElementById("company-disc").style.borderColor = "red";
        }
    }
    else{
        xml = new XMLHttpRequest();

        xml.open("GET","addNewCompany.php?companyName="+companyName+"&companyURL="+companyURL+"&companyDisc="+companyDisc,"true");
        xml.send();

        xml.onreadystatechange=function(){
            if(xml.readyState==4){
                alert(xml.responseText);
            }
        }
    }
}

function getCompanies(){

    xml = new XMLHttpRequest();

    xml.open("POST","getAllCompanies.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("comapnies-column").innerHTML +=xml.responseText
        }
    }

    xml2 = new XMLHttpRequest();
    xml2.open("POST","getRandomCompanies.php",true);
    xml2.send();

    xml2.onreadystatechange=function(){
        if(xml2.readyState==4){
            document.getElementById("random-comapnies-column").innerHTML +=xml2.responseText
        }
    }
}

function search(){
    var searchInput = document.getElementById("search-input").value;
    
    xml3 = new XMLHttpRequest();
    xml3.open("GET","searching.php?searchInput="+searchInput,true);
    xml3.send();

    xml3.onreadystatechange = function(){
        if(xml3.readyState==4){
            document.getElementById("comapnies-column").innerHTML = xml3.responseText;
        }
    }
}

function getHompageCompanies(){
    xml = new XMLHttpRequest();
    xml.open("POST","HP-getRandomCompanies.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("HP-comapnies").innerHTML +=xml.responseText;
        }
    }
}

function addCompanyToSession(CN){
    var companyName = CN;
    
    xml = new XMLHttpRequest();
    xml.open("GET","setSessionCompanyVariable.php?companyName="+companyName,true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            location.href="company.php";
        }
    }
}