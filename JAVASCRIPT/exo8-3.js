cpt = 0; 
somme = 0.0; 
nbUser = 1

/*do 
{ 
   nbUser = parseFloat(prompt("Nombre (0 pour finir) : ")); 
   cpt = cpt + 1; 
   somme = somme + nbUser;  // somme += nblu;
} while (nbUser != 0) 
 */

while(nbUser != 0){
    nbUser = parseFloat(prompt("Nombre (0 pour finir) : ")); 
    cpt = cpt + 1; 
    somme += nbUser;
}

if (cpt == 1) 
{ 
   document.write("Aucun nombre n’a été saisi"); 
} 
else 
{ 
    console.log(somme);
   moyenne = somme / (cpt-1); 
   document.write("Moyenne : "+ moyenne); 
   console.log(moyenne)
}




