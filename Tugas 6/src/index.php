<?php 
	include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Form</title>
	<link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/960_16_col.css">
</head>
<body class="container_16">
    <nav class="grid_16">
        <a href="#" class="button grid_2"><span>Home</span></a>
        <a href="form.php" class="button grid_2"><span>Form</span></a>
    </nav>

    <main class="grid_16">
    	<div id="main-content">
			<h2 class="grid_16 alpha omega">Data Profile</h2>
			<div id="table-data" class="grid_16 alpha omega">
				<table border=1>
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama</th>
							<th>Roles</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM `profile`";
						$result = mysqli_query(connection(), $query);
					
						while ($data = mysqli_fetch_array($result)): ?>
							<tr>
								<td><?php echo $data['no'];?></td>
								<td><?php echo $data['nama'];?></td>
								<td><?php echo $data['roles'];?></td>
								<td><?php echo $data['phone'];?></td>
								<td align="center">
									&nbsp;
									<a href="<?php echo "view-profile.php?no=".$data['no'];?>"> View</a>
									&nbsp;|&nbsp;
									<a href="<?php echo "update.php?no=".$data['no']; ?>"> Update</a>
									&nbsp;|&nbsp;	
									<a href="<?php echo "delete.php?no=".$data['no']; ?>"> Delete</a>
									&nbsp;
								</td>
							</tr>
					<?php 
						endwhile ?>
					</tbody>
				</table>
			</div>
		</div>
	</main>
	
	<footer class="grid_16">
        <p>Made with &#10084; by @mramirid</p>
    </footer>
</body>
</html>