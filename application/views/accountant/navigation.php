<div class="sidebar-background">

	<div class="primary-sidebar-background"   style="background-color: purple;">

	</div>

</div>

<div class="primary-sidebar"  style="background-color: purple;">

	<!-- Main nav -->

	<ul class="nav nav-collapse collapse nav-collapse-primary">

    

        

        <!------dashboard----->

		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>"  style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?accountant/dashboard" >

					<i class="icon-desktop icon-2x"></i>

					<span><?php echo get_phrase('dashboard');?></span>

				</a>

		</li>

        

        <!------manage invoice ----->

		<li class="<?php if($page_name == 'manage_invoice')echo 'dark-nav active';?>"  style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?accountant/manage_invoice" >

					<i class="icon-list-alt icon-2x"></i>

					<span><?php echo get_phrase('invoice / take_payment');?></span>

				</a>

		</li>

        

        

        <!------view_payment----->

		<li class="<?php if($page_name == 'view_payment')echo 'dark-nav active';?>"  style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?accountant/view_payment" >

					<i class="icon-money icon-2x"></i>

					<span><?php echo get_phrase('view_payment');?></span>

				</a>

		</li>

        

        

		<!------manage own profile--->

		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>"  style="background-color: pink;">

			<span class="glow"></span>

				<a href="<?php echo base_url();?>index.php?accountant/manage_profile" >

					<i class="icon-lock icon-2x"></i>

					<span><?php echo get_phrase('profile');?></span>

				</a>

		</li>

		

	</ul>

	

</div>