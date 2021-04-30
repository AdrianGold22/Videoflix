<!-- TOP LANDING SECTION -->
<div style="width:100%; height:90px; background-color:#fafafa; border-bottom:solid 1px #dcdde0;">
	<!-- logo -->
	<div style="float: left;">
		<a href="<?php echo base_url();?>index.php?home">
		<img src="<?php echo base_url();?>assets/global/logo.png" style="margin: 18px 40px; height: 50px;" />
		</a>
	</div>
	<div style="float: right;margin: 18px 40px; height: 50px;">
		<a href="<?php echo base_url();?>index.php?home/signin" class="" style="color: #0080ff;font-weight: 700;font-size: 20px;">Ingresar</a>
	</div>
</div>
<!-- ERROR MESSAGE -->
<style>
	td{padding: 12px 15px; border-bottom: 1px solid #ccc;}
</style>
<div class="container">
	<div class="row">
		<!-- ERROR MESSAGE SHOWING IF DUPLICATE EMAIL FOUND -->
		<?php 
			if ($this->session->flashdata('signup_result') == 'failed'):
			?>
		<div class="alert alert-dismissible alert-danger" style="margin: 30px;">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			Correo ya existe! Por favor ingrese uno nuevo.
		</div>
		<?php endif;?>
		<div class="col-lg-12" style="margin: 0px 20px;">
			<h3 class="black_text">Registrate para disfrutar de nuestro catalogo</h3>
		</div>
		<div class="col-lg-12" style="margin: 0px 20px;">
			<h4 class="black_text">Crea tu cuenta:</h4>
		</div>
		<div class="col-lg-12" style="margin: 0px 20px;">
			<form method="post" action="<?php echo base_url();?>index.php?home/signup">
				<div style="margin:10px 0px 5px;">
					Correo electronico
				</div>
				<div class="black_text">
					<input type="email" name="email" style="padding: 10px; width:400px;" autocomplete="off" />
				</div>
				<div style="margin:10px 0px 5px;">
					Contraseña
				</div>
				<div class="black_text">
					<input type="password" name="password" style="padding: 10px; width:400px;" />
				</div>
				<button type="submit"  class="btn btn-primary" style=" width: 150px; margin: 20px 0px;">Registrarse</button>
			</form>
		</div>
	</div>
	<hr>
	<?php include 'footer.php';?>
</div>