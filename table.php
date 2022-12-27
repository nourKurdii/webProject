<!Doctype html>
<html lang="en" dir="ltr">
<head></head>
<style>
    .contentTable{
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9rem;
        min-width: 400px;
    }
    .contentTable thead tr{
        background:#121212;
        color: white;
        text-align: left;
        font-weight: bold;
    }
    .contentTable th,
    .contentTable td{
        padding: 12px 15px;
    }
    .contentTable tbody tr{
        border-bottom: 1px solid black;
        text-align: left;
    }

</style>
<body>
<table class="contentTable">
    <thead>
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
    </tr>
    </thead>
    <?php
    $conn=mysqli_connect("localhost","root","","takiadb");
    if($conn->connect_error){
        echo "database error";
    }
    $sql="SELECT id, person, email, message FROM contact";
    $result=$conn->query($sql);
    if($result->num_rows >0){
        while ($row=$result->fetch_assoc()){
            echo "<tbody><td><td>".$row["id"]."</td><td>".$row["person"]."</td><td>".$row["email"]."</td><td>".$row["message"]."</tbody></td><tr>";
        }
        echo "</table>";
    }
    else{
        echo "0 result";
    }
    $conn->close();
    ?>
</table>
</body>