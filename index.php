<?php
//connect to db
$conn = mysqli_connect('localhost', 'dominic','test1234', 'ninja_pizza');

//check connection
if (!$conn){
  echo'Connection error '.mysqli_connect_error();

}
//write query for al pizzas

$sql = 'SELECT title,ingredients, id FROM pizzas ORDER BY created_at';

//make query and get results

$result = mysqli_query($conn, $sql);

//fetch the resukting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);


//---------optional/goodpractice
//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);
//----------optional/good practice


print_r($pizzas);



?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php');?>


<h4 class="center grey-text">Pizzas!</h4>

 <div class="container">
    <div class="row">
      <?php foreach($pizzas as $pizza){?>

      <div class="col s6 m3 ">
        <div class="card z-depth-0">
          <div class="card-content center">
            <h6><?php echo htmlspecialchars($pizza['title']);   ?></h6>
           <div> <?php echo htmlspecialchars($pizza['ingredients']);?></div>
        </div>
        <div class="card-acion right-allign">
        <a href="#" class="brand-text">more info</a>
         </div>
      </div>
    </div>


        <?php
        
        
      }?>
      



?>
    </div>
</div>


<?php include('templates/footer.php');?>
</html>