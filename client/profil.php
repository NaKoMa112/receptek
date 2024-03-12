<div>
    <div class="row profil_Felhasznalo"></div>
    <div class="row profil_Kedvencek"></div>
</div>
<script>
    getData('../server/profil.php', renderKedvenc);

    function renderKedvenc(data) {
        console.log(data);
        for (let obj of data) {
            document.querySelector('.profil_Felhasznalo').innerHTML += `
            <img class="profil_Logo img-fuild col-sm-2" src="../kepek/powerbites logo filled.png" alt="">
            <div class="col-sm-10 profil_Div">
            <div class="col-md-12 profil_Vnev">Vezeték név: ${obj.vezeteknev}</div>
            <div class="col-md-12 profil_Knev">Kereszt név: ${obj.keresztnev}</div>
            <div class="col-md-12 profil_Email">Email: ${obj.email}</div>
            </div>
            `
            break;
        }
            document.querySelector('.profil_Kedvencek').innerHTML =`
                <h3 class="profil_Mentett_Cim col-md-12">Mentett Sütemények:</h3>
            `
        for (let obj of data) {
            document.querySelector('.profil_Kedvencek').innerHTML += `
                <div class="profil_Sutemeny_Div col-md-3 m-1 text-center">
                    <img class="sutemenyek_kepek img-fluid" src="../kepek/${obj.kep}">
                    <td class="sutemenyek_cim">${obj.nev}</td><br>
                    <button class="sutemenyek_button" onclick="show('${obj.id}')">részletek</button>
                    `
        }
    }

    function show(id) {
        console.log(id);
        window.location.href = 'index.php?prog=reszletek1.php&id=' + encodeURIComponent(id);
    }
</script>