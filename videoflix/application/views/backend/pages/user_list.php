<a href="<?php echo base_url();?>index.php?admin/user_create/" class="btn btn-primary" style="margin-bottom: 20px;">
<i class="fa fa-plus"></i>
Crear usuario
</a>
<div class="row-fluid">
	<div class="span12">
		<div class="grid simple ">
			<div class="grid-title">
				<h4>Lista de usuarios</h4>
			</div>
			<div class="grid-body ">
				<table class="table table-hover table-condensed" id="example">
					<thead>
						<tr>
							<th>
								#
							</th>
							<th>Correo electronico</th>
							<th></th>
							<th>Operacion</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$users = $this->db->get_where('user', array('type'=>0))->result_array();
							$counter = 1;
							foreach ($users as $row):
							  ?>
						<tr>
							<td><?php echo $counter++;?></td>
							<td style="text-transform: uppercase;"><?php echo $row['email'];?></td>
							<td>
								<?php
									$plan_id	=	$this->crud_model->get_active_plan_of_user($row['user_id']);
									if ($plan_id != false)
									{
										$plan_name	=	$this->db->get_where('plan', array('plan_id' => $plan_id))->row()->name;
										echo $plan_name;
									}
									?>
							</td>
							<td>
								<a href="<?php echo base_url();?>index.php?admin/user_edit/<?php echo $row['user_id'];?>" class="btn btn-info btn-xs btn-mini">
								editar</a>
								<a href="<?php echo base_url();?>index.php?admin/user_delete/<?php echo $row['user_id'];?>" class="btn btn-danger btn-xs btn-mini" onclick="return confirm('Quiere eliminarlo?')">
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