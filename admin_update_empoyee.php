<?php
require_once('./php/CreateDb.php');
$database = new CreateDb("TAKIADb","admin");
$sql = "SELECT * FROM $database->tableName";
$admin_image="";
$admin_name="";
$result = mysqli_query($database->con, $sql);
if (!empty($result)) {
    while ($row = mysqli_fetch_assoc($result)){
        if($row['a_name']=='maya'){
            $admin_image=$row['image'];
            $admin_name=$row['a_name'];
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="admin_nextpage.css">
    <link rel="stylesheet" href="addpro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script type="text/javascript">
        function deleteCookie(){
            setcookie("aname", "", time() - 3600);
            //need more code to not be available when logout until the admin return and logged in again
        }
    </script>
</head>

<body>
<input type="checkbox" id="check">
<header>
    <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
        <h3>Welcome to <span>Takia</span></h3>
    </div>
    <div class="right_area">
        <a href="admin_login.php" class="logout_btn" onclick="deleteCookie()">Logout</a>
    </div>
</header>
<div class="sidebar">
    <center>
        <?php
        echo "<img src='$admin_image' height='150px' width='150px' class='profile_image' alt=''>";
        echo "<h4>$admin_name</h4>";
        ?>
    </center>
    <a href="admin_nextpage.php"><i class="fab fa-firstdraft"></i><span>Main Page</span></a>
    <a href="admin_add_product.php"><i class="fas fa-plus-square"></i><span>Add Meal</span></a>
<!--    <a href="admin_delete_product.php"><i class="fas fa-minus-square"></i><span>Delete Meal</span></a>-->
    <a href="admin_update_product.php"><i class="fas fa-edit"></i><span>Update Meal</span></a>
    <a href="admin_add_empoyee.php"><i class="fas fa-user-plus"></i><span>Add Employee</span></a>
<!--    <a href="admin_delete_empoyee.php"><i class="fas fa-user-minus"></i><span>Delete Employee</span></a>-->
    <a href="admin_update_empoyee.php"><i class="fas fa-user-edit"></i><span>Update Employee</span></a>
    <a href="chart.php"><i class="far fa-calendar-times"></i><span>Sales</span></a>

</div>

<div class="content">
    <!--form-->
    <form class="wrapper" action="admin_add_product.php" method="post" enctype="multipart/form-data">
        <div class="title">
            Make changes at Employee Info.
        </div>
        <div class="form">
            <input type="radio" id="update" name="choose" value="update">
            <label for="update">Update</label>
            <input type="radio" id="delete" name="choose" value="delete">
            <label for="delete">Delete</label>
            <div class="inputfield">
                <input type="text" class="input" name="m_name" required="required" placeholder="Employee Name">
            </div>
            <div class="inputfield">
                <input type="text" class="input" name="m_price" PLACEHOLDER="Job Title">
            </div>
            <div class="inputfield">
                <!-- <label>Image</label>-->
                <!-- <input type="file" class="input" name="m_img" required="required" accept="image/png,image/jpeg,image/jpg">-->
                <button  name="cstm-btn" onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
                <input id="defaultBtn" hidden type="file" class="input" name="e_img" required="required" accept="image/png,image/jpeg,image/jpg">

            </div>
            <div class="inputfield">
                <textarea class="textarea" name="m_des" placeholder="New Description"></textarea>
                <!--                    <span>New Description</span>-->
            </div>

            <div class="inputfield" >
                <input type="submit" value="Update" class="btn" name="submit" style="margin: 4px">
                <input type="submit" value="Delete" class="btn" name="submit" style="margin: 4px">
            </div>
        </div>
    </form>

</div>

</body>
</html>


