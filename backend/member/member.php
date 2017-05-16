


<table class="table">
 <tr>
   <th>
     ID
   </th>
   <th>
     Username
   </th>
   <th>
     Telephone
   </th>
   <th>
     E-mail
   </th>
   <th>
     Action
   </th>
 </tr>
<?php

$sql_select_member = ' SELECT * FROM table_member ';
$query_member = $connect->query($sql_select_member);
while ($member = $query_member->fetch_assoc()){
 ?>

  <tr>
    <td>
      <?php echo $member['member_id']; ?>
    </td>
    <td>
        <?php echo $member['username']; ?>
    </td>
    <td>
      เบอร์
    </td>
    <td>
        <?php echo  $member['email']; ?>
    </td>
    <td>
      ลบ!
    </td>
  </tr>

  <?php
}
   ?>
</table>
