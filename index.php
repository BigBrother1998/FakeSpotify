<?php include("includes/header.php"); ?>

<h1 class="PageHeadingBig">To Ci się może spodobać</h1>

<div class="gridViewContainer">

	<?php
		$albumQuery = mysqli_query($connection, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");

		while($row = mysqli_fetch_array($albumQuery))
		{
			echo "<div class='gridViewItem'>
				<img src='". $row['artworkPath'] ."'>

				<div class='gridViewInfoTitle'>"
					. $row['title'] .
				"</div>

				<div class='gridViewInfoArtist'>Artysta: "
					. $row['artist'] .
				"</div>

				<div class='gridViewInfoGenre'>- "
				. $row['genre'] .
			" -</div>

			</div>";
		}
	?>

</div>

<?php include("includes/footer.php"); ?>
			

</body>

</html>