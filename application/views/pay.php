<?php

		 //	$user_id=$this->session->userdata('user_id');

 ?>

<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Спасибо!</title>
  </head>
  <body>
<form id="payment" name="payment" method="post" action="https://sci.interkassa.com/" enctype="utf-8">
	<input type="hidden" name="ik_co_id" value="52bd720dbf4efcaf565fd9ff" />
	<input type="hidden" name="ik_pm_no" value="<?php echo $user_id ?>" />
	<input type="hidden" name="ik_am" value="100.00" />
	<input type="hidden" name="ik_cur" value="RUB" />
	<input type="hidden" name="ik_desc" value="Event Description" />
	<input type="hidden" name="ik_suc_u" value="http://portfolionline.ru/pay/ok.html" />
	<input type="hidden" name="ik_fal_u" value="http://portfolionline.ru/pay/fail.html" />
	<input type="hidden" name="ik_exp" value="2014-01-27" />
        <input type="submit" value="Pay">
</form>
</body>
</html>