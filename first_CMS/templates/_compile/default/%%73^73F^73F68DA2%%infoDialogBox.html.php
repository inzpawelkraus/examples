<?php /* Smarty version 2.6.13, created on 2017-06-06 09:29:22
         compiled from misc/infoDialogBox.html */ ?>
<div class="infoDialogBox">
    <div class="head">
        Nowy Podpis <span class="closeDialogBox pull-right">X</span>
    </div>
    <div class="body">
        
    </div>
    <div class="icon"></div>
</div>
<script>
    <?php echo '
     $(".closeDialogBox").click(function(){
         $(this).parents(".infoDialogBox").addClass("invisible")
     });
        $(document).ready(function () {
            if($(".closeDialogBox").hasClass("invisible") == false){
            refreshDialog();
        }
        });
        $s = Math.floor((Math.random() * 10) + 1);
        function refreshDialog() {
            $(\'.infoDialogBox\').fadeOut(300);
            $(\'.infoDialogBox .body\').load(\'../checkNewVote.php\', function () {
            setTimeout(refreshDialog, $s * 4 + \'000\');
            });
            $(\'.infoDialogBox\').fadeIn(300);
        }
    '; ?>

</script>