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


//explode(',', $pizzas[0]['ingredients'])

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php');?>


<h4 class="center grey-text">Pizzas!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($pizzas as $pizza){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
							<div>
                  <ul>
                    <?php foreach(explode(',', $pizza['ingredients']) as $ing){ ?>
                      <li>  <?php echo htmlspecialchars($ing);?>        </li>
                    <?php   }   ?>

                  </ul>
              </div>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="#">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>