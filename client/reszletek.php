<div class="row">
    <div class="reszletek_hozzavalok_kep_cim col-md-12"></div>
    <div class="reszletek_hozzavalok_div"></div>
    <div class="reszletek_leiras_vissza col-md-12"></div>
    
</div>
<script>
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get('id');

        console.log(id);
        getData('../server/reszletek.php?id='+id,renderDetails);


        function renderDetails(data){
        console.log(data);
        document.querySelector('.reszletek_hozzavalok_kep_cim').innerHTML =`
            <div class="reszletek_div col-md-12 text-center">
            <div class="reszletek_div_kep col-md-8">
            <img class="reszletek_kep img-fluid" src="../kepek/${data[0].kep}">
            </div>
            <h1 class="reszletek_cim">${data[0].tnev}</h1>
            
            </div>
                `
        document.querySelector('.reszletek_hozzavalok_div').innerHTML =`
        <div class="reszletek_div_p col-md-12">
        <p class="reszletek_p">Hozzávalók:</p>
        </div>
        `
        for(let obj of data){
            document.querySelector('.reszletek_hozzavalok_div').innerHTML += `
                <div class="reszletek_div_lo col-md-12">
                    <lo class="reszletek_hozzavalok_lo col-md-12">${obj.hnev}</lo>
                </div>   
            `
        }
        document.querySelector('.reszletek_leiras_vissza').innerHTML +=`
        <div class="reszletek_leiras cold-md-12">${data[0].leiras}</div>
        <div class="reszletek_vissza_div col-md-12 text-center">
        <button type="button" class="reszletek_vissza_button" onclick="vissza()">vissza</button>
        </div>
        `
    }

    function vissza(){
        window.location.href = 'index.php?prog=betolt.php';
    }
</script>