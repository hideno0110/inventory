<h2>Editing <span class='muted'>Formlist</span></h2>
<br>

<?php echo render('formlist/_form'); ?>
<p>
	<?php echo Html::anchor('formlist/view/'.$formlist->id, 'View'); ?> |
	<?php echo Html::anchor('formlist', 'Back'); ?></p>
