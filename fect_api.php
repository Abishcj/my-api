<?php

use function PHPSTORM_META\type;

$con = mysqli_connect("localhost", "root", "", "api_data");
$response = array();
if ($con) {
    $sql = "select * from student_details";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("content-type:json");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['id'] = $row['id'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['email'] = $row['email'];
            $response[$i]['age'] = $row['age'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(['msg' => 'No Data!', 'status' => false]);
}
