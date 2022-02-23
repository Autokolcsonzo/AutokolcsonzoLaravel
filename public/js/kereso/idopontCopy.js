/*class DatumIdo2 {
    constructor() {
        this.atlepettHonapok = 1;
        this.valdat = $("#elvitel");
        $('#elvitel, #visszavitel').on('change',()=>{
            this.kersztDatumKorrigalas(this.valdat);
            console.log("fuck me")
        });
    }

    MinDatum() {
        let today = new Date();
        let dd = today.getDate();
        let mm = today.getMonth() + this.atlepettHonapok; //January is 0 so need to add 1 to make it 1!
        let yyyy = today.getFullYear();
        if (dd < 10) {
            dd = "0" + dd;
        }
        if (mm < 10) {
            mm = "0" + mm;
        }

        const elviInput = `#elvitel,
                           #foglalas-tolD`;

        const visszInput = `#visszavitel,
                            #foglalas-igD`;

        today = yyyy + "-" + mm + "-" + dd;
        console.log("today : "+today);
        $(elviInput).attr("min", today);
        $("#elvitel, #foglalas-tolD").attr("value", today);

        let holnap = new Date();
        dd = holnap.getDate() + 1;
        mm = holnap.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
        yyyy = holnap.getFullYear();
        if (dd < 10) {
            dd = "0" + dd;
        }
        if (mm < 10) {
            mm = "0" + mm;
        }
        holnap = yyyy + "-" + mm + "-" + dd;
        
        console.log("holnap : "+holnap);
        if ($("#elvitel").val() >= $("#visszavitel").val()) {
            this.kersztDatumKorrigalas(this.valdat);
        }else{
            $(visszInput).attr("min", holnap);
            $("#visszavitel, #foglalas-igD").attr("value", holnap);
        }
        
        return today;
    }

    MinIdo() {
        let today = new Date();
        let ora = today.getHours();
        let perc = today.getMinutes();
        if (perc < 10) {
            perc = "0" + perc;
        } else if (perc == 0) {
            perc = "00";
        }
        $("#idoEl,#idoVissza").append(
            '<option class="placeholder">óra. perc</option>'
        );
        if ($("#elvitel").val() == this.MinDatum()) {
            for (let index = ora + 1; index <= 24; index++) {
                if (ora + 1 == index) {
                    $("#idoEl").append(
                        `<option>${index + ":" + perc}</option>`
                    );
                } else if (index == 24) {
                    $("#idoEl").append(`<option>${"00:00"}</option>`);
                } else {
                    $("#idoEl").append(`<option>${index + ":00"}</option>`);
                }
            }
        } else {
            for (let index = 1; index <= 24; index++) {
                if (index == 24) {
                    $("#idoEl").append(`<option>${"00:00"}</option>`);
                } else {
                    $("#idoEl").append(`<option>${index + ":00"}</option>`);
                }
            }
        }
        for (let index = 1; index <= 24; index++) {
            if (index == 24) {
                $("#idoVissza").append(`<option>${"00:00"}</option>`);
            } else {
                $("#idoVissza").append(`<option>${index + ":00"}</option>`);
            }
        }
    }
    
    kersztDatumKorrigalas(elvitelDatum) {
        let plusNap = new Date(elvitelDatum);
        let dd = plusNap.getDate() + 1;
        let mm = plusNap.getMonth() + this.atlepettHonapok; //January is 0 so need to add 1 to make it 1!
        let yyyy = plusNap.getFullYear();
        
        console.log("plusNap : "+plusNap);

        function daysInMonth(mm, yyyy) {
            return new Date(yyyy, mm, 0).getDate();
        }

        if (plusNap.getDate() == daysInMonth(mm, yyyy)) {
            this.atlepettHonapok++;
            let ugrottDatum = "";
            let ugroDatum = new Date(elvitelDatum);
            let ugroNap = ugroDatum.getDate() + 1;
            let ugroHonap = ugroDatum.getMonth() + this.atlepettHonapok; //January is 0 so need to add 1 to make it 1!
            let ugroEv = ugroDatum.getFullYear();
            if (ugroHonap.length > 10) {
                ugrottDatum = ugroEv + "-" + "0" + ugroHonap + "-" + "01";
            } else {
                ugrottDatum = ugroEv + "-" + "0" + ugroHonap + "-" + "01";
            }

            
            console.log("ugrottDatum : "+ugroDatum);

            console.log("kövi hónap elseje : " + ugrottDatum);
            $("#visszavitel, #foglalas-igD").attr("min", ugrottDatum);
            $("#visszavitel, #foglalas-igD").attr("value", ugrottDatum);
        }else{
            if (dd < 10) {
                dd = "0" + dd;
            }
            if (mm < 10) {
                mm = "0" + mm;
            }
            plusNap = yyyy + "-" + mm + "-" + dd;
            
            console.log("else plusNap: "+plusNap);
            $("#visszavitel, #foglalas-igD").attr("min", plusNap);
            $("#visszavitel, #foglalas-igD").attr("value", plusNap);
        }
    }
}*/
