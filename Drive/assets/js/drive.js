$(document).ready(function(){

    // generating pagination for the pages
    let file_limit = $("#select_limit_files").val();
    let link = "pagination.php?selected_order=Recent&file_limit="+file_limit;
    $("#pagination-for-community-files").load(link);

    // retrieve files for community
    $("#file-details-id").load("retrieve_files.php?selected_order=Recent&page=1");  
        
    //file search
    $("#search-drive-content").on('click', function(){
        let file_search = $("#search-drive-input").val();
        if(file_search == ""){
            $("#search-drive-input").css("border-color","red");
            $("#search-drive-input").css("border-width","1.5px");
        }else{
            file_search.replace(' ','%20');
            let file_limit = $("#select_limit_files").val();
            let link = "pagination.php?selected_order=Recent&file_limit="+file_limit+"&file_search="+file_search;
            $("#pagination-for-community-files").load(link);

            
            link =  "retrieve_files.php?selected_order=Recent&page=1&file_search="+file_search;
            $("#file-details-id").replacewith($("#file-details-id").load(link));
        }
    });
        
    
    // Download all files in the community
    $("#download-all-community-shared-files").on('click', function(){
        window.location.href ="download_all_files.php";
    });
   
    // run file search function when user hits enter on input
    let input = $("#search-drive-input");
    $(input).keyup(function(event){
        if(event.which == 13){
            event.preventDefault();
            if($(input).val() != ''){
                $("#search-drive-content").click();
            }
        }
    });

    

});
function removeparameters(){
    const url = new URL(location);
    url.searchParams.delete('status');
    history.replaceState(null, null, url)
}
function delete_file(dbutton){
    if(window.confirm("Are you sure?")){
        let filename = $(dbutton).parent().siblings();
        filename = filename[0];
        filename = $(filename).find('p').text();
        let data = {
            filename: filename
        }
        $.ajax({
            url: "delete_file.php",
            type: "POST",
            data: data,
            datatype:"json",
            success: function(response){
                window.location.href="sharedfiles.php?status="+response;    
                //$("#file-details-id").replacewith($("#file-details-id").load("retrieve_files.php?selected_order=Recent&page=1"));  

            }
        });
    }   
}

function retrieve_files(){
    let selected_order = $("#select_order_files").val();
    let file_limit = $("#select_limit_files").val();

    // selecting file limit code
    let link = "pagination.php?selected_order="+selected_order+"&file_limit="+file_limit;
    $("#pagination-for-community-files").replaceWith($("#pagination-for-community-files").load(link)); 

    // selecting sorting order code
    link = "retrieve_files.php?selected_order="+selected_order+"&file_limit="+file_limit;
    $("#file-details-id").replacewith($("#file-details-id").load(link));
}

function retrieve_files_via_pagination(page){
    let selected_order = $("#select_order_files").val();
    let file_limit = $("#select_limit_files").val();
    page=  page.getAttribute('id');

    let link = "retrieve_files.php?selected_order="+selected_order+"&page="+page+"&file_limit="+file_limit;
    $("#file-details-id").replaceWith($("#file-details-id").load(link)); 

}