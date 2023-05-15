let statut = document.querySelector("#statut");
let date_action = document.querySelector("#date_action");
date_action.classList.add("display-none");
statut.addEventListener('change', function () {
    console.log(statut.value);
    if (statut.value == "asuivre") {
        date_action.classList.remove("display-none");
    } else if (this.value == "abandonne") {
        date_action.classList.add("display-none");
    }
})
