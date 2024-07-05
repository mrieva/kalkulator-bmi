<?php
if(isset($_GET['clear'])) {
    $_GET['tb'] = "";
    $_GET['bb'] = "";
}


if(isset($_GET['hitung'])) {
    $tb = $_GET['tb'];
    $bb = $_GET['bb'];

    // Menghitung BMI
    $tbHasil = $_GET['tb'] / 100;
    $hasil = $bb / ($tbHasil * $tbHasil);


    if($hasil <= 18.5){
        $keterangan = "Kurus";
    } elseif($hasil <= 25){
        $keterangan = "Normal";
    } elseif($hasil <= 29.9){
        $keterangan = "Gemuk";
    } else {
        $keterangan = "Obesitas";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>
    <style>
    body{
        background: black;
        font-family: sans-serif;
    }
    h2{
        color: blue;
        text-align: center;
        line-height: 2.9;
        font-size: 25px;
        font-family: 'sans-serif';
    }
    form .section1 input, .section2 input{
        width: 200px;
        border: 1px solid teal;
        outline: none;
        border-radius: 5px;
        font-size: 15px;
        padding: 7px;
        color: gray;
        font-family: 'sans-serif';
    }
    .wrapper{
        width: 400px;
        height: 370;
        background: white;
        margin: 100px auto;
        padding: 10px 20px 50px 20px;
        border-radius: 10px;
        border: 1px solid teal;
        box-shadow: 0 0 20px #7ed6f4;
        font-family: 'sans-serif';
    }
    form .submit input{
        font-size: 10px;
        color: teal;
        background: white;
        border: 1px solid teal;
        border-radius: 5px;
        padding: 8px 15px;
        margin-top: 10px;
        margin-bottom: 20px;
        transition: all 0.3s;
        font-family: 'sans-serif';
    }
    form .submit input:hover{
        background: teal;
        color: white;
    }
</style>
</head>
<body>
    <div class="wrapper">
        <h2>Check Your BMI</h2>
        <form method="get" action="bmi.php">
            <div class="section1">
                Tinggi Badan :
                <input type="text" name="tb" value="<?php echo isset($_GET['tb']) ? $_GET['tb'] : ''; ?>" required>
            </div>
            <br>
            <div class="section2">
                Berat Badan :
                <input type="text" name="bb" value="<?php echo isset($_GET['bb']) ? $_GET['bb'] : ''; ?>" required>
            </div>
            <br>
            <div class="submit">
                <input type="submit" name="hitung" value="Hitung">
                <input type="submit" name="clear" value="Clear">
            </div>
        </form>

        <?php
        if(isset($_GET['hitung'])) {
            echo '<div class="result">';
            echo '<h3>Hasil</h3>';
            echo '<p>Tinggi Badan: ' . $tb . ' cm</p>';
            echo '<p>Berat Badan: ' . $bb . ' kg</p>';
            echo '<p>BMI: ' . number_format($hasil, 1) . '</p>';
            echo '<p>Keterangan: ' . $keterangan . '</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
