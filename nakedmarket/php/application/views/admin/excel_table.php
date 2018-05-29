<table>
	<?php foreach ($cells as $key => $row): ?>
		<tr>
			<?php foreach ($row as $k=> $d): ?>
				<td><?php echo $key; ?></td>
				<td><?php echo $k."//".$d; ?></td>
			<?php endforeach ?>
		</tr>
	<?php endforeach ?>
</table>