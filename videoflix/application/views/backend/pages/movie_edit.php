<div class="row-fluid">
	<div class="span12">
		<div class="grid simple ">
			<div class="grid-title no-border">
			</div>
			<div class="grid-body no-border">
				<?php
					$movie_detail = $this->db->get_where('movie',array('movie_id'=>$movie_id))->row();
					?>
				<form method="post" action="<?php echo base_url();?>index.php?admin/movie_edit/<?php echo $movie_id;?>" 
					enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="form-label">Titulo</label>
								<span class="help"></span>
								<div class="controls">
									<input type="text" class="form-control" name="title" value="<?php echo $movie_detail->title;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Url</label>
								<!--<span class="help">- youtube or any hosted video</span>-->
								<div class="controls">
									<input type="text" class="form-control" name="url" id="url"  
										value="<?php echo $movie_detail->url;?>">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Portada</label>
								<span class="help">- icon image of the movie</span>
								<div class="controls">
									<input type="file" class="form-control" name="thumb">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Documento</label>
								<span class="help">- documento pdf</span>
								<div class="controls">
									<input type="file" class="form-control" name="doc">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Imagen de fondo</label>
								<span class="help">- Imagen de fondo para el libro</span>
								<div class="controls">
									<input type="file" class="form-control" name="poster">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Descripcion corta </label>
								<span class="help"></span>
								<div class="controls">
									<textarea class="form-control" name="description_short"><?php echo $movie_detail->description_short;?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Descripcion larga </label>
								<span class="help"></span>
								<div class="controls">
									<textarea class="form-control" name="description_long"><?php echo $movie_detail->description_long;?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Autor </label>
								<span class="help">- Selecciona el autor</span>
								<div class="controls">
									<select class="select2"  multiple name="actors[]" style="width:100%;">
										<?php 
											$actors	=	$this->db->get('actor')->result_array();
											foreach ($actors as $row2):?>
										<option
											<?php 
												$actors	=	$movie_detail->actors;
												if ($actors != '')
												{
													$actor_array	=	json_decode($actors);
													if (in_array($row2['actor_id'], $actor_array))
														echo 'selected';
												}
												?>
											value="<?php echo $row2['actor_id'];?>">
											<?php echo $row2['name'];?>
										</option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Tematica </label>
								<span class="help">- Elige la tematica</span>
								<div class="controls">
									<select class="select2" name="genre_id" style="width:150px;">
										<?php 
											$genres	=	$this->crud_model->get_genres();
											foreach ($genres as $row2):?>
										<option 
											<?php if ( $movie_detail->genre_id == $row2['genre_id']) echo 'selected';?>
											value="<?php echo $row2['genre_id'];?>">
											<?php echo $row2['name'];?>
										</option>
										<?php endforeach;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">A??o de publicacion </label>
								<!--<span class="help">- year of publishing time</span>-->
								<div class="controls">
									<select class="select2" name="year" style="width:150px;">
										<?php for ($i = date("Y"); $i > 2000 ; $i--):?>
										<option
											<?php if ( $movie_detail->year == $i) echo 'selected';?>
											value="<?php echo $i;?>">
											<?php echo $i;?>
										</option>
										<?php endfor;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Calificacion </label>
								<span class="help">- nota del libro</span>
								<div class="controls">
									<select class="select2" name="rating" style="width:150px;">
										<?php for ($i = 0; $i <= 5 ; $i++):?>
										<option 
											<?php if ( $movie_detail->rating == $i) echo 'selected';?>
											value="<?php echo $i;?>">
											<?php echo $i;?>
										</option>
										<?php endfor;?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Destacado </label>
								<span class="help">- El libro aparecera en la pagina de inicio</span>
								<div class="controls">
									<select class="select2" name="featured" style="width:150px;">
										<option value="0" <?php if ( $movie_detail->featured == 0) echo 'selected';?>>No</option>
										<option value="1" <?php if ( $movie_detail->featured == 1) echo 'selected';?>>Si</option>
									</select>
								</div>
							</div>
						</div>
						<!-- PREVIEW OF THE VIDEO FILE -->
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<label class="form-label">Preview:</label>
								<?php 
								$iframe_embed = $this->crud_model->is_iframe($movie_detail->url);
								if ($iframe_embed == true):
								?>
								<!-- loads iframe embed option as video player -->
								<style>
								.intrinsic-container {
								  position: relative;
								  height: 0;
								  overflow: hidden;
								}

								/* 16x9 Aspect Ratio */
								.intrinsic-container-16x9 {
								  padding-bottom: 56.25%;
								}

								/* 4x3 Aspect Ratio */
								.intrinsic-container-4x3 {
								  padding-bottom: 75%;
								}

								.intrinsic-container iframe {
								  position: absolute;
								  top:0;
								  left: 0;
								  width: 100%;
								  height: 100%;
								}
								</style>
								<div class="intrinsic-container intrinsic-container-16x9">
									<iframe src="<?php echo $movie_detail->url;?>" allowfullscreen style="border:0px; width:100%; height:100%;"></iframe>
								</div>
								<?php 
								endif;
								if ($iframe_embed == false):
								?>
								<!-- loads jwplayer as video player -->
								<script src="https://content.jwplatform.com/libraries/O7BMTay5.js"></script>
								<div id="video_player_div"><?php echo $movie_detail->title;?></div>
								<script>
									jwplayer("video_player_div").setup({
										"file": "<?php echo $movie_detail->url;?>",
										"image": "<?php echo $this->crud_model->get_poster_url('movie' , $movie_detail->movie_id);?>",
										"width": "100%",
										aspectratio: "16:9",
										listbar: {
										  position: 'right',
										  size: 260
										},
									  });
								</script>
								<?php endif;?>


							</div>
						</div>
					</div>
					<hr>
					<div class="form-group">
						<input type="submit" class="btn btn-success col-md-3 col-sm-12 col-xs-12" value="Actualizar libro" style="margin:0px 5px 5px 0px;">
						<a href="<?php echo base_url();?>index.php?admin/movie_list" class="btn btn-default col-md-3 col-sm-12 col-xs-12">Regresar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
