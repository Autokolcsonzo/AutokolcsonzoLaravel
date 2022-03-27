class AutoAjax {
    constructor(token) {
        this.token = token;
    }

    getAdat(apiVegpont, tomb, myCallback) {
        $.ajax({
            url: apiVegpont,
            type: "GET",
            beforeSend: function () {
                $('#toltes-embed, #load').css('display', 'block');
            },
            success: function (result) {
                tomb.splice(0, tomb.length);
                result.forEach((value) => {
                    tomb.push(value);
                });
                myCallback(tomb);
            },
            complete: function () {
                $('#toltes-embed, #load').css('display', 'none');
            },
        });
    }

    postAdat(apiVegpont, adat) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apiVegpont,
            type: "POST",
            data: adat,
            success: function (result) {
                console.log("result :",result);
            },
        });
    }

    deleteAdat(apiVegpont, id) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apiVegpont + "/" + id,
            type: "DELETE",
            success: function (result) {
                console.log(result);
            },
        });
    }

    putAdat(apiVegpont, adat) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            type: "POST",
            url: apiVegpont,
            data: adat,
            success: function (result) {
                console.log(result);
            },
        });
    }
}
