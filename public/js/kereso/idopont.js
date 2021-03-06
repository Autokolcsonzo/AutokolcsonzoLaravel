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
        this.setMaxDate();
        this.setMinIdo();
        
        //----------------triggerek--------------
        $(` #elvitel, 
            #visszavitel,
            #foglalas-tolD,
            #foglalas-igD`).on("change", () => {
            this.handelerMinDatumUtkozes();
            this.setMinIdo();
            this.handelerMinIdoUtkozes();
            console.log('foglalas datum modosult.');
            
        });
        $(`#idoEl,
           #foglalas-tolI,
           #foglalas-igI`).on("change", () => {
            this.handelerMinIdoUtkozes();
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
        $("#foglalas-tolD").attr("min", this.getMinDate().MinDatumString);

        $("#elvitel").val(this.getMinDate().MinDatumString);
        $("#foglalas-tolD").val(this.getMinDate().MinDatumString);

        $("#visszavitel").attr("min", $("#elvitel").val());
        $("#foglalas-igD").attr("min", $("#foglalas-tolD").val());
    }
    setMaxDate() {
        $("#elvitel").attr("max", $("#visszavitel").val());
    }

    setMinIdo() {
        this.keresoClear();
        this.foglalasClear();

        let today = new Date();
        let ora = today.getHours();
        let perc = today.getMinutes();
        if (perc < 10) {
            perc = "0" + perc;
        } else if (perc == 0) {
            perc = "00";
        }
        $("#idoEl,#idoVissza,#foglalas-tolI,#foglalas-igI").append(
            '<option value="" class="placeholder">??ra. perc</option>'
        );
        if ($("#elvitel").val() == this.getMinDate().MinDatumString) {
            for (let index = ora + 1; index <= 24; index++) {
                if (ora + 1 == index) {
                    $("#idoEl").append(
                        `<option value="${index + ":" + perc + ":00"}">${
                            index + ":" + perc
                        }</option>`
                    );
                } else if (index == 24) {
                    $("#idoEl").append(
                        `<option value="00:00:00"}">${"00:00"}</option>`
                    );
                } else {
                    $("#idoEl").append(
                        `<option value="${index + ":00" + ":00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        } else {
            for (let index = 1; index <= 24; index++) {
                if (index == 24) {
                    $("#idoEl").append(
                        `<option value="00:00:00"}">${"00:00"}</option>`
                    );
                } else {
                    $("#idoEl").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        }

        if ($("#visszavitel").val() == this.getMinDate().MinDatumString) {
            for (let index = ora + 2; index <= 24; index++) {
                if (ora + 2 == index) {
                    $("#idoVissza").append(
                        `<option value="${index + ":" + perc + ":00"}">${
                            index + ":" + perc
                        }</option>`
                    );
                } else if (index == 24) {
                    $("#idoVissza").append(
                        `<option value="00:00:00">${"00:00"}</option>`
                    );
                } else {
                    $("#idoVissza").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        } else {
            for (let index = 1; index <= 24; index++) {
                if (index == 24) {
                    $("#idoVissza").append(
                        `<option value="00:00:00"}">${"00:00"}</option>`
                    );
                } else {
                    $("#idoVissza").append(
                        `<option value="${index + ":00:00"}">${
                            index + ":00"
                        }</option>`
                    );
                }
            }
        }
        
    }

    handelerMinIdoUtkozes() {
        /*if($("#elvitel").val() > $("#visszavitel").val()){
            return
        }else{
            if (
                $("#elvitel").val() == $("#visszavitel").val() &&
                $("#elvitel").val() != this.getMinDate().MinDatumString
            ) {
                let elvitelOra = parseInt($("#idoEl").val().split(":"));
                if (isNaN(elvitelOra)) {
                    elvitelOra = 0;
                }
                $("#idoVissza").empty();
                $("#idoVissza").append(`<option value=""}">??ra.perc</option>`);
                for (let index = elvitelOra + 1; index <= 24; index++) {
                    if (index == 24) {
                        $("#idoVissza").append(
                            `<option value="00:00:00"}">${"00:00"}</option>`
                        );
                    } else {
                        $("#idoVissza").append(
                            `<option value="${index + ":00:00"}">${
                                index + ":00"
                            }</option>`
                        );
                    }
                }
            }
        }*/
    }

    handelerMinDatumUtkozes() {
        $("#elvitel").attr("max", $("#visszavitel").val());
        $("#visszavitel").attr("min", $("#elvitel").val());
        $("#foglalas-tolD").attr("max", $("#foglalas-igD").val());
        $("#foglalas-igD").attr("min", $("#foglalas-tolD").val());
    }

    foglalasClear() {
        $("#foglalas-tolI,#foglalas-igI").empty();
    }
    keresoClear() {
        $("#idoEl,#idoVissza").empty();
    }
}
