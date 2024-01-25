<style>
    .input{
        border-bottom: 1px solid;
        border-start-end-radius: auto;
    }
    .nev{
        width: 300px;
    }
</style>

<div class="row">
    
    <div class="col-md-12 text-center m-1">
        <h1>Saját recept</h1>
    </div>
    <div class="input col-md-12 m-1">
        <p>sütemény neve:</p>
        <input type="text" class="nev" maxlength="100" placeholder="pl.:proteineskókusz golyó">
    </div>
    <div class="input col-md-12 m-1">
        <p>sütemény képe:</p>
        <input type="file" name="kep" id="">
    </div>
    <div class="input col-md-12 m-1">
        <p>sütemény leírása:</p>
        <textarea name="lerias" id="" cols="40" rows="10" maxlength="1000" placeholder="leírás"></textarea>
    </div>
    <div class="hozzavalokDiv m-1 col-md-12">
        <div class="hozza col-md-12">
                <label class="hozzavalo">Hozzávaló:</label>
                <input type="text" class="hozzavalo" name="ingredient_name[]" placeholder="pl.:kókuszreszelék" required>
                
                <label class="hozzavalo-lbl">Mennyiség:</label>
                <input type="number" class="hozzavalo" name="ingredient_quantity[]" min="1" placeholder="1" required>

                <label class="hozzavalo-lbl">Mértékegység:</label>
                <input type="text" class="hozzavalo" name="ingredient_quantity[]" min="1" placeholder="csomag" required>
        </div>
    </div>
    <button type="button" class="button" onclick="plusz()">Hozzávaló hozzáadás</button>
</div>
<script>
    function plusz() {
        var newIngredient = document.createElement("div");
        newIngredient.className = "hozza col-md-12";
        newIngredient.innerHTML = `
            <label class="hozzavalo-lbl">Hozzávaló:</label>
            <input type="text" class="hozzavalo" name="hozzavalo_nev[]" required>

            <label class="hozzavalo-lbl">Mennyiség:</label>
            <input type="number" class="hozzavalo" name="hozzavalo_mennyiseg[]" min="1" required>

            <label class="hozzavalo-lbl">Mértékegység:</label>
            <input type="text" class="hozzavalo" name="hozzavalo_nev[]" required>

            <button type="button" class="remove-btn" onclick="torol(this)">❌</button>
        `;

        document.querySelector(".hozzavalokDiv").appendChild(newIngredient);
    }

    function torol(element){
        var parentElement = element.parentNode;
        parentElement.parentNode.removeChild(parentElement);
    }

</script>