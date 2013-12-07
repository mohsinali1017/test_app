<html>  
    <head>  
        <title>Login</title> 
		<?php echo link_tag('css/style.css'); ?>
    </head>  
    <body>  
	<div class="main_content">
	<h2>Login Form</h2>
	<?php
		echo form_open('Login/loginMe');
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
		
	?>
	
	<ul>
		<li>
			<div><?php echo form_input($email);?></div>
		</li>
		<li>
			<div><?php echo form_input($pass);?></div>
		</li>
		<li>
		<?php 
			echo validation_errors();
		?>
		</li>
		<li>
			<div><?php echo form_submit(array('name'=>'login','id'=>'login','class' => 'button'),'Login');?></div>
		</li>
		<li>
			<div><a href="<?php echo site_url('Register_Login/register')?>">New user click here.</a></div>
		</li>
	</ul>
	
	
	
	
	<?php echo form_close(); ?>
	
	</div>
         
    </body>  
</html>  