<?php


include ('config/db_connect.php');


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

    <?php foreach($pizzas as $pizza): ?>

<div class="col s6 md3">
  <div class="card z-depth-0">
    <div class="card-content center">
      <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
      <ul class="grey-text">
        <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
          <li><?php echo htmlspecialchars($ing); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="card-action right-align">
      <a class="brand-text" href="#">more info</a>
    </div>
  </div>
</div>

<?php endforeach; ?>

<?php if(count($pizzas) >= 3): ?>
<p>There is more than 3 pizza</p>
<?php else: ?>
<p>There are fewer than 3 pizzas</p>
<?php endif; ?>
		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>