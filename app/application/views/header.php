<?php

    if($this->session->userdata('id') == '') {
        header('Location: '. base_url() . 'index.php/home_page');
        exit;
    }

    //get user permissions
    $this->load->model('permission_model');
    $permissions = new permission_model();
    $permission = $permissions->getUserPermissions();
    
    $this->load->helper('menu_helper');
    $site_menu = new menu();
    $menu = $site_menu->get_menu();

    if ('localhost' == $_SERVER['SERVER_NAME']) {
        $this->output->enable_profiler(TRUE);
        ini_set('error_reporting', E_ALL);
        ini_set( 'display_errors', 1 );
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
    <TITLE>Qiasys<?php if (!empty($page_title)) { echo ' - ' . $page_title; }?></TITLE>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php if($this->session->userdata('style')) { ?>
            <link type="text/css" href="<?= base_url() . APPPATH ?>css/cyborg.css" rel="stylesheet"/>
        <?php } else { ?>
            <link type="text/css" href="<?= base_url() . APPPATH ?>css/bootstrap.css" rel="stylesheet"/>
        <?php } ?>
	
	<link type="text/css" href="<?= base_url().APPPATH ?>css/bootstrap-responsive.css" rel="stylesheet" />
	<link type="text/css" href="<?= base_url() . APPPATH ?>css/jquery-ui-1.10.0.custom.css" rel="stylesheet"/>
	<link type="text/css" href="<?= base_url() . APPPATH ?>css/qiasys.css" rel="stylesheet"/>
	<link type="text/css" href="<?= base_url() . APPPATH ?>css/bootstrapOverrides.css" rel="stylesheet"/>
	<link type="text/css" href="<?= base_url() . APPPATH ?>css/print.css" rel="stylesheet"/>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() . APPPATH ?>jquery/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="<?= base_url() . APPPATH ?>jquery/bootstrap.js"></script>
        <script type="text/javascript" src="<?= base_url() . APPPATH ?>jquery/bootstrap-collapse.js"></script>
        <script type="text/javascript" src="<?= base_url() . APPPATH ?>jquery/bootstrap-dropdown.js"></script>
	<meta http-equiv="refresh" content="3602;url=<?=base_url()?>" />
</HEAD>

<!--[if IE]>
<BODY class="ie">
<![endif]-->

<!--[if IE 8]>
<BODY class="ie ie8">
<![endif]-->

<!--[if IE 9]>
<BODY class="ie ie9">
<![endif]-->

<!--[if !IE]> -->
<BODY class="notie">
<!-- <![endif]-->

<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-30948936-1']);
	_gaq.push(['_setDomainName', 'qiasys.com']);
	_gaq.push(['_trackPageview']);

	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();
	
</script>

<!--
use this to fix it to the top
<div class="navbar navbar-fixed-top">
-->

<div class="navbar noprint">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a href="<?=base_url()?>" class="brand">Qiasys</a>
            <div class="nav-collapse collapse">
<?php        

                buildMenu($menu, $permissions);
                
                if ($permission->getIronMan() || $permission->getAdmin() || $permission->getSearch() || 
                    $permission->getInventory() || $permission->getProposal()) { ?>
                    <form action="<?= base_url() . 'index.php/search/search_inventory' ?>" method="post" class="navbar-form pull-left visible-desktop">
                        <input name="general" type="text" class="span2">
                        <button type="submit" class="btn">Search</button>
                    </form>
<?php                
                }
?>              <ul class="nav pull-right info_bar">
                    <li>
                        <div class="pull-right visible-desktop" id="login_form" style="padding-top: 8px;">
                            <?php
                            $this->load->model('proposal_model');
                            $proposal = new proposal_model();
                            $proposal_count = $proposal->proposal_exists();

                            if ($proposal_count == 0) {
                                $proposal->create_proposal();
                            }

                            echo $this->session->userdata('user_first_name') . ' '
                            . $this->session->userdata('user_last_name');
                            
                            //if (empty($this->session->userdata('admin_user_name'))) {    
                                echo ' (<a href="' . site_url('home_page/logout') . '">logout</a>)';
                            //} else {
                            //    echo ' (<a href="' . site_url('system/return_identity') . '">return</a>)';
                            //}

                            if ($permission->getIronMan() || $permission->getAdmin() || $permission->getProposal()) {
                                echo ' (<a href="' . site_url('proposal/view_proposal') . '">';

                                if ($proposal->proposal_item_count() > 0) {
                                    echo '<img src="' . base_url() . 'application/images/FatCow_Icons16x16/cart_full.png"> ';
                                } else {
                                    echo '<img src="' . base_url() . 'application/images/FatCow_Icons16x16/cart.png"> ';
                                }

                                echo '</i>' .
                                $proposal->proposal_item_count() . '</a>)';
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>   
        </div> 
    </div>
    <?php
    if (isset($page_title)) {
        print '
            <div style="width: 100%;" class="pull-left">
                <h4 class="text-info" style="margin-left: 10px;">' . $page_title . '</h4>
            </div><br>';
    }
    //print '<pre>';
    //print_r($this->session->userdata);
    ?>
</div> 

<?php            
    function buildMenu(array $menu, $permissions) {
        foreach($menu as $level0) {
            print '<ul class="nav">';
            foreach($level0 as $levelTemp) {
                if(is_array($levelTemp)) {
                    foreach($levelTemp as $level1) {
                        if($permissions->checkPermissions(explode(',', $level1['permissions'])) > 0) {
                            print '<li class="dropdown">';
                            print '<a data-toggle="dropdown" class="dropdown-toggle" href="'.base_url().$level1['url'].'">'.$level1['label'].' <b class="caret"></b></a>';
                            foreach($level1 as $levelTemp2) {
                                if(is_array($levelTemp2) && !empty($levelTemp2)) {
                                    print '<ul class="dropdown-menu">';
                                    foreach($levelTemp2 as $level2) {
                                        if($permissions->checkPermissions(explode(',', $level2['permissions'])) > 0) {
                                            if ($level2['children'] > 0) {
                                                print '<li class="dropdown-submenu">';
                                            } else {
                                                print '<li>';
                                            }
                                            print '<a class="dropdown-toggle" href="'.base_url().$level2['url'].'">'.$level2['label'].'</a>';
                                            foreach($level2 as $levelTemp3) {
                                                if(is_array($levelTemp3) && !empty($levelTemp3)) {
                                                    print '<ul class="dropdown-menu">';
                                                    foreach($levelTemp3 as $level3) {
                                                        if($permissions->checkPermissions(explode(',', $level3['permissions'])) > 0) { 
                                                            print '<li><a href="'.base_url().$level3['url'].'">'.$level3['label'].'</a></li>';
                                                        }
                                                    }
                                                    print '</ul>';
                                                }
                                            }
                                            print '</li>';
                                        }
                                    }
                                    print '</ul>';
                                }
                            }
                            print '</li>';
                        }
                    }
                }
            }
            print '</ul>';
        }
    }
?>
<div class="wrapper"><!-- this div closes on footer.php -->
