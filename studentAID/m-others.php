<?php
require "./Config/server.php";
$category = 'Others';
if(isset($_POST['update'])){
    $requestId = $_POST['request_id'];
    $status = $_POST['status'];

    // Update the status in the database
    $updateQuery = "UPDATE maintenance_requests SET status = '$status' WHERE request_id = '$requestId'";
    mysqli_query($conn, $updateQuery);
}
$query = "SELECT maintenance_requests.request_id, maintenance_requests.category, maintenance_requests.description, maintenance_requests.timestamp, maintenance_requests.status, students.name
          FROM maintenance_requests
          INNER JOIN students ON maintenance_requests.student_id = students.student_id
          WHERE maintenance_requests.category = '$category'
          ORDER BY maintenance_requests.timestamp DESC";

$result = mysqli_query($conn, $query);


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

	<title>AdminHub</title>
	<style>
		table tbody tr {
			border-bottom: 1px solid #ccc;
		}
	</style>
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
			<li>
				<a href="admin-dash.php">
                    <i class='bx bxs-user-rectangle' ></i>
					<span class="text">My Profile</span>
				</a>
			</li>
			<li>
				<a href="m-waterE.php">
                    <i class='bx bx-water' ></i>
					<span class="text">Water And Electricity</span>
				</a>
			</li>
			<li>
				<a href="m-furn.php">
                    <i class='bx bx-chair'></i>
					<span class="text">Furniture</span>
				</a>
			</li>
			<li class="active">
				<a href="m-others.php">
                    <i class='bx bxs-message-dots' ></i>
					<span class="text">Others</span>
				</a>
			</li>
			<li>
				<a href="m-view.php">
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
					<h1>Others</h1>
					<ul class="breadcrumb" style="visibility: hidden;">
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
				<a href="#" class="btn-download" style="visibility: hidden;">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

            <form action="" method="post">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>All Complaints</h3>
                            <i class='bx bx-search' ></i>
                            <i class='bx bx-filter' ></i>
                        </div>
                        <table>
						<thead>
							<tr>
								<th>Student Name</th>
                                <th>Complaints</th>
                                <th>Description</th>
                                <th>Date</th>
								<th>Image</th>
                                <th>Status</th>
                                <th>Update Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Display the fetched data
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['category'] . '</td>';
                                echo '<td>' . $row['description'] . '</td>';
                                echo '<td>' . $row['timestamp'] . '</td>';

								$imageQuery = "SELECT * FROM attachments WHERE request_id = '{$row['request_id']}'";
								$imageResult = mysqli_query($conn, $imageQuery);
							
								echo '<td>';
								while ($imageRow = mysqli_fetch_assoc($imageResult)) {
									if (!empty($imageRow['file_name'])) {
										$imagePath = 'uploads/' . $imageRow['file_name'];
										echo '<img src="' . $imagePath . '" alt="Complaint Image" style="width: 100px; height: 100px;"><br>';
									}
								}
								echo '</td>';
                                echo '<td>' . $row['status'] . '</td>';
                                echo '<td>';
                                echo '<form action="" method="post">';
                                echo '<input type="hidden" name="request_id" value="' . $row['request_id'] . '">';
                                echo '<select name="status">';
                                echo '<option value="complaint_received">Complaint Received</option>';
                                echo '<option value="work_in_progress">Work in Progress</option>';
                                echo '<option value="completed">Completed</option>';
                                echo '</select>';
                                echo '<button type="submit" name="update">Update</button>';
                                echo '</form>';
                                echo '</td>';
                                echo '</tr>';
							}
							?>
						</tbody>
					</table>
                    </div>
                    <!-- <div class="todo">
                        <div class="head">
                            <h3>Decription(Optional)</h3>
                            <i class='bx bx-plus' ></i>
                            <i class='bx bx-filter' ></i>
                        </div>
                        <ul class="todo-list">
                            <section class="desc">
                                <label for="ProblemDescription"> Please be specific and give in full details of the Problem or the Repair Needed</label><br><br>
                                <textarea id="descriptionBox" name="ProblemDescription" cols="30" rows="10"></textarea>
                            </section>
                        </ul>
                    </div> -->
                </div>
            </form>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/STUDENTAID/Javascript/dashboard.js"></script>
</body>
</html>