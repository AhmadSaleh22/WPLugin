<?php
   global $wpdb;
   $table_name = $wpdb->prefix.'users';
   $DBP_results= $wpdb->get_results("SELECT * FROM $table_name");
?>
<div class="table-users">
<div class="header">
Header Settings
</div>
<table>
<tr>
<th>ID</th>
<th>USer login</th>
<th>User nickname</th>
<th>email</th>
<th>url</th>
<th>display name</th>
</tr>
<?php 

   foreach($DBP_results as $DBP_row){
       $id = $$DBP_row->ID;
       $user_pass = $$DBP_row->user_pass;
       $user_nicename = $$DBP_row->user_nicename;
       $user_email = $$DBP_row->user_email;
       $user_url = $$DBP_row->user_url;
       $display_name = $$DBP_row->display_name;
?>
<tr>
<td><?php echo $id; ?></td>
<td><?php echo $user_pass; ?></td>
<td><?php echo $user_nicename; ?></td>
<td><?php echo $user_email; ?></td>
<td><?php echo $user_url; ?></td>
<td><?php echo $display_name; ?></td>
</tr>
<?php
   }
?>
</table>
</div>