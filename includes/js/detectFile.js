function myFunction(){
				    var x = document.getElementById("myFile");
				    if ('files' in x) {
				        if (x.files.length != 0) {
				        	console.log("File loaded");
				            document.getElementById("myForm").submit();
				            // location.replace("?file=true");
				            alert("done");
				        }
				    } 
				}
