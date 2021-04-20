<div class="row-fluid">
	<div class="span12">
		<div class="grid simple ">
			<div class="grid-title no-border">
			</div>
			<div class="grid-body no-border">
				<form method="post" action="<?php echo base_url();?>index.php?admin/series_create" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="form-label">Titulo</label>
								<span class="help"></span>
								<div class="controls">
									<input type="text" class="form-control" name="title">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Portada</label>
								<span class="help">- Imagen de portada</span>
								<div class="controls">
									<input type="file" class="form-control" name="thumb">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Imagen de fondo</label>
								<!--<span class="help">- large banner image of the series</span>-->
								<div class="controls">
									<input type="file" class="form-control" name="poster">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Descripcion corta </label>
								<span class="help"></span>
								<div class="controls">
									<textarea class="form-control" name="description_short"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Descripcion larga </label>
								<span class="help"></span>
								<div class="controls">
									<textarea class="form-control" name="description_long"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Autor </label>
								<span class="help">- Seleccionar autor</span>
								<div class="controls">
									<select class="select2"  multiple name="actors[]" style="width:100%;">
										<?php 
											$actors	=	$this->db->get('actor')->result_array();
											foreach ($actors as $row2):?>
										<option value="<?php echo $row2['actor_id'];?>">
											<?php echo $row2['name'];?>
										</option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Tematica </label>
								<!--<span class="help">- genre must be selected</span>-->
								<div class="controls">
									<select class="select2" name="genre_id" style="width:150px;">
										<?php 
											$genres	=	$this->crud_model->get_genres();
											foreach ($genres as $row2):?>
										<option value="<?php echo $row2['genre_id'];?>">
											<?php echo $row2['name'];?>
										</option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Año de publicacion </label>
								<!--<span class="help">- year of publishing time</span>-->
								<div class="controls">
									<select class="select2" name="year" style="width:150px;">
										<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
										<option value="<?php echo $i;?>">
											<?php echo $i;?>
										</option>
										<?php endfor;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Calificacion </label>
								<span class="help">- nota del articulo</span>
								<div class="controls">
									<select class="select2" name="rating" style="width:150px;">
										<?php for ($i = 0; $i <= 5 ; $i++):?>
										<option value="<?php echo $i;?>">
											<?php echo $i;?>
										</option>
										<?php endfor;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Crear">
								<a href="<?php echo base_url();?>index.php?admin/series_list" class="btn btn-default">Regresar</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>