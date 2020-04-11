 <?php
  $conn=mysqli_connect("localhost","root","123456","mysql") or die("Could not connect!<br>Error returned by mysql server:<br>".mysqli_connect_error());
if($conn){
  echo "Connection is successful! <br>";
}
// sql to create table
$sql = "CREATE TABLE PercentageCalculator (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
reg_no VARCHAR(30) NOT NULL,
CourseA_Marks INT(6) NOT NULL,
CourseB_Marks INT(6) NOT NULL,
CourseC_Marks INT(6) NOT NULL,
CourseA_per INT(6) NOT NULL,
CourseB_per INT(6) NOT NULL,
CourseC_per INT(6) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table PercentageCalculator created successfully <br>";
} else {
    echo "Error creating table or table already exists: <br>" . $conn->error ;
}


$reg=$_POST['reg'];
$A=$_POST['A'];
$B=$_POST['B'];
$C=$_POST['C'];
$AA=$_POST['AA'];
$BB=$_POST['BB'];
$CC=$_POST['CC'];
$Aper=($A/$AA)*100;
$Bper=($B/$BB)*100;
$Cper=($C/$CC)*100;
$sql = "INSERT INTO PercentageCalculator (reg_no, CourseA_Marks, CourseB_Marks, CourseC_Marks,CourseA_per,CourseB_per,CourseC_per)
VALUES ('$reg', '$A', '$B','$C','$Aper','$Bper','$Cper')";


if ($conn->query($sql) === TRUE) {
    echo "New records created successfully <br>";
} else {
    echo "Error: <br> " . $sql . "<br>" . $conn->error ;
}




$conn = new mysqli("localhost", "root", "123456", "mysql");
// Check connection
if ($conn->connect_error) {
    die("Connection failed:<br> " . $conn->connect_error);
} 

$sql = "SELECT * FROM PercentageCalculator";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Reg_no: " . $row["reg_no"]. " CourseA_Marks:" . $row["CourseA_Marks"]." CourseB_Marks:" . $row["CourseB_Marks"]." CourseC_Marks:" . $row["CourseC_Marks"]." CourseA_per:" . $row["CourseA_per"]." CourseB_per:" . $row["CourseB_per"]. " CourseC_per:" . $row["CourseC_per"]."<br>";
    }
} else {
    echo "0 results <br>";
}
//$conn->close();
mysql_close($conn);
?> 
 
