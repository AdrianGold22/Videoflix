<div class="row-fluid">
	<div class="span12">
		<div class="grid simple ">
			<div class="grid-title no-border">
			</div>
			<div class="grid-body no-border">
				<form method="post" action="<?php echo base_url();?>index.php?admin/user_create" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="form-label">Nombre del usuario</label>
								<div class="controls">
									<input type="text" class="form-control" name="name">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Correo electronico</label>
								<div class="controls">
									<input type="email" class="form-control" name="email">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Contraseña del usuario</label>
								<div class="controls">
									<input type="text" class="form-control" name="password">
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Crear">
								<a href="<?php echo base_url();?>index.php?admin/user_list" class="btn btn-default">Regresar</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>