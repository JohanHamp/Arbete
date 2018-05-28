<?php
include_once("connect.php");

if(isset($_POST['update']))
{
    $personnummer= $_POST['personnummer'];

    $namn=$_POST['namn'];
    $epost=$_POST['epost'];
    $password=$_POST['password'];
    $anvtyp=$_POST['anvtyp'];

        $updatequery= mysqli_query($conn, "UPDATE user SET epost='$epost', namn='$namn', password='$password', anvtyp = '$anvtyp' WHERE personnummer='$personnummer';");

        header("Location: adminpage.php");

}


//getting id from url
$personnummer = $_GET['personnummer'];

//selecting data associated with this particular id
$userquery= mysqli_query($conn, "SELECT * FROM user WHERE personnummer= $personnummer");

while($row = mysqli_fetch_array($userquery))
{
    $namn = $row['namn'];
    $personnummer = $row['personnummer'];
    $epost = $row['epost'];
    $password =$row['password'];
    $anvtyp=$row['anvtyp'];
}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
    <br/><br/>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Namn</td>
                <td><input type="text" name="namn" value="<?php echo $namn;?>"></td>
            </tr>
            <tr>
                <td>Personnummer</td>
                <td><input type="text" name="personnummer" value="<?php echo $personnummer;?>" disabled></td>
            </tr>
            <tr>
                <td>E-post</td>
                <td><input type="text" name="epost" value="<?php echo $epost;?>"></td>
            </tr>
            <tr>
                <td>Lösenord</td>
                <td><input type="text" name="password" value="<?php echo $password;?>"></td>
            </tr>
            <tr>
                <td>Användartyp</td>
                <td><input type="text" name="anvtyp" value="<?php echo $anvtyp;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="personnummer" value=<?php echo $_GET['personnummer'];?>></td>
                <td><input type="submit" name="update" value="Uppdatera"></td>
            </tr>
        </table>
    </form>
</body>
</html>
