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
            <input type="file" name="kep" id="kep" onchange="uploadImg(this)">
            <div class="uploaded-img"></div>
        </div>
        <div class="input col-md-12 m-1">
            <p>sütemény leírása:</p>
            <textarea name="leiras" cols="40" rows="10" maxlength="1000" placeholder="leírás"></textarea>
        </div>
        <div class="hozzavalokDiv1 row col-md-12 m-1">
            <div class="hozza-elso col-md-4">
                <label class="hozzavalo">Hozzávaló:</label>
                <input type="text" class="hozzavalo" name="hnev[]" placeholder="pl.:kókuszreszelék" required>
            </div>
            <div class="hozza-elso col-md-4">
                <label class="hozzavalo-lbl">Mennyiség:</label>
                <input type="text" class="hozzavalo" name="hmennyiseg[]" placeholder="1" required>
            </div>
            <div class="hozza-elso col-md-4 mb-2">
                <label class="hozzavalo-lbl">Mértékegység:</label>
                <input type="text" class="hozzavalo" name="hmertekegyseg[]" placeholder="csomag" required>
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
    function uploadImg(obj){
            console.log(obj.files[0])
            let myFile=obj.files[0]
            if(!['image/jpeg','image/png'].includes(myFile.type)){
                document.querySelector('.uploaded-img').innerHTML="Csak jpeg és png feltöltés engedélyezett!"
                obj.files[0].value=''
                return
            }
            //2MB az engedélyezett:
            if(myFile.size>2*1024*1024){
                document.querySelector('.uploaded-img').innerHTML="Maximum 2MB engedélyezett!"
                obj.files[0].value=''
                return
            }
            const formData=new FormData();
            formData.append('myImage',myFile)
            const configObj={
                method:'POST',
                body: formData
            }
            sendFile('../server/feltoltkep.php',configObj,render)
        }
        function render(data){
            console.log(data.img_src)
            document.querySelector('.uploaded-img').innerHTML=`
                <div>Sikeres fájlfeltöltés!</div>
                <img id="kepnezet" src="${data.img_src}" alt="fotó" style="width:100px;" />
            `
        }

    var i = 0;

    function plusz() {
        document.querySelector('.hozzavalokDiv2').innerHTML += `
        <span class="col-md-4" id="h${i}">
        <div class="hozza col-md-3">
                <label class="hozzavalo">Hozzávaló:</label>
                <input type="text" class="hozzavalo" name="hnev[]" required>
            </div>
            <div class="hozza col-md-3">     
                <label class="hozzavalo-lbl">Mennyiség:</label>
                <input type="text" class="hozzavalo" name="hmennyiseg[]" required>
            </div>
            <div class="hozza col-md-3">
                <label class="hozzavalo-lbl">Mértékegység:</label>
                <input type="text" class="hozzavalo" name="hmertekegyseg[]" required>
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

    function mentes() {
        console.log(document.getElementById("kepnezet").src);
        let slash = document.getElementById("kepnezet").src.lastIndexOf("/");
        let kepnev = document.getElementById("kepnezet").src.substr(slash +1);
        const formdata = new FormData(document.querySelector('form'));
        formdata.set("kep", kepnev);
        for (let obj of formdata) {
                console.log(obj);
            }
        postData('../server/feltolt.php', formdata, renderMsg);
    }

    function renderMsg(data) {
        if (data) {
            termekid = data;
            let hnevinput = document.getElementsByName('hnev[]');
            let hmennyiseginput = document.getElementsByName('hmennyiseg[]');
            let hmertekegyseginput = document.getElementsByName('hmertekegyseg[]');

            let hozzavalok = [];
            for (let index = 0; index < hnevinput.length; index++) {   
                ///////////////////////////////////////////////////////////////////////////////////
                if (hnevinput[index].value.trim() !== '' && (hmennyiseginput[index].value.trim() !== '' || hmertekegyseginput[index].value.trim() !== '')) {
                    hozzavalok.push({
                            termekid: termekid,
                            nev: hnevinput[index].value,
                            mertekegyseg: hmertekegyseginput[index].value,
                            mennyiseg: hmennyiseginput[index].value
                        })
                }
            }
            console.log(hozzavalok);
            if(hozzavalok.length==0) return

            postData('../server/feltolthozzavalok.php', JSON.stringify(hozzavalok), renderresult);

        }
        //console.log(data);
    }
    function renderresult(data){
        console.log("válasz:",data);
    }
    //Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, rerum quis. Commodi vero a cum facere laudantium! Harum sapiente, obcaecati libero, incidunt quas asperiores ut quidem ullam vitae, odit facilis!
</script>
