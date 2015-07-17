
<ul>
<?php
// page count = COUNT($all)/$limit;

for($i=1; $i<=ceil(COUNT($all)/$limit); $i++)
{
?>
	<li><form class='page' action='' method='post'><a href=''><?php echo $i;?></a><input class='page' type='hidden' name='page' value=<?php echo $i;?>></form></li>
<?php	
}
?>
</ul>
<table>
	<tr id='header'>
		<td id="id">Leads_id</td>
		<td id="name">first name</td>
		<td id="name">last name</td>
		<td id="datetime">registered datetime</td>
		<td id="email">email</td>
	</tr>
<?php
foreach($leads as $lead)
{	
?>
	<tr>
		<td><?php echo $lead['id'];?></td>
		<td><?php echo $lead['first_name'];?></td>
		<td><?php echo $lead['last_name'];?></td>
		<td><?php echo $lead['registered_datetime'];?></td>
		<td><?php echo $lead['email'];?></td>
	</tr>
<?php
}
?>
</table>
