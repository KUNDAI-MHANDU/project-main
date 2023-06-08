<?php
session_start();
require "./Config/server.php";
require_once "functions.php";

$requestId = request_id();
$attachmentId = attachment_id();
$catogory = 'Furniture';
if (isset($_POST["W_E"])){

    $description = sanitizeInput($_POST["ProblemDescription"]);
    $studendId = mysqli_real_escape_string($conn, $_SESSION['student_id']);

    $query = "INSERT INTO `maintenance_requests` (`request_id`, `student_id`, `category`, `description`, `timestamp`) 
            VALUES ('$requestId', '$studendId', '$catogory', '$description', NOW())";

    if (mysqli_query($conn, $query)){
        
		if (isset($_FILES['my_image'])){

			echo "<pre>";
			print_r($_FILES['my_image']);
			echo "</pre>";

			$img_name = $_FILES['my_image']['name'];
			$img_size = $_FILES['my_image']['size'];
			$tmp_name = $_FILES['my_image']['tmp_name'];
			$error = $_FILES['my_image']['error'];

			if ($error === 0) {
				if ($img_size > 125000) {
					$em = "Sorry, your file is too large.";
					header("Location: furniture.php?error=$em");
				}else {
					$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
					$img_ex_lc = strtolower($img_ex);

					$allowed_exs = array("jpg", "jpeg", "png"); 

					if (in_array($img_ex_lc, $allowed_exs)) {
						$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
						$img_upload_path = 'uploads/'.$new_img_name;
						move_uploaded_file($tmp_name, $img_upload_path);

						// Insert into Database $new_img_name
						$sql = "INSERT INTO `attachments` (`attachment_id`, `request_id`, `file_name`, `student_id`, `upload_date`) 
							VALUES ('$attachmentId', '$requestId','$new_img_name', '$studendId', NOW())";
						mysqli_query($conn, $sql);
						header("Location: complaint-sent.php");
					}else {
						$em = "You can't upload files of this type";
						header("Location: furniture.php?error=$em");
					}
				}
			}else {
				header("Location: complaint-sent.php");
			}
		}else {
			$sql = "INSERT INTO `attachments` (`attachment_id`, `request_id`, `student_id`, `upload_date`) 
					VALUES ('$attachmentId', '$requestId', '$studendId', NOW())";

			if (mysqli_query($conn, $sql)){
				header("Location: complaint-sent.php");;
			}
		}
    }

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
			<li>
				<a href="dashboard.php">
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
			<li class="active">
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
					<h1>Furniture</h1>
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
				<span class="text">
                    <h3>Hello:</h3><br>
                    <p style="font-size: 1.5rem;"><?php echo $_SESSION['username'].' '.$_SESSION['surname']?></p>
                </span>
				<a href="#" class="btn-download" style="visibility: hidden;">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>

			<ul class="box-info" style="visibility: hidden;">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>5</h3>
						<p>New Complaints</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>20</h3>
						<p>Total Complaints</p>
					</span>

				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>10</h3>
						<p>Completed Complaints</p>
					</span>
				</li>
			</ul>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Problem</h3>
                            <i class='bx bx-search' ></i>
                            <i class='bx bx-filter' ></i>
                        </div>
                        <section> 
                            <label for="ProblemDescription"> Please be specific and give in full details of the Problem or the Repair Needed</label><br><br>
                            <textarea id="descriptionBox" name="ProblemDescription" cols="30" rows="10"></textarea>

                        </section>
                    </div>
                    <div class="todo">
                        <div class="head">
                            <h3>Upload picture(Optional)</h3>
                            <i class='bx bx-plus' ></i>
                            <i class='bx bx-filter' ></i>
                        </div>
                        <ul class="todo-list">
                            <section class="desc">
								<input type="file" name="my_image">
                            </section>
                        </ul>
                    </div>
                </div>
                <button id="W_E" type="submit" name="W_E">Submit</button>
            </form>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/STUDENTAID/Javascript/dashboard.js"></script>
</body>
</html>