<?php
// Read JSON file
$studentsJson = file_get_contents('students.json');

// Decode JSON data into an array
$studentsArray = json_decode($studentsJson, true);

// Check if 'id' parameter is set in the GET request
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Loop through students array to find the matching student
    foreach($studentsArray as $student) {
        if($student['id'] == $id) {

            // Output the specific student record
            echo json_encode($student);
            break; // Stop looping once the student is found
        }
    }
} else {
    // If 'id' parameter is not set, return error message
    echo json_encode(array("error" => "Student ID not provided"));
}
?>