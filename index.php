<?php include("./conn.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee CRUD Operations</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 5px 10px;
    }

    form {
      display: inline-block;
    }
  </style>
</head>

<body>
  <h2>Employee Database</h2>

  <form action="insert.php" method="post">
    <button type="submit">Insert</button>
  </form>

  <br><br>
  <?php
  $query = "select * from employee;";
  $res = mysqli_query($conn, $query);

  if (mysqli_num_rows($res) > 0) {
  ?>
    <table>
      <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>ACTIONS</th>
      </thead>
      <tbody>
        <?php
        for ($i = 0; $i < mysqli_num_rows($res); $i++) {
          $row = mysqli_fetch_assoc($res);
          $id = $row["eid"];
          $name = $row["ename"]
        ?>
          <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $name; ?></td>
            <td>
              <form action="update.php" method="post">
                <input type="text" name="uid" hidden value="<?php echo $id; ?>">
                <input type="text" name="uname" hidden value="<?php echo $name; ?>">
                <button type="submit" name="update_button">Update</button>
              </form>
              <form action="delete.php" method="post">
                <input type="text" name="did" hidden value="<?php echo $id; ?>">
                <button type="submit" name="delete_button">Delete</button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  } else {
    echo "<h3 style='color: orange'>NO RECORD FOUND</h3>";
  }
  ?>
</body>

</html>