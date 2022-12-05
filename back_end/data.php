<?php
include_once 'connection.php';

if (isset($_POST['submit'])) {
    $image_name = $_POST['image_name'];
    // echo $image_name ; die;
    $first_name = $_POST['first_name'];
    $Last_name = $_POST['Last_name'];
    $DOB = date('Y-m-d', strtotime($_POST['DOB']));
    $Gender = $_POST['Gender'];
    $Education = $_POST['University'];
    $joining_date = $_POST['joining_date'];
    $company = $_POST['company'];
    $Start = $_POST['Start'];
    $end = $_POST['end'];
    
    
    $sql = "INSERT INTO form_data(first_name,Last_name,DOB,Gender,image_name)
  VALUES ('$first_name','$Last_name','$DOB','$Gender','$image_name')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $form_data_id = mysqli_insert_id($conn);
        foreach ($joining_date as $key => $value) {
            $sql1 = "INSERT INTO `university` (form_data_id, university, year)
                    VALUES ('$form_data_id','$Education[$key]','$value')";
            $result = mysqli_query($conn, $sql1);
        }
        foreach ($Start as $s => $val) {
            $sql2 = "INSERT INTO `company` (form_data_id, company,start,end)
                    VALUES ('$form_data_id','$company[$s]','$val','$end[$s]' )";
            $result = mysqli_query($conn, $sql2);
           
        }
        echo "Inserted successfully";
    } else {

        echo "Error to ....";
    }
}
