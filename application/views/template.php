
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $title; ?></title>
    <meta charset="utf-8">

  <link rel="stylesheet" href="<?php echo $this->config->site_url() ?>default.css" type="text/css" />
<link rel="shortcut icon" href="<?php echo $this->config->site_url() ?>favicon.ico"></link>
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery-1.7.2.js"></script>
  <script type="text/javascript" src="<?php echo $this->config->site_url() ?>core.js"></script>
        <script type="text/javascript" src="<?php echo $this->config->site_url() ?>jquery.simplemodal.1.4.4.min.js"></script>
</head>
<body>
<div id="wrapper">
<header>
<div align="center">
<a href="<?php echo $this->config->site_url() ?>"><img id="logo" src="
<?php echo $this->config->site_url() ?>images/logo.png"></a>
</div>
</header>
<div align="center" id="menu">
   <?php if ($logged != TRUE) { ?>
  <input type="text" name="login-entry"  onkeypress='validate(event)' class="auth" maxlength="20" placeholder="Email">
  <input type="password" name ="password-entry"  onkeypress='validate(event)' class="auth"maxlength="20" placeholder="Пароль">

  <button type="submit" class="btn_entry">Войти</button>
<?php } else {
      echo '<a href="'.$this->config->site_url().'"">Главная</a>   ';
    echo '<a href="'.$this->config->site_url().'id'.$user_id.'"">Моя страница</a> ';
       echo '<a href="'.$this->config->site_url().'id'.$user_id.'/profile"">Настройки</a>';
       echo ' <a href="'.$this->config->site_url().'id'.$user_id.'/seach"">Найти человека</a>';
             $exit='<a href="'.$this->config->site_url().'site/vyhod">выйти</a>';
    echo ' '.$exit;

  }
  ?>

</div>
<div id="middle-pol" align="center"><img style="" src="<?php echo $this->config->site_url() ?>images/byd.png"></div>
<div  id="content">
<?php echo $page_content; ?>
</div>
     
</div>
<div id="footer">
  <?php echo '<img style="margin-top: -5px;
position: absolute;" src="'.$this->config->site_url().'/images/help.png"><a id="teh" >Техническая Поддержка</a>';
?><p style="text-align:center">copyright 2013 PortfoliOnline.ru<br>
<small>Авторские права на все материалы опубликованные
на сайте принадлежат их авторам.</small></p>
 </div>
</body>
</html>