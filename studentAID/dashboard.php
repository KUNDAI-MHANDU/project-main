<?php
session_start();
require_once "./Config/server.php";

$studentid = $_SESSION['student_id'];
if(empty($_SESSION['username']) && empty($_SESSION['surname'])){

    header("Location: form.php");
    
}else{

    $query = "SELECT student_id, category, description, timestamp, status
          FROM maintenance_requests
		  WHERE student_id = '$studentid'
          ORDER BY timestamp DESC
          LIMIT 4";

	$result = mysqli_query($conn, $query);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="/STUDENTAID/Css/dashboard.css">

	<title>StudentHub</title>
</head>
<body>

	<div class="header">
        <div class="main-logo">
            <img src="./images/logo.png" alt="easyclass" />
            <h4 id="AID">Student AID</h4>
        </div>
        <div class="navbar">
            <a href="homepage.php">Home</a>
            <a href="dashboard.php">Maintenance</a>
            <a href="whereAbout.html">WhereAbout</a>
			<a href="admin-dash.php">Admin</a>
        </div>
        <div class="signup">
            <a id="Signup" href="signout.php">Sign Out</a>
        </div>
    </div>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
            <!-- <img src="./images/logo.png" alt="StudentAID" />
			<span class="text">StudentAID</span> -->
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-user-rectangle' ></i>
					<span class="text">My Profile</span>
				</a>
			</li>
			<li>
				<a href="electriWater.php">
					<i class='bx bx-water' ></i>
					<span class="text">Water And Electricity</span>
				</a>
			</li>
			<li>
				<a href="furniture.php">
					<i class='bx bx-chair'></i>
					<span class="text">Furniture</span>
				</a>
			</li>
			<li>
				<a href="others.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Others</span>
				</a>
			</li>
			<li>
				<a href="viewComplaints.php">
					<i class='bx bx-low-vision' ></i>
					<span class="text">View Complaints</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="signout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<!-- <a href="#" class="nav-link">Categories</a> -->
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search..."> -->
					<button type="submit" class="search-btn" style="visibility: hidden;"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<!-- <img src="img/people.png"> -->
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="#" class="profile">
					<!-- <img src="imgage/people.png" style="width: 300px;"> -->
				</a>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo date('d-m-Y'); ?></h3>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>Hello:</h3><br>
						<p style="font-size: 1.5rem;"><?php echo $_SESSION['username'].' '.$_SESSION['surname']?></p>
					</span>

				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Maintenance Complaints</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Complaints</th>
								<th>Discription</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Display the fetched data
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>';
								echo '<td>' . $row['category'] . '</td>';
								echo '<td>' . $row['description'] . '</td>';
								echo '<td>' . $row['timestamp'] . '</td>';
								echo '<td>' . $row['status'] . '</td>';
								echo '</tr>';
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Todo</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/STUDENTAID/Javascript/dashboard.js"></script>
</body>
</html>