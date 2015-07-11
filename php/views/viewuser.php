<?php
if(User::isloginas('a')){
	$subN=$_ginfo['encodeddataofteacherstable']['sub'];
	$gradeN=$_ginfo['encodeddataofteacherstable']['grade'];
	$langN=$_ginfo['encodeddataofteacherstable']['lang'];
	$knowN=$_ginfo['encodeddataofteacherstable']['known'];
	$homeN=$_ginfo['encodeddataofteacherstable']['home'];
	echo "<table border='5'>";
	foreach ($result as $value){
		echo "<tr><td><b>Unique Id: </b></td><td>".$value['id'].'<br><br></td><tr>';
		echo "<tr><td><b>Name: </b></td><td>".$value['name'].'<br><br></td><tr>';
		$subject=Funs::extractFields($value['jsoninfo'],$subN,"sub");
		echo '<tr><td><b>Subjects: </b></td><td>'.$subject.'<br><br></td><tr>';

		//classes display
		$jsonArray=str2json($value['jsoninfo']);	
		$grades=$jsonArray["grade"];
		$gradeArray=explode("-", $grades);
		$str="";
		foreach($gradeArray as $key){ 
			$str=$str.$gradeN[$key-1].' , ';
		}
		echo '<tr><td><b>Classes: </b></td><td>'.substr_replace($str, "", -2).'<br><br></td><tr>';
		//classes display ends

		echo '<tr><td><b>Minimum Fees: </b></td><td>Rs. '.$jsonArray["minfees"].'<br><br></td><tr>';
		echo '<tr><td><b>Teaching Experience(in years): </b></td><td>'.$value['teachingexp'].'<br><br></td><tr>';
		
		//languages
		$langArray=explode("-", $value['lang']);
		$str="";
		foreach ($langArray as $key) {
			$str=$str.$langN[$key-1].' , ';
		}
		echo '<tr><td><b>Languages: </b></td><td>'.substr_replace($str, "", -2).'<br><br></td><tr>';
		//end languages

		echo '<tr><td><b>College: </b></td><td>IIT '.$jsonArray["college"].'<br><br></td><tr>';

		//Degree Display
		$comma="";
		$degreeOther="";
		if(trim($jsonArray["degreeother"])!="")
		{
			$comma=" , ";
			$degreeOther=$jsonArray["degreeother"];
		}
		echo '<tr><td><b>Degree: </b></td><td>'.$jsonArray["degree"].$comma.$degreeOther.'<br><br>';
		//Degree Display
		echo '<tr><td><b>Branch: </b></td><td>'.$jsonArray["branch"].'<br><br></td><tr>';
		echo '<tr><td><b>Email: </b></td><td>'.$value['email'].'<br><br></td><tr>';
		echo '<tr><td><b>Phone Number: </b></td><td>'.$value['phone'].'<br><br></td><tr>';
		echo '<tr><td><b>Gender: </b></td><td>'.$value['gender'].'<br><br></td><tr>';
		echo '<tr><td><b>Date Of Birth: </b></td><td>'.fun::timetodate($value['dob']).'<br><br></td><tr>';
		echo '<tr><td><b>OK with home tuition: </b></td><td>'.$homeN[$jsonArray['home']-1].'<br><br></td><tr>';
		echo '<tr><td><b>Address: </b></td><td><br>';
			echo '<div><b>City: </b>'.$jsonArray['city'].'</div>';
			echo '<div><b>Zipcode: </b>'.$jsonArray['zipcode'].'</div>';
			echo '<div><b>State: </b>'.$jsonArray['state'].'</div>';
			echo '<div><b>Country: </b>'.$jsonArray['country'].'</div><br><br></td><tr>';

		$knowabout=Funs::extractFields($value['jsoninfo'],$knowN,"knowaboutus");
		echo '<tr><td><b>Know About Us: </b></td><td>'.$knowabout.'<br><br></td><tr>';

		echo '<tr><td><b>Linkedin Profile: </b></td><td>'.$jsonArray['linkprofile'].'<br><br></td><tr>';
		echo '<tr><td><b>Feedback: </b></td><td>'.$jsonArray['feedback'].'<br><br></td><tr>';
		$calV= $jsonArray['calvarification'];
		$resume=$jsonArray['resume'];
		echo '
		<tr><td><b>College Verification: </b></td><td><a href="../../../'.$calV.'" target="_blank">Click here to see the pdf</a><br><br></td><tr>
		<tr><td><b>Resume: </b></td><td><a href="../../../'.$resume.'" target="_blank">Click here to see the pdf</a><br><br></td><tr>
		</table>';


		$id=$value['tid'];
		if($value['isselected']=='f'){
			echo '
			<b style="margin-left:500px;font-size:30px;"><a href="'.(BASE."accept/$id").'">Accept</a></b>
			<b style="margin-left:10px;font-size:30px;"><a href="'.(BASE."reject/$id").'">Reject</a></b>
			';
		}
		else if($value['isselected']=='a'){
			echo '<b style="margin-left:500px;font-size:30px;color:red;">Accepted</b>';
			echo '<b style="margin-left:10px;font-size:30px;"><a href="'.(BASE."reject/$id").'">Reject</a></b>';
		}
		else if($value['isselected']=='r'){
			echo '
			<b style="margin-left:500px;font-size:30px;"><a href="'.(BASE."accept/$id").'">Accept</a></b>
			<b style="margin-left:10px;font-size:30px;color:red;">Rejected</b>';
		}	

	}
}
else{
	echo 'You dont have proper rights';
}
?>
