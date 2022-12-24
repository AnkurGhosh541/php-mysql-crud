<?php include("./conn.php");

if (isset($_POST["update_button"])) {
  $id = $_POST["uid"];
  $name = $_POST["uname"];
?>
  <fieldset>
    <legend>Update Employee</legend>
    <form method="post">
      <input type="number" name="uid" placeholder="Enter employee ID" value="<?php echo $id ?>">
      <input type="text" name="uname" placeholder="Enter employee Name" value="<?php echo $name ?>">
      <input type="text" name="oid" hidden value="<?php echo $id ?>">
      <button type="submit" name="update">Update</button>
    </form>
  </fieldset>
  <br>
  <form action="index.php" method="post">
    <button type="submit">Back</button>
  </form>
<?php
}

if (isset($_POST["update"])) {
  $uid = $_POST["uid"];
  $uname = $_POST["uname"];
  $oid = $_POST["oid"];

  $query = "select * from employee where eid=$uid;";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($res);
  if (mysqli_num_rows($res) > 0 && $row["eid"] != $oid) {
    echo "<h3 style='color: red'>Another employee with same id already exists</h3>";
  } else {
    $query = "update employee set eid=$uid, ename='$uname' where eid=$oid;";
    $res = mysqli_query($conn, $query);
    if ($res) {
      echo "<h3 style='color: green'>Employee updated succesfully</h3>";
    } else {
      "<h3 style='color: red'>Cannot update employee details</h3>";
    }
  }
?>
  <form action="index.php" method="post">
    <button type="submit">Back</button>
  </form>
<?php
}
?>