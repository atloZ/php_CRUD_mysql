$(document).ready(() => {

    oldalFrissit = () => {
        listaz();
    }

    listaz = () => {
        $.get("api/listaz.php", response => {
            $("#teszt_tabla").html(`<tr class="w3-grey">
            <th>ID</th>
            <th>Név</th>
            <th>Email</th>
            <th><button onclick="document.getElementById('hozzaad_teszt_modal').style.display='block'"
                    class="w3-button w3-black w3-circle w3-ripple" style="outline: none">+</button></th>
        </tr>`);
            $("#teszt_tabla").append(response);
            console.log(response);
        });
    }

    torol = ID => {
        $.ajax({
            url: `api/torol.php?id=${ID}`,
            dataType: "text",
            success: response => {
                if (response == 1)
                    $(`#teszt_${ID}`).remove();
                console.log(response);
            },
            error: error => {
                console.log(error);
            }
        });
    }

    hozzaad = () => {
        let nev = $("#uj_teszt_nev").val();
        let email = $("#uj_teszt_email").val();
        $.ajax({
            url: `api/hozzaad.php?nev=${nev}&email=${email}`,
            dataType: "text",
            success: response => {
                if (response == 1)
                    oldalFrissit();
                console.log(response);
                hozzaad_adatok_clear();
            },
            error: error => {
                console.log(error);
            }
        })
    }

    hozzaad_adatok_clear = () => {
        $('#hozzaad_teszt_modal').css("display", "none");
        $("#uj_teszt_nev").val("");
        $("#uj_teszt_email").val("");
    }

    modositas = ID => {
        $.get(`api/get.php?id=${ID}`, response => {
            let parsedResponse = JSON.parse(response);
            $("#mod_teszt_id").val(`${parsedResponse.id}`);
            $("#mod_teszt_nev").val(`${parsedResponse.nev}`);
            $("#mod_teszt_ar").val(`${parsedResponse.ar}`);
            $("#mod_teszt_koftart").val(`${parsedResponse.koffein_tartalom}`);
            $("#mod_teszt_kedviz").val(`${parsedResponse.kedvenc_iz}`);
            $('#modosit_teszt_modal').css("display", "block");
            console.log(parsedResponse);
        })
    }

    modosit = () => {
        let id = $("#mod_teszt_id").val();
        let nev = $("#mod_teszt_nev").val();
        let email = $("#mod_teszt_email").val();
        $.ajax({
            url: `api/modosit_ital.php?id=${id}&nev=${nev}&email=${email}`,
            dataType: "text",
            success: response => {
                if (response == 1)
                    oldalFrissit();
                console.log(response);
                modosit_adatok_clear();
            },
            error: error => {
                console.log(error);
            }
        })
    }

    modosit_adatok_clear = () => {
        $('#modosit_teszt_modal').css("display", "none");
        $("#mod_teszt_nev").val("");
        $("#mod_teszt_ar").val("");
    }

    oldalFrissit();
});