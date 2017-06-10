<!DOCTYPE html>
<html lang="ar">
    <head>
        <!-- meta code -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title> سكربت سمارت لتحميل الفيديوهات من اليوتيوب </title>
        <meta name="description" content="">
        <meta name="keywords" content="">

        
        <!-- css files -->
        <link rel="stylesheet" type="text/css" href="theme/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="theme/css/bootstrap-rtl.css">
        <link rel="stylesheet" type="text/css" href="theme/css/style.css">
        <link rel="icon"   type="image/png" href="">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 logo">
                    <a href="index.php">
                        <img src="theme/image/logo.png" class="img-responsive center-block">
                    </a>
                </div>
            </div>    
        </div>  <!-- end header -->

	<div class="container">
		<div class="col-md-12 link text-center">
			<h3> تحميل اى فيديو من اليوتيوب </h3>
			<p> فقط قم بكتابه رابط الفيديو ثم اضغط تحميل </p>
			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				<input type="text" name="v_link" class="form-control" placeholder="رابط الفيديو هنا"> <br />
				<input type="submit" class="btn btn-primary" value="تحميل">
			</form>
		</div>
	</div>

	<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>

	<div class="container">
		<div class="col-md-12 text-center link_info">
			<?php 

					$v_url 		= filter_var($_POST['v_link'], FILTER_SANITIZE_URL);

					$str_len 	= strpos($v_url, '=');

					$v_id  		= substr($v_url, $str_len+1);

					$data 		= file_get_contents('https://www.youtube.com/get_video_info?video_id='. $v_id .'');

				 	parse_str($data);

				 	$arr 		= explode(',', $url_encoded_fmt_stream_map);


				 	echo '<p class="text-center"> اسم الفيديو: <br />' . $title . '</p>';

				 	echo '<p class="text-center"> الجوده المتاحه للفيديو فقط اضغط بزر الماوس الايمي واختر حفظ بإسم</p>';

				 	foreach ($arr as $item) {
				 		
				 		echo parse_str($item);

				 		echo "<a href='".$url."?title=".$title."' download='proposed_file_name' class='btn btn-success'>". $quality ."</a> ";

				 	}

				
			?>
		</div>
	</div>
	<?php } ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 footer text-center">
					<p> تصميم وبرمجه <a href="http://facebook.com/xzcmido">Ahmed Taher</a> </p>
				</div>
			</div>
		</div>
	
        <script type="text/javascript" src="theme/js/html5shiv.min.js"></script>
        <script type="text/javascript" src="theme/js/jquery.min.js"></script>
        <script type="text/javascript" src="theme/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="theme/js/java.js"></script>

    </body>
</html>