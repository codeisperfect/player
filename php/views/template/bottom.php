<div style='height:100px;' >
</div>

<?php

if($needpopup){
	popupalert(null);
	popupconfirm(null);
}


foreach($js as $i=>$fn){
	addjs($fn);
}
?>
</body>
</html>