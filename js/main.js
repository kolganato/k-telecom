if(document.readyState === 'ready' || document.readyState === 'complete') {
    doSomething();
} else {
    document.onreadystatechange = function () {
        if (document.readyState == "complete") {
            doSomething();
        }
    }
}

const doSomething = () => {
    addMaskInputPhone();
    setAttrPatternForm();
}

function addMaskInputPhone(){
    let input = document.querySelector("#phone");
    input.addEventListener("input", mask, false);
}

// Mask for Telephone
function setCursorPosition(pos, elem) {

    elem.focus();
    if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
    else if (elem.createTextRange) {
        let range = elem.createTextRange();
        range.collapse(true);
        range.moveEnd("character", pos);
        range.moveStart("character", pos);
        range.select()
    }
}

function mask(event) {
    let matrix = "+7 (___) ___-__-__",
        i = 0,
        def = matrix.replace(/\D/g, ""),
        val = this.value.replace(/\D/g, "");
    if (def.length >= val.length) val = def;
    this.value = matrix.replace(/./g, function (a) {
        return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
    });
    if (event.type == "blur") {
        if (this.value.length == 2) this.value = ""
    } else setCursorPosition(this.value.length, this)
}
// END Mask for Telephone

// _____________________________________________ Menu / Burger

document.addEventListener("DOMContentLoaded", function() {
    burger = document.getElementById('burger');
    burger.addEventListener("click",()=>{
        burger.classList.toggle("active");
        
    });


});


function setAttrPatternForm(){
    let nameClient = document.querySelector('label input[name="name_client"]'),
        phoneClient = document.querySelector('label input[name="phone"]');
        

        nameClient.setAttribute('pattern', '[a-zA-Zа-яА-ЯёЁ ]+');
        phoneClient.setAttribute('pattern', '\+7\s?[\(]{0,1}[0-9]{3}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}');
}