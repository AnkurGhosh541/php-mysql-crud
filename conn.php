<?php
$conn = mysqli_connect(
  hostname: "localhost",
  username: "root",
  password: "",
  database: "crud"
);

if (mysqli_connect_errno()) {
  echo "Connection failed.";
}
