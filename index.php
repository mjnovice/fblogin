<script src="jquery-1.7.2.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=183216621874530";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<head>

<style type="text/css">
#maincontent{
	visibility: hidden;
}
#fb_btn{
	visibility:visible;
	
	
}	
#form_btn
{
  visibility:hidden;
  }
  
  body
  {
    background-attachment:fixed;
  }
    td
    {
        font-family:'Open Sans';
        font-size:x-large;
        border:none;
    }

    td .l
    {
        line-height:4.2em;
        text-align:center;
        width:50%;
        height:20%;
        color:Teal;
        border:none;
    }
	
  .butt
      {
	  font-family:'Open Sans Condensed';
	  font-weight:bold;
	  font-size:medium;
	  
      }   	
	
}
</style>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<link rel="Stylesheet" type="text/css" href="dist/css/bootstrap.css"/>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    
<link rel="Stylesheet" type="text/css" href="dist/js/bootstrap.js"/>

</head>

<body background="reg1.jpg" >

<center>
<a href="#" onclick="fb_connect(); return false;" id="fb_id">
			<img src="fb.jpg" id="fb_btn" style="margin-left:20px;margin-top:285px;width:300px;"></center>
</a>
			



<center>
<table id="maincontent" class="table table-condensed table-responsive table-striped table-hover" visible="false" style="margin-top:-310px;width:50%;background-color:rgba(255,255,255,0.8);border:none;height:500px;margin-top:">
<tbody>


	          <tr>
		  <td class="l" style="line-height:4em;width:50%;text-align:center">Name</td>
		  <td style="padding-right:20px;opacity:0.8">
		  <input type="text" name="name" id="name" class="form-control" style="height:60%;margin-top:8%;color:Teal">
	          </td>
	          </tr>
	          <tr>
		    <td class="l" style="line-height:4em;width:50%;text-align:center">
	          	Email
	           </td>
	           <td style="padding-right:20px;opacity:0.8">
	           <input type="text" name="email" id="email" class="form-control" style="height:60%;margin-top:8%;color:Teal">
	          	
	          </td>
	          </tr>
	          <tr>
	          <td class="l" style="line-height:4em;width:50%;text-align:center">
	          College
	          </td>
	          <td style="padding-right:20px;opacity:0.8">
	          <input type="text" name="college" id="college" class="form-control" style="height:60%;margin-top:8%;color:Teal">
	          	
	          </td>
	          </tr>
	          <tr>
	          <td class="l" style="line-height:4em;width:50%;text-align:center">
	          
	          	Phone No </td>
	          <td style="padding-right:20px;opacity:0.8">
		    <input type="text" name="phone_no" id="phone_no" class="form-control" style="height:60%;margin-top:8%;color:Teal">    
		 </td>
		 </tr>
		 <tr>
				
		</tr>
		</tbody>
		

</table>			
		  <center>
				<input type="button" value="Submit" id="form_btn" class="btn btn-info btn-lg" style="text-align:center;height:60px;width:160px;font-family:Open Sans;font-size:xx-large;opacity:0.8" onclick="fb_func(); return false;">
				<center>	
				

			
<script>

	var gender = ""; 
function fb_connect(){
FB.login(function(response) {
    if (response.authResponse) {
      var uid = response.authResponse.userID;
      accessToken = response.authResponse.accessToken;
      FB.api('/me?fields=id,name,email,location,gender,education', function(info) {
	        this.access=accessToken;
			var college= "";
			gender = info.gender;
			for (var i = 0; i<info.education.length; i++) {
			 if(info.education[i].type === "College")
			 	college = info.education[i].school.name;
			}
			$("#name").val(info.name);
			$("#email").val(info.email);
			$("#college").val(college);
			$("#maincontent").css("visibility","visible");
			$("#form_btn").css("visibility","visible");
			 $("#fb_btn").css("visibility","hidden");
		});

    } else {
      //User is not logged in.to Facebook at all
      location.reload();
      //window.top.location ='https://www.facebook.com/index.php';
    }
  },{scope:'user_about_me,email,user_location,user_education_history'});

	 // Load the SDK's{} source Asynchronously
  // Note that the debug version is being actively developed and might
  // contain some type checks that are overly strict.
  // Please report such bugs using the bugs tool.

}
function fb_func(){
	
	$("#overlay").css("visibility","hidden");
	$.post("process.php",{name:$("#name").val(),email:$("#email").val(),gender:gender,college:$("#college").val(),phone_no:$("#phone_no").val()}, function(data){
	console.log(data);
			var obj = $.parseJSON(data);
	    console.log(obj);
	    var ss="";
		if (obj.presence===1)
			ss="User already present, with MUKTI id:  "+obj.id;
		else
			ss="Registration successfull, with MUKTI id:  "+obj.id;
		alert(ss);
		FB.logout(function(response) {
  			document.location.reload();
		});
		
		      		
	});


}


</script>


