<?php 
  
  require_once("head.php");
  require_once("header.php");
  require_once("aside.php");
  require_once("config/config.php");

if($_GET) {
    $id = base64_decode($_GET['id']);

  
    $filename = base64_decode($_GET['filename']);

    $query = "SELECT *From file WHERE file='$filename' and user_id='$id' ";
    $result = mysqli_query($con, $query); 

    $response = mysqli_fetch_array($result, MYSQLI_ASSOC);


    $pdfUrl = "storage/data/$id/".$filename;

    if(!file_exists($pdfUrl)) {
      $error = "el archivo no existe";
      header("location: search.php?error=$error");
    }

  }
  
  ?>


<div class="content-wrapper">
    <iframe src="<?php echo $pdfUrl?>#toolbar=0" width="100%" height="780" style="border: none;"></iframe>
</div>

