<?php
    SELECT * FROM `wpvxb_users`
    $table_name = $wpdb->prefix . "wpvxb_users";
    $user = $wpdb->get_results( "SELECT * FROM $table_name" );
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
        foreach ($user as $row){ ?>
            <tr>
                <th><label for="ID"><?php _e("ID"); ?></label></th>
                <th><label for="user_pass"><?php _e("user_pass"); ?></label></th>
                <th><label for="user_nicename"><?php _e("user_nicename"); ?></label></th>
                <th><label for="user_email"><?php _e("user_email"); ?></label></th>
                <th><label for="user_url"><?php _e("user_url"); ?></label></th>
                <th><label for="user_registered"><?php _e("user_registered"); ?></label></th>
                <th><label for="display_name"><?php _e("display_name"); ?></label></th>
                <td>
                    <input type="text" name="ID" id="ID" value="<?php echo $row->ID ?>" class="regular-text" /><br />
                    <input type="text" name="user_pass" id="user_pass" value="<?php echo $row->user_pass ?>" class="regular-text" /><br />
                    <input type="text" name="user_nicename" id="user_nicename" value="<?php echo $row->user_nicename ?>" class="regular-text" /><br />
                    <input type="text" name="user_email" id="user_email" value="<?php echo $row->user_email ?>" class="regular-text" /><br />
                    <input type="text" name="user_url" id="user_url" value="<?php echo $row->user_url ?>" class="regular-text" /><br />
                    <input type="text" name="user_registered" id="user_registered" value="<?php echo $row->user_registered ?>" class="regular-text" /><br />
                    <input type="text" name="display_name" id="display_name" value="<?php echo $row->display_name ?>" class="regular-text" /><br />
                </td>
            </tr>
            <?php }
    }
    function activate (){
        // generated a Custom Post type
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

}

if(class_exists('UserTablePlugin')){
    $PluginUsers = new UserTablePlugin();
}

//activation function call
register_activation_hook(__FILE__, array($PluginUsers,'activate'));

//deactivation function call
register_deactivation_hook(__FILE__, array($PluginUsers,'deactivate'));

//uninstalling function call
