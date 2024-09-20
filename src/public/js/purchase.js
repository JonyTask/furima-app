const change_destination_btn = document.getElementById('purchase__update');
const set_destination_btn = document.getElementById('destination__setting');

change_destination_btn.addEventListener('click', (e) => {
        e.target.style.display = "none";
        set_destination_btn.style.display = "unset";
        var inputs = document.getElementsByClassName('input_destination');
        for (const input of inputs) {
            input.readOnly = false;
        }
        inputs[0].focus();
    });

    set_destination_btn.addEventListener('click', (e) => {
        e.target.style.display = "none";
        change_destination_btn.style.display = "unset";
        var inputs = document.getElementsByClassName('input_destination');
        for (const input of inputs) {
            input.readOnly = true;
        }
    });