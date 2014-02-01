<?php

		 //	$user_id=$this->session->userdata('user_id');
 	$this->load->view('left_user',$user_data); 
 ?>
<style>
#sale {
visibility: hidden;
}

</style>
<script>

  $(document).ready(function() {
	 $('#payka').click(function() { 
$('#sale').click();
 });
});
</script>
	<div id="right_user">
<form id="payment" name="payment" method="post" action="https://sci.interkassa.com/" enctype="utf-8">
	<input id="sale" class="styler" type="submit" value="Купить ПРО" >
	<input type="hidden" name="ik_co_id" value="52bd720dbf4efcaf565fd9ff" />
	<input type="hidden" name="ik_pm_no" value="ID_<?php echo $user_id.'_';echo rand(1, 90000);?>" />
	<input type="hidden" name="ik_am" value="99.00" />
	<input type="hidden" name="ik_cur" value="RUB" />
	<input type="hidden" name="ik_desc" value="Про аккаунт" />
	<input type="hidden" name="ik_suc_u" value="http://portfolionline.ru/id<?php echo $user_id;?>/pay_ok" />
	<input type="hidden" name="ik_pnd_u" value="http://portfolionline.ru/id<?php echo $user_id;?>/pay_ok" />
	<input type="hidden" name="ik_fal_u" value="http://portfolionline.ru/pay/fail.html" />
	<input type="hidden" name="ik_exp" value="2016-01-29" />
	<img id="payka" src="<?php echo $this->config->site_url().'images/acc_pro.png'  ?>" width="400">
       <br> 
</form>
</div>