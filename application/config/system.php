<?php
/**
 * @autor: hanmy
 * @date: 2016/1/29
 */
$config['project_name'] = "农民工管理系统";//项目名称
$config['project_logo'] = array('admin' => '/public/green/images/admin_logo.png');//项目LOGO
$config['admin_menu'] = array(

    'peasant_manage' => array(
        'title' => '农民工管理',
        'icon' => '/public/images/14309583461214_06.png',
        'url' => '/admin/peasant/ilist',
        'children' => array()),
    'bisiness_manage' => array(
        'title' => '用人单位管理',
        'icon' => '/public/images/1430958346122214_06.png',
        'url' => '/admin/business/ilist',),
    'project_manage' => array(
        'title' => '项目管理',
        'icon' => '/public/images/14309583461214_08.png',
        'url' => '/admin/project/ilist',),
    'labour_manage' => array(
        'title' => '包工头',
        'url' => '/admin/labour/ilist',
        'icon' => '/public/images/14309583461214_18.png'),
    'lawyer' => array(
        'title' => '法律援助',
        'url' => '/admin/lawyer/ilist',
        'icon' => '/public/images/14309583461214_10.png'));

