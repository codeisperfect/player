<form onsubmit="return freq(this, 'sechedule');" data-eparams='{"sid":$("#sendto").val(), "msg": $("#msgcontent").val() }' data-reloaddiv='#dispsechedule' data-res="mohit.popup_close('sechedule');ms.changetab('profiletabs2');" >
	<div class="row" >
		<div class="col s12 m12 l12 " >
			Sechedule this message for future.
			<br> Fill Date and time in dd-mm-yyyy hour:minute ( 24 hours) formate { ex: 16-05-2016 15:34 }
			<br>
			<input name="stime" type="text" value="<?php echo date("d-m-Y H:i", time()+3600*24); ?>" >
			<button class="btn waves-effect waves-light" type="submit" >Sechedule letter</button>
		</div>
	</div>
</form>
