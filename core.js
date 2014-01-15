
(function($) {  
$(function() {  
  
  $('input, select, button, file, text').styler();  
  
})  
})(jQuery)  
 

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
    //alert(spec_user);
    spec_user = $("input[name='spec_user1']").val();
  }
//alert(spec_user);
if(spec_user !== 'Специализация'){
if (spec_user !== ''){
  if (login.length >= 3 && pass.length >= 3) {
  if (pass == pass2) {
  $.post("sendreg",
     {
     famil : famil, name : name, login : login, email : email, pass : pass, spec_user : spec_user, },
     onAjaxSuccess
   );
   } else {
$('#pad').html('пароли не совпадают');
//alert('пароли не совпадают');
}   
}else
{
$('#pad').html('минимальное значение любого поля - 3 символа');
}
}else{
  $('#pad').html('Введите свою специализацию'); 
}
}else{
  $('#pad').html('Выберите специализацию');
}
   function onAjaxSuccess(data)
   {

 if (data== 'yzhe') {
 $('#pad').html('Такой логин уже используется');
 } else {
  if (data=='login') {
     $('#pad').html('Вы используете запрещенные символы в поле Логин, разрешены: 0-9 A-Z a-z _ .');
  }else{
    if (data=='mail') {
      $('#pad').html('Вы используете запрещенные символы в поле Email, разрешены: 0-9 @ . a-z _ -');
    }else{
        if (data=='pass') {
            $('#pad').html('Вы используете запрещенные символы в поле Пароль, разрешены: 0-9 A-Z a-z');
        }else{
     location.href=site_full+'/site/reg_sucess?login='+login;

}}}
 }
          };    
   
   
}); 


 

$('#auth').hide();
$('#entry').click(function() { 
$('#auth').show('fast');
$('#entry').hide('fast');
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
    } else {
    alert('Длина должна быть больше трех символов');
  } 
   function onAjaxSuccess(data)
   {
 // console.log(data);
  if (data == 'no_pass') {
   alert('Вы не правильно ввели данные');
  } else { 
   window.location.replace(site_full+"/id");
     }
   
          };

       
}); 
      
         $(".auth").keypress(function (e) {
      if (e.which == 13) {
    $('.btn_entry').click();
    }
  });  

 //Upload
    $('.upload_foto').click(function() { 
        var src = site_full+"/id/upload?who=photos";
        upload(src,'nof',330,330);
       }); 
    $('.upload_audio').click(function() { 
        var src = site_full+"/id/upload?who=audios";
        upload(src,'nof',330,330);
       }); 
      $('#upload_ava').click(function() { 
        var src = site_full+"/id/upload?who=avatars";
        upload(src,'nof',350,330);
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







             $('.red_photo').click(function() { 
        id_photo = $(this).attr("link");
          photos_name = $(this).attr("photos_name");
       var src = site_full+"/id/albom/red_photo?id_photo="+id_photo+"&photos_name="+photos_name;
        upload(src,'nof',430,300);
      });
             $('.red_audio').click(function() { 
        id_audio = $(this).attr("link");
          audio_name = $(this).attr("audio_name");
       var src = site_full+"/id/albom/red_audio?id_audio="+id_audio+"&audio_name="+audio_name;
        upload(src,'nof',430,300);
      });

         $(".delete_photos").on("click", function(){
          console.log('ee');
        delete_photos = $(this).attr("link");
      $.post(site_full+"/id/delete_photos",
         { delete_photos : delete_photos,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {
  window.location.replace(site_full+"/id");
  alert(data);
      };
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
        upload(src,'nof',300,300);
       }); 

    $('.banner').click(function() { 
        var src = site_full+"/id/banner";
        upload(src,'nof',300,300);
       }); 
    
  $('#create_albom').click(function() { 
    url_id = $(this).attr("link");
        var src = site_full+"/id/albom?url_id="+url_id;
        upload(src,'nof',300,300);
       }); 

    $('#create_audio_albom').click(function() { 
       url_id = $(this).attr("link");
        var src = site_full+"/id/albom?url_id="+url_id+"&albom=1";
        upload(src,'nof',300,300);
       }); 
    
    $('#delete_albom').click(function() { 
    albom_name = $(this).attr("link");
       $.post(site_full+"/id/albom/delete_albom?albom_name="+albom_name,
     {
        albom_name : albom_name,
     },
     onAjaxSuccess
   );
 function onAjaxSuccess(data)
   {
   window.location.replace(site_full+"/id");  
          };
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
      if ($('#show_com').hasClass('hide')) {
            $('#comments').css('display' , 'none');
          $('#show_com').removeClass('hide').html('Комментарии <div style="position: absolute;margin-left: 80px;margin-top: 14px;"><img width="15px" src="'+site_full+'/images/down.png" </div>');
      } else {
     $('#comments').css('display' , 'block');
     $('#show_com').addClass('hide').html('Скрыть <div style="position: absolute;margin-left: 80px;margin-top: -44px;"><img width="15px" src="'+site_full+'/images/up.png" </div>');
    }
    });

       $('#smow_com.hide').click(function() { 
    
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


 $('.send_com_v').click(function() { 
    messages = $("#messages").val();
    id_video= $("input[name ='id_video']").val();
    id_user= $("input[name ='id_user']").val();
   //alert(messages);



  $.post(site_full+"/id/chat/send_message_v",
     { messages : messages, id_video : id_video,
          },
     onAjaxSuccess
   );
  function onAjaxSuccess(data)
   {
    // alert(data);
      location.reload();
   };
 });
         $(".delete_video").on("click", function(){

        delete_video = $(this).attr("link");
      $.post(site_full+"/id/delete_video",
         { delete_video : delete_video,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {
  window.location.replace(site_full+"/id");

      };
      });

$(".delete_audio").on("click", function(){

        delete_audio = $(this).attr("link");
      $.post(site_full+"/id/delete_audio",
         { delete_audio : delete_audio,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {
  //window.location.replace(site_full+"/id"++"/albom/view_audio");
  location.reload();

      };
      });



function onAjaxSuccess(data)
   {
  $('.like_photos1').addClass('.like_photos');     
//alert("ololo");
  location.reload();

          };





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
            width:w,
            padding:10, 
            height:h,

          },
          overlayClose:true
        });   
      };

       }




 $('#bg_t').hide();
 $('#typefon').change(function() { 
  typefon= $("select[name='typefon']").val();
 if (typefon=='color') {
   $('#bg_t').hide('fast');
   $('#color_t').show('fast');
 };
  if (typefon=='bg') {
     $('#color_t').hide('fast');
 $('#bg_t').show('fast');
  }
});

 $('.bge').click(function() { 
    bge = $(this).attr("name");
    $("img[name='img1']").css('border', '3px solid #bbb');
     $("img[name='img2']").css('border', '3px solid #bbb');
      $("img[name='img3']").css('border', '3px solid #bbb');
       $("img[name='img4']").css('border', '3px solid #bbb');
        $("img[name='img5']").css('border', '3px solid #bbb');
    $(this).css('border', '3px solid green');
    $("input[name='bg']").val(bge);
 });

 $('#red_albom').click(function() { 
    id_al=$(this).attr('id_al');
          var src = site_full+"/id/albom/red_al?id_al="+id_al;
        upload(src,'nof',300,300);
 });

$('#upload_ava').hide();
$('#ava').hover(function() {
 $('#upload_ava').show('fast');
 $('#right_user').mouseenter(function() {
  $('#upload_ava').hide('fast');
 });
});
//subscribe

  
  //$(".block_msg").next().css("backgroundColor", "#000");
      

 });