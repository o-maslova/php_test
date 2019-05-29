function validate(width, heigth, radius) {
    var flag = 1;

    if (isNaN(width.value) || parseInt(width.value) > 3600 ||
        parseInt(width.value) <= 0) {
            width.style.border = "2px solid red";
            if (parseInt(width.value) > 3600) {
                alert("Too big value. Enter image width less than 3600px");
            }
            document.getElementById("width").value = ""
            flag = 0;
        }

    if (isNaN(heigth.value) || parseInt(heigth.value) > 2400 ||
        parseInt(heigth.value) <= 0) {
            heigth.style.border = "2px solid red";
            if (parseInt(heigth.value) > 2400) {
                alert("Too big value. Enter image heigth less than 2400px");
            }
            document.getElementById("heigth").value = ""
            flag = 0;
        }

    if (isNaN(radius.value) || parseInt(radius.value) <= 0) {
            radius.style.border = "2px solid red";
            document.getElementById("radius").value = ""
            flag = 0;
        }

    if (flag == 0) {
        return false;
    }
    return true;
}

function submit_func() {
    var width = document.getElementById("width");
    var heigth = document.getElementById("heigth");
    var radius = document.getElementById("radius");

    if (!validate(width, heigth, radius)) {
            return false;
        }

    if (parseInt(radius.value) > parseInt(width.value) / 2 ||
        parseInt(radius.value) > parseInt(heigth.value) / 2) {
            alert("You should input radius less than half of width and half of heigth.");
            radius.style.border = "2px solid red";
            document.getElementById("radius").value = ""
            return false;
        }
    return true;
}