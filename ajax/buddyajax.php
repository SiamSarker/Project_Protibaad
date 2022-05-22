<?php
$conn = mysqli_connect("localhost", "root", "", "Protibaad");
$result = mysqli_query($conn, "SELECT * FROM q_category");
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
// change in ajax
 
echo json_encode($data);
exit();