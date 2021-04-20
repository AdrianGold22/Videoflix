<div class="row-fluid">
	<div class="span12">
		<div class="grid simple ">
			<div class="grid-title no-border"></div>
			<div class="grid-body no-border">
				<?php
					$actor_detail = $this->db->get_where('actor',array('actor_id'=>$actor_id))->row();
					?>
				<form method="post" action="<?php echo base_url();?>index.php?admin/actor_edit/<?php echo $actor_id;?>"
					enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-8">
							<div class="form-group">
								<label class="form-label">Nombre</label>
								<span class="help"></span>
								<div class="controls">
									<input type="text" class="form-control" name="name" 
										value="<?php echo $actor_detail->name;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Imagen</label>
								<span class="help"></span>
								<div class="controls">
									<input type="file" class="form-control" name="thumb">
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Actualizar">
								<a href="<?php echo base_url();?>index.php?admin/actor_list" 
									class="btn btn-default">Regresar
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>