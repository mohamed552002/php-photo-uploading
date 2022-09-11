
<!DOCTYPE html>
<style>
  body{
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
}
</style>
<html lang="en">
<head>
  <title>Image PHP</title>
</head>


<body>
<?php if(isset($_GET['error'])):?>
	<p><?php echo $_GET['error']; ?></p>
  <?php endif ?>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="image"  >
  <input type="submit" name="submit" value="upload">
  </form>
</body>
</html>