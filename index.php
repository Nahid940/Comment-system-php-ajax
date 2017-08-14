<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		#result,#done{
			font-size:20px
		}
		.top{
			width:100;
			height:20px;
		
			border-radius:5px;
			background-color:green
		}
		#break{
			height:1px;
			background-color:gray
		}
		.text-line{
			background-color:#fff
		}
		.warning{
			height:30px
		}
	</style>
</head>
<body>
  <div class="container">
  <h1>Comment system</h1>
  <div class="top"></div>
  <hr/>
  <div class="warning">
	<center>
  <span id="done" class="label label-success"></span>
  <span id="result" class="label label-danger"></span>
  </center>	
  </div>
  
  <hr />
  <form class="form-horizontal" action="" id="insertComment">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="name"  name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="comment">Your Comment:</label>
      <div class="col-sm-10">          
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
    </div>

    <div class="form-group" align="right">        
      <div class="col-sm-offset-2 col-sm-10">
        <button  id="button" class="btn btn-success">Post</button>
      </div>
    </div>
  </form>
  
  
  <div class="well">
  <h2>Comments</h2>
  <hr />
	<div id="comment-text">
		
	</div>
  </div>
</div>

</body>

 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
  <script>
       $(document).ready(function(){
		
		  // showData();
		  timeOut();
            $('#insertComment').submit(function(e){
                e.preventDefault();
                var name = $('#name').val();
                var comment = $('#comment').val();
                if(name != '' && comment !=''){
					
					//alert(name);
                    $.ajax({
                        type: "POST",
						async:false,
                        data:{
							"done":1,
                            "name": name,
                            "comment": comment
                        },
                        
                        url: "comment.php",

                        success: function(data){
							
                            //if(data==1){
								
                                $("#name").val("");
                                $("#comment").val("");
										
								
								$("#done").html("Successfully inserted !");
								$( "#done" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                               // $("#done").html("Successfully inserted !");
								//$( "#text" ).toggle( "highlight" );
								//setTimeout(function(){
								//$('#result').fadeOut("slow");
							
			//                            location.reload();
								//},1000);
                           // }else {
                           //    $("#result").html(responseText);

                          // }
							
                        }
                    });
                }else{
					
                    $("#result").text("Fill up each field !!");
					$( "#result" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
					$( "#comment" ).effect( "shake" );
					$( "#name" ).effect( "shake" );
                    $("#name").css('border-color','red');
                    $("#comment").css('border-color','red');
                   /* */
                }
                return false;
            });
			
			
			/*setInterval(function(){
				$("#comment-text").load('comment.php');
			},3000);*/
			
	});
	
	/*function showData(){
		$.ajax({
			url:"comment.php",
			type:"POST",
			async:false,
			data:{
				"comment":1
			},
			success: function(data){
				$("#comment-text").html(data);
			},
		})
	}*/
	function timeOut(){
		
		setTimeout(function(){
			update();
			timeOut();
		},100);
	}
	
	function update(){
		$.getJSON('retrievecomment.php',function(data){
			$("#comment-text").empty();
			$.each(data.result,function (){
				$("#comment-text").append("<div id='text-line'><p>Commented by "+this['name']+"---"+"<b>"+this['comment']+ "</b>"+" on " +"<?php date_default_timezone_set('Asia/Dhaka'); echo date("d-m-Y")." ".date("h:i:a") ?></p> <div id='break'></div></div>");
			});
			
		});
	}
	
</script>



</body>
</html>