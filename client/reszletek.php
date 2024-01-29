<div class="row">  
</div>
<script>
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get('id');

        console.log(id);
        getData('../server/reszletek.php?id='+id,renderDetails);


        function renderDetails(data){
        console.log(data);
        document.querySelector('.row').innerHTML =`
            <div class="col-md-12 text-center">
            <img class="${data[0].kep} img-fluid" src="kepek/${data[0].kep}">
            <h1 class="${data[0].tnev} text-center">${data[0].tnev}</h1>
            <ul class="font-weight-bold text-left">Hozzávalók:</ul>
            </div>
                `
        for(let obj of data){
            document.querySelector('.row').innerHTML += `
                <div class="col-md-12 m-1 text-left">
                    <li>${obj.hnev}</li>
                </div> 
                
            `
        }
        document.querySelector('.row').innerHTML +=`
        <div class="leiras">${data[0].leiras}</div>
        <button type="button" class="vissza-btn" onclick="vissza()">vissza</button>`
    }

    function vissza(){
        window.location.href = 'index.php?prog=betolt.php';
    }
</script>