<div>
        <table>
            <tbody>
                <tr>
                    <div class="row">
                        
                    </div>
                </tr>
            </tbody>
        </table>
    </div>
    
    <script>
        getData('../server/betolt.php', renderDiv)

        function renderDiv(data) {
            console.log(data);
            for (let obj of data) {
                document.querySelector('.row').innerHTML+=`
                <div class="col-md-2 m-2 text-center">
                    <img class="${obj.kep} img-fluid" src="kepek/${obj.kep}">
                    <td class="${obj.nev}">${obj.nev}</td><br>
                    <button onclick="show('${obj.id}')">részletek</button>
                </div>    
                `;
            }
        }

        function show(id){
            console.log(id);
                window.location.href = 'index.php?prog=reszletek.php&id=' +encodeURIComponent(id);
            }

    </script>