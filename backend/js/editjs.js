function check(row){// เปลี่ยนรูปปุ่มedit
  if(bool=='e'){
    if($("#"+row+" span").attr('class')=='glyphicon glyphicon-pencil'){
      $("#"+row+" span").attr('class','glyphicon glyphicon-floppy-disk');
      $(".edit."+row).removeAttr("readonly");
      //$(".edit.check."+row).prop('disabled', false);
      $(".check."+row).removeAttr("disabled");
      $(".edit."+row).css({"background-color":"#E7E7E7"});
      return false;
    }
    else{
      $("#"+row+" span").attr('class','glyphicon glyphicon-pencil');
      $(".edit."+row).attr("readonly","");
      //$(".edit.check."+row).prop('disabled', true);
      //$(".check."+row).attr("disabled",true);
      $(".edit."+row).css({"background-color":"#E7E7E7"});
      return true;
    }
    return false;
  }
  else return true;
}
