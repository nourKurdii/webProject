<?php //include "admin_header.php"; ?>
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
//if(isset($_post['submit'])) {
$m_name = @$_POST['m_name'];
$m_price = @$_POST['m_price'];
$m_type = @$_POST['m_type'];
$m_img = @$_FILES['m_img']['name'];
$m_img_tmp = @$_FILES['n_img']['tmp_name'];
$m_des = @$_POST['m_des'];
$m_no = @$_POST['m_no'];
$targetdir='images/';
$fileName=basename($m_img);
$targetFilePath=$targetdir.$fileName;
$fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(isset($_post['submit'])&& !empty($m_img)){
    $connect = mysqli_connect('localhost', 'root', '', 'takiadb');
    $allowTypes= array('jpg','png','jpeg','gif');
if (file_exists($targetFilePath)){
    if(in_array($fileType,$allowTypes)){
        if(move_uploaded_file($m_img_tmp, $targetFilePath)) {
            $insert_pro="insert into `normalmenutb` (product_name,product_price,product_discreption,product_image,type,numberOfOrders) values
('$m_name','$m_price','$m_des','".$fileName."','$m_type','$m_no')";
            mysqli_query($connect,$insert_pro);
        }
    }
}
}

    //$flag=0;
//if(empty($_COOKIE['flag'])){
//       $flag=0;
//    }
//    else{
//       $flag=(int) $_COOKIE['flag'];
//    }
//setcookie('flag',$flag+1,time()+1000*24*60*60);
//$mimage= 'images/$mimage'.$flag.'.png';
//move_uploaded_file($m_img_tmp,'images/$mimage'.$flag.'.png');
//
//$insert_pro="insert into `normalmenutb` (product_name,product_price,product_discreption,product_image,type,numberOfOrders) values
//('$m_name','$m_price','$m_des','$mimage','$m_type','$m_no')";
//mysqli_query($connect,$insert_pro);
//}
//if (isset($run_pro)){
//    header("location: admin_add_product.php");
//}

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
    <form class="wrapper" action="admin_add_product.php" method="post" enctype="multipart/form-data">
        <div class="title">
            Add Meal
        </div>
        <div class="form">
            <div class="inputfield">
                <input type="text" class="input" name="m_name" required="required" placeholder="Meal Name">
<!--                <span>Meal Name</span>-->
            </div>
            <div class="inputfield">
                <input type="text" class="input" name="m_price" required="required" placeholder="Meal Price">
<!--                <span>Meal Price</span>-->
            </div>
            <div class="inputfield">
<!--                <label>Type</label>-->
                <div class="custom_select">
                    <select name="m_type">
                        <option value="normal" name="m_type">Normal</option>
                        <option value="drink" name="m_type">Drink</option>
                        <option value="desert" name="m_type">Desert</option>
                        <option value="snack" name="m_type">Snack</option>
                    </select>
                </div>
            </div>
            <div class="inputfield">
<!--                <label>Image</label>-->
                <button  name="cstm-btn" onclick="defaultBtnActive()" id="custom-btn">Choose a file</button>
                <input id="defaultBtn" hidden type="file" class="input" name="m_img" required="required" accept="image/png,image/jpeg,image/jpg">
            </div>
            <div class="inputfield">
                <textarea class="textarea" name="m_des" required="required" placeholder="Description"></textarea>
<!--                <span>Description</span>-->
            </div>
            <div class="inputfield">
<!--                <label>No. Of Orders</label>-->
                <input type="text" class="input" name="m_no" required="required" placeholder="No. Of Orders">
<!--                <span>No. Of Orders</span>-->
            </div>

            <div class="inputfield">
                <input type="submit" value="Confirm" class="btn" name="submit">
            </div>
        </div>
    </form>
</div>

</body>
<script>
    function defaultBtnActive(){
        defaultBtn.click();
    }
</script>
</html>

