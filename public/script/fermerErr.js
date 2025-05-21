function fermerErr(id = 'errContainer'){
    let container = document.getElementById(id);
    console.log(container.style.display);
    if (container.style.display == "none"){
        container.style.display = "flex";
    } else {
        container.style.display = "none";
    }
}