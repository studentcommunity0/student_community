$(document).ready(function(){

    // generating pagination for the pages
    let community_limit = $("#select_limit_communities").val();
    let link = "pagination_community.php?community_limit="+community_limit;
    $("#pagination-for-community-information-table").load(link);

    // retrieve communities for community
    $("#community-details-id").load("retrieve_communities.php?page=1");  

    //community search  PENDING
    $("#search-community-content").on('click', function(){
        let community_search = $("#search-community-input").val();
        if(community_search == ""){
            $("#search-community-input").css("border-color","red");
            $("#search-community-input").css("border-width","1.5px");
        }else{
            
            community_search.replace(' ','%20');
            let community_limit = $("#select_limit_communities").val();
            let link = "pagination_community.php?community_limit="+community_limit+"&community_search="+community_search;
            $("#pagination-for-community-information-table").load(link);

            
            link =  "retrieve_communities.php?page=1&community_search="+community_search;
            $("#community-details-id").replacewith($("#community-details-id").load(link));
        }
    });

    // run community search function when community hits enter on input
    let input = $("#search-community-input");
    $(input).keyup(function(event){
        if(event.which == 13){
            event.preventDefault();
            if($(input).val() != ''){
                $("#search-community-content").click();
            }
        }
    });


});
function removeparameters(){
    const url = new URL(location);
    url.searchParams.delete('status');
    history.replaceState(null, null, url)
}
function delete_community(dbutton){
    if(window.confirm("Are you sure?")){
        let communityname = $(dbutton).parent().siblings();
        communityname = communityname[0];
        communityname = $(communityname).find('p').text();
        communityname = $.trim(communityname)
        let data = {
            communityname: communityname
        }
        console.log(data)
        $.ajax({
            url: "delete_community.php",
            type: "POST",
            data: data,
            datatype:"json",
            success: function(response){
                window.location.href="manage_community.php?status="+response;    
            }
        });
    }   
}
function block_community(dbutton){
    if(window.confirm("Are you sure?")){
        let communityname = $(dbutton).parent().siblings();
        communityname = communityname[0];
        communityname = $(communityname).find('p').text();
        communityname = $.trim(communityname)
        let data = {
            communityname: communityname
        }
        console.log(data)
        $.ajax({
            url: "block.php",
            type: "POST",
            data: data,
            datatype:"json",
            success: function(response){
                window.location.href="manage_communities.php?status="+response;    
            }
        });
    }   
}
function unblock_community(dbutton){
    
    let communityname = $(dbutton).parent().siblings();
    communityname = communityname[0];
    communityname = $(communityname).find('p').text();
    communityname = $.trim(communityname)
    let data = {
        communityname: communityname
    }
    console.log(data)
    $.ajax({
        url: "unblock.php",
        type: "POST",
        data: data,
        datatype:"json",
        success: function(response){
            window.location.href="manage_communities.php?status="+response;    
        }
    });
    
}
function retrieve_communities(){
    
    let community_limit = $("#select_limit_communities").val();

    // selecting community limit code
    let link = "pagination_community.php?community_limit="+community_limit;
    $("#pagination-for-community-information-table").replaceWith($("#pagination-for-community-information-table").load(link)); 

    // selecting sorting order code
    link = "retrieve_communities.php?community_limit="+community_limit;
    $("#community-details-id").replacewith($("#community-details-id").load(link));
}


function retrieve_communities_via_pagination(page){
    let community_limit = $("#select_limit_communities").val();
    page=  page.getAttribute('id');

    let link = "retrieve_communities.php?page="+page+"&community_limit="+community_limit;
    $("#community-details-id").replaceWith($("#community-details-id").load(link)); 

}