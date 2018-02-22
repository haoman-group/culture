<?php 
$getMenu = isset($Custom)?$Custom:D('Admin/Menu')->getMenu(); 
if($getMenu) {
?>
<div class="nav">
  <?php
  if(!empty($menuReturn)){
	  echo '<div class="return"><a href="'.$menuReturn['url'].'">'.$menuReturn['name'].'</a></div>';
  }
  ?>
  <ul class="cc">
    <?php
	foreach($getMenu as $r){
		$app = $r['app'];
		$controller = $r['controller'];
		$action = $r['action'];
	?>
    <li <?php echo $action==ACTION_NAME ?'class="current"':""; ?>><a class="<?php if($action =='add'  && ($controller=='Library' || $controller=='ComArtCenter')){echo 'lib_add';} ?>" href="<?php echo U("".$app."/".$controller."/".$action."",$r['parameter']);?>" <?php echo $r['target']?'target="'.$r['target'].'"':"" ?>><?php echo $r['name'];?></a></li>   
    
    <?php
	}
	?>
  <li class="return"><a href="javascript:history.go(-1)">返回</a></li> 
  </ul>
</div>
<?php } ?>