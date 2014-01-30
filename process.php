
<?php
$con=mysqli_connect("","root","mukti123!","mukti2014");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }




$email=$_POST['email'];
$query="SELECT * FROM reg WHERE Email='".$email."'";
$result = mysqli_query($con,$query);
if (!$result)
  {
  die('Error: ' . mysqli_error());
  }
  else
  {			$array=mysqli_fetch_array($result,MYSQL_NUM);
			// echo $array;
  			if(!$array)
	  		{
	  		
	  		$sql="INSERT INTO reg (Name,Email,Gender,College,phone_no)
			VALUES
			('$_POST[name]','$_POST[email]','$_POST[gender]','$_POST[college]','$_POST[phone_no]')";

			if (!mysqli_query($con,$sql))
			  {
			  die('Error: ' . mysqli_error());
			  }
			$email=$_POST['email'];
			$query="SELECT * FROM reg WHERE Email='".$email."'";
			$result = mysqli_query($con,$query);
			if (!$result)
			  {
			  die('Error: ' . mysqli_error());
			  }
			  $array=mysqli_fetch_array($result,MYSQL_NUM);
			  if($array)
				  {
				  	$post_data = array('id' => $array[0],'presence'=>0);
		  			 echo json_encode($post_data);

				  }
				  else
				  	die("error".mysqli_error());
			}
	  		else
	  		{

	  			$post_data = array('id' => $array[0],'presence' => 1);
	  			 echo json_encode($post_data);
	  		}

  	}
mysqli_close($con);
?>
