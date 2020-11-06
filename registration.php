<?php 
include_once 'include/class.user.php';
$user = new User();
// Checking for user logged in or not
    /*if (!$user->get_session())
    {
       header("location:index.php");
    }*/
if (isset($_POST['submit'])){
        extract($_POST);
        $register = $user->reg_user($firstname, $lastname, $pnumber, $upass, $ucpass, $uemail);
        if ($register) {
            // Registration Success
            echo "<div style='text-align:center'>Registration successful!!! <a href='login.php'>Click here</a> to login</div>";
        } else {
            // Registration Failed
            echo "<div style='text-align:center'>Registration failed. Email already exits please try again.</div>";
        }
    }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <title>MVC Register</title>
  </head>

  <body>
    <div id="container" class="container">
      <h1>New Registration </h1>
      <form action="" method="post" name="reg">
        <table class="table">
          <tr>
            <th>First Name:</th>
            <td>
              <input type="text" name="firstname" required>
            </td>
          </tr>
		  <tr>
            <th>Last Name:</th>
            <td>
              <input type="text" name="lastname" required>
            </td>
          </tr>
          <tr>
            <th>Phone Number:</th>
            <td>
              <input type="text" name="pnumber" required>
            </td>
          </tr>
          <tr>
            <th>Email:</th>
            <td>
              <input type="email" name="uemail" required>
            </td>
          </tr>
          <tr>
            <th>Password:</th>
            <td>
              <input type="password" name="upass" required>
            </td>
          </tr>
		  <tr>
            <th>Confirm Password:</th>
            <td>
              <input type="password" name="ucpass" required>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
              <input class="btn" type="submit" name="submit" value="Register" onClick="return(submitreg());">
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><a href="login.php">Already registered? Click Here!</a></td>
          </tr>

        </table>
      </form>
    </div>

    <script>
      function submitreg() {
        var form = document.reg;
        if (form.name.value == "") {
          alert("Enter name.");
          return false;
        } else if (form.uname.value == "") {
          alert("Enter username.");
          return false;
        } else if (form.upass.value == "") {
          alert("Enter password.");
          return false;
        } else if (form.uemail.value == "") {
          alert("Enter email.");
          return false;
        } else if (form.ucpass.value == "") {
          alert("Enter Confirm password.");
          return false;
        } else if (form.ucpass.value != form.upass.value) {
          alert("Enter Confirm password same as password.");
          return false;
        } 
      }
    </script>
  </body>

  </html>