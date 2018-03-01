<!DOCTYPE html><html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Login/Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo-viewad.css" />
        <link rel="stylesheet" type="text/css" href="css/style-viewad.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- top bar -->
            <section>
              <div style="height: 50px;"> </div>
                <div id="container_demo">
                    <div id="wrapper">
                      <button id="gochat" class="button button1">Go to chat</button>
                      <br>
                      <button id="gorec" class="button button1">View Records</button>
                    </div>
                </div>
            </section>
        </div>
    </body>
    <script type = "text/javascript">
      var btn = document.getElementById('gorec');
      var btnchat = document.getElementById('gochat');
      btn.addEventListener('click', function() {
      document.location.href = 'admin.php';
      });

      btnchat.addEventListener('click', function() {
      document.location.href = 'welcomeMe.php';
    });
    </script>
</html>
