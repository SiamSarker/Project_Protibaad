<?php
$conn = mysqli_connect("localhost", "root", "", "Protibaad");
$result = mysqli_query($conn, "SELECT * FROM crimes");
 
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}
# crime ajax updated
echo json_encode($data);
exit();