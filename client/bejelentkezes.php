<div class="row col-md-10 bejelent_Div">
    <div class="input col-md-12 m-1">
        <p class="bejelent_P">E-mail:</p>
        <input type="email" class="email" maxlength="80" placeholder="pl.:sutimester@gmail.com">
    </div>
    <div class="input col-md-12 m-1">
        <p class="bejelent_P">Jelszó:</p>
        <input type="password" class="jelszo" maxlength="100" placeholder="********">
    </div>
    <!--<div class="input col md-12 m-1">
        <button onclick="elfelejt()">Elfelejtett jelszó</button>
    </div>
    <div class="input col md-12 m-1">
        <input type="checkbox" id="checkbox" name="checkbox" class="checkbox">
        <label for="checkbox" class="checkbox">Maradjak belépve</label>
    </div>-->
    <div class="input col-md-12 m-1">
        <button type="button" class="belep-btn bejelent_Button" onclick="belep()">Belépés</button>
    </div>
    <div class="input col-md-12 m-1">
        <a class="bejelent_A" href="index.php?prog=ujfelhasznalo.php">Regisztráció</a>
    </div>
</div>

<script>
    function belep(){
        let email = document.querySelector('.email').value;
        let pw = document.querySelector('.jelszo').value;

        if (email =='' || pw =='') {
            return;
        }

        const formadata = new FormData();
        formadata.append('email', email);
        formadata.append('pw', pw);

        postData('../server/belep.php', formadata, renderMsg);
    }

    function renderMsg(data){
        console.log(data, data.msg, Object.keys(data));
        if (data==1) {
            console.log("átirányítás");
            location.href ='./index.php';
        }
    }
</script>