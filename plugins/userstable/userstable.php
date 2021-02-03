<?php
   /**
    * @package userstable
    */
    /*
    Plugin Name : userstable
    Plugin URI : http://userstable.com/userstable
    Description : Custom Plugin to Manage and Show users and activity log into a table.
    Version : 1.0.0
    Author : Ahmad Saleh Matjaree
    Author URI: https://github.com/AhmadSaleh22
    License : GPLv2 or later
    Text Domain : userstable
    */

    /*
    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

    Copyright 2005-2015 Automatic, Inc.
    */

defined('ABSPATH') or die('Hi this Page is Secured please try to define your Identity');

class UserTablePlugin{

    //Start Plugin Functions here!
    function __construct(){
        add_action('init',array($this,'custom_post_type'))
    }
    function activate (){
        // generated a Custom Post type
        $this->custom_post_type();
        //flush rewrite rules
        flush_rewrite_rules();
    }
    
    function deactivate(){
        //flush rewrite rules
        flush_rewrite_rules();
    }

    function uninstall(){
        //delete CPT
    }
    function custom_post_type(){
        register_post_type('tables',['public'=>true, 'label' => 'tables']);
    }

}

if(class_exists('UserTablePlugin')){
    $PluginUsers = new UserTablePlugin();
}

//activation function call
register_activation_hook(__FILE__, array($PluginUsers,'activate'));

//deactivation function call
register_deactivation_hook(__FILE__, array($PluginUsers,'deactivate'));

//uninstalling function call
