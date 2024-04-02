<?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=$_POST['uname'];
            $pass=$_POST['pass'];
        }
        $servername="localhost";
        $username="root";
        $password="";
        $database="at";
        $conn=mysqli_connect($servername,$username,$password,$database);
        if(!$conn){
            die("error in connection" . mysqli_connect_error());
        }
        else{
            $sql="select * from atsignup where uname='$name' and pass='$pass'";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            if($num==1){
                echo "<script>localStorage.setItem('valid',true);</script>";
                echo "<script>sessionStorage.setItem('name',$name);</script>";
                echo "<script>window.location.href='./home.html'</script>";
            }
            else{
                echo "<script>window.location.href='./signup.html'</script>";
            }
        }
    ?>