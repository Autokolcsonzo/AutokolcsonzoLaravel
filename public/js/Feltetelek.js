class Feltetelek {
    constructor(elem, adat) {
        this.adat = adat;
        this.elem = elem;

        $(".reszletekGomb").on("click", () => {
            this.reszletekTrigger();
        });

        this.setAdat(adat);
    }

    setAdat(adat) {
        $(".feltetelReszletek").css("display", "none");

        this.adat = adat;
        this.zarva = true;
        this.nyitva = false;
    }

    reszletekTrigger() {
        if (this.zarva) {
            $(this.elem.children(".feltetelReszletek")).slideDown(500);
            this.zarva = false;
        } else if (!this.zarva) {
            $(this.elem.children(".feltetelReszletek")).slideUp(500);
            this.zarva = true;
        }
    }
}
