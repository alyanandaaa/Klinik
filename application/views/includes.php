        <link rel="stylesheet" href="<?php echo base_url();?>template/css/font.css">
        <link href="<?php echo base_url();?>template/css/bayanno.css" media="screen" rel="stylesheet" type="text/css" />
        
        <script src="<?php echo base_url();?>template/js/bayanno.js" type="text/javascript"></script>
        <script src="https://kit.fontawesome.com/yourcode.js"></script>
               

        <?php

		//////////LOADING SYSTEM SETTINGS FOR ALL PAGES AND ACCOUNTS/////////

		

		$system_name	=	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;

		$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;