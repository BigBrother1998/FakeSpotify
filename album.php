<?php include("includes/header.php"); ?>

<?php
if(isset($_GET['id']))
{
    $albumID = $_GET['id'];
}
else
{
    header('Location: index.php');
}

$album = new Album($connection, $albumID);

$artist = $album->getArtist();

?>

<div class="entifyInfo">
        <div class="leftSection">
            <img src="<?php echo $album->getArtworkPath(); ?>">
        </div>

        <div class="rightSection">
            <h1><?php echo $album->getTitle(); ?></h1>
            <span>Wykonawca: <?php echo $artist->getName(); ?></span><br>
            <p>Ilość utworów: <?php echo $album->getNumberOfSongs(); ?></p>
        </div>
</div>

<div class="tracklistContainer">
    <ul class="tracklist">
       <?php
            $songIdArray = $album->getSongIds();
            
            $i = 1;

            foreach($songIdArray as $songId)
            {
               $albumSong = new Song ($connection, $songId);
               $albumArtist = $albumSong->getArtist();

               echo "<li class='tracklistRow'>
                        <div class='trackCount'>
                            <img class='play' src='assets/icons/play-white.png'>
                            <span class='trackNumber'>$i</span>
                        </div>

                        <div class='trackInfo'>
                            <span class='trackName'>". $albumSong->getTitle() ."</span>
                            <span class='artistName'>". $albumArtist->getName() ."</span>
                        </div>

                        <div class='trackOptions'>
                            <img class='optionsButton' src='assets/icons/more.png'>
                        </div>

                        <div class='trackDuration'>
                            <span class='duration'>". $albumSong->getDuration() ."</span>
                        </div>
               </li>";
               
               $i++;
            }
       ?>
    </ul>
</div>

<?php include("includes/footer.php"); ?>