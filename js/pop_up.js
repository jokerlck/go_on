// Get the modal
var buy_modal = document.getElementById('buyItem');
var change_modal = document.getElementById('changeItem');
// Get the button that opens the modal
var buy_btn = document.getElementById("buy_btn");
var change_btn = document.getElementById("change_btn");

// Get the <span> element that closes the modal
var buy_span = document.getElementById("buyClose");
var change_span = document.getElementById("changeClose");

// When the user clicks on the button, open the modal
buy_btn.onclick = function() {
    buy_modal.style.display = "block";
}
change_btn.onclick = function() {
    change_modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
change_span.onclick = function() {
    change_modal.style.display = "none";
}
buy_span.onclick = function() {
    buy_modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == buy_modal) {
        buy_modal.style.display = "none";
    }
    else if (event.target == change_modal) {
        change_modal.style.display = "none";
    }
}

//
