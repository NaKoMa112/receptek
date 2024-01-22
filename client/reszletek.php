<div class="row">

</div>
<script>
        let urlParams = new URLSearchParams(window.location.search);
        let id = urlParams.get('id');

        console.log(id);
        getData('../server/reszletek.php?id='+id,renderDetails);


        function renderDetails(data){
        console.log(data);
        /*document.querySelector('.row').innerHTML = '';
        for(let obj of data){
            document.querySelector('.row').innerHTML += `
            <div class="col-md-12 m-2 text-center">
                    <h1 class="${obj.nev}">${obj.nev}</h1>
                    <img class="${obj.kep} img-fluid" src="kepek/${obj.kep}">

                    <div class="leirás">${obj.leiras}</div>
                </div>  
            `
        }*/
    }
</script>