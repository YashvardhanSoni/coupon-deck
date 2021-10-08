// $( "#search_btn" ).click(function() {
//     var category = $("#category").val();
//     var search_value = $("#search_value").val();
//     if(category != '' && search_value != ''){
//         window.location.href = "http://localhost/theme/coupon1.php?searchkey="+category+"_"+search_value;
//     }
//   });

$(document).ready(function(){
        $("#search_btn").click(function(){
        var category = $("#category").val();
        var search_value = $("#search_value").val();
        var pageid = $("#pageid").val();
        if(category == ''){
            alert("Please select a category");
        }else if(search_value == ''){
            alert("Please pass search key");
        }else{
            $.ajax({
                type: 'POST',
                data: {'category': category, 'search_value': search_value, 'pageid': pageid},
                url: "http://localhost/theme/searchedData.php",
                success:function(data){
                    $("#offer_holder").html('');
                    console.log(data);
                    // if(data){
                        $("#offer_holder").html(data);
                    // }
                }
            });
        }
        
    });
});