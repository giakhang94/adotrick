
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
		<link rel="stylesheet" href="<?=base_url()?>owlcarousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?=base_url()?>owlcarousel/assets/owl.theme.default.min.css">
		<script src = "https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="<?=base_url();?>owlcarousel/owl.carousel.min.js"></script>	

	</head>
	<body>
		<script>
			$(document).ready(function(){
  				$(".owl-carousel").owlCarousel({
					loop:true,
				    margin:10,
				    nav:true,
				    responsive:{
				        0:{
				            items:1
				        },
				        600:{
				            items:3
				        },
				        1000:{
				            items:5
				        }
				    }
  				});

			});
		</script>
		<div class = "row container">
			<h1>test cards carousel</h1>
			<div class="owl-carousel">
					<?php foreach ($data_video as $key => $value) : ?>
						<div class="card-deck">
							<div class="card">
								<div class="thumb">
									<img class="card-img-top" src="<?php echo base_url()?>uploads/<?=$value['thumb'];?>">
									<span class = "video-time"><?=$value['time'];?></span>
								</div>
								<div class="card-body">
								<h4 class="card-title"><?=$value['title'];?> </h4>
								<p class="card-text"><?=$value['description'];?></p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
								<a href="<?php echo base_url();?>vides/insertVideo/<?=$value['id']?>" class="btn btn-info sua_video">Sửa Video</a>
								<a href="<?php echo base_url();?>vides/deleteVideo/<?=$value['id']?>" class="btn btn-info sua_video">Xoá Video</a>
							</div>
						</div>
					<?php endforeach ?>
			</div>
		</div>
		<div class="container">
			<h2 class='title_listvideo'>Danh sách Video</h2>
			<div class="row">
				<?php foreach ($data_video as $key => $value) : ?>
					<div class="col-md-3">
						<div class="card-deck">
							<div class="card">
								<div class="thumb">
									<img class="card-img-top" src="<?php echo base_url()?>uploads/<?=$value['thumb'];?>">
									<span class = "video-time"><?=$value['time'];?></span>
								</div>
								<div class="card-body">
								<h4 class="card-title"><?=$value['title'];?> </h4>
								<p class="card-text"><?=$value['description'];?></p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
								<a href="<?php echo base_url();?>vides/insertVideo/<?=$value['id']?>" class="btn btn-info sua_video">Sửa Video</a>
								<a href="<?php echo base_url();?>vides/deleteVideo/<?=$value['id']?>" class="btn btn-info sua_video">Xoá Video</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			
		</div>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- 		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
		
		

	</body>