
$(document).ready(function () {

    let tableRows = document.getElementsByTagName("tr");

    console.log(tableRows);
    // console.log(JSON.parse(localStorage.getItem("array")))
    let id = sessionStorage.getItem("ID")
    console.log(id)
    if(id >= 0) {
        let currentData = JSON.parse(localStorage.getItem("array"))[id].konto
        console.log(currentData);
        changer(tableRows, currentData);
    }


    function changer(tableRows, currentData) {
        let end = false;
        for (i = 2; i < tableRows.length; i++) {
            for (j = 1; j < currentData.length; j++) {
                if(tableRows[i].firstChild.childNodes[0].data == currentData[j].date) {
                    // OK
                    console.log(currentData[j].fakeNum)
                    if(tableRows[i].childNodes[2].childNodes[0].data == currentData[j].fakeNum) {
                        // OK
                        tableRows[i].childNodes[2].childNodes[0].data = currentData[j].correctNum
                        if(j == (currentData.length - 1)) {
                            end = true;
                        }
                        break;
                    }
                }
            }
            if(end) {
                break;
            }
        }
    }

})
