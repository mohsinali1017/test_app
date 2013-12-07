<html>  
    <head>  
        <title>Home</title> 
		<?php echo link_tag('css/style.css'); ?>
    </head>  
    <body>  
	<div class="main_content">
	<h2>Your previous logins</h2>
	<a href="<?php echo site_url('Login/loginMe')?>" id="float_left">Logout</a>
	<ul>
	<?php
		foreach ($user_data as $row)
			{
				echo '<li>'.$row->time_of_login.'</li>';
			}

	?>
	</ul>
	
	</div>
         
    </body>  
</html>  