(function() {
    
     var navoffeset = $(".header-main").offset().top;
     $(window).scroll(function () {
         var scrollpos = $(window).scrollTop();
         if (scrollpos >= navoffeset) {
             $(".header-main").addClass("fixed");
         } else {
             $(".header-main").removeClass("fixed");
         }
     });

    // custom scrollbar

    $("html").niceScroll({styler:"fb",cursorcolor:"#68ae00", cursorwidth: '6', cursorborderradius: '10px', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0',  zindex: '1000'});

    $(".scrollbar1").niceScroll({styler:"fb",cursorcolor:"#68ae00", cursorwidth: '6', cursorborderradius: '0',autohidemode: 'false', background: '#FFFFFF', spacebarenabled:false, cursorborder: '0'});

	
	
    $(".scrollbar1").getNiceScroll();
    if ($('body').hasClass('scrollbar1-collapsed')) {
        $(".scrollbar1").getNiceScroll().hide();
    }

    //infuse data into the modal dynamically
    $('.by_term').click(function(){
        
       // alert($(this).data('id'));
        $('#term_id').val($(this).data('id'))
        $('#term_name').text($(this).data('fname'))
        $('#term_fname').val($(this).data('fname'))
        $('#term_lname').val($(this).data('lname'))
        $('#term_class').val($(this).data('klass'))
        $('#term_level').val($(this).data('level'))


    })

     //infuse data into the modal dynamically
     $('.by_session').click(function () {

         // alert($(this).data('id'));
         $('#session_id').val($(this).data('id'))
         $('#session_name').text($(this).data('fname'))
         $('#session_fname').val($(this).data('fname'))
         $('#session_lname').val($(this).data('lname'))
         $('#session_class').val($(this).data('klass'))
         $('#session_level').val($(this).data('level'))


     })

     //infuse data into the modal dynamically
     $('.delete_result').click(function () {

         // alert($(this).data('id'));
         $('#subject').val($(this).data('subject'))
         $('#term').val($(this).data('term'))
         $('#session').val($(this).data('session'))
         $('#klass').val($(this).data('klass'))
    
         $('#level').val($(this).data('level'))


     })

    //infuse data into the modal dynamically
    $('#profile_pix').text('Upload New Profile Picture');

})(jQuery);

                     
     
  