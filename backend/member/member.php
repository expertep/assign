<script type="text/javascript">
  var bool;//บอกว่ากดedit หรือ delete
</script>
  <h1>Member</h1>
  <form class="" action="" method="GET">
    <div class="row">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" name='search' class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">ค้นหา</button>
          </span>
          <input type="hidden" name="action" value="member">
        </div>
      </div>
    </div>
  </form>

  <br>
  <?php
   if(isset($_GET['search'])){
     $sql_select_product = 'SELECT * FROM table_member WHERE member_id LIKE "%'.$_GET['search'].'%"OR username LIKE "%'.$_GET['search'].'%"';
   }
   else{
     $sql_select_product = 'SELECT * FROM table_member ';
   }?>

<table class="table" style="border:1px solid black;">
  <tr>
    <th>
      รหัส
    </th>
    <th>
      username
    </th>
    <th>
      email
    </th>
    <th>
      firstname
    </th>
    <th>
      lastname
    </th>
    <th>
      address
    </th>
    <th>
     Action
   </th>
  </tr>
  <?php

  include 'save.php';

    $query_select_product = $connect->query($sql_select_product);
    //if ($query_select_product->num_rows > 0) {
   while ($select_product = $query_select_product->fetch_assoc()){
     ?>
     <form class="" action="#" method="post" onsubmit="return check(<?php echo $select_product['member_id']; ?>);">
        <tr>
          <td>
            <?php echo $select_product['member_id']; ?>
          </td>
          <td>
            <?php echo $select_product['username']; ?>
          </td>
          <td>
            <?php echo $select_product['email'] ?>
          </td>
          <td>
            <?php echo $select_product['firstname']; ?>
          <td>
            <?php echo $select_product['lastname']; ?>
          </td>
          <td>
            <textarea rows="2" class="edit textmember <?php echo $select_product['member_id']; ?>" name="address" readonly><?php echo $select_product['address'] ?></textarea>
          </td>
          <td>
            <button type="submit" name="editmember" id="<?php echo $select_product['member_id']; ?>" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='e';">
              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </button>
            <button type="submit" name="deletemember" class="btn btn-default btn-sm" aria-label="Left Align" onclick="bool='d';">
              <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </button>
          </td>

        </tr>
        <input type="hidden" name="member_id" value="<?php echo $select_product['member_id']; ?>">
       </form>
    <?php }
  //}
  ?>
  </table>
