<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello!</h1>

    <div>
    	<form action="#" id="submitHost">
  <div class="form-group">
    <input type="text" class="form-control" id="host" aria-describedby="host" placeholder="Enter hostname">
  </div>
  <button onclick="submitHostButton()" id="submitHostButton" type="submit" class="btn btn-primary">Submit</button>
</form>

	
    </div>
    <script>

document.getElementById('submitHost').onsubmit = function() { 
    host = document.getElementById('host').value;
    server = "127.0.0.1"
    Http = new XMLHttpRequest();
                            url = 'http://' + server + '/vhost.php?host=' + host + '';
                            Http.open("GET", url);
                            Http.send();

                            Http.onreadystatechange = (e) => {
                                //console.log(Http.responseText.length);
                                console.log("server response", Http.responseText);
                                alert("successfully Added. Please restart your Apache")
                            }


};


    	

</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

<?php

?>