function reg_form_click()
{   const info=["uname","psw","name","email","goods","price"];
    const user_info=["username","password","full name","email","goods","average price"];
    let x,i;
    for(i=0;i<6;i++)
    {
        let x = document.forms["registration"][info[i]].value;
        if (x == null || x == "")
        {
            window.alert("Please enter "+ user_info[i] + " !");
            return false;
        }
    }
}

function login_form_click()
{   const login=["uname","psw"];
    const message=["username","password"];
    let x,i;
    for(i=0;i<2;i++)
    {
        let x = document.forms["login"][login[i]].value;
        if (x == null || x == "")
        {
            window.alert("Please enter your valid "+ message[i] + " !");
            return false;
        }
        else{     
         }
    }
}

function loadDoc(str, id) {
    var xhttp = new XMLHttpRequest();
    let x; 

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(id).innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "show_reservation.php?q="+str, true);
    xhttp.send()
}

function loadDoc2(id){
    var xhttp = new XMLHttpRequest();
    let x; 
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(id).innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "personal_reservations.php?q="+id, true);
    xhttp.send()
}
