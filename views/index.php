<?php
/*
 * Banner Plugin for WolfCMS <http://www.wolfcms.org>
 * Copyright (C) 2011 Shannon Brooks <shannon@brooksworks.com>
 *
 * This file is part of Banner Plugin. Banner Plugin is licensed under the GNU GPLv3 license.
 * Please see license.txt for the full license text.
 */

// Security Measure
if (!defined('IN_CMS')) { exit(); }

?>
<h1><a href="<?php echo get_url('plugin/banner'); ?>">Banners</a></h1>
<table id="files-list" class="index" cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th class="name"><?php echo __('Name'); ?></th>
      <th class="dimensions"><?php echo __('Dimensions'); ?></th>
      <th class="dcount"><?php echo __('Displays'); ?></th>
      <th class="dcount"><?php echo __('Clicks'); ?></th>
      <th class="ctr"><?php echo __('CTR');?></th>
      <th class="created"><?php echo __('Created'); ?></th>
      <th class="expires"><?php echo __('Expires'); ?></th>
      <th class="action" style="width:50px;"><?php echo __('Action');?></th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach ($banners as $banner):
	$name = htmlspecialchars($banner->name);
?>
	<tr class="<?php echo odd_even(); ?>">
		<td><a href="<?php echo get_url('plugin/banner/banner_edit/'.$banner->id); ?>"><?php echo $banner->name; ?></a></td>
		<td><code><?php echo "{$banner->width}x{$banner->height}"; ?></code></td>
		<td><code><?php echo $banner->dcount; ?></code></td>
		<td><code><?php echo $banner->ccount; ?></code></td>
		<td><code><?php echo round(($banner->ccount/$banner->dcount)*100,1);?>%</code></td>
		<td><code><?php echo $banner->created; ?></code></td>
		<td><code><?php echo $banner->expires; ?></code></td>
		<td>
			<a class="edit-link" name="<?php echo $name;?>" href="<?php echo get_url('plugin/banner/banner_edit/'.$banner->id); ?>"><img src="/wolf/admin/images/icon-rename.gif" alt="edit icon" title="Edit Banner"></a>
			<a class="delete-link" name="<?php echo $name;?>" href="<?php echo get_url('plugin/banner/banner_delete/'.$banner->id); ?>"><img src="/wolf/admin/images/icon-remove.gif" alt="delete file icon" title="Delete Banner"></a>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
<script type="text/javascript">
<!--
$(function(){

	$('.delete-link').click(function(e){
		if (!confirm("Delete banner: "+$(this).attr('name')+"?\n\nAre you sure you want to delete this banner?\nPress OK to delete this download permenently.")) {
			e.preventDefault();
		}
		
	});

});
//-->
</script>