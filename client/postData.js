async function postData(url,formdata ,renderFc){
    const response=await fetch(url, {
        method: "POST",
        body: formdata
    })
    const data=await response.text()
    renderFc(data)

}