function validateCents() {
 calculateButton = document.getElementById("calculate");
 centsInput = document.getElementById("cents");
 let cents = centsInput.value;
 console.log("cents =", cents);
 if (cents.trim() === "" || isNaN(cents) || cents < 0 || cents > 99) {
   centsInput.style.color = "red";
   calculateButton.disabled = true;
 } else {
   centsInput.style.color = "black";
   calculateButton.disabled = false;
 }
}
function makeChange() {
 cents = parseInt(document.getElementById("cents").value);
 const quarters = parseInt(cents / 25);  // get number of quarters
 console.log("quarters =", quarters);
 cents = cents % 25;                     // assign remainder to cents variable
 const dimes = parseInt(cents / 10);     // get number of dimes
 console.log("dimes =", dimes);
 cents = cents % 10;                     // assign remainder to cents variable
 const nickels = parseInt(cents / 5);    // get number of nickels
 console.log("nickels =", nickels);
 const pennies = cents % 5;              // get number of pennies
 console.log("pennies =", pennies);
 // display the results of the calculations
 document.getElementById("quarters").value = quarters;
 document.getElementById("dimes").value = dimes;
 document.getElementById("nickels").value = nickels;
 document.getElementById("pennies").value = pennies;
};