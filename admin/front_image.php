<?php
include '../conn.php';
	
	$cc_id = $_POST['cc_id'];
	
	$query="SELECT * FROM talkshirt_customization_cart WHERE id='$cc_id' ";
			
			
	$result=mysqli_query($con,$query);

			$row=mysqli_fetch_object($result);

?>
<div style="display: flex;">
	<img src="../diy/tdesignAPI/uploads/<?php echo $row->front_image ?>" style="width: 100%">
<img src="../diy/tdesignAPI/uploads/<?php echo $row->back_image ?>" style="width: 100%">

</div>

<div style="display: flex;padding: 10px;width: 650px;margin: auto;">
	<div style="margin: 0px 10px;">
		<input type="text" style="width: 100px;" value="<?php echo $row->small_quantity ?>">
		<div style="text-align: center;">Small</div>
	</div>
	<div style="margin: 0px 10px;">
		<input type="text" style="width: 100px;" value="<?php echo $row->medium_quantity ?>">
		<div style="text-align: center;">M</div>
	</div>
	<div style="margin: 0px 10px;">
		<input type="text" style="width: 100px;" value="<?php echo $row->large_quantity ?>">
		<div style="text-align: center;">L</div>
	</div>
	<div style="margin: 0px 10px;">
		<input type="text" style="width: 100px;" value="<?php echo $row->xlarge_quantity ?>">
		<div style="text-align: center;">XL</div>
	</div>
	<div style="margin: 0px 10px;">
		<input type="text" style="width: 100px;" value="<?php echo $row->xxlarge_quantity ?>">
		<div style="text-align: center;">XXL</div>
	</div>
	
	
	
	
</div>