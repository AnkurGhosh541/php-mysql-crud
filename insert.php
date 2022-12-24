<?php include("./conn.php"); ?>

<fieldset>
  <legend>Insert Employee</legend>
  <form method="post">
    <input type="number" name="eid" required placeholder="Enter employee ID">
    <input type="text" name="ename" required placeholder="Enter employee Name">
    <button type="submit" name="insert">Insert</button>
  </form>
</fieldset>
<br>
<form action="index.php" method="post">
  <button type="submit">Back</button>
</form>

<?php

if (isset($_POST["insert"])) {
  $id = $_POST["eid"];
  $name = $_POST["ename"];

  $query = "select * from employee where eid=$id";
  $res = mysqli_query($conn, $query);
  if (mysqli_num_rows($res) != 0) {
    echo "<h3 style='color: red'>Employee with same id already exsits</h3>";
  } else {
    $query = "insert into employee values ($id, '$name');";
    $res = mysqli_query($conn, $query);
    if ($res) {
      echo "<h3 style='color: green'>Employee inserted succesfully</h3>";
    }
  }
}
?>