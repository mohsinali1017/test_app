<html>  
    <head>  
        <title><?php echo $base_url;?></title> 
		<?php echo link_tag('css/style.css'); ?>
    </head>  
    <body>  
	<div class="main_content">
	<h2>Registration Form</h2>
	<?php
		echo form_open($base_url,'Register_Login/register');
		
		$name = array(
			
			'name' => 'full_name',
			'id'	=> 'full_name',
			'value' => set_value('full_name'),
			'type'	=> 'text',
			'placeholder' => 'Full Name',
			'class' => 'text_area'
		
		);
		
		$email = array(
			
			'name' => 'email',
			'id'	=> 'email',
			'value' => set_value('email'),
			'type'	=> 'text',
			'placeholder' => 'Email',
			'class' => 'text_area'
		
		);
		
		$pass = array(
			
			'name' => 'pass',
			'id'	=> 'pass',
			'value' => '',
			'type'	=> 'password',
			'placeholder' => 'Password',
			'class' => 'text_area'
		
		);
		$re_pass = array(
			
			'name' => 're_pass',
			'id'	=> 're_pass',
			'value' => '',
			'type'	=> 'password',
			'placeholder' => 'Re-Type Password',
			'class' => 'text_area'
		
		);
		
	?>
	
	<ul>
		<li>
			<div><?php echo form_input($name);?></div>
		</li>
		<li>
			<div><?php echo form_input($email);?></div>
		</li>
		<li>
			<div><?php echo form_input($pass);?></div>
		</li>
		<li>
			<div><?php echo form_input($re_pass);?></div>
		</li>
		<li>
		<?php echo validation_errors(); ?>
		</li>
		<li>
			<div><?php echo form_submit(array('name'=>'register','id'=>'register','class' => 'button'),'Register');?></div>
		</li>
		<li>
			<div><a href="<?php echo site_url('Login/loginMe')?>">Already Registered click here.</a></div>
		</li>
	</ul>
	
	
	
	
	<?php echo form_close(); ?>
	
	</div>
         
    </body>  
</html>  