<?php
require "form-proc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="./Css/Form.css">
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
    <div class="body">
        <div class="forms">
            <div id="heading">
                <h1>Registration Form</h1>
            </div>
            <form action="" method="post">
                <label for="user-type">User Type:</label>
                <select name="user-type" id="user-type" onchange="showForm()">
                    <option value="">Select User Type</option>
                    <option value="student">Student</option>
                </select>
            </form>
            <form id="student-form" style="display: none;" action="" method="post">
                <section id="Personal">
                    <label for="title">Title</label><br>
                    <select name="title" id="">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                        <option value="Adv">Adv</option>
                        <option value="Dr">Dr</option>
                    </select>
                    <br>
                    <label for="">Full Name</label><br>
                    <input type="text" name="fullName" id="fullName"><br>
                    <label for="">Surname</label><br>
                    <input type="text" name="surname" id="surname"><br>
                    <label for="">Maiden Name</label><br>
                    <input type="text" name="maidenName" id="maidenName"><br>
                    <label for="m-citizen">Are you a South Citizen</label><br>
                    <select name="citizen" id="s_citizen">
                        <option value="">Select User Type</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select><br>
                    <div id="s_idNumber" style="display: none;">
                        <label for="">ID Number</label><br>
                        <input type="text" name="idNum" id="idNum"><br>
                    </div>
                    <div id="s_passport" style="display: none;">
                        <label for="">Passport Number</label><br>
                        <input type="text" name="passport" id="passPortNum"><br>
                    </div>
                    <label for="">Ethnicity</label><br>
                    <input type="text" name="ethnicity" id="ethnicity" placeholder="e.g African">
                    <br>
                    <label for="">Marital Status</label><br>
                    <select name="maritalStatus" id="">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                    <br>
                    <label for="">Home Language</label><br>
                    <input type="text" name="HL" id="HL"><br>
                    <div id="s_saNumber">
                        <label for="">Cell Phone Number:</label><br>
                        <input type="text" name="saNumber" id="saNumber" placeholder="+27"><br>
                    </div>
                </section>
                <section>
                    <h1>Residence Information</h1>
                    <label for="s_residence">Name of the residence you currently stay</label><br>
                    <input type="text" name="s_residence" id="">
                </section>
                <section>
                    <h1>Address Information</h1>
                    <label for="">Home Address</label><br>
                    <input type="text" name="Address" id="Address"><br>
                    <label for="city">Name of city</label><br>
                    <input type="text" name="city" id=""><br>
                    <label for="province">Name of province</label><br>
                    <input type="text" name="province" id=""><br>
                    <label for="">Postal Code</label><br>
                    <input type="text" name="postalCode" id="postalCode"><br>
                    <button type="submit" name="s_submit">Submit</button>
                </section>
            </form>
            <form id="manager-form" style="display: none;">
                <section id="Personal">
                    <h1>Personal Information</h1>
                    <label for="title">Title</label><br>
                    <select name="title" id="">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Ms">Ms</option>
                        <option value="Adv">Adv</option>
                        <option value="Dr">Dr</option>
                    </select>
                    <br>
                    <label for="">Full Name</label><br>
                    <input type="text" name="fullName" id="fullName"><br>
                    <label for="">Surname</label><br>
                    <input type="text" name="surname" id="surname"><br>
                    <label for="">Maiden Name</label><br>
                    <input type="text" name="maidenName" id="maidenName"><br>
                    <label for="m-citizen">Are you a South Citizen</label><br>
                    <select name="citizen" id="m-citizen">
                        <option value="">Select User Type</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select><br>
                    <div id="idNumber" style="display: none;">
                        <label for="">ID Number</label><br>
                        <input type="text" name="idNum" id="idNum"><br>
                    </div>
                    <div id="passport" style="display: none;">
                        <label for="">Passport Number</label><br>
                        <input type="text" name="passport" id="passPortNum"><br>
                    </div>
                    <label for="">Ethnicity</label><br>
                    <input type="text" name="ethnicity" id="ethnicity" placeholder="e.g African">
                    <br>
                    <label for="">Marital Status</label><br>
                    <select name="maritalStatus" id="">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                    <br>
                    <label for="">Home Language</label><br>
                    <input type="text" name="HL" id="HL"><br>
                </section>
                <section>
                    <h1>Residence Information</h1>
                    <label for="m_residence">Name of the residence you Manager</label><br>
                    <input type="text" name="m_residence" id="">
                </section>
                <section>
                    <h1>Contact Information</h1>
                    <label for="number">Do you have South African Cell Phone Number?</label><br>
                    <select name="m_number" id="m_number">
                        <option value="">Select User Type</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select><br>
                    <div id="saNumber" style="display: none;">
                        <label for="">South African Cell Phone Number:</label><br>
                        <input type="text" name="saNumber" id="saNumber"><br>
                    </div>
                    <div id="number" style="display: none;">
                        <label for="">International Cell Phone Number(only if no SA cell nr):</label><br>
                        <input type="text" name="number" id="number"><br>
                    </div>
                    <label for="work">Work Telephone Number:</label><br>
                    <input type="text" name="workT" id=""><br>
                    <label for="home">Home Telephone Number:</label><br>
                    <input type="text" name="homeT" id="">
                </section>
                <section>
                    <h1>Address Information</h1>
                    <label for="">Home Address</label><br>
                    <input type="text" name="Address" id="Address"><br>
                    <label for="city">Name of city</label><br>
                    <input type="text" name="city" id=""><br>
                    <label for="province">Name of province</label><br>
                    <input type="text" name="province" id=""><br>
                    <label for="">Postal Code</label><br>
                    <input type="text" name="postalCode" id="postalCode"><br>
                    <button type="submit" name="m_submit">Submit</button>
                </section>
            </form>
        </div>
        <img id="image" src="./images/hero-img.png" alt="">
    </div>

    <script src="./Javascript/form.js"></script>
</body>
</html>
