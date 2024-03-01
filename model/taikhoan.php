<?php
    function insert_taikhoan($user,$pass,$email,$address,$tel,$filename){
        $sql="INSERT INTO taikhoan(user,pass,email,address,tel,hinhAnh) VALUES ('$user','$pass','$email','$address','$tel','$filename')";
        pdo_execute($sql);
    }
    function checkUser($user,$pass){
        $sql="SELECT * FROM taikhoan WHERE user='$user' AND pass='$pass'";
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function checkEmail($email){
        $sql="SELECT * FROM taikhoan WHERE email='$email'";
        $tk=pdo_query_one($sql);
        return $tk;
    }
    function update_taikhoan($id,$user,$pass,$email,$address,$tel,$filename){
        if($filename!=""){
            $sql="UPDATE taikhoan SET 
            user='$user',
            pass='$pass',
            email='$email',
            address='$address',
            tel='$tel',
            hinhAnh='$filename' WHERE id=".$id;
                         
        }else{
            $sql="UPDATE taikhoan SET 
            user='$user',
            pass='$pass',
            email='$email',
            address='$address',
            tel='$tel' WHERE id=".$id;
        }
        pdo_execute($sql);
    }
    function loadAll_taikhoan(){
        $sql="SELECT * FROM taikhoan ORDER BY id DESC";
        $listtk=pdo_query($sql);
        return $listtk;
    }
    function changePass($newpass,$id){
        $sql="UPDATE taikhoan SET pass='$newpass' WHERE id=$id";
        pdo_execute($sql);
    }
?>