		<div class="modal fade" id="<?php echo $name; ?>PopupId" tabindex="-1" role="dialog" aria-labelledby="<?php echo $name; ?>Popup" aria-hidden="true" style='' >
			<div class="modal-dialog" style='<?php echo $stylemain; ?>' >
				<div class="modal-content" style='overflow-y:hidden;' >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id='<?php echo $name; ?>Title' ><?php echo $title; ?></h4>
					</div>
					<div class="modal-body" style='<?php echo $stylebody; ?>' id='<?php echo $name; ?>Text' align=left >
						<?php 
							if($body!=""){
								load_view($body,$bodyinfo);
							}
						?>
					</div>
					<div class="modal-footer" align="right" >
						<?php
							if($footer!=""){
								load_view($footer,$footerinfo);
							}
							else{
								if($defaultfooter){
						?>
							<button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
						<?php
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>