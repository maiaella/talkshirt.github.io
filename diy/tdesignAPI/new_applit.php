
<link href='https://fonts.googleapis.com/css?family=Nosifer|League+Script|Yellowtail|Permanent+Marker|Codystar|Eater|Molle:400italic|Snowburst+One|Shojumaru|Frijole|Gloria+Hallelujah|Calligraffitti|Tangerine|Monofett|Monoton|Arbutus|Chewy|Playball|Black+Ops+One|Rock+Salt|Pinyon+Script|Orbitron|Sacramento|Sancreek|Kranky|UnifrakturMaguntia|Creepster|Pirata+One|Seaweed+Script|Miltonian|Herr+Von+Muellerhoff|Rye|Jacques+Francois+Shadow|Montserrat+Subrayada|Akronim|Faster+One|Megrim|Cedarville+Cursive|Ewert|Plaster' rel='stylesheet' type='text/css'>

<link href="tdesignAPI/css/api.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="tdesignAPI/js/html2canvas.js"></script>

<script src="tdesignAPI/js/jquery.form.js"></script>
<script src="tdesignAPI/js/mainapp.js"></script>
<link rel="stylesheet" href="tdesignAPI/css/jquery-ui.css" />
<script src="tdesignAPI/js/jquery-ui.js"></script>

<script type="text/javascript">
	function changeval() {
		$total = parseInt($("#small").val()) + parseInt($("#medium").val()) + parseInt($("#large").val()) + parseInt($("#xlarge").val()) + parseInt($("#xxlarge").val());
		//alert($total);
		$('.small').val($("#small").val());
		$('.medium').val($("#medium").val());
		$('.large').val($("#large").val());
		$('.xlarge').val($("#xlarge").val());
		$('.xxlarge').val($("#xxlarge").val());
		$('.total').val($total);
	}

	function changeval2() {
		$total = parseInt($("#small2").val()) + parseInt($("#medium2").val()) + parseInt($("#large2").val()) + parseInt($("#xlarge2").val()) + parseInt($("#xxlarge2").val());
		//alert($total);
		$('.small').val($("#small2").val());
		$('.medium').val($("#medium2").val());
		$('.large').val($("#large2").val());
		$('.xlarge').val($("#xlarge2").val());
		$('.xxlarge').val($("#xxlarge2").val());
		$('.total').val($total);
	}

	function b() {
		$('#custom_text').toggleClass('bold_text');
		$("#bold_button").toggleClass('box-shadow', '0 0 10px inset #3c3c3c');
	}

	function i() {
		$('#custom_text').toggleClass('italic_text');
	}

	function changeFont(_name) {
		$('#custom_text').css("font-family", _name);
	}

	function changeFontSize(_size) {
		$('#custom_text').css("font-size", _size);
	}

	function changeColor(_color) {
		$('#custom_text').css("color", _color);
	}
</script>
<div class="container design_api_container">
	<div class='design_api' style="margin: auto;position: relative;overflow: hidden;">
		<!--=============================================================-->
		<div id="menu">
			<div class="menu_option sel_type">

			</div>
			<div class="menu_option sel_color">
				<i class="fa fa-paint-brush fa-3x"></i>

			</div>
			<div class="menu_option sel_art">
				<i class="fa fa-camera-retro fa-3x"></i>
			</div>
			<div class="menu_option sel_custom_icon">
				<i class="fa fa-upload fa-3x"></i>
			</div>
			<div class="menu_option sel_text">
				<i class="fa fa-font fa-3x"></i>

			</div>
		</div>
		<!--=============================================================-->
		<div id='options'>
			<div class="T_type">
				<div id="radio1" ><img src="tdesignAPI/images/menu_icons/submenu/tee.jpg" width="100%" height="100%" />
				</div>
				<!--<div id="radio2" ><img src="tdesignAPI/images/menu_icons/submenu/collar.jpg" width="100%" height="100%" />
				</div>-->
				<!--<div id="radio3" ><img src="tdesignAPI/images/menu_icons/submenu/hoodie.jpg" width="100%" height="100%" />
				</div>-->
			</div>

			<?php
				$query="SELECT * FROM inventorycustomization WHERE id = 1 ";
				$result=mysqli_query($con,$query);
				$row1=mysqli_fetch_assoc($result);

				$query="SELECT * FROM inventorycustomization WHERE id = 2 ";
				$result=mysqli_query($con,$query);
				$row2=mysqli_fetch_assoc($result);

				$query="SELECT * FROM inventorycustomization WHERE id = 3 ";
				$result=mysqli_query($con,$query);
				$row3=mysqli_fetch_assoc($result);

				$query="SELECT * FROM inventorycustomization WHERE id = 4 ";
				$result=mysqli_query($con,$query);
				$row4=mysqli_fetch_assoc($result);

				$query="SELECT * FROM inventorycustomization WHERE id = 5 ";
				$result=mysqli_query($con,$query);
				$row5=mysqli_fetch_assoc($result);

	

			?>

			<div class="color_pick">
				<?php if ($row1['stock'] >= 1) { ?>
				<button title="<?php echo $row1['stock'] ?> Stocks" class="color_radio_div" id="red" value="red"></button>
				<?php } ?>
				<?php if ($row2['stock'] >= 1) { ?>
				<button title="<?php echo $row2['stock'] ?> Stocks" class="color_radio_div" id="black" value="black"></button>
				<?php } ?>
				<?php if ($row3['stock'] >= 1) { ?>
				<button title="<?php echo $row3['stock'] ?> Stocks" class="color_radio_div" id="white" value="white"></button>
				<?php } ?>
				<?php if ($row4['stock'] >= 1) { ?>
				<button title="<?php echo $row4['stock'] ?> Stocks" class="color_radio_div" id="navy" value="navy"></button>
				<?php } ?>
				<?php if ($row5['stock'] >= 1) { ?>
				<button title="<?php echo $row5['stock'] ?> Stocks" class="color_radio_div" id="green" value="green"></button>
				<?php } ?>

			<!-- 	<button class="color_radio_div" id="purple" value="purple"></button> -->
		<!-- 		<button class="color_radio_div" id="orange" value="orange"></button> -->
			</div>
			<div class="default_samples">

				
<?php
	$dir    = 'tdesignAPI/images/Images';
	$files1 = scandir($dir);
	//$files2 = scandir($dir, 1);
	foreach ($files1 as &$value) {
		if (strpos($value,'.png') !== false) {
    		//echo 'true';
			echo '<div class="sample_icons"><img src="tdesignAPI/images/Images/' .$value. '" width="100%" height="100%" /></div>' ;
		}elseif(strpos($value,'.') === false){
			//echo '<div class="sample_icons"><img src="tdesignAPI/images/folder.png" width="100%" height="100%" />' .$value. '</div>' ;
		}
    		//echo "Value: $value<br />\n";
	}
?>
			</div>
			<div class="custom_icon">
				<form id="form1" runat="server">
					<span class="btn btn-default btn-file"> Browse
						<input type='file' id="imgInp" />
					</span>

				</form>
			</div>

			<div class="custom_font">

				<select id="fs" onchange="changeFont(this.value);">
					<option value="arial">Arial</option>
					<option value="Nosifer, cursive">Nosifer</option>
					<option value="League Script, cursive">League Script</option>
					<option value="Yellowtail, cursive">Yellowtail</option>
					<option value="Permanent Marker, cursive">Permanent Marker</option>
					<option value="Codystar, cursive">Codystar</option>
					<option value="'Eater', cursive">Eater</option>
					<option value="Molle, cursive">Molle</option>
					<option value="Snowburst One, cursive">Snowburst One</option>
					<option value="Shojumaru, cursive">Shojumaru</option>
					<option value="Frijole, cursive">Frijole</option>
					<option value="Gloria Hallelujah, cursive">Gloria Hallelujah</option>
					<option value="Calligraffitti, cursive">Calligraffitti</option>
					<option value="Tangerine, cursive">Tangerine</option>
					<option value="Monofett, cursive">Monofett</option>
					<option value="Monoton, cursive">Monoton</option>
					<option value="Arbutus, cursive">Arbutus</option>
					<option value="Chewy, cursive">Chewy</option>
					<option value="Playball, cursive">Playball</option>
					<option value="Black Ops One, cursive">Black Ops One</option>
					<option value="'Rock Salt', cursive">Rock Salt</option>
					<option value=" 'Pinyon Script', cursive">Pinyon Script</option>
					<option value="'Orbitron', sans-serif">Orbitron</option>
					<option value="'Sacramento', cursive">acramento</option>
					<option value="'Sancreek', cursive">Sancreek</option>
					<option value="'Kranky', cursive">Kranky</option>
					<option value="'UnifrakturMaguntia', cursive">UnifrakturMaguntia</option>
					<option value="'Creepster', cursive">Creepster</option>
					<option value="'Pirata One', cursive">Pirata One</option>
					<option value=" 'Seaweed Script', cursive">Seaweed Script</option>
					<option value=" 'Miltonian', cursive">Miltonian</option>
					<option value=" 'Herr Von Muellerhoff', cursive">Herr Von Muellerhoff</option>
					<option value=" 'Rye', cursive"> 'Rye'</option>
					<option value=" 'Jacques Francois Shadow', cursive">Jacques Francois Shadow</option>
					<option value=" 'Montserrat Subrayada', sans-serif">Montserrat Subrayada</option>
					<option value=" 'Akronim', cursive">Akronim</option>
					<option value=" 'Faster One', cursive">Faster One</option>
					<option value=" 'Megrim', cursive">Megrim</option>
					<option value=" 'Cedarville Cursive', cursive">Cedarville Cursive</option>
					<option value=" 'Ewert', cursive">Ewert</option>
					<option value="'Plaster', cursive">Plaster</option>
					<option value="verdana">Verdana</option>
					<option value="impact">Impact</option>
					<option value="ms comic sans">MS Comic Sans</option>
				</select>
				<input type="color" name="favcolor" onChange="changeColor(this.value);" placeholder="Color Name" />
				<div class="font_styling">

					<span id="bold_button" onclick="b();"><b>B</b></span>
					<span id="italic_button" onclick="i();"><i>I</i></span>

					<select id="font_size" onchange="changeFontSize(this.value);">
						<?php
							for($i=10;$i<=140;$i+=2){
						?>
							
							<option value="<?php echo $i; ?>px"><?php echo $i; ?>px</option>
						<?php		
							}
						?>
						

					</select>
				</div>
				<textarea id="custom_text" placeholder="Create Your Custom Text..."></textarea>
				<button type="button" class="btn btn-primary" id="apply_text">
					Apply
				</button>

			</div>
		</div>
		<!--=============================================================-->
		<!--=========================preview start====================================-->

		<div id='preview_t'>
			<div id="preview_front">
				<div class="front_print">

				</div>
			</div>
			<div id="preview_back">
				<div class="back_print">

				</div>
			</div>

		</div>
		<!--=============================================================-->
		<!--======================view start=======================================-->

		<div id='view_mode'>
			<div  class="mode"><img id="o_front" src="tdesignAPI/images/product/tee/black/black_front.png" width="100%" height="80%" />FRONT
			</div>
			<div  class="mode"><img id="o_back" src="tdesignAPI/images/product/tee/black/black_back.png" width="100%" height="80%" />BACK
			</div>
			<div class="mode">
				<i class="fa fa-binoculars fa-4x preview_images" id="preview_images" data-toggle="modal" data-target=".bs-example-modal-lg"></i>Preview
			</div>
		</div>
		<!--=====================View Ends========================================-->
		<div id="overview" style="position: absolute;right: -11px;">
			<div class="">

				<table class="table">
					<tr>
						<th>Size</th>
						<th>Quantity</th>
					</tr>
					<tr>
						<td><b>S</b></td>
						<td style="padding: 20px;">
						<input id="small"  onkeyup="changeval()" name="small" type="number" class="form-control small input-md" min=0 max=99999 />
						<input id="total_small_price"  name="total_small_price" type="hidden" class="form-control small input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>M</b></td>
						<td style="padding: 20px;">
						<input id="medium"  onkeyup="changeval()" name="medium" type="number" class="form-control medium input-md" min=0 max=99999 />
						<input id="total_medium_price"  name="total_medium_price" type="hidden" class="form-control medium input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>L</b></td>
						<td style="padding: 20px;">
						<input id="large" onkeyup="changeval()"  name="large" type="number" class="form-control large input-md" min=0 max=99999 />
						<input id="total_large_price"  name="total_large_price" type="hidden" class="form-control large input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>XL</b></td>
						<td style="padding: 20px;">
						<input id="xlarge"  onkeyup="changeval()" name="xlarge" type="number" class="form-control xlarge input-md" min=0 max=99999 />
						<input id="total_xlarge_price" name="xlarge" type="hidden" class="form-control xlarge input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>XXL</b></td>
						<td style="padding: 20px;">
						<input id="xxlarge" onkeyup="changeval()"  name="xxlarge" type="number" class="form-control xxlarge input-md" min=0 max=99999 />
						<input id="total_xxlarge_price" name="xxlarge" type="hidden" class="form-control xxlarge input-md" min=0 max=99999 />
						</td>
					</tr>
					<tr>
						<td><b>Total</b></td>
						<td style="padding: 20px;padding-top: 10px;padding-bottom: 10px;">
						<input id="total_quantity_price" name="total_quantity_price" type="number" class="form-control total input-md" disabled min=1 max=99999 />
						</td>
					</tr>

				</table>
				<div style="text-align: center;">

					<?php if (isset($_SESSION['id'])) { ?>
						<button type="button" id="buynowshow" class="btn btn-block preview_images"  data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-top: -100px;background-color: #62AED4;color: white;border: 1px solid rgba(0,0,0,0.2);padding: 5px 10px;width: 100px;">
					BUY NOW
				    </button>
					<?php } ?>
					
				</div>
				
			</div>
		</div>
	</div>

	<!-- Large modal -->
	<!--
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	<div class="modal-content"> -->

	<div class="layer">
		<div class="modal-content" style="background-color: white;padding: 10px;">
			<div class="modal-header">
				<button type="button" class="close close_img" data-dismiss="modal" style="background-color: black;color: white;float: right;">
					<span aria-hidden="true">&times;</span><span class="sr-only close_img" >Close</span>
				</button>
				<h4 class="modal-title">Showcase</h4>
			</div>
			<div class="modal-body">

				<div id="image_reply"></div>
				<div class="modal-footer">
					<!--	<span > Price : </span>

					<form method="POST" enctype="multipart/form-data" id="imageFileForm" action="checkout/checkout.php">
					<input type="hidden" name="img_front" id="img_front" value="" />
					<input type="hidden" name="img_back" id="img_back" value="" />
					<button type="submit" class="btn btn-primary">Proceed</button>
					</form>-->
					<div style="background-color: white;">
						<form method="POST" enctype="multipart/form-data" id="imageFileForm" action="tdesignAPI/uploads/saveimages.php" >
							<div class="col-md-1">
								<!-- <button type="button" class="btn btn-default close_img" data-dismiss="modal">
									Close
								</button> -->
							</div>
					<!-- 		<div class="col-md-2">
								Price : PHP 545
							</div> -->

							<input type="hidden" id="preview_front_image" name="preview_front_image">
							<input type="hidden" id="preview_back_image" name="preview_back_image">
							<input type="hidden" id="sendcolor" name="sendcolor" value="black">
							<?php
							$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
							$result = '';
							for ($i = 0; $i < 3; $i++)
								$result .= $characters[mt_rand(0, 61)];
							
						$date2 = date("Ymdhis");
						$transid = $date2.$result;
							?>
							<input type="hidden" name="TRANSID" value="<?php echo $transid; ?>">
							<img src="" id="imagessend" style="display: none;">

							<div class="col-md-6">


								<input type="hidden" name="colorid" id="colorid" value="2">
						<input id="small2" name="small2" type="hidden" value="1" class="form-control input-md" min=0 max=99999 />
						<input id="total_small_price2"  name="total_small_price2" type="hidden" class="form-control input-md" min=0 max=99999 />
						
						<input id="medium2" name="medium2" type="hidden" value="0" class="form-control medium input-md" min=0 max=99999 />
						<input id="total_medium_price2"  name="total_medium_price2" type="hidden" class="form-control medium input-md" min=0 max=99999 />
						
						<input id="large2" name="large2" type="hidden" value="0" class="form-control large input-md" min=0 max=99999 />
						<input id="total_large_price2"  name="total_large_price2" type="hidden" class="form-control large input-md" min=0 max=99999 />
						
						<input id="xlarge2" name="xlarge2" type="hidden" value="0" class="form-control xlarge input-md" min=0 max=99999 />
						<input id="total_xlarge_price2" name="total_xlarge_price2" type="hidden" class="form-control xlarge input-md" min=0 max=99999 />
					
						<input id="xxlarge2" name="xxlarge2" type="hidden" value="0" class="form-control xxlarge input-md" min=0 max=99999 />
						<input id="total_xxlarge_price2" name="total_xxlarge_price2" type="hidden" class="form-control xxlarge input-md" min=0 max=99999 />
					
						
						<td style="padding: 20px;padding-top: 10px;padding-bottom: 10px;">
						<input id="total_quantity_price2" name="total_quantity_price2" type="hidden" class="form-control total input-md"  />
						
					
							</div>
							<div class="col-md-2">
								<input type="hidden" name="img_front" id="img_front" value="" />
								<input type="hidden" name="img_back" id="img_back" value="" />
							
						
							</div>
							<div>
								
							Delivery Address:<textarea name='address' cols='34' rows='3' maxlength='100' style="width: 100%;" required></textarea><br>
							<tr><td align='right'><input type=radio name='shipping' class=radio value='Pick Up' required="required"><td>Pick Up on Store (No Delivery)
							<tr><td align='right'><input type=radio name='shipping' class=radio value='Delivery' required="required"><td>Delivery (Free Shipping)
							
						</table>
						
							</div>
							<div style="text-align: right;">
								<button type="submit" id="saveimages" class="btn btn-primary" style="background-color: #62AED4;color: white;border: 1px solid rgba(0,0,0,0.2);padding: 5px 10px;width: 100px;">
									Buy Now!
								</button>
							</div>
								
						</form>

					</div>
				</div>
			</div>

		</div>
	</div>



	</div>
	</div>
	</div>
	</div>


	<!--			<button type="button" class="btn btn-primary">Proceed</button>
	</div>
	</div>
	</div> -->

</div>
<script>
	//$('input[type=file]').bootstrapFileInput();
	//$('.file-inputs').bootstrapFileInput();
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				image_icon(e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}


	$("#imgInp").change(function() {
		readURL(this);
	});



	function changeval(){
	 $('#total_small_price').val($('#small').val() * 200)
	 $('#total_medium_price').val($('#medium').val() * 300)
	 $('#total_large_price').val($('#large').val() * 400)
	 $('#total_xlarge_price').val($('#xlarge').val() * 500)
	 $('#total_xxlarge_price').val($('#xxlarge').val() * 600)



	 $('#total_small_price2').val($('#total_small_price').val())
	 $('#total_medium_price2').val($('#total_medium_price').val())
	 $('#total_large_price2').val($('#total_large_price').val())
	 $('#total_xlarge_price2').val($('#total_xlarge_price').val())
	 $('#total_xxlarge_price2').val($('#total_xxlarge_price').val())

	 $('#small2').val($('#small').val())
	 $('#medium2').val($('#medium').val())
	 $('#large2').val($('#large').val())
	 $('#xlarge2').val($('#xlarge').val())
	 $('#xxlarge2').val($('#xxlarge').val())




		$('#total_quantity_price').val(parseInt($('#total_small_price').val()) + parseInt($('#total_medium_price').val()) + parseInt($('#total_large_price').val()) + parseInt($('#total_xlarge_price').val()) + parseInt($('#total_xxlarge_price').val()))
	}

	$('#buynowshow').click(function(){
		$('#total_quantity_price2').val($('#total_quantity_price').val())
	})


	$('#red').click(function(){
		$('#colorid').val('1')
	})
	$('#black').click(function(){
		$('#colorid').val('2')
	})
	$('#white').click(function(){
		$('#colorid').val('3')
	})
	$('#navy').click(function(){
		$('#colorid').val('4')
	})
	$('#green').click(function(){
		$('#colorid').val('5')
	})

</script>

