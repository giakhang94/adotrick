<?php 
	$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>List Category</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="form-cat">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Chọn category</h3>
				</div>
				<div class="panel-body">
					<form action="<?php echo base_url() ?>admin/videos/listvideobycat" enctype="multipart/form-data" method="POST">
						<select class="c-select form-cotrol" name = "category">
							<option selected>Open this select menu</option>
							<option value = "100">Test ko có id</option>
							<option value = "101">Test ko có id</option>
							<?php 
								foreach ($data_cat as $key => $value_cat):
							?>
								<option value="<?=$value_cat['id']?>"><?=$value_cat['cat_name']?></option>
							<?php endforeach ?>
						</select>
						<button type="sumbit" class="btn btn-info sub-btn">Gửi</button>
					</form>
				</div>
			</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">List Category</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>#</th>
							<th>Title</th>
							<th>Thumb url</th>
							<th>Cate_id</th>
							<th>Description</th>
							<th>Type</th>
							<th>time</th>
							<th>comment</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_video as $key => $value) :?>
						<tr>
							<td><a class="btn btn-info" href="<?php echo base_url()?>admin/videos/insertVideo/<?php echo $value['id']; ?>">Sửa</a></td>
							<td>#</td>
							<td><?php echo $value['title'] ?></td>
							<td><?php echo $value['thumb'] ?></td>
							<td><?php echo $value['category_id'] ?></td>
							<!-- cate name ở đây chứ còn đâu nữa  -->
							<!-- xong cate name  -->
							<td><?php echo $value['description'] ?></td>
							<td><?php echo $value['type'] ?></td>
							<td><?php echo $value['time'] ?></td>
							<td><?php echo $value['comment'];?></td>
						</tr>
						<?php endforeach ?>
						</tr>
					</tbody>
				</table>
			</div>
			<?php 
				if($error !== ""):
			?>
				<h1 class = "alert alert-info"><?=$error?></h1>
			<?php endif?>
		</div>
		<!-- //tạo pagination  -->
		<div class="cate-pagi" style="text-align: center;">
			
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>