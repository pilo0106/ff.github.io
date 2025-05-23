<html>
<body translate="no" > 
<script>
    window.console = window.console || function(t) {};
  </script>
  
    
    
    <script>
    if (document.location.search.match(/type=embed/gi)) {
      window.parent.postMessage("resize", "*");
    }
  </script>
<div class="page-main" role="main">
        <aside>
            <ul>
                <li><a href="main.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 主頁 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <hr width="90%">
                <li><a href="user.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  @<?php echo $_SESSION["username"] ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <hr width="90%">
                <li><a href="contact.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 聯絡人 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a> </li>
                <hr width="90%">
                <li><a href="record.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 紀錄 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <hr width="90%">
                <li><a href="en_main.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 中/EN &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
                <hr width="90%">
                <li><a href="logout.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 登出 &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></li>
            </ul>
            <button class="qq">:)</button>
        </aside>
    </div>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js'></script>
<script id="rendered-js" >
$(function(){
    // 
    var duration = 300;

    // aside ----------------------------------------
    var $aside = $('.page-main > aside');
    var $asidButton = $aside.find('.qq')
        .on('click', function(){
            $aside.toggleClass('open');
            if($aside.hasClass('open')){
                $aside.stop(true).animate({left: '-70px'}, duration, 'easeOutBack');
                $asidButton.find('img').attr('src', 'https://c2.staticflickr.com/6/5635/31065147822_9b6e31ab5f_o.png');
            }else{
                $aside.stop(true).animate({left: '-350px'}, duration, 'easeInBack');
                $asidButton.find('img').attr('src', 'https://c2.staticflickr.com/6/5555/31208490685_5c55f2f28f_o.png');
            };
        });

});

</script>
</body>
</html> 