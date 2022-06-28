//hero typing effect
new TypeIt("#headline", {
    speed: 50,
    waitUntilVisible: true,
  }).go();

  new TypeIt("#name", {
    speed: 50,
    waitUntilVisible: true,
  }).go();

  $(document).ready(function(){
    $("#scrollTop").hide();
    $(window).on('scroll',(function () {
      toggleColorOnScroll();
      navbarColorOnScroll();
      scrollToTopButton();
      addClassOnScroll();
      sectionInViewport();
  }));
});
  
  
  
  
  function toggleColorOnScroll(){
    if ($(this).scrollTop() > 300) {
      $("#togglebutton").removeClass("link-light").addClass("toggle-color");
    } else{
      $("#togglebutton").removeClass("toggle-color").addClass("link-light");
    }
  }
  function navbarColorOnScroll(){
    if ($(this).scrollTop() > 300) {
       $("#navbar").addClass("nav-bg");
      } else{
         $("#navbar").removeClass("nav-bg");
        }
      }
  function scrollToTopButton(){
    if ($(this).scrollTop() > 300) {
      $('#scrollTop').fadeIn();
    } else {
      $('#scrollTop').fadeOut();
    }
  }
  function sectionAnimationControl(){
    //$("#js_nav .nav-item a").on('click',(function(){
      //$(".nav-link").removeClass('active');
      //$(this).closest('.nav-item a').addClass('active');
    //})

  }
  function sectionInViewport(){
    $("section:gt(0)").each(function(){
      var divPos = $(this).offset().top,
              topOfWindow = $(window).scrollTop();  
      if( divPos < topOfWindow+400 ){
        $('section:gt(0) h2').addClass('animate__animated animate__pulse');
        setTimeout(function() {
          $('section:gt(0) h2').removeClass('animate__animated animate__pulse');
          }, 2000);     
         }
        });
      }
    


  function addClassOnScroll() {
    var windowTop = $(window).scrollTop();
    $('section[id]').each(function (index, elem) {
        var offsetTop = $(elem).offset().top;
        var outerHeight = $(this).outerHeight(true);

        if( windowTop > (offsetTop - 50) && windowTop < ( offsetTop + outerHeight)) {
            var elemId = $(elem).attr('id');
            $("nav ul li a.active").removeClass('active');
            $("nav ul li a[href='/#" + elemId + "']").addClass('active');
        }
    });
};