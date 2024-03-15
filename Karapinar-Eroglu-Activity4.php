<!DOCTYPE html>
<html lang="en">
<head>
    <title>Java Jam Coffee House</title>
    <meta name="description" content="CENG 311 Inclass Activity 1" />
</head>
<body>
<?php
$fromAmount = isset($_GET['fromAmount']) ? $_GET['fromAmount'] : '';
$fromCurrency = isset($_GET['fromCurrency']) ? $_GET['fromCurrency'] : 'USD';
$toCurrency = isset($_GET['toCurrency']) ? $_GET['toCurrency'] : 'USD';
$toAmount = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["convert"])) {
    $fromAmount = $_GET["fromAmount"];
    $fromCurrency = $_GET["fromCurrency"];
    $toCurrency = $_GET["toCurrency"];
    
    $rates = [
        "FUSD" => [
            "TCAD" => 1.35,
            "TEUR" => 0.92,
            "TUSD" => 1.00
        ],
        "FCAD" => [
            "TUSD" => 0.74,
            "TEUR" => 0.68,
            "TCAD" => 1.00
        ],
        "FEUR" => [
            "TUSD" => 1.09,
            "TCAD" => 1.47,
            "TEUR" => 1.00
        ]
    ];

    $toAmount = $fromAmount * $rates[$fromCurrency][$toCurrency];
}
?>

<form action="activity4.php" method="GET" >
    <table>
        <tr>
            <td>From:</td>
            <td><input type="text" name="fromAmount" value="<?php echo $fromAmount; ?>" /></td>
            <td>Currency:</td>
            <td>
                <select name="fromCurrency">
                    <option value="FUSD" <?php if ($fromCurrency == 'FUSD') echo 'selected="selected"'; ?>>USD</option>
                    <option value="FCAD" <?php if ($fromCurrency == 'FCAD') echo 'selected="selected"'; ?>>CAD</option>
                    <option value="FEUR" <?php if ($fromCurrency == 'FEUR') echo 'selected="selected"'; ?>>EUR</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>To:</td>
            <td><input type="text" name="toAmount" value="<?php echo $toAmount; ?>" /></td>
            <td>Currency:</td>
            <td>
                <select name="toCurrency">
                    <option value="TUSD" <?php if ($toCurrency == 'TUSD') echo 'selected="selected"'; ?>>USD</option>
                    <option value="TCAD" <?php if ($toCurrency == 'TCAD') echo 'selected="selected"'; ?>>CAD</option>
                    <option value="TEUR" <?php if ($toCurrency == 'TEUR') echo 'selected="selected"'; ?>>EUR</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" name="convert" value="Convert" /></td>
        </tr>
    </table>
</form>
</body>
</html>
