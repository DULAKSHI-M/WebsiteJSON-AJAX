<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
</head>
<body>
<div class="container">
<h1>Student Records</h1>
<table style="width:100%">
    <label for="studentId">Enter Student ID:</label>
            <input type="text" id="studentId" name="studentId" placeholder="Student ID">    
    <!-- Button and textbox to display specific student -->
    <button id="specificStudentBtn" type="submit">Show Student</button>
</table>
<br>
<table style="width:100%"> 
<label for="studentId">All Students Records:</label>
<!-- Button to display all students -->
<button id="allStudentsBtn" type="submit">Show All Students</button>
</table>
<br><br>
<div id="specific-student-details">
    <!-- Specific student details will be displayed here -->
</div>
<br><br>
<div id="student-details">
    <!-- Student details will be displayed here -->
</div>
<br><br>
<script>            
$(document).ready(function(){    
 // Click event for button to display all students    
    $("#allStudentsBtn").click(function() {
     $.ajax({  //We normally use ajax not to reload the webpage when we are fetching the data
        url: 'get_students.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var html = '<table border="1"><tr><th>ID</th><th>Name</th><th>Age</th><th>Address</th><th>CGPA</th></tr>';
            $.each(data, function(key, value){
                html += '<tr>';
                html += '<td>' + value.id + '</td>';
                html += '<td>' + value.name + '</td>';
                html += '<td>' + value.age + '</td>';
                html += '<td>' + value.address + '</td>';
                html += '<td>' + value.cgpa + '</td>';
                html += '</tr>';
            });
            html += '</table>';
            $('#student-details').html(html);
        }
     });
    });   
  // Click event for button to display specific student
  $("#specificStudentBtn").click(function() {
    var id = $("#studentId").val();   
        $.ajax({
            url: 'get_specific_student.php?id=' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {                                
                var html = '<table border="1"><tr><th>ID</th><th>Name</th><th>Age</th><th>Address</th><th>CGPA</th></tr>';                                             
                html += '<tr>';
                html += '<td>' + data.id + '</td>';
                html += '<td>' + data.name + '</td>';
                html += '<td>' + data.age + '</td>';
                html += '<td>' + data.address + '</td>';
                html += '<td>' + data.cgpa + '</td>';
                html += '</tr>';             
                html += '</table>';
                $('#specific-student-details').html(html);
            }
        });   
   });  
});  
</script>
<div>
</body>
</html>