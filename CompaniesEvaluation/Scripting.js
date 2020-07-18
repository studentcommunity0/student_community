function get_industries(){
    $("#company-industry").load('get_all_industries.php');
}

function removeparameters(){
    const url = new URL(location);
    url.searchParams.delete('status');
    history.replaceState(null, null, url)
}

function add(n){
    location.href = "newCompany.php";
}

function addCompany(){
    var companyName = document.getElementById("company-name").value;
    var companyURL = document.getElementById("company-url").value;
    var companyContactUsURL = document.getElementById("company-contact-us-url").value;
    var companyDisc = document.getElementById("company-disc").value;
    var companyIndustry = document.getElementById("company-industry").value;
    url_syntax = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i');
    if(companyName=="" || companyDisc=="" || companyURL==""|| companyIndustry=="" || companyContactUsURL==""|| !url_syntax.test(companyURL)|| !url_syntax.test(companyContactUsURL)){
        document.getElementById("error-message").style.visibility = "";
        if(companyName==""){
            document.getElementById("company-name").style.borderColor = "red";
        }
        if(companyURL=="" || !url_syntax.test(companyURL)){
            document.getElementById("company-url").style.borderColor = "red";
        }
        if(companyContactUsURL=="" || !url_syntax.test(companyContactUsURL)){
            document.getElementById("company-contact-us-url").style.borderColor = "red";
        }
        if(companyDisc==""){
            document.getElementById("company-disc").style.borderColor = "red";
        }
        if(companyIndustry==""){
            document.getElementById("company-industry").style.borderColor = "red";
        }
    }
    else{
        xml = new XMLHttpRequest();

        xml.open("GET","addNewCompany.php?companyName="+companyName+"&companyURL="+companyURL+"&companyContactUsURL="+companyContactUsURL+"&companyDisc="+companyDisc+"&companyIndustry="+companyIndustry,"true");
        xml.send();

        xml.onreadystatechange=function(){
            if(xml.readyState==4){
                
                window.location.href='TrainingEvaluation.php?status='+xml.responseText;
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
    let search_type = document.getElementById("search_type").value;
    xml3 = new XMLHttpRequest();
    let url =  "searching.php?searchInput="+searchInput+"&search_type="+search_type;
    xml3.open("GET",url,true);
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