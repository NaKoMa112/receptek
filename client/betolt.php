<div class="row">

</div>
    
    <script>
        getData('../server/betolt.php', renderDiv)

        function renderDiv(data) {
            console.log(data);
            for (let obj of data) {
                document.querySelector('.row').innerHTML+=`
                <div class="sutemenyek_div col-md-3 m-1 text-center">
                    <img class="sutemenyek_kepek img-fluid" src="../kepek/${obj.kep}">
                    <td class="sutemenyek_cim">${obj.nev}</td><br>
                    <button class="sutemenyek_button" onclick="show('${obj.id}')">részletek</button>
                </div>    
                `;
            }
        }

        function show(id){
            console.log(id);
                window.location.href = 'index.php?prog=reszletek.php&id=' +encodeURIComponent(id);
            }

    </script>