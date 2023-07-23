function addToDisplay(value){
    document.getElementById("display").value += value;
  }
  
function clearDisplay(){
    document.getElementById("display").value = "";
    document.getElementById("result").value = "";
  }
  
function calculate(){
    const form = document.querySelector("form");
    form.submit();
  }
function clearResults(){
    const confirmation = confirm("Tem certeza de que deseja limpar os resultados?");
    if (confirmation) {
        clearDisplay()
        window.location.href = "calculate.php?clear=true";
    }
}