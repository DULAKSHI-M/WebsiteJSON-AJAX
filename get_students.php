<?php
// Read JSON file
$studentsJson = file_get_contents('students.json');

// Decode JSON data into an array
$studentsArray = json_decode($studentsJson, true);

// Echo all student records
echo json_encode($studentsArray);

?>