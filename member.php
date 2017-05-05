<?php
require_once 'config/config.php';
include_once 'template/header.php';

if ($_GET['action'] == "login"){

  include_once 'member/login/login.php';
}
else if ($_GET['action'] == "register"){

 include_once 'member/register.php';

}

else if ($_GET['action'] == "logout"){

 include_once 'member/logout.php';

}

else if ($_GET['action'] == "profiles"){

include_once 'member/profiles.php';

}

else if ($_GET['action']== "historyorder"){

include_once 'member/historyorder.php';


}

else {

  header('Location:member/..');

}


include_once 'template/footer.php';








 ?>
