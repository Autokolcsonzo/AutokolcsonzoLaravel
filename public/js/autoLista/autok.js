$(function () {
    const token = $('meta[name="csrf-token"]').attr("content");
    const myAjax = new MyAjax(token);
    const szuloElem = $("#jarmu-lista");
    const sablonElem = $(".jarmu-card");
    $('#toltes-embed, #load').css('display', 'block');
    let keresoLocalSOBJ = localStorage.getItem("keresoLocalSOBJ");
        keresoLocalSOBJ = JSON.parse(keresoLocalSOBJ);
        if (keresoLocalSOBJ != null || 0) {
            const kfs = new KeresoFeltolteseLocalStorage();
            kfs.setHozottParameterek();
            $("#idoEl").val(keresoLocalSOBJ.elvitelIdo);
            $("#idoVissza").val(keresoLocalSOBJ.visszaIdo);
        }
    setTimeout(function(){
        $('#keresesBtn').click();
        $('#toltes-embed, #load').css('display', 'none');
      }, 1000);

    //keresesParameteresen( {mezo}/{helyszin}/{elvitel}/{visszahoz}/{marka}/{modell}/{kivitel}/{uzemanyag}/{evTol}/{evIg}/{arTol}/{arIg}/{checkboxok})
    //http://127.0.0.1:8000/api/auto_fill/kék/Budapest/2022-03-25/2022-03-26/BMW/X5/Kombi/Benzin/2013/2022/2000/6000/GPS
    $('#keresesBtn').on('click', function() {
        /*const kedvezmeny = new Auto();
        kedvezmeny.setKedvezmenyek();*/
        let szurtVegpont = '';
        let autok = [];
        
        let keresoMezo = keresoMezoBeolvasasa($("#keresoMezo").val());
        let Khelyszinek = $("#Khelyszinek").val();
        let elvitel = $("#elvitel").val();
        let visszavitel = $("#visszavitel").val();
        let kersoCheckbox = checkboxokBeolvasasa();
        let marka = $("#marka").val();
        let modell = $("#modell").val();
        let kivitel = $("#kivitel").val();
        let uzemanyag = $("#uzemanyag").val(); 
        let etol = $("#etol").val();
        let eig = $('#eig').val();
        let min = $("#min").val();
        let max = $("#max").val();
        let oszlop = $("#rendezes").val();
        let sorrend = $("#rendezes option").data();
        console.log(oszlop , sorrend);

        if(keresoMezo == null || 0 || '' || (keresoMezo.length < 1)){
            keresoMezo = 'null';
        }
        if(Khelyszinek == null || 0 || '' || (Khelyszinek.length < 1)){
            Khelyszinek = 'null';
        }
        if(elvitel == null || 0 || '' || (elvitel.length < 1)){
            elvitel = 'null';
        }
        if(visszavitel == null || 0 || '' || (visszavitel.length < 1)){
            visszavitel = 'null';
        }
        if(kersoCheckbox == null || 0 || '' || (kersoCheckbox.length < 1)){
            kersoCheckbox = 'null';
        }
        if(marka == null || 0 || '' || (marka.length < 1)){
            marka = 'null';
        }
        if(modell == null || 0 || '' || (modell.length < 1)){
            modell = 'null';
        }
        if(kivitel == null || 0 || '' || (kivitel.length < 1)){
            kivitel = 'null';
        }
        if(uzemanyag == null || 0 || '' || (uzemanyag.length < 1)){
            uzemanyag = 'null';
        }
        if(etol == null || 0 || '' || (etol.length == 1)){
            etol = 'null';
        }
        if(eig == null || 0 || '' || (eig.length == 1)){
            eig = 'null';
        }
        if(min == null || 0 || '' || (min.length < 1)){
            min = 'null';
        }
        if(max == null || 0 || '' || (max.length < 1)){
            max = 'null';
        }




        console.log(
            keresoMezo,'\n',
            Khelyszinek,'\n',
            elvitel,'\n',
            visszavitel,'\n',
            kersoCheckbox,'\n',
            marka,'\n',
            modell,'\n',
            kivitel,'\n',
            uzemanyag, '\n',
            etol, '\n',
            eig, '\n',
            min, '\n',
            max, '\n'
        );
        szurtVegpont = 'http://127.0.0.1:8000/api/auto_fill/'+keresoMezo+'/'+Khelyszinek+'/'+elvitel+'/'+visszavitel+'/'+marka+'/'+modell+'/'+kivitel+'/'+uzemanyag+'/'+etol+'/'+eig+'/'+min+'/'+max+'/'+kersoCheckbox+'/'+oszlop+'/'+sorrend;
        myAjax.getAdat(szurtVegpont, autok, autoFeltoltes); // asyncron módon hívódik
        console.log(szurtVegpont);
        console.log(autok);
    });
    function autoFeltoltes(autok) {
        szuloElem.empty()
        sablonElem.show();
        autok.forEach(function (auto) {
            const ujElem = sablonElem.clone().appendTo(szuloElem);
            const ujAuto = new Auto(ujElem, auto);
        });
        sablonElem.hide();
    }

    //Sortok
    /*let keresomezo = $("#keresoMezo");
    keresomezo.on("keyup", () => {
        autok.splice(0, autok.length);
        $("#jarmu-lista").empty();
        let apivegpont = "http://localhost:8000/api/auto_fill";
        apivegpont += "?q=" + keresomezo.val();
        console.log(autok);
        myAjax.getAdat(apivegpont, autok, autoFeltoltes);
    });

    $("#rendezes").on("change", () => {
        let apivegpont = "http://localhost:8000/api/auto_fill";
        $("#jarmu-lista").empty();
        if ($("#rendezes").val() == "alap") {
            myAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "novekvo") {
            apivegpont += "?_sort=ar&_order=asc";
            myAjax.getAdat(apivegpont, autok, autoFeltoltes);
        } else if ($("#rendezes").val() == "csokkeno") {
            apivegpont += "?_sort=ar&_order=desc";
            myAjax.getAdat(apivegpont, autok, autoFeltoltes);
        }
    });*/

    function checkboxokBeolvasasa() {
        let checkedCheckboxs = "";
        $(".kersoCheckbox:checkbox").each(function () {
            if (this.checked) {
                let trim = $(this).val();
                trim = trim.replace(" ", "_");
                checkedCheckboxs += trim + "+";
                //console.log(checkedCheckboxs);
            }
        });
        checkedCheckboxs = checkedCheckboxs.slice(0, -1);
        return checkedCheckboxs;
    }


    function keresoMezoBeolvasasa(keresoMezo){
        let urlKompatibilis = "";
        urlKompatibilis = keresoMezo.replace(" ", "+");
        return urlKompatibilis;
    }

});
