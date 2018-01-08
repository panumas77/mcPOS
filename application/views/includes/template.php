<?php $this->load->view('includes/header'); ?>

<?php 
if(isset($_SESSION['is_logged_in'])) { 
    $this->load->view('includes/nav');
    } else {
        $this->load->view('includes/nav_login');
    }
?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view('includes/footer'); ?>