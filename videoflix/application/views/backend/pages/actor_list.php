<a href="<?php echo base_url();?>index.php?admin/actor_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
Crear autor
</a>
<div class="row-fluid">
	<div class="span12">
		<div class="grid simple ">
			<div class="grid-title">
				<h4>Lista de autores</h4>
			</div>
			<div class="grid-body ">
				<table class="table table-hover table-condensed" id="example">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th></th>
							<th>Nombre</th>
							<th>Operacion</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$actors = $this->db->get('actor')->result_array();
							$counter = 1;
							foreach ($actors as $row):
							  ?>
						<tr>
							<td style="vertical-align: middle;"><?php echo $counter++;?></td>
							<td><img src="<?php echo $this->crud_model->get_actor_image_url($row['actor_id']);?>" style="height: 60px;" /></td>
							<td style="vertical-align: middle;"><?php echo $row['name'];?></td>
							<td style="vertical-align: middle;">
								<a href="<?php echo base_url();?>index.php?admin/actor_edit/<?php echo $row['actor_id'];?>" class="btn btn-info btn-xs btn-mini">
								editar</a>
								<a href="<?php echo base_url();?>index.php?admin/actor_delete/<?php echo $row['actor_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Quieres borrarlo?')">
								borrar</a>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>