<h2>Viewing <span class='muted'>#<?php echo $formlist->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $formlist->name; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $formlist->email; ?></p>
<p>
	<strong>Comment:</strong>
	<?php echo $formlist->comment; ?></p>
<p>
	<strong>Ip address:</strong>
	<?php echo $formlist->ip_address; ?></p>
<p>
	<strong>User agent:</strong>
	<?php echo $formlist->user_agent; ?></p>

<?php echo Html::anchor('formlist/edit/'.$formlist->id, 'Edit'); ?> |
<?php echo Html::anchor('formlist', 'Back'); ?>