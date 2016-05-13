<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function public_url($url = '')
{
    return base_url('public/'.$url);
}
function user_url($url = '')
{
    return base_url('index/'.$url);
}
function admin_url($url='')
{
    return base_url('admin/'.$url);
}
function form_url($url = '')
{
    return base_url('form/'.$url);
}
?>