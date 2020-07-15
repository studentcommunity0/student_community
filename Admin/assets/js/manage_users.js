$(document).ready(function(){

    // generating pagination for the pages
    let user_limit = $("#select_limit_users").val();
    let link = "pagination.php?user_limit="+user_limit;
    $("#pagination-for-user-information-table").load(link);

    // retrieve users for community
    $("#user-details-id").load("retrieve_users.php?page=1");  

    //user search  PENDING
    $("#search-user-content").on('click', function(){
        let user_search = $("#search-user-input").val();
        if(user_search == ""){
            $("#search-user-input").css("border-color","red");
            $("#search-user-input").css("border-width","1.5px");
        }else{
            
            user_search.replace(' ','%20');
            let user_limit = $("#select_limit_users").val();
            let link = "pagination.php?user_limit="+user_limit+"&user_search="+user_search;
            $("#pagination-for-user-information-table").load(link);

            
            link =  "retrieve_users.php?page=1&user_search="+user_search;
            $("#user-details-id").replacewith($("#user-details-id").load(link));
        }
    });

    // run user search function when user hits enter on input
    let input = $("#search-user-input");
    $(input).keyup(function(event){
        if(event.which == 13){
            event.preventDefault();
            if($(input).val() != ''){
                $("#search-user-content").click();
            }
        }
    });


});
function removeparameters(){
    const url = new URL(location);
    url.searchParams.delete('status');
    history.replaceState(null, null, url)
}

function block_user(dbutton){
    if(window.confirm("Are you sure?")){
        let username = $(dbutton).parent().siblings();
        username = username[0];
        username = $(username).find('p').text();
        username = $.trim(username)
        let data = {
            username: username
        }
        console.log(data)
        $.ajax({
            url: "block.php",
            type: "POST",
            data: data,
            datatype:"json",
            success: function(response){
                window.location.href="manage_users.php?status="+response;    
            }
        });
    }   
}
function unblock_user(dbutton){
    
    let username = $(dbutton).parent().siblings();
    username = username[0];
    username = $(username).find('p').text();
    username = $.trim(username)
    let data = {
        username: username
    }
    console.log(data)
    $.ajax({
        url: "unblock.php",
        type: "POST",
        data: data,
        datatype:"json",
        success: function(response){
            window.location.href="manage_users.php?status="+response;    
        }
    });
    
}
function retrieve_users(){
    
    let user_limit = $("#select_limit_users").val();

    // selecting user limit code
    let link = "pagination.php?&user_limit="+user_limit;
    $("#pagination-for-user-information-table").replaceWith($("#pagination-for-user-information-table").load(link)); 

    // selecting sorting order code
    link = "retrieve_users.php?user_limit="+user_limit;
    $("#user-details-id").replacewith($("#user-details-id").load(link));
}


function retrieve_users_via_pagination(page){
    let user_limit = $("#select_limit_users").val();
    page=  page.getAttribute('id');

    let link = "retrieve_users.php?page="+page+"&user_limit="+user_limit;
    $("#user-details-id").replaceWith($("#user-details-id").load(link)); 

}