<?php
$expression = '';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $expression = $_POST["expression"];


    try {
        $result = eval('return ' . $expression . ';');
    } catch (ParseError $e) {
        $result = 'Erro na expressão';
    }


    file_put_contents("results.txt", $expression . " = " . $result . PHP_EOL, FILE_APPEND);
} 
else{
    $result = '0';
}
if(isset($_GET["clear"])){
    file_put_contents("results.txt", "");
    header("Location: calculate.php");
    exit();
}

$results = file("results.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado da Calculadora</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Calculadora Militar</h1>
  <div class="calculator">
    <form action="calculate.php" method="POST">
      <input type="text" name="expression" id="display" value="<?php echo $expression; ?>" readonly>
      <input type="text" id="result" value="<?php echo $result; ?>" readonly>
      <div class="buttons">
      <button type="button" onclick="addToDisplay('7')">7</button>
        <button type="button" onclick="addToDisplay('8')">8</button>
        <button type="button" onclick="addToDisplay('9')">9</button>
        <button type="button" onclick="addToDisplay('+')">+</button>
        <button type="button" onclick="addToDisplay('4')">4</button>
        <button type="button" onclick="addToDisplay('5')">5</button>
        <button type="button" onclick="addToDisplay('6')">6</button>
        <button type="button" onclick="addToDisplay('-')">-</button>
        <button type="button" onclick="addToDisplay('1')">1</button>
        <button type="button" onclick="addToDisplay('2')">2</button>
        <button type="button" onclick="addToDisplay('3')">3</button>
        <button type="button" onclick="addToDisplay('*')">*</button>
        <button type="button" onclick="addToDisplay('0')">0</button>
        <button type="button" onclick="addToDisplay('.')">.</button>
        <button type="button" onclick="calculate()">=</button>
        <button type="button" onclick="addToDisplay('/')">/</button>
        <button type="button" onclick="clearDisplay()">C</button>
      </div>
    </form>
  </div>

  <div class="results">
    <h2>Resultados:</h2>
    <center><button class="limpar" type="button" onclick="clearResults()">Limpar Resultados</button></center>
    <ul>
      <?php
      foreach ($results as $r) {
        echo "<li>$r</li>";
      }
      ?>
    </ul>
  </div>
  <footer>Feito com 💙 por Wilgne Oliveira.</footer>
</div>
  <script src="script.js"></script>
</body>
</html>