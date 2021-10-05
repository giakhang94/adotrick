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
		<title>Add video</title>

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
				<form class="addVideo" action="<?php echo base_url()?>videos/insertVideo/<?php echo $value['id'] ?>" enctype="multipart/form-data" method="POST">
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
   							 <span class="input-group-text" id="basic-addon1">Title</span>
  						</div>
  						<input  name ="title"  value = "<?php echo set_value('title',$value['title'])?>"type="text" class="form-control" placeholder="tiêu đề video" aria-label="title" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <label class="input-group-text label-dropdown" for="inputGroupSelect01">Category</label>
						</div>
						<select class="custom-select" id="category" name = "category">
						    <option>Chọn 1 category</option>
						    <?php foreach ($category as $key => $value2) :?>
						    <option <?php echo $value['category']== $value2['cat_name']?"selected":"";?> value="<?php echo $value2['cat_name'];?>"><?php echo $value2['cat_name'];?></option>
						<?php endforeach ?>
					  	</select>
					</div>			
					<div class="input-group mb-3">
						<div class="input-group-prepend">
						    <label class="input-group-text label-dropdown" for="inputGroupSelect01">Type</label>
						</div>
						<select class="custom-select" id="type" name = "type">
						    <option>Chọn 1 loại video</option>
						    <option <?php echo $value['type']=="Tips"?"selected":"";?> value="Tips">Tips</option>
						    <option <?php echo $value['type']=="Tutorials"?"selected":"";?> value="Tutorials">Tutorials</option>
						    <option <?php echo $value['type']=="Tricks"?"selected":"";?> value="Tricks">Tricks</option>
						    <option <?php echo $value['type']=="Life-style"?"selected":"";?> value="Life-style">Life-style</option>
					  	</select>
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
   							 <span class="input-group-text" id="basic-addon1">link</span>
  						</div>
  						<input value = "<?php echo set_value('link',$value['link']);?>" name ="link"type="text" class="form-control" placeholder="link youtube" aria-label="link" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
   							 <span class="input-group-text" id="basic-addon1">time</span>
  						</div>
  						<input value="<?php echo set_value('time',$value['time']);?>" name ="time" type="text" class="form-control" placeholder="độ dài video (lấy đúng theo youtube)" aria-label="time" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
   							 <span class="input-group-text" id="basic-addon1">description</span>
  						</div>
  						<input value="<?php echo set_value('description',$value['description']);?>" name ="description"type="text" class="form-control" placeholder="mô tả ngắn (gần bằng các video khác)" aria-label="description" aria-describedby="basic-addon1">
					</div>					
					<div class="input-group mb-3">
  						<div class="input-group-prepend">
   							 <span class="input-group-text" id="basic-addon1">comment</span>
  						</div>
  						<input value="<?php echo set_value('comment',$value['comment']);?>" name ="comment"type="number" class="form-control" placeholder="nhập 0 giùm em" aria-label="comment" aria-describedby="basic-addon1">
					</div>							
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Upload</span>
						</div>
						<div class="custom-file">
						    <input name ="thumb" type="file" class="custom-file-input" id="thumb">
						    <label class="custom-file-label" for="inputGroupFile01">Upload thumbnail cho video</label>
						</div>
					<div class="input-group mb-3">
	  						<input value="<?php echo $value['thumb'];?>" name ="thumb_old"type="text" class="form-control hidden" hidden="hidden" placeholder="nhập 0 giùm em" aria-label="comment" aria-describedby="basic-addon1">
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