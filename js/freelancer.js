// Freelancer Theme JavaScript

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a:not(.dropdown-toggle)').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

    // Floating label headings for the contact form
    $(function() {
        $("body").on("input propertychange", ".floating-label-form-group", function(e) {
            $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
        }).on("focus", ".floating-label-form-group", function() {
            $(this).addClass("floating-label-form-group-with-focus");
        }).on("blur", ".floating-label-form-group", function() {
            $(this).removeClass("floating-label-form-group-with-focus");
        });
    });

    $("a[href='#portfolioModal_Botit']").on('click',function(){
        
        $("#portfolioModal_Botit").load().find('.modal-body').find('.img-body')
          .html("<img class='img-responsive img-centered' src='img/screens/Botit/0.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/1.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/2.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/3.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/4.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/5.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/6.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/7.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/8.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/9.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/10.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/11.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/12.png' alt='description' />")
          .append("<img class='img-responsive img-centered' src='img/screens/Botit/13.png' alt='description' />");

});

$("a[href='#portfolioModal_Aseel']").on('click',function(){
    $("#portfolioModal_Aseel").load().find('.modal-body').find('.img-body')
      .html("<img class='img-responsive img-centered' src='img/screens/Aseel/0.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/1.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/2.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/3.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/4.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/5.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/6.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/7.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/8.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/9.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/10.png' alt='description' />")
      .append("<img class='img-responsive img-centered' src='img/screens/Aseel/11.png' alt='description' />");
});

    $("a[href='#portfolioModal1']").on('click',function(){
        
            $("#portfolioModal1").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Ekeif/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/14.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/15.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/16.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/17.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/18.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/19.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/20.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/21.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/22.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ekeif/23.png' alt='description' />");
    });
    $("a[href='#portfolioModal2']").on('click',function(){
        
            $("#portfolioModal2").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Kreaz/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/14.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/15.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/16.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/17.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/18.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Kreaz/19.png' alt='description' />");
    });
    $("a[href='#portfolioModal3']").on('click',function(){
          $("#portfolioModal3").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Qurany/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Qurany/11.png' alt='description' />");  
    });
    $("a[href='#portfolioModal4']").on('click',function(){
        
            $("#portfolioModal4").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Sloomo/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Sloomo/14.png' alt='description' />");  
    });
    $("a[href='#portfolioModal5']").on('click',function(){
        
            $("#portfolioModal5").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Ewsally/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/14.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/15.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/16.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/17.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/18.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/19.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/20.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/21.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/22.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/23.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/24.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/25.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/26.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/27.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/28.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/29.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Ewsally/30.png' alt='description' />");
    });
    $("a[href='#portfolioModal6']").on('click',function(){
        
            $("#portfolioModal6").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Almasar/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Almasar/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Almasar/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Almasar/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Almasar/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Almasar/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Almasar/7.png' alt='description' />");
    });
    

    $("a[href='#portfolioModal7']").on('click',function(){
        
            $("#portfolioModal7").load().find('.modal-body').find('.img-body')
              .html("<h2>Version 1.0</h2>")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/14.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/15.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/16.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/17.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/18.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/19.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/20.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/21.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/22.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/23.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/24.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/25.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/26.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/27.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/28.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/29.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/30.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/31.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/32.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/33.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/34.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/35.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/36.png' alt='description' />")
              .append("<h2>Version 4.0</h2>")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/37.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/38.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/39.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/40.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/41.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/42.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/43.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/44.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/45.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/46.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/47.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/48.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/49.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/50.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/51.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/52.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/53.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/54.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/55.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/56.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/57.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/58.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/59.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/60.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/61.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/62.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/63.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Taahel/64.png' alt='description' />");
    });
    
    $("a[href='#portfolioModal8']").on('click',function(){
          $("#portfolioModal8").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Johnson/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/9.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Johnson/10.png' alt='description' />");  
    });
    
    $("a[href='#portfolioModal9']").on('click',function(){
        
            $("#portfolioModal9").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Etoggar/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/14.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/15.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/16.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/17.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/18.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/19.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Etoggar/20.png' alt='description' />");
    });
    
    $("a[href='#portfolioModal10']").on('click',function(){
        
            $("#portfolioModal10").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/Elogra/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/14.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/15.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/16.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/17.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/Elogra/18.png' alt='description' />");
    });
    
    $("a[href='#portfolioModal11']").on('click',function(){
        
            $("#portfolioModal11").load().find('.modal-body').find('.img-body')
              .html("<img class='img-responsive img-centered' src='img/screens/MySpare/1.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/2.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/3.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/4.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/5.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/6.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/7.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/8.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/9.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/10.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/11.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/12.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/13.png' alt='description' />")  
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/14.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/15.png' alt='description' />")
              .append("<img class='img-responsive img-centered' src='img/screens/MySpare/16.png' alt='description' />");
    });
    
})(jQuery); // End of use strict
