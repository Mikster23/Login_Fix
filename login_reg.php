<!DOCTYPE html><html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Login/Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/demo-login.css" />
        <link rel="stylesheet" type="text/css" href="css/style-login.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- top bar -->
            <section>
              <div style="height: 50px;"> </div>
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                          <form action="login.php" method="post" autocomplete="on">
                            <!-- <form  action="mysuperscript.php" autocomplete="on"> -->
                                <h1>Log in</h1>
                                <p>
                                  <label for="userlog" class="userclass" data-icon="u" > Username </label>
                                  <input id="userlog" name="username" required="required" type="text"/>
                                </p>
                                <p>
                                  <label for="passlog" class="passclass" data-icon="p"> Password </label>
                                  <input id="passlog" name="password" required="required" type="password"/>
                                </p>
                                <p class="keeplogin">
                									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                									<label for="loginkeeping">Keep me logged in</label>
								                </p>
                                <p class="tonbut">
                                  <button class="button" name="but">Login</button>
                                </p>
                                <p class="change_link"> Create your account here.
                                  <a href="#toregister" class="to_register">Sign up</a>
								                </p>
                          </form>
                        </div>
                        <div id="register" class="animate form">
                              <form action="register.php" method="post" autocomplete="on">
                              <!-- <form  action="mysuperscript.php" autocomplete="on"> -->
                                <h1> Sign up </h1>
                                <p>
                                    <label for="fnameSign" class="classfname" data-icon="u">First Name</label>
                                    <input id="fnameSign" name="fname" required="required" type="text"/>
                                </p>
                                <p>
                                    <label for="mnameSign" class="classmname" data-icon="u">Middle Name</label>
                                    <input id="mnameSign" name="mname" type="text"/>
                                </p>
                                <p>
                                    <label for="lnameSign" class="classlname" data-icon="u">Last Name</label>
                                    <input id="lnameSign" name="lname" required="required" type="text"/>
                                </p>
                                <p>
                                    <label for="deptSign" class="classdept" data-icon="u">Department</label>
                                    <select name="dept">
                                      <option style="display:none"></option>
                                      <option value="Dept1">HR Department</option>
                                      <option value="Dept2">Finance</option>
                                      <option value="Dept3">IT Department</option>
                                      <option value="Dept4">Marketing Department</option>
                                    </select>
                                </p>
                                <p>
                                    <label for="emailSign" class="classemail" data-icon="u">Email</label>
                                    <input id="emailSign" name="email" required="required" type="email"/>
                                </p>
                                <p>
                                    <label for="userSign" class="classuser" data-icon="e" >Username</label>
                                    <input id="userSign" name="user" required="required" type="text"/>
                                </p>
                                <p>
                                    <label for="passSign" class="classpass" data-icon="p">Password </label>
                                    <input id="passSign" name="pass" required="required" type="password"/>
                                </p>
                                <p>
                                    <label for="confSign" class="classconf" data-icon="p">Confirm your password </label>
                                    <input id="confSign" name="conf" required="required" type="password"/>
                                </p>
                                <p class="tonbut">
                                  <button class="button" name="ton">Sign up</button>
                                </p>
                                <p class="change_link"> Already have an account?
                									<a href="#tologin" class="to_register"> Log in </a>
                								</p>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
