<!-- TOP HEADING SECTION -->
<style>
	.nav_transparent {
	padding: 10px 0px 10px; border: 1px;
	background: rgba(0,0,0,0.8); 
	}
	.nav_dark {
	background-color: #000;
	padding: 10px;
	}
</style>
<?php 
	if ($page_name == 'home' || $page_name == 'playmovie') 
		$nav_type = 'nav_transparent';
	else 
		$nav_type = 'nav_dark';
	?>
<div class="navbar navbar-default navbar-fixed-top <?php echo $nav_type;?>" >
	<div class="container" style=" width: 100%;">
		<div class="navbar-header">
			<a href="<?php echo base_url();?>index.php?browse/home" class="navbar-brand">
				<img src="<?php echo base_url();?>assets/global/logo.png" style=" height: 70px;margin-right: 100px;margin-left:100px;margin-top:-25px;" />
			</a>
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<!-- MOVIES GENRE WISE-->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="" style="color: #337ab7; font-weight: bold;">
						Libros <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<?php
							$genres		=	$this->crud_model->get_genres();
							foreach ($genres as $row):
							?>
						<li><a href="<?php echo base_url();?>index.php?browse/movie/<?php echo $row['genre_id'];?>">
							<?php echo $row['name'];?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
				</li>
				<!-- TV SERIES GENRE WISE-->
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="" style="color: #337ab7; font-weight: bold;">
						Articulos <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						<?php
							$genres		=	$this->crud_model->get_genres();
							foreach ($genres as $row):
							?>
						<li><a href="<?php echo base_url();?>index.php?browse/series/<?php echo $row['genre_id'];?>">
							<?php echo $row['name'];?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
				</li>
				<!-- MY LIST -->
				<li>
					<a href="<?php echo base_url();?>index.php?browse/mylist">Favoritos</a>
				</li>
			</ul>
			<!-- PROFILE, ACCOUNT SECTION -->
			<?php
				// by deault, email & general thumb shown at top
				$bar_text	=	$this->db->get_where('user', array('user_id'=>$this->session->userdata('user_id')))->row()->email;
				$bar_thumb	=	'thumb1.png';
				
				// check if there is active subscription
				$subscription_validation	=	$this->crud_model->validate_subscription();
				if ($subscription_validation != false)
				{
					// if there is active subscription, check the selected/active user of current user account
				
					$active_user	=	$this->session->userdata('active_user');
					if ($active_user == 'user1')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user1');
						$bar_thumb	=	'thumb1.png';
					}
					else if ($active_user == 'user2')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user2');
						$bar_thumb	=	'thumb2.png';
					}
					else if ($active_user == 'user3')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user3');
						$bar_thumb	=	'thumb3.png';
					}
					else if ($active_user == 'user4')
					{
						$bar_text 	=	$this->crud_model->get_username_of_user('user4');
						$bar_thumb	=	'thumb4.png';
					}
				}
				?>


            <?php
			if ($this->session->userdata('user_login_status') == 0) :
			?>

				<div style="float: right;margin: 18px 18px; height: 0px;" class="hidden-xs">
					<a href="<?php echo base_url(); ?>index.php?home/signin" class="btn btn-primary" style="margin-top:-10px">Ingresar</a>
				</div>
			<?php endif; ?>


			<?php
			if ($this->session->userdata('user_login_status') == 1) :
			?>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding:10px;">
					<img src="<?php echo base_url();?>assets/global/<?php echo $bar_thumb;?>" style="height:30px;" />
					<?php echo $bar_text;?>
					<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="themes">
						
						<!-- SHOW ADMIN LINK IF ADMIN LOGGED IN -->
						<?php 
							if($this->session->userdata('login_type') == 1):
								?>
						<li><a href="<?php echo base_url();?>index.php?admin/dashboard">Administrador</a></li>
						<?php endif;?>
						<li><a href="<?php echo base_url();?>index.php?browse/youraccount">Cuenta</a></li>
						<li><a href="<?php echo base_url();?>index.php?home/signout">Cerrar Sesion</a></li>
					</ul>
				</li>
			</ul>
			<?php endif; ?>
			<!-- SEARCH FORM -->
			<form class="navbar-form navbar-right" method="post" action="<?php echo base_url();?>index.php?browse/search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Libros, articulos, autores" 
						style="background-color: #000; border: 1px solid #808080;" name="search_key">
				</div>
				<button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
			</form>
		</div>
	</div>
</div>
<?php 
	if ($page_name == 'home' || $page_name == 'playmovie' || $page_name == 'playseries')
		$padding_amount = '0px';
	else
		$padding_amount = '50px';
	?>
<div style="padding: <?php echo $padding_amount;?>;"></div>