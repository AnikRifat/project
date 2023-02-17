
/*===========================================
 --------------------   top-fly menu
=============================================*/

 /*
  var fly_menu = document.querySelector('.fly-menu');

 document.querySelector('.flymenu-icon').addEventListener("click", function(){  

      if (fly_menu.style.display === "none") {

          fly_menu.style.display = "block";  
       } else {

         fly_menu.style.display = "none"; 
        } 
          $('.fly-menu').fadeIn("slow") ; 
 }); 

  document.querySelector('.close-fly-menu').addEventListener("click", function(){   

      fly_menu.style.display = "none"; 
        $('.fly-menu').fadeOut("slow") ;

 }); */


/*=====================================================
 --------------------   top-fly menu using jQuery
======================================================*/  

   document.querySelector('.fly-menu').addEventListener("click", function(){   

          fly_menu.style.display = "none"; 
   
 });

  $(document).ready(function() {
  $('.flymenu-icon').click(function() {
          $('.fly-menu').fadeIn("slow") ;
  });
});
  $(document).ready(function() {
  $('.close-fly-menu').click(function() {
          $('.fly-menu').fadeOut("slow") ;
  });
});  
 
// ======================--click-anywhare close fly menu --===============

var close_fl = document.querySelector('.fly-menu');
  window.onclick = function(event) {
   if (event.target == close_fl) {
     close_fl.style.display = "none";
  }
 }

   
 /*===========================================
 --------------------   top- nav search
=============================================*/

 //  var nav_box = document.querySelector('.wpnews-search-box');

 // document.querySelector('.top-search-icon').addEventListener("click", function(){  

 //      if ( nav_box.style.display == '' || nav_box.style.display === "none") {

 //          nav_box.style.display = "block"; 
 //       } else { 

 //         nav_box.style.display = "none";
 //        } 
 // });


   document.querySelector('.close-search-box').addEventListener("click", function(){   

         nav_box.style.display = "none"; 
 }); 

  $(document).ready(function() {
  $('.top-search-icon').click(function() {
          $('.wpnews-search-box').fadeIn("slow") ;     
  });
});
  $(document).ready(function() {
  $('.close-search-box').click(function() {
          $('.wpnews-search-box').fadeOut("slow") ;
  });
}); 


 







  













 /*===========================================
 --------------------   video slide
=============================================*/ 

 /*===========================================
 --------------------   photo gallery
=============================================*/



 

 

$(document).ready(function() {

// Gets the video src from the data-src on each button

var $videoSrc;  
$('.video-btn').click(function() {
    $videoSrc = $(this).data( "src" );
});
console.log($videoSrc);

  
  
// when the modal is opened autoplay it  
$('#myModal').on('shown.bs.modal', function (e) {
    
// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
})
  


// stop playing the youtube video when I close the modal
$('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src',$videoSrc); 
}) 
    
    


  
  
// document ready  
});





 