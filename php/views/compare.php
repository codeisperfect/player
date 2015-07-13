<?php
if(User::isloginas('a')){
	$subN=$_ginfo['encodeddataofteacherstable']['sub'];
	$gradeN=$_ginfo['encodeddataofteacherstable']['grade'];
	$langN=$_ginfo['encodeddataofteacherstable']['lang'];
	$knowN=$_ginfo['encodeddataofteacherstable']['known'];
	$homeN=$_ginfo['encodeddataofteacherstable']['home'];

	echo '<table border="5">';
	echo '<thead><td>Unique Id</td><td>Name</td><td>Subjects</td><td>Classes</td><td>Minimum Fees</td><td>Teaching Experience(in years)</td><td>Languages</td><td>College</td><td>Degree</td><td>Branch</td><td>Email</td><td>Phone Number</td><td>Gender</td><td>Date Of Birth</td><td>Are You Ok With Home Tuition</td><td>Address</td><td>How Did You Came To Know About Us</td><td>Linkedin Profile</td><td>Feedback</td><td>College Verification</td><td>Resume</td><td>Accept/Reject</td></thead>';
	foreach ($result as $key) {
		echo '<tr>';
		foreach ($key as $value) {
			echo '<td>'.$value['id'].'</td>';
			echo '<td>'.$value['name'].'</td>';
				$subject=Funs::extractFields($value['jsoninfo'],$subN,"sub");
			echo '<td>'.$subject.'</td>';
		
			//classes display
			$jsonArray=str2json($value['jsoninfo']);	
			$grades=$jsonArray["grade"];
			$gradeArray=explode("-", $grades);
			$str="";
			foreach($gradeArray as $key){ 
				$str=$str.$gradeN[$key-1].' , ';
			}
			echo '<td>'.substr_replace($str, "", -2).'</td>';
			//classes display ends
		
			echo '<td>Rs. '.$jsonArray["minfees"].'</td>';
			echo '<td>'.$value['teachingexp'].'</td>';
			
			//languages
			$langArray=explode("-", $value['lang']);
			$str="";
			foreach ($langArray as $key) {
				$str=$str.$langN[$key-1].' , ';
			}
			echo '<td>'.substr_replace($str, "", -2).'</td>';
			//end languages

			echo '<td>IIT '.$jsonArray["college"].'</td>';

			//Degree Display
			$comma="";
			$degreeOther="";
			if(trim($jsonArray["degreeother"])!="")
			{
				$comma=" , ";
				$degreeOther=$jsonArray["degreeother"];
			}
			echo '<td>'.$jsonArray["degree"].$comma.$degreeOther.'</td>';
			//Degree Display
			echo '<td>'.$jsonArray["branch"].'</td>';
			echo '<td>'.$value['email'].'</td>';
			echo '<td>'.$value['phone'].'</td>';
			echo '<td>'.$value['gender'].'</td>';
			echo '<td>'.fun::timetodate($value['dob']).'</td>';
			echo '<td>'.$homeN[$jsonArray['home']-1].'</td>';
			echo '<td>';
				echo '<b>City: </b>'.$jsonArray['city'].'<br>';
				echo '<b>Zipcode: </b>'.$jsonArray['zipcode'].'<br>';
				echo '<b>State: </b>'.$jsonArray['state'].'<br>';
				echo '<b>Country: </b>'.$jsonArray['country'].'</td>';

			$knowabout=Funs::extractFields($value['jsoninfo'],$knowN,"knowaboutus");
			echo '<td>'.$knowabout.'</td>';

			echo '<td>'.$jsonArray['linkprofile'].'</td>';
			echo '<td>'.$jsonArray['feedback'].'</td>';

			$calV= $jsonArray['calvarification'];
			$resume=$jsonArray['resume'];
			echo '
			<td><a href="../../../'.$calV.'" target="_blank">VIEW PDF</a></td>
			<td><a href="../../../'.$resume.'" target="_blank">VIEW PDF</a></td>
			';

			$id=$value['tid'];
			if($value['isselected']=='f'){
				echo '<td>
				<b style="font-size:20px;"><a href="'.(BASE."accept/$id").'">Accept</a></b><br>
				<b style="font-size:20px;"><a href="'.(BASE."reject/$id").'">Reject</a></b></td>
				';
			}
			else if($value['isselected']=='a'){
				echo '<td><b style="font-size:20px;color:red;">Accepted</b><br>';
				echo '<b style="font-size:20px;"><a href="'.(BASE."reject/$id").'">Reject</a></b></td>';
			}
			else if($value['isselected']=='r'){
				echo '<td>
				<b style="font-size:20px;"><a href="'.(BASE."accept/$id").'">Accept</a></b><br>
				<b style="font-size:20px;color:red;">Rejected</b></td>';
			}	


		}
		echo '</tr>';
	}
}
else{
	echo 'You dont have have proper rights';
}
?>
