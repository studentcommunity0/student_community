function goToAddCommunity(){
    location.href="newCommunity.php";
}
function goToPrivateCommunities(){
    location.href="joinPrivateCommunityForm.php";
}
function browseCommunities(){
    location.href="browesAllCommunities.php";
}

function addCommunityToSession(com){
    xml = new XMLHttpRequest();
    xml.open("GET","setSessionCommunityVariable.php?communityName="+com,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            location.href="communityPage.php";
        }
    }
}

function searchMyCommunities(){
    var searchInput = document.getElementById("myCommunities-search-input").value;
    xml = new XMLHttpRequest();
    xml.open("GET","myCommunitiesSearch.php?searchInput="+searchInput,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("myCommunities").innerHTML=xml.responseText;
        }
    }
}
function allCommunitiesSearch(){
    var searchInput = document.getElementById("allCommunities-search-input").value;
    xml = new XMLHttpRequest();
    xml.open("GET","allCommunitiesSearch.php?searchInput="+searchInput,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("myCommunities").innerHTML=xml.responseText;
        }
    }
}


var Availability="public";
var Category = "University";
function setAvailability(A){
    Availability=A;
}
function setCategory(C){
    Category=C;
}

function addCommunity(){
    
    var communityName = document.getElementById("community-name").value;
    var availability= Availability;
    var category = Category;
    var communityDescription = document.getElementById("community-disc").value;

    if(communityName=="" || communityDescription==""){
        document.getElementById("community-error-message").style.visibility = "";
        if(communityName==""){
            document.getElementById("community-name").style.borderColor="red";
        }
        if(communityDescription==""){
            document.getElementById("community-disc").style.borderColor="red";
        }
    }
    else{
        community_name_syntax = new RegExp("^([A-za-z]+[0-9]*)*$");
        console.log(!community_name_syntax.test(communityName));
        if(!community_name_syntax.test(communityName) ){
            document.getElementById("community-name").style.borderColor="red";
        }
        else{
            xml = new XMLHttpRequest();
            xml.open("GET","addCommunity.php?communityName="+communityName+"&communityDescription="+communityDescription+"&category="+category+"&availability="+availability,true);
            xml.send();

            xml.onreadystatechange=function(){
                if(xml.readyState==4){
                    document.getElementById('add-alert').innerHTML="";
                    const alert = document.querySelector('#add-alert');
                    alert.appendChild(createAlert(xml.responseText));
                }
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
function getAllCommuniteis(){
    xml = new XMLHttpRequest();
    xml.open("GET","getAllCommunities.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("myCommunities").innerHTML=xml.responseText;
        }
    }
}
function getCommuniteis(){
    xml = new XMLHttpRequest();
    xml.open("GET","getMyCommunities.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("myCommunities").innerHTML=xml.responseText;
        }
    }
}

function joinCommunity(com){
    var communityName = com;
    xml = new XMLHttpRequest();
    xml.open("GET","joinCommnuity.php?communityName="+communityName,true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById('join-alert').innerHTML="";
            const alert2 = document.querySelector('#join-alert');
            alert2.appendChild(createAlert(xml.responseText));
            location.href = "#join-alert";
        }
    }
}

function leaveCommunity(com){
    var communityName = com;
    xml = new XMLHttpRequest();
    xml.open("GET","leaveCommnuity.php?communityName="+communityName,true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById('join-alert').innerHTML="";
            const alert2 = document.querySelector('#join-alert');
            alert2.appendChild(createAlert(xml.responseText));
            location.href = "#join-alert";
        }
    }
}

function joinPrivateCommunities(){
    var communityName = document.getElementById("private-community-name").value;
    var communityID = document.getElementById("private-community-id").value;

    xml = new XMLHttpRequest();
    xml.open("GET","joinPrivateCommunity.php?communityName="+communityName+"&communityID="+communityID,true);
    xml.send()

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById('private-join-alert').innerHTML="";
            const alert2 = document.querySelector('#private-join-alert');
            alert2.appendChild(createAlert(xml.responseText));
        }
    }
}

function communityPageStart(){
    $("#message-textarea").hide();
    $("#reply-textarea").hide();
    
    xml = new XMLHttpRequest();
    xml.open("GET","GetTheMessages.php",true);
    xml.send();

    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("main").innerHTML=xml.responseText;
        }
    }
}

function goToManagingPage(com){
    xml = new XMLHttpRequest();
    xml.open("GET","setSessionCommunityVariable.php?communityName="+com,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            location.href="communityManagementPage.php";
        }
    }
}

function manage(){
    xml = new XMLHttpRequest();
    xml.open("GET","communityManagementControl.php",true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById("members").innerHTML=xml.responseText;
        }
    }
}

function removePart(id){
    xml = new XMLHttpRequest();
    xml.open("GET","removePart.php?id="+id,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){removePart-alert
            document.getElementById('removePart-alert').innerHTML="";
            const alert2 = document.querySelector('#removePart-alert');
            alert2.appendChild(createAlert(xml.responseText));
        }
    }
}

function showTexrarea(){
    location.href="#message-textarea";
    $("#message-textarea").fadeToggle(1000);
}
var MID;
function showReplyArea(id){
    location.href="#reply-textarea";
    $("#reply-textarea").fadeToggle(1000);
    MID = id;
}
function setMessageToSession(){
    var TextareaInput = encodeURIComponent(CKEDITOR.instances.editor1.getData());
    xml = new XMLHttpRequest();
    xml.open("GET","setSessionMessageVariable.php?TextareaInput="+TextareaInput,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
        }
    }
}
function sendTheMessage(){
    var TextareaInput = encodeURIComponent(CKEDITOR.instances.editor1.getData());
    xml = new XMLHttpRequest();
    xml.open("GET","sendMessage.php?TextareaInput="+TextareaInput,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById('msg-alert').innerHTML="";
            const alert = document.querySelector('#msg-alert');
            alert.appendChild(createAlert(xml.responseText));
        }
    }
}

function reply(id){
    var divid= "ta"+id;
    document.getElementById("divid").style.visibility = "visible";
}

function sendTheReply(){
    var TextareaInput = encodeURIComponent(CKEDITOR.instances.editor2.getData());
    var messageID = MID
    xml = new XMLHttpRequest();
    xml.open("GET","sendReply.php?TextareaInput="+TextareaInput+"&messageID="+messageID,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById('reply-alert').innerHTML="";
            const alert = document.querySelector('#reply-alert');
            alert.appendChild(createAlert(xml.responseText));
        }
    }
}

function sendInvitation(com){
    var recipientEmail = document.getElementById('invite-input').value;
    var communityName = com;
    xml = new XMLHttpRequest();
    xml.open("GET","sendInvetation.php?recipientEmail="+recipientEmail+"&communityName="+communityName,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            alert(xml.responseText);
        }
    }
}

function goToInvitationPage(){
    location.href="myInvitations.php";
}

function removeFromIvitation(communityName){
    xml = new XMLHttpRequest();
    xml.open("GET","removeFromIvitation.php?communityName="+communityName,true);
    xml.send();
    xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById('invitations-alert').innerHTML="";
            const alert = document.querySelector('#invitations-alert');
            alert.appendChild(createAlert("The invitation ignored"));
        }
    }
}

function acceptInvitation(community){
    joinCommunity(community);
    removeFromIvitation(community);
     xml.onreadystatechange=function(){
        if(xml.readyState==4){
            document.getElementById('invitations-alert').innerHTML="";
            const alert = document.querySelector('#invitations-alert');
            alert.appendChild(createAlert("The invitation accepted"));
        }
    }
}
// LINK TO SHARED FILES FOR EACH COMMUNITY
function communitySharedFiles(){
    xml.open("GET","../Drive/sharedfiles.php",true);
    xml.send();
}
function goToEvents(){
    location.href="../Events/events.php";
}

function goToShop(){
    location.href="../Shop/shop.php";
}

function goToPolls(){
    location.href ="../polling_system/all_polls_page.php";
}