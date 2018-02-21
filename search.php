<?php
//phpinfo();
if(isset($_POST['search'])){
	$con = mysqli_connect("localhost", "root", "", "test") or die("could not find database");
	$search = $_POST['search'];
	$query = mysqli_query($con, "SELECT * FROM try WHERE id LIKE '$search'") or die("could not search!");
	$rows = mysqli_fetch_assoc($query);
	echo '<br/>';
	echo 'id: '. $rows['id'] . '<br/>' . 'no: ' . $rows['no'];
}
?>

<!DOCTYPE html>
<html>
    <body>
		<table>
			<tr>
				<th>id</th>
			</tr>
			
			<?php
			$conn = mysqli_connect('localhost','root', '', 'test');
			if($conn-> connect_error){
				die("Connection failed:".$conn->connect_error);
			}
			
			$sql = "SELECT id, no from try";
			$result = $conn->query($sql);
			
			if($result->num_rows>0){
				while($row = $result-> fetch_assoc()){
					echo "<tr><td>". $row["id"] . "</td><td>".$row["no"]. "</td></tr>";
				}
				echo "</table>";
			}
			else{
				echo "0 result";
			}
			
			$conn->close();
			?>
		</table>
		
		<form action="search3.php" method="POST">
		<!--form method="POST"-->
			<input type="text" name="search">
			<input type="submit" name="button" value="search">
		</form>
    </body>

</html>