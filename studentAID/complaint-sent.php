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
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Information Successfully Sent</h1>
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
					<img src="imgage/people.png" style="width: 300px;">
				</a>
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

            <form action="" method="post">
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Message</h3>
                            <i class='bx bx-search' ></i>
                            <i class='bx bx-filter' ></i>
                        </div>
                        <section class="possible"> 
                            <p>Your Complaint Has Been Successfully Sent And Shall Be Processed</p>
                        </section>
                    </div>
                </div>
            </form>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/STUDENTAID/Javascript/dashboard.js"></script>
</body>
</html>