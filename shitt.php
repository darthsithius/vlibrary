<table style="width: 50%">
      <tr>
        <th>Game</th>
        <th>Client</th>
      </tr>
      <hr>
      <?php
        $m=$_SESSION['uid'];
        $sql=("SELECT title,client FROM game,owns WHERE owns.uid='$m' AND (owns.gid=game.gid)");

        if ($result=mysqli_query($conn,$sql))
          {
          // Fetch one and one row
          while ($row=mysqli_fetch_row($result))
            {
            echo "<tr>";
            echo "<td>"; printf ("%s",$row[0]); echo "</td>";
            echo "<td>";  printf ("%s",$row[1]); echo "</td>";
            echo "</tr>";
            }
          // Free result set
          mysqli_free_result($result);
       }
      ?>
    </table>



    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
      <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/steam.php">Steam</a></li>
        <li><a href="/origin.php">Origin</a></li>
        <li><a href="/gog.php">GOG</a></li>
        <li><a href="/Battledotnet.php">Battle.net</a></li>
      </ul>
    </div>