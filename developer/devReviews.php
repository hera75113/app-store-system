<?php
include_once('../includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Reviews</title>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
</head>

<body>
<div id="upperPanel">
<?php
include_once('./layout/devUpperPanel.php');
?>
</div>

<div id="wrapper">

<div id="navigationBar">
<?php
include_once('./layout/devMenu.php');
?>
</div>
<div id="content">
<?php
printError();
printSuccess();
include_once('devReviews.functions.php');
if(isset($_GET['appID']))
{
     
    printAppReviews($_GET['appID']);
       
}
else
{
     $_SESSION['id']=1;
    $sql="SELECT appID FROM apps WHERE developerID={$_SESSION['id']} AND appState=1";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==0)
    {
        echo "you havn't added apps yet.";
        echo '<a href="./newApp.php" class="hrefBtn"> new App</a>';
    }
    else
    {
      while($row=$result->fetch_assoc())
        {
          printAppReviews($row['appID']);  
        }
    }
}
?>
</div>

</div>
<div id="footer">
<?php
include_once('./layout/devFooter.php');
?>
</div>
</body>
</html>