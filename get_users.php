<?php
include("connect.php");
echo "<br/>";
$sql    =   "SELECT userName FROM `users`";

$result =   mysqli_query($con,$sql);

while($row = $result->fetch_assoc()) {
    echo $row['userName']."<br/>";
}