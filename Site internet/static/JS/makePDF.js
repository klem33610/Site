$(function () {
    var element = document.getElementById('content');
    var opt = {
        margin: 0.5,
        filename: 'myfile.pdf',
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 1
        },
        jsPDF: {
            unit: 'in',
            format: 'A5',
            orientation: 'landscape'
        }
    };

    // New Promise-based usage:
    html2pdf().set(opt).from(element).save();
})