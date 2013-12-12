function validate(evt) {
var el = $('#mail');
if (el.is(":focus")){
    regex =  /[0-9a-zA-Z_@.]/;
   
} else {
 regex = /[0-9a-zA-Z_]/;
  }
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  if( !regex.test(key) ) {
    theEvent.preventDefault = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
} 


  
  $(document).ready(function() {
//Include====================
var javascripts = [];
function includeJS (path) {
  //alert('пробуем подключить'+path);
  for (var i=0; i<javascripts.length; i++) {
    if(path == javascripts[i]){
      // alert('JavaScript: ['+path+'] уже был подключен ранее!');
      return false;
    }
  }
  javascripts.push(path);
  $.ajax({
     url: path,
     dataType: "script",// при типе script, JS сам инклюдится и воспроизводится
     async: false
   });
}
includeJS('/ci/config.js');
///////////////////////////

//   $(window).on('resize', function(e) {
//   var cssObj = {
//         'width' : '60%' ,  'height' : '80%'
//       }
//       $('#simplemodal-container').css(cssObj);
// });

//Reg


$('#reg').click(function() {
  famil = $("input[name='famil']").val();
  name = $("input[name='name']").val(); 
  login = $("input[name='login']").val();
  email = $("input[name='email']").val();
  pass = $("input[name='pass']").val();
  pass2 = $("input[name='password2']").val();
    spec_user = $("select[name='spec_user']").val();
  if (spec_user == 'Другое'){
    alert(spec_user);
    spec_user = $("input[name='spec_user1']").val();
  }


  if (login.length >= 3 && pass.length >= 3) {
  if (pass == pass2) {
  $.post("sendreg",
     {
     famil : famil, name : name, login : login, email : email, pass : pass, spec_user : spec_user, },
     onAjaxSuccess
   );
   } else {
$('#pad').html('пароли не совпадают');
}   
}else
{
$('#pad').html('минимальное значение любого поля - 3 символа');
}

   function onAjaxSuccess(data)
   {
       
 if (data== 'yzhe') {
 $('#pad').html('такой юзер есть');
 } else {
  if (data=='xren') {
     $('#pad').html('символы не те');
  }else{

     location.href=site_full+'/site/reg_sucess?login='+login;

}
 }
          };    
   
   
}); 


 



          //Auth
$('.btn_entry').click(function() { 
  login = $("input[name='login-entry']").val();
  pass = $("input[name='password-entry']").val();
  login_length=login.length;
  pass_length=pass.length;
  if (login_length >= 3 && pass_length >= 3) {
  $.post(site_full+"/site/entry",
     {
       login : login, pass : pass,
     },
     onAjaxSuccess
   );

   function onAjaxSuccess(data)
   {
 console.log(data);
  if (data == 'no_pass') {
   alert('Вы не правильно ввели данные');
  } else { 
   window.location.replace(site_full+"/id");
     }
   
          };
    } else {
    alert('Длина должна быть больше трех символов');
  } 
       
}); 
      
         $(".auth").keypress(function (e) {
      if (e.which == 13) {
    $('.btn_entry').click();
    }
  });  

 //Upload
    $('.upload_foto').click(function() { 
        var src = site_full+"/id/upload?who=photos";
        upload(src,'nof',310,310);
       }); 
      $('#upload_ava').click(function() { 
        var src = site_full+"/id/upload?who=avatars";
        upload(src,'nof');
       }); 
      $('#red-prof').click(function() { 
        var src = site_full+"/id/profile_update_form";
        upload(src,'',410,610);
       }); 

            $('#prof').click(function() { 
        prof = $(this).attr("link");
        var src = prof;
        upload(src);
       }); 
            $('#sogl').click(function() { 
        var src = site_full+"/site/licension";
        upload(src,'',440,600);
       }); 

       $('.photo_up').click(function() { 
        photo = $(this).attr("link");
        // alert(photo);
        var src = photo;
        upload(src);
       }); 

      //  $('.like_photos').click(function() { 
      //   like_photos = $(this).attr("link");
      // $.post(site_full+"/id/like_photos",
      //    { like_photos : like_photos
      //         },
      //    onAjaxSuccess
      //    );
      // });
       //delete photo
       $('.delete_photos').click(function() { 
          console.log('ee');
        delete_photos = $(this).attr("link");
      $.post(site_full+"/id/delete_photos",
         { delete_photos : delete_photos,
              },
         onAjaxSuccess
         );
      });

      function onAjaxSuccess(data)
      {
  window.location.replace(site_full+"/id");
  alert(data);
      };

             $('.red_photo').click(function() { 
        id_photo = $(this).attr("link");
       var src = site_full+"/id/albom/red_photo?id_photo="+id_photo;
        upload(src,'nof',400,500);
      });



   $('#friends').click(function() { 
        friend_id = $(this).attr("link");
        //alert(friend_id);
      $.post(site_full+"/id/friends_insert",
         { friend_id : friend_id,
              },
         onAjaxSuccess
         );
      });
 $('#friends_view').click(function() { 
        var src = site_full+"/id/friends_view";
        upload(src,'',400,500);
       }); 

  $('#teh').click(function() { 
        var src = site_full+"/id/support";
        upload(src,'nof',400,500);
       }); 
    



$('.like_photos').click(function() { 
        like_photos = $(this).attr("link");
         //$(this).toggleClass("highlight");
         $(".like_photos1").removeClass("like_photos");
      $.post(site_full+"/id/like_photos",
         { like_photos : like_photos
              },
         onAjaxSuccess
         );
      });

// $('.phota').click(function() { 
//     link = $(this).attr("link");
//       $.post(link,onAjaxSuccess);
//   function onAjaxSuccess(data)
//    {
//     $('#show_img').html(data);
//     };
//   });

     $('#show_com').click(function() { 
     $('#comments').css('display' , 'block');
    });
    $('.send_com').click(function() { 
    messages = $("#messages").val();
    id_photos= $("input[name ='id_photos']").val();
    id_user= $("input[name ='id_user']").val();
   //alert(messages);



  $.post(site_full+"/id/chat/send_messages",
     { messages : messages, id_photos : id_photos,
          },
     onAjaxSuccess
   );
  function onAjaxSuccess(data)
   {
    // alert(data);
      location.reload();
   };
 });

function onAjaxSuccess(data)
   {
  $('.like_photos1').addClass('.like_photos');     
//alert("ololo");
  location.reload();

          };


  $('#showmenu').mouseover(function() { 

  $('#left_user').slideDown("slow");

 $('#left_user').mouseleave(function() { 

$('#left_user').slideUp("fast");


       }); 
       }); 



      function upload (src,type,w,h) {
        if (type == 'nof') {
              $.get(src,
         onAjaxSuccess
         );
      } else {
            $.modal('<iframe src="' + src + '" height="100%" width="100%"  scrolling="auto" style="border:0">', {
          closeHTML: "<a href='#' title='Close' class='modal-close'></a>",
          containerCss:{
            backgroundColor:"#fff", 
            borderColor:"#fff", 
            height:h, 
            padding:10, 
            width:w,

          },
          overlayClose:true
        });
      }

      function onAjaxSuccess(data)
      {
      if (type == 'nof') { src=data; }
          $.modal(src, {
          closeHTML: "<a href='#' title='Close' class='modal-close'></a>",
          containerCss:{
            backgroundColor:"#fff", 
            borderColor:"#fff", 
            width:300,
            padding:10, 
            height:300,

          },
          overlayClose:true
        });   
      };
       } 
  

      

 });