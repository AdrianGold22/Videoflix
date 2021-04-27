<!doctype html>
<html>
<head>
	<title><?php echo $page_title;?> | <?php echo $this->db->get_where('settings',array('type'=>'site_name'))->row()->description;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/global/item_thumb.png">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/bootstrap.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/new_css.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/custom.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/fontawesome/css/font-awesome.min.css">
    <script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/jquery-1.10.2.min.js" ></script>
    <script src="<?php echo base_url() . 'assets/frontend/' . $selected_theme;?>/bootstrap.min.js" ></script>
    <style>
		.black_text{color:#000; background-color: #f3f3f3;}
		.blue_text{color: #0080ff;}
	</style>
</head>
<?php
$bg_color = "#000";
if ($page_name == 'signup' || $page_name == 'signin' || $page_name == 'faq' || 
		$page_name == 'termsofuse' || $page_name == 'privacypolicy' || $page_name == 'refundpolicy' ||
   			$page_name == 'youraccount' || $page_name== 'billinghistory'||
   				$page_name == 'emailchange' || $page_name== 'passwordchange'||
   					$page_name == 'cancelplan' || $page_name == 'purchaseplan'||
   						$page_name == 'purchasestripe')
    $bg_color = "#f3f3f3";
?>
<body style="background-color:<?php echo $bg_color;?>;">
	<?php include ($page_name . '.php');?>
</body>
</html>








