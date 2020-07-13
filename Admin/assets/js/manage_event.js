$(document).ready(function(){

    // generating pagination for the pages
    let event_limit = $("#select_limit_events").val();
    let link = "pagination_events.php?event_limit="+event_limit;
    $("#pagination-for-event-information-table").load(link);

    // retrieve events for community
    $("#event-details-id").load("retrieve_events.php?page=1");  

    //event search  PENDING
    $("#search-event-content").on('click', function(){
        let event_search = $("#search-event-input").val();
        if(event_search == ""){
            $("#search-event-input").css("border-color","red");
            $("#search-event-input").css("border-width","1.5px");
        }else{
            
            event_search.replace(' ','%20');
            let event_limit = $("#select_limit_events").val();
            let link = "pagination_events.php?event_limit="+event_limit+"&event_search="+event_search;
            $("#pagination-for-event-information-table").load(link);

            
            link =  "retrieve_events.php?page=1&event_search="+event_search;
            $("#event-details-id").replacewith($("#event-details-id").load(link));
        }
    });

    // run event search function when event hits enter on input
    let input = $("#search-event-input");
    $(input).keyup(function(event){
        if(event.which == 13){
            event.preventDefault();
            if($(input).val() != ''){
                $("#search-event-content").click();
            }
        }
    });


});
function removeparameters(){
    const url = new URL(location);
    url.searchParams.delete('status');
    history.replaceState(null, null, url)
}

function delete_event(dbutton){
    if(window.confirm("Are you sure?")){
        let traverse = $(dbutton).parent().siblings();
        let event_id = traverse[0];
        event_id = $(event_id).find('p').text();
        event_id = $.trim(event_id)

        let event_name = traverse[1];
        event_name = $(event_name).find('p').text();
        event_name = $.trim(event_name);
        
        let community_name = traverse[3];
        community_name = $(community_name).find('p').text();
        community_name = $.trim(community_name);

        let data = {
            event_id: event_id,
            community_name: community_name,
            event_name: event_name
        }
        console.log(data)
        $.ajax({
            url: "delete_event.php",
            type: "POST",
            data: data,
            datatype:"json",
            success: function(response){
                window.location.href="manage_events.php?status="+response;    
            }
        });
    }   
}
function retrieve_events(){
    
    let event_limit = $("#select_limit_events").val();

    // selecting event limit code
    let link = "pagination_events.php?&event_limit="+event_limit;
    $("#pagination-for-event-information-table").replaceWith($("#pagination-for-event-information-table").load(link)); 

   
    link = "retrieve_events.php?event_limit="+event_limit;
    $("#event-details-id").replacewith($("#event-details-id").load(link));
}


function retrieve_events_via_pagination(page){
    let event_limit = $("#select_limit_events").val();
    page=  page.getAttribute('id');

    let link = "retrieve_events.php?page="+page+"&event_limit="+event_limit;
    $("#event-details-id").replaceWith($("#event-details-id").load(link)); 

}