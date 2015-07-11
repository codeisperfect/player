<?php
if(User::isloginas('a')){
	?>
	<script type="text/javascript">
	function f12(obj){
	    var box = document.forms[0];
	    if(obj.checked==true){
		    var i;
		    for (i = 0; i < box.length; i++) {
		        box[i].checked= true;
		    }
	    }
	    else{
		    for (i = 0; i < box.length; i++)
		        box[i].checked= false;    	
	    }
	}
	function isEmpty(obj)
	{
		var box = document.forms[0];
		var i;
		err=1;
		for (i = 0; i < box.length; i++) {
		    if(box[i].checked== true)
		    	err=0;
		}
		if(err==1)
			window.alert("Please select something to compare");
	}
	</script>
	<?php
	echo '<form method="post">';
	echo '<table border="5">';
	echo '<thead><td>Compare</td><td>Teacher Id</td><td>Name</td><td>Subjects</td><td>Classes</td><td>Minimum Fees</td><td>Teaching Experience</td></thead>';

	$subN=$_ginfo['encodeddataofteacherstable']['sub'];
	$gradeN=$_ginfo['encodeddataofteacherstable']['grade'];
	foreach ($result as $value) {
			echo '<tr><td><input type="checkbox" name="check[]" class="checkboxclass" value="'.$value['id'].'"/></td>';
			echo '<td>'.$value['tid'].'</td>';
			echo '<td>'.$value['name'];
			$jsonArray=str2json($value['jsoninfo']);	

			//Subjects display
			$subject=Funs::extractFields($value['jsoninfo'],$subN,"sub");
			echo '<td>'.$subject.'</td>';
			//subject display ends here
			
			//classes display
			$grades=$jsonArray["grade"];
			$gradeArray=explode("-", $grades);
			$str="";
			foreach($gradeArray as $key){ 
				$str=$str.$gradeN[$key-1].' , ';
			}
			echo '<td>'.substr_replace($str, "", -2).'</td>';
			//classes display ends

			echo '<td>'.$jsonArray['minfees'].'</td>';
			echo '<td>'.$value['teachingexp'].'</td>';
			$id=$value['tid'];
			?>
				<td><a href="<?php echo BASE."view/$id" ;?>">View</a></td>
			<?php


			if($value['isselected']=='f'){
			?>
				<td><a href="<?php echo BASE."accept/$id" ;?>">Accept</a></td>	
				<td><a href="<?php echo BASE."reject/$id" ;?>">Reject</a></td>
			<?php
			}
			else if($value['isselected']=='a'){
				echo '<td>Accepted</td>';
			?>
				<td><a href="<?php echo BASE."reject/$id" ;?>">Reject</a></td>
			<?php
			}
			else if($value['isselected']=='r'){
			?>
				<td><a href="<?php echo BASE."accept/$id" ;?>">Accept</a></td>	
			<?php
						echo '<td>Rejected</td>';
			}	
			echo '</tr>';
		}

echo '</table><span><input type="checkbox" id="clickit" onclick="f12(this);"/>check all</span>
		<input type="submit" name="formSubmit" value="Compare Selected" onclick="isEmpty(this);"/>
		</form>';
}
else
{
	echo 'You dont have proper rights';
}
?>
