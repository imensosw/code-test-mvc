<?php 
session_start();
include_once 'include/class.user.php';
$user = new User();

if (isset($_POST['submit'])) { 
		extract($_POST);   
	    $login = $user->check_login($uemail, $password);
	    if ($login) {
	        // Login Success
	       header("location:home.php");
	    } else {
	        // Login Failed
	        echo 'Wrong email or password';
	    }
	}
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>MVC Login</title>
  </head>

  <body>
    <div id="container" class="container">
      <h1>Login Here</h1>
      <form action="" method="post" name="login">
        <table class="table " width="400">
          <tr>
            <th>Email:</th>
            <td>
              <input type="text" name="uemail" required>
            </td>
          </tr>
          <tr>
            <th>Password:</th>
            <td>
              <input type="password" name="password" required>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input class="btn" type="submit" name="submit" value="Login" onClick="return(submitlogin());">
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>New user? <a href="registration.php"> Register Here!</a></td>
          </tr>

        </table>
      </form>
    </div>
    <script>
      function submitlogin() {
        var form = document.login;
        if (form.uemail.value == "") {
          alert("Enter email.");
          return false;
        } else if (form.password.value == "") {
          alert("Enter password.");
          return false;
        }
      }
    </script>


  </body>