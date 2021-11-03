
<?php $this->load->helper('url');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>List video</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<link rel="stylesheet" href="<?=base_url()?>css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="shortcut icon" href="<?=base_url()?>img/round-title.ico" />
		<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	</head>
	<body>
		<script>
			$(document).ready(function(){
				$('#cac-btn').click(function(event) {
    				id = $("#select_cat_ID").val();	
    				addID = "<?php echo base_url();?>videos/listvideobycat/"+ id;
    				console.log(addID);
    				$('#cat_select').attr('action', addID);
				});

			});
		</script>
		<div class="form-cat">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Chọn category</h3>
					<small class='title_listvideo'><a href="<?=base_url();?>category/listCategory">>>Xem danh sách Category</a></small>
				</div>
				<div class="panel-body">
					<form id="cat_select"class="form-inline" action="" enctype="multipart/form-data" method="POST">
						<select class="c-select form-cotrol custom-select my-1 mr-sm-2" id="select_cat_ID" name = "category">
							<option value = "" <?php echo ($signal ==1)?"selected":""?>>Open this select menu</option>
							<option value = "100">Test ko có id</option>
							<option value = "101">Test ko có id</option>
							<?php 
								foreach ($data_cat as $key => $value_cat):
							?>
								<option  <?php echo (($signal !== 1)&&($value_cat['id'] == $id_signal))?"selected":""?> value="<?=$value_cat['id']?>"><?=$value_cat['cat_name']?></option>
							<?php endforeach ?>
						</select>
						<button type="" class="btn btn-primary sub-btn" id="cac-btn">Submit</button>
						<!-- <button type="sumbit" style = "margin-left:5px"class="btn btn-primary sub-btn" id="submit-btn">Submit</button> -->
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<h2>Danh sách video</h2>
			<?php 
				if ($signal !==1 && isset($data_video[0]['id'])):
			?>
				<div class="row row-eq-height">
					<?php foreach ($data_video as $key => $value) : ?>
						<div class="col-md-3 d-flex">
							<div class="card-deck list-video">
								<div class="card video">
									<div class="thumb">
										<img class="card-img-top" src="<?php echo base_url()?>uploads/<?=$value['thumb'];?>">
										<span class = "video-time"><?=$value['time'];?></span>
									</div>
									<div class="card-body">
									<h4 class="card-title"><?=$value['title'];?> </h4>
									<p class="card-text"><?=$value['description'];?></p>
									<p class="card-text">Cate_id_for_check: <?=$value['category_id'];?></p>
									<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
									</div>
								</div>
							</div>

						</div>
					<?php endforeach ?>
				</div>
			<?php endif?>
		</div>
		<div class="error">
			<?php 
				if ($error !== ""):
			?>
				<h1 class="alert alert-info"><?=$error?></h1>
			<?php endif ?>
		</div>
		<div class="pagination-videolist">
				
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->

		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
</html>
