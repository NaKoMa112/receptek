<form>
    <div class="row">

        <div class="col-md-12 text-center m-1">
            <h1>Saját recept</h1>
        </div>
        <div class="input col-md-12 m-1">
            <p>sütemény neve:</p>
            <input type="text" class="sutinev" name="nev" maxlength="100" placeholder="pl.:proteineskókusz golyó">
        </div>
        <div class="input col-md-12 m-1">
            <p>sütemény képe:</p>
            <input type="file" class="sutikep" name="kep" id="">
        </div>
        <div class="input col-md-12 m-1">
            <p>sütemény leírása:</p>
            <textarea name="leiras" cols="40" rows="10" maxlength="1000" placeholder="leírás"></textarea>
        </div>
        <div class="hozzavalokDiv1 row col-md-12 m-1">
            <div class="hozza-elso col-md-4">
                <label class="hozzavalo">Hozzávaló:</label>
                <input type="text" class="hozzavalonev" name="hnev[]" placeholder="pl.:kókuszreszelék" required>
            </div>
            <div class="hozza-elso col-md-4">
                <label class="hozzavalo-lbl">Mennyiség:</label>
                <input type="text" class="hozzavalomennyiseg" name="hmennyiseg[]" placeholder="1" required>
            </div>
            <div class="hozza-elso col-md-4 mb-2">
                <label class="hozzavalo-lbl">Mértékegység:</label>
                <input type="text" class="hozzavalomertekegyseg" name="hmertekegyseg[]" placeholder="csomag" required>
            </div>
        </div>

        <div class="hozzavalokDiv2 row col-md-12 m-1">

        </div>
        <div class="col-md-12">
            <button type="button" class="hozza-btn" onclick="plusz()">Hozzávaló hozzáadás</button>
        </div>
        <div class="input col-md-12 m-1 text-center">
            <button type="button" class="mentes-btn" onclick="mentes()">Mentés</button>
        </div>

    </div>
</form>
<script>

    var i = 0;

    function plusz() {
        document.querySelector('.hozzavalokDiv2').innerHTML += `
        <span class="col-md-4" id="h${i}">
        <div class="hozza col-md-3">
                <label class="hozzavalo">Hozzávaló:</label>
                <input type="text" class="hozzavalonev" name="hnev[]" required>
            </div>
            <div class="hozza col-md-3">     
                <label class="hozzavalo-lbl">Mennyiség:</label>
                <input type="text" class="hozzavalomennyiseg" name="hmennyiseg[]" required>
            </div>
            <div class="hozza col-md-3">
                <label class="hozzavalo-lbl">Mértékegység:</label>
                <input type="text" class="hozzavalomertekegyseg" name="hmertekegyseg[]" required>
                <button type="button" class="torol-btn" onclick="torol(this)">❌</button>
            </div>
        </span>    
        `;
        i++;
    }

    function torol(element) {
        //console.log(element.parentElement.parentElement.id);
        document.getElementById(element.parentElement.parentElement.id).remove();
    }

    let termekid;
    let feltoltes;

    function mentes() {
        const formdata = new FormData(document.querySelector('form'));
        postData('../server/feltolt.php', formdata, renderMsg);

        if (document.querySelector('.sutinev').value != null && document.querySelector('.leiras').value != null && document.querySelector('.sutikep').value != null && document.querySelectorAll('.hozzavalonev').value != null) {
            console.log("sikeres feltöltés");
            feltoltes = true;
        }else{
            console.log("sikertelen feltöltés");
            feltoltes = false;
        }

    }

    function renderMsg(data) {
        if (data) {
            termekid = data;

            let hnevinput = document.getElementsByName('hnev[]');
            let hmennyiseginput = document.getElementsByName('hmennyiseg[]');
            let hmertekegyseginput = document.getElementsByName('hmertekegyseg[]');

            let hozzavalok = [];
            for (let index = 0; index < hnevinput.length; index++) {
                hozzavalok.push({
                    termekid: termekid,
                    nev: hnevinput[index].value,
                    mertekegyseg: hmertekegyseginput[index].value,
                    mennyiseg: hmennyiseginput[index].value
                })
            }
            //console.log(hozzavalok);
            
            if (feltoltes == true) {
                postData('../server/feltolthozzavalok.php', JSON.stringify(hozzavalok), renderresult);   
            }else{
                alert("Sikertelen feltöltés");
            }

        }
        console.log(data);
    }
    function renderresult(data){
        console.log(data);
    }
</script>