function Germainoperator7()
{
var a = Number(prompt("Choisir un nombre"));

var b = Number(prompt("Choisir un nombre"));

var c = prompt("Choisir un opérateur");

var d;

switch (c) 
{
    case "+":
        console.log(a + b);
        break;

    case "-":
        console.log(a - b);
        break;

    case "/":
        console.log(a / b);
        break;

    case "*":
        console.log(a * b);
        break;

    default:
        console.log("Mauvais opérateur")
}
}






