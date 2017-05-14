<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','foodbot2');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
mysqli_set_charset($con, "utf8");
$sql="INSERT INTO key_words (`word`) VALUES (".$q.")";
$result = mysqli_query($con,$sql);

mysqli_close($con);
?>
</body>
</html>