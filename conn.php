<?php
$conn = mysqli_connect(
  hostname: "localhost",
  username: "root",
  password: "",
  database: "crud"
);

if (mysqli_error($conn)) {
  echo "Connection failed.";
}
