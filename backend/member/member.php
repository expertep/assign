<script type="text/javascript">
  var bool;//บอกว่ากดedit หรือ delete
</script>
  <h1>Member</h1>
  <form class="" action="#" method="POSt">

    <div class="form-group">
    <span>
      <input type="text" name='search' class="form-control" placeholder="Search">
      <button type="submit" name='searchb' class="btn btn-default">ค้นหา</button>
    </span>
    </div>
  </form>

  <br>

  <?php
  if(isset($_POST['searchb'])){
    $sql_select_product = 'SELECT * FROM table_member WHERE member_id LIKE "%'.$_POST['search'].'%"OR username LIKE "%'.$_POST['search'].'%"';
  }
  else{
    $sql_select_product = 'SELECT * FROM table_member ';
  }

?>

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
          <input class="edit <?php echo $select_product['member_id']; ?>" type="text" name="address" value="<?php echo $select_product['address'] ?>" readonly>
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





<script type="text/javascript">// เปลี่ยนรูปปุ่มedit
  function check(row){
    if(bool=='e'){
      if($("#"+row+" span").attr('class')=='glyphicon glyphicon-pencil'){
        $("#"+row+" span").attr('class','glyphicon glyphicon-floppy-disk');
        $(".edit."+row).removeAttr("readonly");
        return false;
      }
      else{
        $("#"+row+" span").attr('class','glyphicon glyphicon-pencil');
        $(".edit."+row).attr("readonly","");
        return true;
      }
      return false;
    }
    else return true;
  }

</script>
