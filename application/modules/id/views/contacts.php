<style>


.block_msg {
background-color: #D7DBDD;
padding: 7px;
border-radius: 7px;
width: 83%;
min-width: 500px;
margin-bottom: -5px;
height: 80px;
}
  </style>
<script language ="JavaScript"> 
  $(document).ready(function() {

    contacts = $("input[name='user_id']").val();
      $.post(site_full+"/id/friends/contacts_pod",
         { 
          contacts : contacts,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {//alert(data);
  $('#res').html(data);
      };



    $('#contacts_not_pod').click(function() {
        contacts = $("input[name='user_id']").val();
      $.post(site_full+"/id/friends/contacts_not_pod",
         { 
          contacts : contacts,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {//alert(data);
  $('#res').html(data);
      };
});
$('#contacts_pod').click(function() {
        contacts = $("input[name='user_id']").val();
      $.post(site_full+"/id/friends/contacts_pod",
         { 
          contacts : contacts,
              },
         onAjaxSuccess
         );
      function onAjaxSuccess(data)
      {//alert(data);
  $('#res').html(data);
      };
});

});


 
</script> 


       <?php
 	$this->load->view('left_user',$user_data); ?>
	<div id="right_user">
	<p class="titl" id="user_text_color">Мои контакты:</p><br>
<?php
?> 
<form method="post" accept-charset="utf-8" enctype="multipart/form-data">
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
<input id="contacts_pod"  class="styler spi" type="button" value="Контакты" />
<input id="contacts_not_pod"  class="styler spi" type="button" value="Заявки на добавление<?php echo ' '.count($contacts_not_pod);?>" />
</form>

<div class="block" id="res"> </div>
</div> 

		</div> 