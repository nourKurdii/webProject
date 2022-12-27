<?php
session_start();
require_once('./php/CreateDb.php');
$database = new CreateDb("TAKIADb","sales");
$months=array(0,0,0,0,0,0,0,0,0,0,0,0);
if(isset($_POST['gen'])){
    if($_POST['product']!=""){
        $result = $database->getData();
        if(isset($result))
            while ($row = mysqli_fetch_assoc($result)){
                if($row['product_name']==$_POST['product']){
                    $d = date_parse_from_format("Y-m-d", $row['buy_date']);
                    if (date('Y') == $d["year"])
                        $months[$d["month"]-1]+=1;
                }
            }
    }
    else{
        echo '<script type="text/javascript">alert("Please enter the name of the product first")</script>';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TAKIA</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Cabin|Herr+Von+Muellerhoff|Source+Sans+Pro:400,900&display=swap');
        /*Global styles*/
        *,
        *::before,
        *::after{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root{
            --main-font: 'Source Sans Pro', sans-serif;
            --secondary-font: 'Herr Von Muellerhoff', cursive;
            --body-font: 'Cabin', sans-serif;
            --main-font-color-dark: #252525;
            --secondary-font-color: #c59d5f;
            --body-font-color: #817b7b;
        }
        .logo{
            color: white ;
            font-size: 30px;
            height: 75px;
        }
        body{
            overflow-x: hidden;
            background-color: white;
        }
        .container{
            width: 100%;
            max-width: 122.5rem;
            margin: 0 auto;
            padding: 0 2.4rem;
        }
        header{
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            height: 55px;
            background-color: black;
            /*background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5),transparent);*/
        }

        .nav{
            height: 7.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .title{
            text-align: center;
            align-items: center;
            alignment: center;
            width: 1200px;
            margin:100px auto;
        }
        .btn{
            border: 1px solid #121212;
            border-radius: 3px;
            font-size: 14px;
            font-weight: 500;
        }

    </style>
</head>
<body >
<header>
    <div class="container">
        <nav class="nav">
            <a href="index.html" class="logo">Takia</a>
        </nav>
    </div>
</header>
<div class="title">
    <form action="chart.php" method="post">
        <input type="text" name="product" maxlength="100">
        <input type="submit" value="Generate" name="gen" style="background-color: palegoldenrod" class="btn">
    </form>
    <div align="center" style="max-width:50%; max-height: 50px; position: center;">
        <canvas id="myChart" width="20px" height="20px" style="alignment: center"></canvas>
        <script>
            const Yvalues = <?php  echo json_encode($months);  ?>;
            const ctx = document.getElementById('myChart').getContext('2d');
            const xLables = [];
            for (var i = 1; i < 13; i++) {
                xLables[i - 1] = i;
            }
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: xLables,
                    datasets: [{
                        label: 'How many times has this product been sold?',
                        data: Yvalues,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

        </script>
    </div>
</div>
</body>
</html>