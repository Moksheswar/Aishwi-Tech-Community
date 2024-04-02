<?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=$_POST['uname'];
            $pass=$_POST['pass'];
            $email=$_POST['email'];
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
            $sql="select * from atsignup where email='$email'";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            if($num<1){
                $sql="INSERT INTO `atsignup` (`uname`, `pass`, `email`) VALUES ('$name', '$pass', '$email')";
                $result=mysqli_query($conn,$sql);
                if($result){
                    echo "<script>window.location.href='./login.html'</script>";
                }
                else{
                    echo "<script>window.location.href='./login.html'</script>";
                    echo "<script>alert('error in signup')</script>";
                }
            }
            else{
                echo "<script>sessionStorage.setItem('redirect',true)</script>";
                echo "<script>window.location.href='./signup.html'</script>";
            }
        }

    ?>