function hi(){
    alert("Hello");
}

function getHompageCompanies(){
        
    xml = new XMLHttpRequest();
    xml.open("POST","HP-getRandomCompanies.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("HP-companies").innerHTML +=xml.responseText;
            //alert(xml.responseText);
        }
    }
}

function goToTrainingEvaluation(){
    location.href="TrainingEvaluation.php";
}

function setCompanyInSession(CN){
    alert(CN);
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