<?php
    $sql=("SELECT gid,title FROM game,owns WHERE owns.uid='$m' AND (owns.gid=game.gid)");

    if ($result=mysqli_query($conn,$sql))
          {
          // Fetch one and one row
          while ($row=mysqli_fetch_row($result))
            {
              //$sql1="select path from imager where gid='$row[0]'";
              //$result1=mysqli_query($conn,$sql1);
              //$image=mysqli_fetch_row($result1);
              printf("%s",$row[1]);
              printf("%s",$image[0]);  ?>
              <div class="w3-row w3-grayscale-min">
                <div class="w3-quarter">
                <img src=<?php echo $image[0]; ?> style="width:100%" onclick="onClick(this)" alt=<?php echo $row[1]; ?>>
                </div>
              </div>
            </div>
<?php     }
          // Free result set
          mysqli_free_result($result);
       }
?>