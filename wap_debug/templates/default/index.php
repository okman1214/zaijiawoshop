<?php defined('InShopNC') or exit('Access Invalid!');?>
<html>
<head>
</head>
<body>
111111111111111111
	<?php if(!empty($output['car_list'])){?>
	<?php foreach($output['car_list'] as $key=>$car_list){?>
	<div>Æ·ÅÆÃû£º<?php echo $car_list['brand_name'];?>
	<?php}?>	
	<?php}?>

</body>
</html>