class AutoAjax {
    constructor() {}

    getAdat(apiVegpont, tomb, myCallback) {
        tomb.splice(0, tomb.length);
        console.log(apiVegpont);
        $.ajax({
            url: apiVegpont,
            type: "GET",
            success: function (result) {
                result.forEach((value) => {
                    tomb.push(value);
                });
                myCallback(tomb);
            },
        });
    }
}
