 <style>

    #middle-pol {
    padding-top: 0px;
    width: 100%;
    height: 0px;
    visibility: hidden;

  }
 #left_user{

width: 250px;
margin-right: 0px;
float: left;
background-color: #EDF7FD;
/*box-shadow: 0 0 3px rgba(0,0,0,5);*/

}
#right_user {
  padding-top: 10px;
height: 100%;
min-height: 600px;
margin-bottom: 40px;
margin-left: 250px;
}
  #content {
 padding-left: 0px;
padding-right: 0px;
width: 100%;

  }</style>
  <?php     $this->load->view('left_user',$user_data); 
echo '<div align="center" id="right_user">
<div style="margin-right: 20%;">
';
foreach ($video_data as $item) {
	echo '<iframe width="70%" height="415" src="//www.youtube.com/embed/'.$item->kod.'" frameborder="0" allowfullscreen></iframe>';
}
?>
</div>
</div>