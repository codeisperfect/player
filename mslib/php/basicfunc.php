<?php

function f_sqltransform($inp) {
	if(count($inp) > 0)
		return add(array( array_keys($inp[0]) ), map($inp, f('array_values($inp)') ));
	else
		return array();
}







?>