<?php
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Create connection 
$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>
<style>

td
{
  
  padding-left: 70px;
}

input[type=text], select {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  background-color: #FFFACD;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  text-align: center;
}

input[type=submit] {
  width: 50%;
  background-color: #badc57;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #6AB04A;
}

div.container {
  border-radius: 5px;
  background-color: #FFFFFF;
  padding: 20px;
  margin-top: 10px;
  margin-left: 300px;
  margin-right: 240px;
 
}
div.top {
  border-radius: 5px;
  margin-top: 20px;
  background-color: #013220;
  padding: 20px;
  margin-left: 300px;
  margin-right: 240px;
 
}
</style>
<body bgcolor="#DAE0E2">

<div class="top">
  <img src="openMrsLogo.png" height="42"></img>
</div>

<div class="container">
  <form action="#" method="POST">
    
  
  
    <table style="width:100%">
  
  <tr>
    <td>
       <label>OpenMRS Version</label>
    <input type="text" placeholder="openmrs_version" name="openmrs_version">

    </td>
    <td>
      
       <label>Server Information</label>
    <input type="text"  name="server_info" placeholder="server_info">
    </td>
    
  </tr>
  <tr>
    <td>
       <label>Username</label>
    <input type="text"  name="username" placeholder="username">
    </td>
    <td> <label>Implementation ID</label>
    <input type="text"  name="implementationId" placeholder="implementationId"></td>
    
  </tr>
  <tr>
    <td> <label>Start Module</label>
    <input type="text" name="startedModules" placeholder="startedModules"></td>
    <td> <label for="fname">Stack Trace</label>
    <input type="text" name="stackTrace" placeholder="stackTrace"></td>
    
  </tr>
  <tr>
    <td> <label>Error Message</label>
    <input type="text" name="error message" placeholder="errormessage"></td>

  </tr>
  <tr>
    <td colspan="2"  style="padding-left: 30%">
        <input type="submit" value="Report Bug">
    </td>
  </tr>
</table>
  </form>
</div>
<?php
if(isset($_POST['submit'])){
        $sql = "INSERT INTO bugs (openmrs_version,server_info,username,implementationId,startedModules,stackTrace,errormessage)
        VALUES ('".$_POST["openmrs_version"]."','".$_POST["server_info"]."','".$_POST["username"]."','".$_POST["implementationId"]."','".$_POST["startedModules"]."','".$_POST["stackTrace"]."','".$_POST["errormessage"]."')";
        if ($con->query($sql) === TRUE) {
    echo "Bug Reported successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

?>
</body>
</html>

