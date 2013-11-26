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
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
} 


  
  $(document).ready(function() {
 
//Reg
$('.btn').click(function() { 
  login = $("input[name='login']").val();
  email = $("input[name='email']").val();
  pass = $("input[name='pass']").val();
  pass2 = $("input[name='password2']").val();
    spec_user = $("select[name='spec_user']").val();

  if (login.length >= 3 && pass.length >= 3) {
  if (pass == pass2) {
  $.post("sendreg",
     {
     login : login, email : email, pass : pass, spec_user : spec_user, },
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

     location.href='/ci';


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
  $.post("http://localhost/ci/site/entry",
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
   window.location.replace("/ci");
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
    $('#upload_foto').click(function() { 
        var src = "http://localhost/ci/id/upload?who=photos";
        upload(src);
       }); 
      $('#upload_ava').click(function() { 
        var src = "http://localhost/ci/id/upload?who=avatars";
        upload(src);
       }); 
      $('#red-prof').click(function() { 
        var src = "http://localhost/ci/id/profile_update_form";
        upload(src);
       }); 

       $('.photo').click(function() { 
        photo = $(this).attr("link");
        // alert(photo);
        var src = photo;
        upload(src);
       }); 

      function upload (src) {
          $.modal('<iframe src="' + src + '" height="600" width="100%"  scrolling="auto" style="border:0">', {
          closeHTML:"",
          containerCss:{
            backgroundColor:"#fff", 
            borderColor:"#fff", 
             
            padding:0, 
            width:550
          },
          overlayClose:true
        });
      }

 
 });