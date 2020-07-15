$(document).ready(function(){

    // GET ALL POLLS
    $("#active-polls-id").load('retrieve_polls.php');
    
    // GET MY POLLS
    $("#my-polls-id").load('retrieve_my_polls.php');

    // GO TO CREATE NEW POLL PAGE
    $("#create_new_poll").on('click', function(){
        console.log('s');
        window.location.href ='create_poll_page.php';
    });

    //gives selected num of input fields
    give_new_option_list();

    // CREATE NEW POLL
    $("#create_new_poll_submit_button").on('click', function(){
        let title = $("#title").val();
        let description = $("#description").val();
        let options = [];
        $(".input_option").each(function(){
            options.push($(this).val())
        });
    
        let form_data = {
            'title' : title,
            'description': description,
            'options' : options
        }

        //submitting through ajax
        $.ajax({
            url:"create_new_poll.php",
            method: "POST",
            datatype: "json",
            data: form_data,
            success: function(response){
                window.location.href="create_poll_page.php?status="+response;  
            }


        });
        
    });

    
});


function give_new_option_list(){
    let num_options = $("#select_num_of_options").val()
    let options_div = $("#options")
    $(options_div).empty()
    let input
    let unique_name
    for(let i=0; i<num_options;++i){
        input = document.createElement("input");
        unique_name = "option"+i;
        input.setAttribute('name', unique_name);
        input.setAttribute('id', unique_name);
        input.setAttribute('class', 'input_option');
        options_div.append(input);
    }
}

// DISABLE A POLL
function disable_poll(){
    
}

// REMOVE GET PARAMETERS IN URL
function removeparameters(){
    const url = new URL(location);
    url.searchParams.delete('status');
    history.replaceState(null, null, url)
}