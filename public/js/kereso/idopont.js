$(function () {
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = "0" + dd;
    }
    if (mm < 10) {
        mm = "0" + mm;
    }
    const ora = new Date();
    ora.setDate(ora.getDate() + 1);
    console.log(ora);
    today = yyyy + "-" + mm + "-" + dd;
    const dateInputok = `#elvitel,
                         #visszavitel,
                         #foglalas-tolD,
                         #foglalas-igD`;

    $(dateInputok).attr("min", today);
    $("#elvitel, #foglalas-tolD").attr("value", today);
    $("#idoEl, #foglalas-tolI").attr("min", ora)
});
