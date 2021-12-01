<?php

function __construct(){
    
    $ci =& get_instance();

}

function check_already_login(){
    $ci  =& get_instance();
    $row = $ci->session->userdata('id_user');
    if($row){
        redirect('admin');
    }
}

function check_not_login(){
    $ci  =& get_instance();
    $row = $ci->session->userdata('id_user');
    if(!$row){
        redirect('auth');
    }
}

function check_admin(){
    $ci =& get_instance();
    
}

?>