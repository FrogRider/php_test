<?php 
session_start();
        function form() {?>
			<form method="POST" id="myForm" enctype="multipart/form-data">
                <input name="upload" type="file" id="myFile" onchange="myFunction()"><br>
                <!-- <input type="submit" value="Confirm" name="submit"><br> -->
                <!-- <input type="button" onclick="myFunction()" value="Submit form" style="display: none;"> -->
                <a href="?command=import">Import</a><br>
                <a href="?command=erase">Clear all records</a>
            </form>
            <script src="includes/js/detectFile.js"></script>
		<?php
		if(isset($_SESSION["file"])) {
			echo "file";
		} else : echo "no file";
        }?>