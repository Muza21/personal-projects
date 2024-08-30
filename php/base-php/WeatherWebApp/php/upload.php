<?php
if (isset($_POST['upload'])) {
    $target_path = "../files/";
    $target_path = $target_path . basename($_FILES['file']['name']);
    if ($_FILES['file']['type'] == "text/plain") {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
            $success_message = "The file " . basename($_FILES['file']['name']) . " has been uploaded";
        } else {
            $error_message = "Error. Please try again";
        }
    } else {
        $error_message = "Error. Incorrect file format.";
    }
    $response = array(
        'success' => isset($success_message) ? true : false,
        'message' => isset($success_message) ? $success_message : $error_message
    );
    // echo json_encode($response);
}

if (isset($_POST['read'])) {

    $filename = $_POST["filename"];
    $file_content = readfile("../files/$filename");
    // echo $file_content;
}

if (isset($_POST["add"])) {
    $filename = $_POST["filename"];

    $myfile = fopen("../files/$filename.txt", "a") or die("Unable to open file!");

    $txt = $_POST["message"] . "\n";
    fwrite($myfile, $txt);
    fclose($myfile);
}

if (isset($_POST['delete'])) {

    $filename = $_POST["filename"];
    if (unlink("../files/$filename.txt")) {
        $success_message = "The file " . $filename . " has been Deleted";
    } else {
        $error_message = "Error. Incorrect file format.";
    }
    $response = array(
        'success' => isset($success_message) ? true : false,
        'message' => isset($success_message) ? $success_message : $error_message
    );
    // echo json_encode($response);
}
