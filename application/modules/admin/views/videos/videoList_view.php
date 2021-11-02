
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
		<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	</head>
	<body>
		<div class="container">
			<h2 class='title_listvideo'>Danh sách Video</h2>
			<div class="row row-eq-height">
				<?php foreach ($data_video as $key => $value) : ?>
					<div class="col-md-3 d-flex">
						<div class="card-deck list-video">
							<div class="card video">
								<div class="thumb">
									<img class="card-img-top" src="<?php echo base_url()?>uploads/<?=$value['thumb'];?>">
									<span class = "video-time"><?=$value['time'];?></span>
									<div class="nut">
										<a href="<?php echo base_url();?>videos/insertVideo/<?=$value['id']?>" class="btn btn-info sua_video"><i class='fas fa-pen' ></i></a>
										<a href="<?php echo base_url();?>videos/deleteVideo/<?=$value['id']?>" class="btn btn-info xoa_video"><i class='fas fa-window-close' ></i></a>
									</div>

								</div>
								<div class="card-body">
								<h4 class="card-title"><?=$value['title'];?> </h4>
								<p class="card-text"><?=$value['description'];?></p>
								<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
								</div>
							</div>
						</div>

					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="pagination-videolist">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item">
							<a style ="margin-right:10px"class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php for ($i=0; $i <$pagi['pages'] ; $i++):?>
						<li class="page-item  
						<?php if($i+1 == $pagi['active-page']) {
							echo "active";
						}?>"
							style="margin-right: 10px"><a class="page-link"href="<?php echo base_url() ?>videos/listVideo/<?php echo $i+1?>"><?php echo $i+1?></a></li>
					    <?php endfor ?>
						<li class="page-item">
							<a href="#" class="page-link" aria-label="Previous">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
</html>
