
<!-- 
	Coded with all the love by Junior 
	(c) SE Community
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Get Crush Photo By ID Instagram</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div id="wrap" style="margin:auto;width:500px;text-align:center;">
    <h3>Get Crush Photo By ID Instagram</h3>
    <form method="POST">
       <input type="url" name="url" placeholder="Nhập URL hình ảnh cần lấy">
	   <button type="submit" name="get">GET</button>
    </form>
  </div>
  <?php
     error_reporting(0);
     if(isset($_POST['get'])){
		$html = file_get_contents($_POST['url']);
		$doc = new DOMDocument();
		@$doc->loadHTML($html);
		$metas = $doc->getElementsByTagName('meta');
		for($i = 0; $i < $metas->length; $i++){
			$meta = $metas->item($i);
			if($meta->getAttribute('property') == 'og:image'){
				$img = $meta->getAttribute('content');
			}
		}
		if(!$img){
			echo "<p>URL hình ảnh của Crush sai rồi :/</p>";
		}
		else{
			echo "<p>Thành công !!! Xem Link gốc ảnh Crush ấn vào đây <3 : <a href='$img'>Xem</a></p>";
			echo "<img src='$img' width='30%'>";
		}
	 }
?>
</body>
</html>
