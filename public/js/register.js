let reverseTrawler;
let reverseManager;
    
console.log("x");
function changeRegistrationVisibility(caller){
    let element = document.getElementById("registration_trawler_div");
    let typeElement = document.getElementById("typeLabel");
        
    if(caller.innerText == "Trawler") {
        element.hidden = false;
        typeElement.value = "trawler";
        if(reverseTrawler == false) {
            reverseTrawler=true;
            caller.style.backgroundcolor = "#DBDEE2";
            caller.style.color = "white";
        } else {
            reverseTrawler=false;
            caller.style.backgroundcolor = "#12507C";
            caller.style.color = "#DBDEE2";
        }
    } else {
        element.hidden = true;
        typeElement.value = "manager";
        if(reverseManager == false) {
            reverseManager=true;
            caller.style.backgroundcolor = "#DBDEE2";
            caller.style.color = "white";
        } else {
            reverseManager=false;
            caller.style.backgroundcolor = "#12507C";
            caller.style.color = "#DBDEE2";
        }
    }
}