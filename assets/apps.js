$(document).ready(function () {

    NilaiIndikator()
    GrafikPkp()
    $('.decimal').keyup(function () {
        var position = this.selectionStart - 1;
        //remove all but number and .
        var fixed = this.value.replace(/[^0-9\.]/g, "");
        if (fixed.charAt(0) === ".")
            //can't start with .
            fixed = fixed.slice(1);

        var pos = fixed.indexOf(".") + 1;
        if (pos >= 0)
            //avoid more than one .
            fixed = fixed.substr(0, pos) + fixed.slice(pos).replace(".", "");

        if (this.value !== fixed) {
            this.value = fixed;
            this.selectionStart = position;
            this.selectionEnd = position;
        }
    });





});

function mutu(val) {
    var nilai = "";
    if (val == 0) {
        nilai = "<h6 class='text-danger'>-</h6>"
    } else if (val <= 50) {
        nilai = "<h6 class='text-danger'>Buruk</h6>"
    } else if (val <= 60) {
        nilai = "<h6 class='text-warning'>Sedang</h6>"
    } else if (val <= 75) {
        nilai = "<h6 class='text-info'>Cukup</h6>"
    } else if (val <= 90.99) {
        nilai = "<h6 class='text-success'>Baik</h6>"
    } else {
        nilai = "<h6 class='text-success'>Sangat Baik</h6>"
    }

    return nilai;
}