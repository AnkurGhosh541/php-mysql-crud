<?php include("./conn.php");

if (isset($_POST["delete_button"])) {
  $id = $_POST["did"];
  $query = "select * from employee where eid=$id;";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($res);
  $name = $row["ename"]
?>

  <style>
    table,
    th,
    td {
      border: 1px solid;
      border-collapse: collapse
    }

    table {
      margin: 20px;
    }

    th,
    td {
      padding: 5px 10px;
    }
  </style>

  <table>
    <tr>
      <th>ID</th>
      <th>NAME</th>
    </tr>
    <tr>
      <td><?php echo $id ?></td>
      <td><?php echo "$name" ?></td>
    </tr>
  </table>
  <fieldset>
    <legend>Do you want to delete the above employee details?</legend>
    <form method="post">
      <input type="text" name="did" hidden value="<?php echo $id; ?>">
      <button type="submit" name="delete">Delete</button>
    </form>
    <form action="index.php" method="post">
      <button type="submit">Cancel</button>
    </form>
  </fieldset>
<?php
}

if (isset($_POST["delete"])) {
  $id = $_POST["did"];
  $query = "delete from employee where eid=$id;";
  $res = mysqli_query($conn, $query);
  if ($res) {
    echo "<h3 style='color: green'>Employee deleted succesfully</h3>";
  } else {
    "<h3 style='color: red'>Cannot delete employee details</h3>";
  }
?>
  <form action="index.php" method="post">
    <button type="submit">Back</button>
  </form>
<?php
}

?>