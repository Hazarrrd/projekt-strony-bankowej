$(document).ready(function () {

    let rachunek = $('dt.rachunek').text();
    let fake = sessionStorage.getItem('pKon')
    console.log(fake)

    $('dt.rachunek').text('Na rachunek: ' + fake);

    rachunek = rachunek.split('Na rachunek: ');
    rachunek = rachunek[1];
    let data = $('dd.data').text()
    let konto = sessionStorage.getItem("numKonta");
    console.log(konto)

    let newArray =   
    [
        {
            "konto": [
                {
                    "numer": konto
                },
                {
                    "date": data,
                    "fakeNum": rachunek,
                    "correctNum": fake
                }
            ]
        }
    ]
    let obj =
    {
        "konto": [
            {
                "numer": konto
            },
            {
                "date": data,
                "fakeNum": rachunek,
                "correctNum": fake
            }
        ]
    }

    // localStorage.setItem("array", JSON.stringify(obj));

    let array = JSON.parse(localStorage.getItem("array"));
    let exist = false;
    let ID = null;
    console.log("ARRAY", array);
    if(array == null) {
        exist = false;
    }
    else {
        for(x = 0; x < array.length; x++) {
            if(array[x].konto[0].numer == konto) {
                exist = true;
                ID = x;
                break;
            }
        }
    }

    $('input[type="submit"]').click(function () {
        console.log("działa")
        // document.getElementById("datepicker").click()
        if(array == null) {
            localStorage.setItem("array", JSON.stringify(newArray));
        }
        else if(exist) {
            array[ID].konto.push({
                "date": data,
                "fakeNum": rachunek,
                "correctNum": fake
            });
            localStorage.setItem("array", JSON.stringify(array));
        }
        else {
            array.push(obj);
            localStorage.setItem("array", JSON.stringify(array));
        }
    })




})
