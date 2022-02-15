class AutoAjax {
    constructor(token) {
        this.token = token;
    }

    getAdat(apiVegpont, tomb, myCallback) {
        console.log(apiVegpont);
        $.ajax({
            url: apiVegpont,
            type: "GET",
            success: function (result) {
                tomb.splice(0, tomb.length);
                [result].forEach((value) => {
                    tomb.push(value);
                });
                myCallback(tomb);
            },
        });
    }

    postAdat(apivegpont, ujAdat) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apivegpont,
            type: "POST",
            data: ujAdat,
            // error: function (data, textStatus, errorThrown) {
            //     console.log(eval("(" + data.responseText + ")").message);
            // },
        });
    }

    deleteAdat(apivegpont, id) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apivegpont + "/" + id,
            type: "DELETE",
        });
    }

    putAdat(apivegpont, id, ujAdat) {
        $.ajax({
            headers: { "X-CSRF-TOKEN": this.token },
            url: apivegpont + "/" + id,
            type: "PUT",
            data: ujAdat,
        });
    }
}
