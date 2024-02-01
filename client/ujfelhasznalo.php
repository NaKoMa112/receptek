<div class="row text-center">
    <div class="col-md-6">
        <p>Keresztnév:</p>
        <input type="text" class="keresztnev" maxlength="50">
    </div>
    <div class="col-md-6">
        <p>Vezetéknév:</p>
        <input type="text" class="vezeteknev" maxlength="50">
    </div>
    <div class="input col-md-12 m-1">
        <p>E-mail:</p>
        <input type="email" class="email" maxlength="100" placeholder="pl.:sutimester@gmail.com">
    </div>
    <div class="input col-md-12 m-1">
        <p>Jelszó:</p>
        <input type="password" class="jelszo" maxlength="100" placeholder="********">
    </div>
    <div class="input col-md-12 m-1">
        <button class="mentes-btn" onclick="mentes()">Mentés</button>
    </div>
    <div class="input col-md-12 m-1">
        <button class="vissza-btn" onclick="vissza()">vissza</button>
    </div>
</div>
<script>
    function vissza(){
        window.location.href = 'index.php?prog=bejelentkezes.php';
    }
</script>