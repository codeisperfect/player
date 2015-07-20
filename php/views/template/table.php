<?php
mius( &$tabattr, array("class" => $class));

if($sqlo) {
	$rows = f_sqltransform($rows);
} 
setifnn($width, (count($rows)==0 ? 0 : count($rows[0])) );
setifnn($height,  count($rows)  );
if($height > 0 ) {
?>
					<table <?php echo param2str($tabattr); ?> >
						<thead>
							<tr>
								<?php
								for($i=0; $i<$width; $i++) {
								?>
									<th><?php if($func === null || $func(0,$i)==null) { echo convchars(getval($i, getval(0, $rows))); } ?></th>
								<?php
								}
								?>
							</tr>
						</thead>
						<tbody>
							<?php
							for($j=1; $j<$height; $j++) {
							?>
							<tr>
								<?php
								for($i=0; $i<$width; $i++) {
								?>
									<th><?php if($func === null || $func($j,$i)==null) { echo convchars(getval($i, getval($j, $rows))); } ?></th>
								<?php
								}
								?>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
<?php
}
?>