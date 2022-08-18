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




});