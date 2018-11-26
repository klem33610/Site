$(function () {
    var pdf = new jsPDF();
    pdf.fromHTML($("body"), function () {
                pdf.save('pageContent.pdf');
    })
})