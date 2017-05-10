<?php

//include_once "../config/config.php"
//if(isset($_POST['name_product'])){
  $sql = "UPDATE table_product SET name_product='".$_POST['name_product']."' WHERE id_product='".$_POST['id_product']."'";

if ($connect->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connent->error;
}

//}
 ?>
 <script type="text/javascript">
   alert("<?php echo $sql; ?>");
 </script>
