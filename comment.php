<?php

include('dbconnection.php');
$mycon=new dbconnection();
if(isset($_POST['done'])){
    $insert_comment=array(
        'name'=>mysqli_real_escape_string($mycon->con,$_POST['name']),
        'comment'=>mysqli_real_escape_string($mycon->con,$_POST['comment']),
    );
    
    if($mycon->insertIntoCommentTable('comment',$insert_comment)){
        echo 1;
    }else{
        echo mysqli_errno($mycon->con);
    }
}



/*if(isset($_POST['comment'])){
			//include ('dbconnection.php');
			$con=mysqli_connect("localhost","root","","comment");
			$query="select comment from comment";
			$result=mysqli_query($con,$query);
			
			$rowcount=mysqli_num_rows($result);
			
			if($rowcount>0){
			
				while($row=mysqli_fetch_array($result)){
					
					?>
				<div id="comment-box">
					
					<p><?php echo $row['comment']?></p>
				</div>
				<?php }
				exit();
			}
}*/
?>
