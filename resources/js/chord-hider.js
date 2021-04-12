(function () {
    let hideButton = document.getElementById("hide");

    if (hideButton) {
        hideButton.addEventListener("click", function (event) {
            spans = document.getElementsByClassName("chordLine");

            let i = 0;
            while (spans[i] != null) {
                spans[i].classList.toggle("spanHidden");
                i++;
            }
        });
    }
})();
