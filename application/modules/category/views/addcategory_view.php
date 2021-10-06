<?php 
$this->load->helper('url');
$this->load->helper('form');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Add Category</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
		<link rel="stylesheet" href="<?=base_url()?>css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="shortcut icon" href="<?=base_url()?>img/round-title.ico" />
	</head>
	</head>
	<body>

		<div class="card  main-card">
			<div class="card-header form_header">
				<h3 class="panel-title form_title">Thêm video vào web</h3>
			</div>
			<div class="card-body">
				<?php foreach ($video_value as $key => $value) : ?>
				<form class="addVideo" action="<?php echo base_url()?>category/addCategory/<?php echo $value['id'] ?>" enctype="multipart/form-data" method="POST">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
   							 <span class="input-group-text" id="basic-addon1">Cat_name</span>
  						</div>
  						<input  name ="cat_name"  value = "<?php echo set_value('cat_name',$value['cat_name'])?>"type="text" class="form-control" placeholder="tên chuyên mục" aria-label="cat_name" aria-describedby="basic-addon1">
					</div>	
					<div class="input-group mb-3" data-toggle="buttons">
						<div class="input-group-prepend radio-cat">
						    <label class="input-group-text label-dropdown" for="inputGroupSelect01">Delete?</label>
						</div>
						<label class="btn btn-secondary">
							<input value="1" type="radio" name="delete_flag" id="option2" autocomplete="off">YES
						</label>
						<label class="btn btn-secondary">
							<input value="0" type="radio" name="delete_flag" id="option3" checked autocomplete="off">NO
						</label>
					</div>					
					<div class="input-group mb-3" data-toggle="buttons">
						<div class="input-group-prepend radio-cat">
						    <label class="input-group-text label-dropdown" for="inputGroupSelect01">Public?</label>
						</div>
						<label class="btn btn-secondary">
							<input value="1" type="radio" name="public_flag" id="option2" autocomplete="off">YES
						</label>
						<label class="btn btn-secondary">
							<input value="0" type="radio" name="public_flag" id="option3" checked autocomplete="off">NO
						</label>
					</div>					
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Upload</span>
						</div>
						<div class="custom-file">
						    <input name ="cat_thumb" type="file" class="custom-file-input" id="cat_thumb">
						    <label class="custom-file-label" for="inputGroupFile01">Upload thumbnail cho video</label>
						</div>
					<div class="input-group mb-3">
	  						<input value="<?php echo $value['cat_thumb'];?>" name ="cat_thumb_old"type="text" class="form-control hidden" hidden="hidden" placeholder="nhập 0 giùm em" aria-label="comment" aria-describedby="basic-addon1">
					</div>	
					</div>
					<button type="sumbit" class="btn btn-info nut_submit">Thêm vào Database</button>
					<button type="reset" class="btn btn-info nut_reset">Nàm Nại</button>
				</form>
				<?php endforeach?>
			</div>
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	</body>
</html>