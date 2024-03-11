<div class="row text-center">
    <div class="col-md-6">
        <p>Keresztnév:</p>
        <input type="text" name="keresztnev" class="keresztnev" maxlength="50">
    </div>
    <div class="col-md-6">
        <p>Vezetéknév:</p>
        <input type="text" name="vezeteknev" class="vezeteknev" maxlength="50">
    </div>
    <div class="input col-md-12 m-1">
        <p>E-mail:</p>
        <input type="email" name="email" class="email" maxlength="100" onblur="verifyEmail(this)" />
    </div>
    <div class="input col-md-12 m-1">
        <p>Jelszó:</p>
        <input type="password" name="jelszo" class="jelszo" maxlength="100" />
    </div>
    <div class="input col-md-12 m-1">
        <button class="mentes-btn" onclick="mentes()">Mentés</button>
    </div>
    <div class="input col-md-12 m-1">
        <button class="vissza-btn" onclick="vissza()">vissza</button>
    </div>
</div>
<script>

    function verifyEmail(domObj){
        console.log(domObj.value, 'email');
        if (domObj.value.length > 0) {
            //console.log('ok');
            getData('../server/verifyEmail.php?email='+domObj.value,renderVrfEmail);
        }
    }

    function renderVrfEmail(data){
        console.log(data);
        if (data.NR == 1) {
            console.log("foglalt email cím");
            document.querySelector('.email').value =``;
        }
    }

    function mentes(){
        let email = document.querySelector('.email').value;
        let pw = document.querySelector('.jelszo').value;
        let vnev = document.querySelector('.vezeteknev').value;
        let knev = document.querySelector('.keresztnev').value;
        if (email =='' || pw =='' || vnev =='' || knev == '') {
            return;
        }

        const formadata = new FormData();
        formadata.append('vnev', vnev);
        formadata.append('knev', knev);
        formadata.append('email', email);
        formadata.append('pw', pw);
        

        postData('../server/ujfelhasznalo.php', formadata, renderMsg);
    }

    function renderMsg(data){
        console.log(data);
    }

    function vissza(){
        window.location.href = 'index.php?prog=bejelentkezes.php';
    }
</script>