<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Upload</title>
    </head>
    <body>
		<?php
		session_start();
		require 'libs/rb.php';
		include 'includes/db.php';
        include 'includes/form.php';
        include 'includes/readCsv.php';

		if (isset($_GET['file'])){
         	$_SESSION["file"] = true;
         }
        if (!isset($_FILES['upload']['tmp_name'])) : 
        	form();
         else: ?>
            <?php
                $newFilename = dirname(__FILE__) .'/file';
                $uploadInfo = $_FILES['upload'];
                // unlink('file.csv');
                
                switch ($uploadInfo['type']) {
                    case 'text/csv':
                        $newFilename .= '.csv';
                        break;

                    default:
                        ?> <script>alert("Unsupported format")</script> <?php
                        form();
                        exit;
                }

                if (!move_uploaded_file($uploadInfo['tmp_name'], $newFilename)) {
                    ?> <script>alert("File couldn't be saved")</script> <?php
                } else {
                	?><script>location.replace("?file=true");</script><?php
                }
                form();?>
					<p>File loaded</p>
                <?php

         endif; 

         $erase = $_GET['command'];
        
         if ($erase == 'erase') {
         	R::wipe( 'users' );
         	?> 
         	<script>
         		alert('All users has been deleted'); 
         		location.replace("index.php");
         	</script>
         	<?php
         }
         if ($_GET['command'] == 'import'){
         	if(!isset($_SESSION["file"])){
         		?>  <script>
         			alert("Load file first");
         			location.replace("index.php");
         		</script> <?php
         	} else {
	         	$csvFile = read('file.csv');
	         	print_r($csvFile[1]);
         	}
         }

         ?>
    </body>
</html>