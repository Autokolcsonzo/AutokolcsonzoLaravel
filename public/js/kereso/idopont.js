class DatumIdo {
    constructor() {
        //----------------AKT--------------
        this.honapSkip = 1;
        this.aktDatum = new Date();
        this.aktNap = this.aktDatum.getDate();
        this.aktHo = this.aktDatum.getMonth() + this.honapSkip;
        this.aktEv = this.aktDatum.getFullYear();
        this.aktDatumInt = 0;

        //-------setterek-----------
        this.setMinDate();
        $("#visszavitel").attr("min", $("#elvitel").val());
        $("#visszavitel").attr("value", "");
        this.setMinIdo();
        //----------------triggerek--------------
        $("#elvitel, #visszavitel").on("change", () => {
            this.setMinDate();
            $("#visszavitel").attr("min", $("#elvitel").val());
            $("#visszavitel").attr("value", "");
            this.setMinIdo();
        });
    }

    getMinDate() {
        let ev = this.aktEv;
        let ho = this.aktHo;
        let nap = this.aktNap;
        if (ho < 10) {
            ho = "0" + ho;
        }
        if (nap < 10) {
            nap = "0" + nap;
        }
        return {
            MinDatumString: ev + "-" + ho + "-" + nap,
            MinDatumIntager: parseInt(ev + ho + nap),
        };
    }

    setMinDate() {
        $("#elvitel").attr("min", this.getMinDate().MinDatumString);
        $("#elvitel").attr("value", this.getMinDate().MinDatumString);
    }

    setMinIdo() {
        $("#idoEl,#idoVissza").empty();
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
        if ($("#elvitel").val() == this.getMinDate().MinDatumString) {
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
        }else {
            for (let index = 1; index <= 24; index++) {
                if (index == 24) {
                    $("#idoEl").append(`<option>${"00:00"}</option>`);
                } else {
                    $("#idoEl").append(`<option>${index + ":00"}</option>`);
                }
            }
        }
        if ($("#visszavitel").val() == this.getMinDate().MinDatumString) {
            for (let index = ora + 2; index <= 24; index++) {
                
                if (ora + 2 == index) {
                    $("#idoVissza").append(
                        `<option>${index + ":" + perc}</option>`
                    );
                } else if (index == 24) {
                    $("#idoVissza").append(`<option>${"00:00"}</option>`);
                } else {
                    $("#idoVissza").append(`<option>${index + ":00"}</option>`);
                }
            }
        } else {
            for (let index = 1; index <= 24; index++) {
                if (index == 24) {
                    $("#idoVissza").append(`<option>${"00:00"}</option>`);
                } else {
                    $("#idoVissza").append(`<option>${index + ":00"}</option>`);
                }
            }
        }
    }
}
