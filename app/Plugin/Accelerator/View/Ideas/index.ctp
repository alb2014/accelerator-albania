

	<h1>My Ideas</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Description</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($ideas as $idea): ?>
    <tr>
       
        <td>
            <?php echo $this->Html->link($idea['Idea']['name'],
	array('module' => 'accelerator', 'controller' => 'ideas', 'action' => 'edit', $idea['Idea']['id'])); ?>
        </td>
        <td><?php echo $idea['Idea']['desc']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($ideas); ?>
</table>
