<!--hozzávalók-div háttér süti vagy muffin-->
<form>
    <div class="sajatrecept_div row">

        <div class="sajatrecept_cim col-md-12">
            <h1>Saját recept</h1>
        </div>
        <div class="sajatrecept_input_nev col-md-12">
            <p class="sajatrecept_nev">sütemény neve:</p>
            <input type="text" class="sutinev" id="nev" name="nev" maxlength="100" placeholder="pl.:proteineskókusz golyó">
        </div>
        <div class="sajatrecept_input_kep col-md-12">
            <p class="sajatrecept_kep">sütemény képe:</p>
            <input type="file" class="uploaded-img" name="kep" id="kep" onchange="uploadImg(this)">
            <div class="uploadedMsg-img"></div>
        </div>
        <div class="sajatrecept_input_leiras col-md-12">
            <p class="sajatrecept_leiras">sütemény leírása:</p>
            <textarea name="leiras" class="sajatrecept_textarea" cols="40" rows="10" maxlength="1000" placeholder="leírás"></textarea>
        </div>
        <div class="hozzavalok_div1 col-md-12">
            <div class="hozza_elso col-md-4">
                <label class="hozzavalo_elso">Hozzávaló:</label>
                <input type="text" class="hozzavalo" id="hozza-nev1" name="hnev[]" placeholder="pl.:kókuszreszelék" required>
            </div>
            <div class="hozza_masodik col-md-4">
                <label class="hozzavalo_masodik">Mennyiség:</label>
                <input type="text" class="hozzavalo" id="hozza-menny1" name="hmennyiseg[]" placeholder="1" required>
            </div>
            <div class="hozza_harmadik col-md-4">
                <label class="hozzavalo_harmadik">Mértékegység:</label>
                <input type="text" class="hozzavalo" id="hozza-mertek1" name="hmertekegyseg[]" placeholder="csomag" required>
            </div>
        </div>

        <div class="hozzavalok_div2 col-md-12">

        </div>
        <div class="col-md-12">
            <button type="button" class="hozza-btn" onclick="plusz()">Hozzávaló hozzáadás</button>
        </div>
        <div class="input col-md-12 m-1 text-center">
            <button type="button" class="mentes-btn" onclick="mentes()">Mentés</button>
        </div>

    </div>
</form>
<ul id="errors"></ul>
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
            console.log(data.img_src, "kep")
            document.querySelector('.uploadedMsg-img').innerHTML=`
                <div>Sikeres fájlfeltöltés!</div>
                <img id="kepnezet" src="${data.img_src}" alt="fotó" style="width:100px;" />
            `
        }
        let i = 2;
    function plusz() {
        document.querySelector('.hozzavalok_div2').innerHTML += `
        <span class="hozzavalok_div3 col-md-4" id="h${i}">
        <div class="hozza2_elso col-md-3">
                <p class="hozzavalo_elso">Hozzávaló:</p>
                <input type="text" class="hozzavalo" id="hozza-nev${i}" name="hnev[]" required>
            </div>
            <div class="hozza_masodik col-md-3">     
                <p class="hozzavalo_masodik">Mennyiség:</p>
                <input type="text" class="hozzavalo" id="hozza-menny${i}" name="hmennyiseg[]" required>
            </div>
            <div class="hozza2_harmadik col-md-3">
                <p class="hozzavalo_harmadik">Mértékegység:</p>
                <input type="text" class="hozzavalo" id="hozza-mertek${i}" name="hmertekegyseg[]" required>
                <button type="button" class="torol-btn mt-1" onclick="torol(this)">❌</button>
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
    let errors = [];
    function mentes() {
        console.log(document.getElementById("kepnezet")?.src);
        if (document.getElementById("nev").value.length == 0) {
            errors.push("név megadása kötelező");
        };
        if(!document.getElementById("kepnezet")?.src){
            errors.push("kép feltöltése kötelező");
        };
        function renderMsg(data) {
        if (data) {
            termekid = data;
            let hnevinput = document.getElementsByName('hnev[]');
            let hmennyiseginput = document.getElementsByName('hmennyiseg[]');
            let hmertekegyseginput = document.getElementsByName('hmertekegyseg[]');

            let hozzavalok = [];
            let boolean = false;
            console.log(hnevinput.length);
            for (let index = 0; index < hnevinput.length; index++) {   
                if (hnevinput[index].value.trim() !== '' && (hmennyiseginput[index].value.trim() !== '' || hmertekegyseginput[index].value.trim() !== '')) {
                    boolean = true;
                    hozzavalok.push({
                            termekid: termekid,
                            nev: hnevinput[index].value,
                            mertekegyseg: hmertekegyseginput[index].value,
                            mennyiseg: hmennyiseginput[index].value
                        })
                }else{
                    errors.push("Hozzávalók hiányzosan lett kitöltve!");
                    boolean = false;
                    break
                }
            }
            
            if(hozzavalok.length==0) return
            if (boolean == true) {
                console.log(hozzavalok);
                postData('../server/feltolthozzavalok.php', JSON.stringify(hozzavalok), renderresult);
            }
        }
    }

        console.log(errors);
        if (errors.length > 0){
            errors.forEach(err=>
            document.getElementById('errors').innerHTML +=`
            <li>${err}</li>
            `
            )
            return;
        }else{
            document.getElementById('errors').innerHTML = ``;
        }
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

    function renderresult(data){
        console.log("válasz:",data);
    }
    //Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, rerum quis. Commodi vero a cum facere laudantium! Harum sapiente, obcaecati libero, incidunt quas asperiores ut quidem ullam vitae, odit facilis!
</script>
