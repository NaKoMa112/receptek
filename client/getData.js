async function getData(url,renderFc){
    const response=await fetch(url)
    const data=await response.json()
    renderFc(data)

}
async function sendFile(url,config,renderFC){
    const response=await fetch(url,config)
    const data=await response.json()
    renderFC(data)
}

const logoutUser = async (url)=>{
    const response=await fetch(url)
    const data=await response.json()
    if (data) {
        location.href='./index.php'
    }
}