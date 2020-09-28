<div class="sidebar-background">

	<div class="primary-sidebar-background" style="background-color: purple;">

	</div>

</div>

<div class="primary-sidebar" style="background-color: purple;">

	<!-- Main nav -->

	<ul class="nav nav-collapse collapse nav-collapse-primary" >

    

        

        <!------dashboard----->

		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>" style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?doctor/dashboard" >

					<i class="icon-desktop icon-2x"></i>

					<span><?php echo get_phrase('dashboard');?></span>

				</a>

		</li>

        

        <!------patient----->

		<li class="<?php if($page_name == 'manage_patient')echo 'dark-nav active';?>" style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?doctor/manage_patient" >

					<i class="icon-user icon-2x"></i>

					<span><?php echo get_phrase('patient');?></span>

				</a>

		</li>

        

        <!------appointment----->

		<li class="<?php if($page_name == 'manage_appointment')echo 'dark-nav active';?>" style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?doctor/manage_appointment" >

					<i class="icon-edit icon-2x"></i>

					<span><?php echo get_phrase('manage_appointment');?></span>

				</a>

		</li>

        

        <!------prescription----->

		<li class="<?php if($page_name == 'manage_prescription')echo 'dark-nav active';?>" style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?doctor/manage_prescription" >

					<i class="icon-stethoscope icon-2x"></i>

					<span><?php echo get_phrase('manage_prescription');?></span>

				</a>

		</li>

		<!-------report-------->

		
		<!------manage own profile--->

		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>" style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?doctor/manage_profile" >

					<i class="icon-lock icon-2x"></i>

					<span><?php echo get_phrase('profile');?></span>

				</a>

		</li>

		

	</ul>

	

</div>