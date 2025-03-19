<?php
   include("common/db.php");
   if(isset($_POST['submit'])){
    $id=$_POST['id'];
    // $tn=$_POST['name'];
    $st=trim($_POST['str']);
    $se=trim($_POST['sem']);
    $sa=strtoupper($_POST['subject']);
    $da=$_POST['date'];

  if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
   

   $bf=$_FILES['file']['tmp_name'];
   $fn=time().$_FILES['file']['name'];
   // $fs=$_FILES['file']['size'];
   $fx=end(explode('.',$fn));

   if($fx=='pdf'){
    
    $mg="SELECT * FROM ggi where gid='$id'";
    $r=$con->query($mg);
    $rows =$r->fetch_assoc();
    unlink("../pdf/".$rows['pdf']);

    move_uploaded_file($bf,"../pdf/".$fn);
    $ser="UPDATE ggi SET stream='$st',sem='$se',subject='$sa',date='$da',pdf='$fn' where gid = '$id'";
   }else{
    header("location: edit.php?eid=$id");
   }
  }else{
   $bf="";
   $fn="";
  // $fs="";
   $fx="";
   $ser="UPDATE  ggi SET stream='$st',sem='$se',subject='$sa',date='$da' where gid = '$id'";
  }
     $ss=array(
      'sid'=>$st,
      'sem'=>$se,
      'sub'=>$sa
     );
     $ss=http_build_query($ss);
     if($con->query($ser)){
      header("location: main.php?$ss");
    }
   
}



?>