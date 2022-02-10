$(function(){
    $('#keresesBtn').on('click', function(){
        $("#primary_content").empty();
        $("#primary_content").append(keresoLista)
    })
});


function keresoLista(){
    return `<div id="jarmu-lista">
    <div class="jarmu-card" id="">
        <div class="jarmu-card-img-box">
            <img class="jarmu-card-kep" src="" alt="">
        </div>

        <div class="card-block-1">
            <span class="jarmu-card-marka"></span>
            <span class="jarmu-card-tipus"></span>
            <span class="jarmu-card-kivitel"></span>
        </div>
        <div class="card-block-2">
            <span class="jarmu-card-ar"></span>
            <span class="jarmu-card-arHeti"></span>
            <span class="jarmu-card-telephely"></span>
        </div>
        <div class="card-block-3">
            <span class="jarmu-card-ajtok"></span>
            <span class="jarmu-card-utasok"></span>
            <span class="jarmu-card-szín"></span>
        </div>
        <div class="card-block-4">
            <span class="jarmu-card-valto"></span>
            <span class="jarmu-card-uzemanyag"></span>
            <span class="jarmu-card-kategoria"></span>
        </div>
        <div class="card-block-5">
            <ul class="jarmu-card-extra">
            </ul>
        </div>

        <div class="jarmu-card-buttons">
            <input class="jarmu-card-foglalas" type="button" value="Foglalás">
            <input class="jarmu-card-reszletek" type="button" value="Részletek">
        </div>
    </div>




</div>`;
}