<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>tic tac toe game</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="assets/bootstrap-4.4.1/css/bootstrap.min.css">
        <script src="assets/bootstrap-4.4.1/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <style>
            .endofgame {
              pointer-events: none;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron text-center" style="margin-bottom:0">
           <h1>tic tac toe</h1>
           <p></p> 
        </div>
        <div class="container" style="margin-top:30px">
             <div class="row">
                  
                  <div class="col-sm-12" align="center">
                     
                      <input type="hidden" id="round" value="0">
                      <form action="index.php" method="post">
                          กรอกขนาดตาราง: <input type="text" id="len" name="len" value="<?=isset($_POST['len'])? $_POST['len']:3?>">
                          <input type="submit" value="ตกลง">
                          <br><br>
                          <div id="showinner"></div>
                          <br>
                      </form>
                      <table border="1" >
                          
                         <?php
                         if(isset($_POST['len'])){
                            $len= $_POST['len']; 
                         }else{
                             $len= 3;
                         }
                     
                            $txt="X";
                            for($i=0;$i<$len;$i++){
                         ?>
                             <tr>
                         <?php
                              for($j=0;$j<$len;$j++){
                         ?>
                                 <td width="50px" heigh="50px"><input type="text" style="border:none; width: 50px;" id="rw_<?=$i?>_<?=$j?>" value="" onclick="add_value(<?=$i?>,<?=$j?>,'<?=$txt?>',<?=$len?>)"></td>
                         <?php
                              }
                         ?>
                            </tr>
                         <?php
                            }
                         ?>
                      </table>
                  </div>
        </div>
</div>
        <br><br>
<div class="jumbotron text-center" style="margin-bottom:0">
  <p></p>
</div>

</body>
</html>
<script>
    function add_value(i,j,txt,len){
      if($("#rw_"+i+"_"+j).val() == ""){
         $("#rw_"+i+"_"+j).val(txt);
         check_winner(len);
         var r = $("#round").val();
         do{
            var x = Math.floor(Math.random() * len);
            var y = Math.floor(Math.random() * len);
            r++;
            $("#round").val(r);
         }while($("#rw_"+x+"_"+y).val() != "" && $("#round").val()<(len*len))
     
         if(txt == "X"){
            $("#rw_"+x+"_"+y).val("O");
         }else{
            $("#rw_"+x+"_"+y).val("X");
         }
         check_winner(len);
       }
    }
 function check_winner(len){
         countO3 =0;
         countX3 =0;
         for(var k=0;k<len;k++){
             countO =0;
             countX =0;
             countO2 =0;
             countX2 =0;
             
             for(var l=0;l<len;l++){
                if($("#rw_"+k+"_"+l).val()=="O"){
                    countO++;
                }
                if($("#rw_"+k+"_"+l).val()=="X"){
                    countX++;
                }
                 if($("#rw_"+l+"_"+k).val()=="O"){
                    countO2++;
                }
                if($("#rw_"+l+"_"+k).val()=="X"){
                    countX2++;
                }
                if(k == l){
                    if($("#rw_"+k+"_"+l).val()=="O"){
                      countO3++;
                     
                    }
                    if($("#rw_"+k+"_"+l).val()=="X"){
                      countX3++;
                      
                    }
                }
             }if(countO == len || countO2 == len || countO3 == len ){
                 $("#showinner").html('O win');
                 endgame(len);
               }else if(countX == len || countX2 == len || countX3 == len ){
                 $("#showinner").html('X win');
                 endgame(len);
               }
         }
 }
 function endgame(len){
    for(var i=0;i<len;i++){
         for(var j=0;j<len;j++){
             if($("#rw_"+i+"_"+j).val() == ""){
                 $("#rw_"+i+"_"+j).addClass("endofgame");               
             }
         }
    }
 }
</script>
    </body>
</html>
