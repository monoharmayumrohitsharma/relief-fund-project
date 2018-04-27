<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
include("auth.php");

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome </title>
  
</head>

<body><center>
  <div>

          <h1>Welcome Admin </h1>
          
          <p>

            <table>
              <tr>
                <th>To Add a state click here</th>
                <td><a href="add.php"><input type="button" name="addstate" value="Add state"></a></td>
              </tr>

              <tr>
                <th>To Remove a state click here</th>
                <td><a href="remove.php"><input type="button" name="removestate" value="Remove state"></a></td>
              </tr>

              

              <tr>
                <th>To Reset a state click here</th>
                <td><a href="reset.php"><input type="button" name="resetstate" value="Reset State"></td>
              </tr>
              <tr>
                <th> View Transaction </th>
                <td><a href="transaction.php"><input type="button" name="resetstate" value="Reset State"></td>
              </tr>
            </table>
          
          </p>
          
          
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>
    
  </center>
</body>
</html>
