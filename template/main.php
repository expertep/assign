<script type="text/javascript">
$(document).ready(function(){//แถบหาย
        $("nav").css({"opacity":"0","display":"none"});
        $(".menucover").css({"opacity":"1","display":"block"});

});
$(document).scroll(function(){
  var opacity=($(".body").scrollTop()-300)/200;
  var str="none";
        if(opacity>0){str="block";}
        $("nav").css({"opacity":opacity,"display":str});
        $(".menucover").css({"opacity":1-opacity});
});

</script>
<style media="screen">
.cover-container {
margin-right: auto;
margin-left: auto;
}

/* Padding for spacing */
.inner {
padding: 30px;
}


/*
* Header
*/
.masthead-brand {
margin-top: -20px;
margin-bottom: 10px;
width:100px;
height: auto;
vertical-align: middle;
}

.masthead-nav > li {
display: inline-block;
}
.masthead-nav > li + li {
margin-left: 20px;
}
.masthead-nav > li > a {
padding-right: 0;
padding-left: 0;
font-size: 16px;
font-weight: bold;
color: #fff; /* IE8 proofing */
color: rgba(255,255,255,1);
border-bottom: 2px solid transparent;
}
.masthead-nav > li > a:hover,
.masthead-nav > li > a:focus {
background-color: transparent;
border-bottom-color: #a9a9a9;
border-bottom-color: rgba(255,255,255,.25);
}
.masthead-nav > .active > a,
.masthead-nav > .active > a:hover,
.masthead-nav > .active > a:focus {
color: #fff;
border-bottom-color: #fff;
}

@media (min-width: 768px) {
.masthead-brand {
  float: left;
}
.masthead-nav {
  float: right;
}
}
/*
* Affix and center
*/

@media (min-width: 768px) {
/* Pull out the header and footer */
.masthead {
  position: fixed;
  top: 0;
}

/* Start the vertical centering */
.site-wrapper-inner {
  vertical-align: middle;
}
/* Handle the widths */
.masthead,
.cover-container {
  width: 100%; /* Must be percentage or pixels for horizontal alignment */
}
}

@media (min-width: 992px) {
.masthead,
.cover-container {
  width: 70vw;
}
}

.row.search{
  margin:15vh auto;
  width:40vw;
  max-width: 600px;
}
#custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
        height: 50px;
    }

    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 10px;
        padding-left: 10px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        background-color: rgba(255, 255, 255, 1);
        margin-bottom: 0;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        font-size: 150%;
        height: 100%;
        box-shadow: 0px 0px 5px black;
    }

    #custom-search-input button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;

    }

    .search-query:focus + button {
        /*z-index: 3;*/
    }

</style>
  <div class="jumbotron cover">
    <div class="cover-container menucover">
  <div class="masthead clearfix">
    <div class="inner">
      <img src="logo.png" class="masthead-brand">

      <ul class="nav masthead-nav">
        <li class="active">
          <a href="#">HOME</a>
        </li>

        <?php if (isset($_SESSION['user_status'])&&$_SESSION['user_status'] == "1") { ?>
        <li><a href="backend/">Controller</a></li>
        <?php }else{ ?>
          <li>
            <a href="#list">product</a>
          </li>
          <li>
            <a href="#foot">Contact</a>
          </li>
          <li><a href="cart.php">
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">
              <span class="badge" id='count1'>
            <?php
             if (!isset($_SESSION['cart'])||$_SESSION['cart']==0){
             echo "0";
             }
             else {
               echo count($_SESSION['cart']);
             }
            ?>
            </span></span></a></li>
          <?php }if(!isset($_SESSION['username'])){ ?>

          <li>
            <a href="member.php?action=login">Login</a>
          </li>
          <?php }else{ ?>
            <li>
              <a href="member.php?action=logout">Logout</a>
            </li>
            <?php } ?>
      </ul>
    </div>
  </div>
</div>

<form class="row search" action="listproduct.php" method="get" >
         <div id="custom-search-input">
              <div class="input-group">
                  <input type="text" name="serachtext" class="search-query form-control" placeholder="ค้นหาสินค้าสิ">
                  <span class="input-group-btn">
                  <button class="btn btn-danger" name="serach" type="submit">
                    <span class=" glyphicon glyphicon-search"></span>
                  </button>
                  </span>
              </div>
        </div>
</form>

  </div>
<center>
  <div class="jumbotron product">
    <div class="container">
      <h2>promotion</h2>
      <div class="promotion" style="background-image:url(backend/promotion/images.jpg)">
        <br><br>
      </div>
      <div class="promotion" style="background-image:url(backend/promotion/images.jpg)">
        <br><br>
      </div>

    </div>
  </div>

<div class="jumbotron product" >
      <div  id="list">
       <?php include 'product/listproduct_box.php'; ?>
     </div>
  </div>
</center>
