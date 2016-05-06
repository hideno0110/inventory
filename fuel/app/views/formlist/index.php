<h2>Listing <span class='muted'>Formlists</span></h2>
<br>
<?php if ($formlists): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Comment</th>
			<th>Ip address</th>
			<th>User agent</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($formlists as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->email; ?></td>
			<td><?php echo $item->comment; ?></td>
			<td><?php echo $item->ip_address; ?></td>
			<td><?php echo $item->user_agent; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('formlist/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('formlist/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('formlist/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Formlists.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('formlist/create', 'Add new Formlist', array('class' => 'btn btn-success')); ?>

</p>
