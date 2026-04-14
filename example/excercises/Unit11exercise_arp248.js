    function getFunStats() {
       var domSnack = document.getElementById("snack");
       var domEnergy = document.getElementById("energy");
       var domShow = document.getElementById("show");
       var domGame = document.getElementById("game");
       var domCoffee = document.getElementById("coffee");
       var request = new XMLHttpRequest();  // XMLHttpRequest
       request.open("GET", "Unit11exercise_arp248.php", true);
       request.onreadystatechange = function() {
           if (request.readyState == 4 && request.status == 200) {
               var xmldoc = request.responseXML;
               var xmlSnack = xmldoc.getElementsByTagName("snack")[0];
               domSnack.innerHTML = xmlSnack.childNodes[0].nodeValue;
               var xmlEnergy = xmldoc.getElementsByTagName("energy")[0];
               domEnergy.innerHTML = xmlEnergy.childNodes[0].nodeValue;
               var xmlShow = xmldoc.getElementsByTagName("show")[0];
               domShow.innerHTML = xmlShow.childNodes[0].nodeValue;
               var xmlGame = xmldoc.getElementsByTagName("game")[0];
               domGame.innerHTML = xmlGame.childNodes[0].nodeValue;
               var xmlCoffee = xmldoc.getElementsByTagName("coffee")[0];
               domCoffee.innerHTML = xmlCoffee.childNodes[0].nodeValue;
           }
       };
       request.send();
    }

