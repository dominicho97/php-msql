<?php
//connect to db
$conn = mysqli_connect('localhost', 'dominic','test1234', 'ninja_pizza');

//check connection
if (!$conn){
  echo'Connection error '.mysqli_connect_error();

}
//write query for al pizzas

$sql = 'SELECT title,ingredients, id FROM pizzas';

//make query and get results

$result = mysqli_query($conn, $sql);

//fetch the resukting rows as an array





?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php');?>

<?php include('templates/footer.php');?>
</html>