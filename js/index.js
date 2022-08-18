$(document).ready(function()
{
    // edit operation in contribution page
    $(".edit_btn").click(function(){
        $id = $(this).data('id');
        console.log($id);

    });

    // function to display edit modal 
    $.fn.displayModal = function()
    {
        $(".modal").show();
    }

    //opening alumni details modal
    $("#alumni_table .details_btn").click(function(){
        
        //Data receive elements
        var alumni_fname = $("#alumni_table .alumni_fname")
        var alumni_lname = $("#alumni_table .alumni_lname")
        var alumni_gender = $("#alumni_table .alumni_gender")
        var alumni_phn = $("#alumni_table .alumni_phn")
        var alumni_email = $("#alumni_table .alumni_email")
        var alumni_occupation = $("#alumni_table .alumni_occupation")
        var alumni_bio = $("#alumni_table .alumni_bio")
        //get the id of alumni
        var userID = $(this).val();
        console.log(userID);
        if(userID != "")
        {
            const xhttp = new XMLHttpRequest(); // XMLHtppRequest obeject
            xhttp.onload = function(){
            var fname;
            var lname;
            var gender;
            var phnum;
            var email;
            var occupation;
            var bio;
            var results = JSON.parse(this.responseText);
            if(results != "")
            {
                console.log(results);
                fname = results[0]['firstname'];
                lname = results[0]['lastname'];
                gender = results[0]['gender'];
                phnum = results[0]['phone_num'];
                email = results[0]['email'];
                occupation  = results[0]['occupation'];
                bio = results[0]['bio'];

                //set results to data receive elements
                alumni_fname.text(fname); 
                alumni_lname.text(lname); 
                alumni_gender.text(gender);
                alumni_phn.text(phnum);
                alumni_email.text(email);
                alumni_occupation.text(occupation);
                alumni_bio.text(bio);
                console.log(fname);
            }
        }
        var url = "../database/ajax.php?userID="+$.trim(userID);
        xhttp.open("GET",url);
        xhttp.send();
        }
        $(".alumni_modal").css("display","block");
        console.log("close btn clicked");
    });


    //closing alumni details modal
    $(".close_btn").click(function(){
        $(".alumni_modal").css("display","none");
        console.log("close btn clicked");
    });

    // //opening and closing alumni contributions
    // $(".cont-status-btn").click(function(){
    //      var targetVal = $(this).val();
    //     if(targetVal != "")
    //     {
    //         const xhttp = new XMLHttpRequest(); // XMLHtppRequest obeject
    //         xhttp.onload = function(){                
    //             var results = JSON.parse(this.responseText);
    //             if(results != "")
    //             {
    //                 console.log(results);
    //             }            
    //     }
    //     var url = "../database/ajax.php?benstatus"+$.trim(targetVal);
    //     xhttp.open("GET",url);
    //     xhttp.send();
    //    }
    //     // xhttp.onload = function(){
    //     // var results = JSON.parse(this.responseText);
    //     //   if($(this).hasClass("open-cont"))
    //     //   {
    //     //       console.log(resultsa);
    //     //   }
    //     //   else if($(this).hasClass("close-cont"))
    //     //   {
            
    //     //   }
    //     // }
        
        
    // });
    

});