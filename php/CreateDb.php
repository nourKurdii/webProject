<?php


class CreateDb
{
    public $serverName;
    public $userName;
    public $password;
    public $dbName;
    public $tableName;
    public $con;
    public $conn;


    //constructor
    public function __construct(
        $dbName="NewDb",
        $tableName="ProductDb",
        $serverName="localhost",
        $userName="root",
        $password=""
    ){
        $this->dbName=$dbName;
        $this->tableName=$tableName;
        $this->serverName=$serverName;
        $this->userName=$userName;
        $this->password=$password;


        //create connection
        $this->con=mysqli_connect($serverName,$userName,$password);

        //check connection
        if(!$this->con){
            die("Connection failed:".mysqli_connect_error());
        }

        //query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($serverName, $userName, $password, $dbName);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tableName;";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

        }else{
            return false;
        }
    }

    // get product from the database
    public function getData(){
        $sql = "SELECT * FROM $this->tableName";

        $result = mysqli_query($this->con, $sql);
        if (!empty($result)) {
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        }
        else{
            print "No results: " . $sql;
        }
    }
    public function updateData($number,$id){
        $this->conn=mysqli_connect($this->serverName,$this->userName,$this->password,$this->dbName);
        $sql = "UPDATE NormalMenuTb SET numberOfOrders=$number WHERE id=$id";
        if (mysqli_query($this->con, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $this->con->error;
        }
    }

}