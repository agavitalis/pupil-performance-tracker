(function() {
    "use strict";

    // custom scrollbar

    $("html").niceScroll({styler:"fb",cursorcolor:"#68ae00", cursorwidth: '6', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#68ae00", cursorwidth: '6', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});

	
	
    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

    //update teachers
    $('.update-teacher').click(function () {

        $('[name="update-id"]').val($(this).data('id'))
        var t_id = $(this).data('id');

       // alert(t_id);
        $.ajax({
            type: 'post',
            url: './include/controller.php',
            data: {
                'action': "update_teacher",
                'id': t_id
            },
            success: function (data) {
                //phase the json as objects
               var result = JSON.parse(data);
               //assign them to the form
                $('[name="t_fname"]').val(result.first_name);
                $('[name="t_lname"]').val(result.last_name);
                $('[name="t_email"]').val(result.email);
                $('[name="t_gender"]').val(result.gender);
                $('[name="t_class"]').val(result.class);
                $('[name="update_id"]').val(result.id);

               
                
            }
        })

    })


    //now update teacheers
    $('#confirm-update').click(function () {
        
        if ($('[name="t_fname"]').val() == "" || $('[name="t_class"]').val() == "" || $('[name="t_lname"]').val() == "" || $('[name="t_email"]').val() == "" || $('[name="t_gender"]').val() == "") {
            
            $('.update-message').html('<p class="alert alert-info text-center">Please Fill All Fields </p>')
        }
        else{
                $.ajax({
                    type: 'post',
                    url: './include/controller.php',
                    data: {
                        'action': "confirm_update",
                        'id': $('[name="update_id"]').val(),
                        'fname': $('[name="t_fname"]').val(),
                        'lname': $('[name="t_lname"]').val(),
                        'email': $('[name="t_email"]').val(),
                        'gender': $('[name="t_gender"]').val(),
                        'class': $('[name="t_class"]').val()
                    },
                    success: function (data) {
                        if (data == 1) {
                            $('.update-message').html('<p class="alert alert-success text-center">Teacher record successfully updated</p>')
                             setTimeout(function () {
                                 location.reload()
                             }, 2000)
                        } else {
                           // $('.update-message').html('<p class="alert alert-info text-center">An error occured, check your selection</p>')
                            $('.update-message').html('<p class="alert alert-info text-center">'+data+'</p>');
                        }
                    }
                })
            }
    })

    
    //delete teachers
     $('.delete-teacher').click(function () {

        $('[name="delete-id"]').val($(this).data('id'))
       
     });

     //on confirmation of delete
     $('#confirm-delete').click(function () {
        var idd = $('[name="delete-id"]').val();
        $.ajax({
            type: 'post',
            url: './include/controller.php',
            data: {
                'action': "delete_teacher",
                'id': idd
            },
            success: function (data) {
                if(data == 1){
                    $('.delete-message').html('<p class="alert alert-success text-center">Teacher deleted successfully</p>')
                     setTimeout(function () {
                         location.reload()
                     }, 2000)
                
                }
                else{
                    $('.delete-message').html('<p class="alert alert-info text-center">An error occured, check your selection</p>')
                }
            }
        })
     })

})(jQuery);

                     
     
  