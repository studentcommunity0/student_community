$(document).ready(function(){ 

    // generating pagination for the pages
    let review_limit = $("#select_limit_reviews").val();
    let link = "pagination.php?selected_order=Recent&review_limit="+review_limit;
    $("#pagination-for-company-reviews").load(link);

    // Loading all reviews
    $("#user-reviews-section").load("retrieve_reviews.php?selected_order=Recent&page=1");  
    
    
    
    // Loading COMPANY RATING
    $("#company_rating").load("displayCompanyRating.php");  
    let company_rating = document.querySelector('.stars').getAttribute('data-rating'); 
    console.log(company_rating);
    let fraction = company_rating % 1;
    console.log(fraction);
    $(".star.rated.half-star::before").css('width',fraction*100);

    // CKEDITOR5 text editor formatting functionality
    let theEditor;
    ClassicEditor
        .create( document.querySelector( '#review' ) )
        .then(editor => {
            theEditor=editor;
        })
        .catch( error => {
            console.error( error );
    });


    // STAR RATING
    let stars = document.querySelectorAll('.star.company-evaluation-add-star-rating');
    stars.forEach(function(star){
        star.addEventListener('click', setRating); 
    });      
    let rating = parseInt(document.querySelector('.stars.company-evaluation-add-star-rating').getAttribute('data-rating'));
    let target = stars[rating - 1];
    target.dispatchEvent(new MouseEvent('click'));




    // getting data from the evaluation form
    var company_name;
    var review;
    var from_date;
    var to_date;
    var title;
    var date_time_of_review;
    var stars_rating;
    $("#submit-button").on('click', function(){
        
        company_name = $("#company-name").text();
        review = theEditor.getData();
        from_date = $("#duration-from").val();
        to_date = $("#duration-to").val();
        title = $("#title").val();
        today = new Date();
        date_time_of_review = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate()+' '+today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        stars_rating = parseInt(document.querySelector('.stars.company-evaluation-add-star-rating').getAttribute('data-rating'));
        if(review == "" || from_date == "" || to_date == "" || title == ""){
            $("#error-message").css("display","block");

            if(from_date == ""){
                $("#duration-from").css("border-color","red");
                $("#duration-from").css("border-width","1px");
            }
            if(to_date == ""){
                $("#duration-to").css("border-color","red");
                $("#duration-to").css("border-width","1px");
            }
            if(title == ""){
                $("#title").css("border-color","red");
                $("#title").css("border-width","1px");
            }
            if(review == ""){
                theEditor.setData('Enter Review please!').color('red');
            }
        }else{
            
            let review_data = {
                    "company_name": company_name,
                    "from_date": from_date,
                    "to_date": to_date,
                    "title": title,
                    "date_time_of_review": date_time_of_review,
                    "review": review,
                    "rating": stars_rating
                };
            console.log(review_data);
            
            // Sending data to the database
            $.ajax({
                url: "add_review.php",
                data: review_data,
                type: "POST",
                datatype:"json",
                success: function(){
                    console.log("works");
                    // Reloading all reviews and updated company rating
                    $("#user-reviews-section").replaceWith($("#user-reviews-section").load("retrieve_reviews.php?selected_order=Recent"));
                    $("#company_rating").replaceWith($("#company_rating").load("displayCompanyRating.php"));

                }
            });
        
        off();
    }
    });





});


function retrieve_reviews(){
    
    // Selects the order of the reviews
    let selected_order = $("#select_order_reviews").val();
    console.log(selected_order);
    let review_limit = $("#select_limit_reviews").val();

    let link = "pagination.php?review_limit="+review_limit+"&selected_order="+selected_order;
    $("#pagination-for-company-reviews").replaceWith($("#pagination-for-company-reviews").load(link)); 


    // Loads the review in the selected order via GET
    link ="retrieve_reviews.php?selected_order="+selected_order+"&review_limit="+review_limit;
    console.log(link)
    $("#user-reviews-section").replaceWith($("#user-reviews-section").load(link)); 
    
}

function retrieve_reviews_via_pagination(page){
    let selected_order = $("#select_order_reviews").val();
    let review_limit = $("#select_limit_reviews").val();

    console.log(review_limit);
    page=  page.getAttribute('id');
    console.log(page);
    
    let link = "retrieve_reviews.php?selected_order="+selected_order+"&page="+page+"&review_limit="+review_limit;
    $("#user-reviews-section").replaceWith($("#user-reviews-section").load(link)); 

    
}

function setRating(ev){
    let span = ev.currentTarget;
    let stars = document.querySelectorAll('.company-evaluation-add-star-rating.star');
    let match = false;
    let num = 0;
    stars.forEach(function(star, index){
        if(match){
            star.classList.remove('rated');
        }else{
            star.classList.add('rated');
        }
        //checks if we are currently looking at the span/ star that was clicked
        if(star === span){
            match = true;
            num = index + 1;
        }
    });
    document.querySelector('.stars.company-evaluation-add-star-rating').setAttribute('data-rating', num);
}


function on(){
    document.getElementById("review-contents").style.display= "Block";
}


function off(){
    document.getElementById("review-contents").style.display= "none";
}

