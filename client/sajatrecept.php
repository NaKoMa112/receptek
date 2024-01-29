<div class="row">
    
    <div class="col-md-12 text-center m-1">
        <h1>Saját recept</h1>
    </div>
    <div class="input col-md-12 m-1">
        <p>sütemény neve:</p>
        <input type="text" class="sutinev" maxlength="100" placeholder="pl.:proteineskókusz golyó">
    </div>
    <div class="input col-md-12 m-1">
        <p>sütemény képe:</p>
        <input type="file" name="kep" id="">
    </div>
    <div class="input col-md-12 m-1">
        <p>sütemény leírása:</p>
        <textarea name="lerias" id="" cols="40" rows="10" maxlength="1000" placeholder="leírás"></textarea>
    </div>
    <div class="hozzavalokDiv1 row col-md-12 m-1">
            <div class="hozza-elso col-md-4">
                <label class="hozzavalo">Hozzávaló:</label>
                <input type="text" class="hozzavalo" name="ingredient_name[]" placeholder="pl.:kókuszreszelék" required>
            </div>
            <div class="hozza-elso col-md-4">     
                <label class="hozzavalo-lbl">Mennyiség:</label>
                <input type="number" class="hozzavalo" name="ingredient_quantity[]" min="1" placeholder="1" required>
            </div>
            <div class="hozza-elso col-md-4 mb-2">
                <label class="hozzavalo-lbl">Mértékegység:</label>
                <input type="text" class="hozzavalo" name="ingredient_quantity[]" min="1" placeholder="csomag" required>
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
<script>
    function plusz() {
        var i = 0;
        document.querySelector('.hozzavalokDiv2').innerHTML += `
        <div class="hozza col-md-4">
                <label class="hozzavalo">Hozzávaló:</label>
                <input type="text" class="hozzavalo" name="ingredient_name[]" placeholder="pl.:kókuszreszelék" required>
            </div>
            <div class="hozza col-md-4">     
                <label class="hozzavalo-lbl">Mennyiség:</label>
                <input type="number" class="hozzavalo" name="ingredient_quantity[]" min="1" placeholder="1" required>
            </div>
            <div class="hozza col-md-4">
                <label class="hozzavalo-lbl">Mértékegység:</label>
                <input type="text" class="hozzavalo" name="ingredient_quantity[]" min="1" placeholder="csomag" required>
                <button type="button" class="torol-btn" onclick="torol(this)">❌</button>
            </div>
            
        `;
        i++;
    }

    function torol(element){
        document.querySelector('.hozzavalokDiv2').innerHTML =``;
    }

</script>