<?php
$conn = mysqli_connect("localhost", "root", "", "Protibaad");
$result = mysqli_query($conn, "SELECT * FROM blogs");
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
 # blogs updated
echo json_encode($data);
exit();