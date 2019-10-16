
$(document).ready(function () {
  
    let tableRows = document.getElementsByTagName("tr");
    let child = tableRows[1].children[2].childNodes[0].data
    sessionStorage.setItem("numKon", child)

    let array = JSON.parse(localStorage.getItem("array"))
    console.log(array)

    if(array == null) {
        sessionStorage.setItem("ID", -1)
    }
    else {
        for(i = 0; i < array.length; i++) {
            if(array[i].konto[0].numer == child) {
                sessionStorage.setItem("ID", i)
                break;
            }
            else {
                sessionStorage.setItem("ID", -1)
            }
        }
    }


})
