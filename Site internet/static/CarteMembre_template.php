<!DOCTYPE html>
<html lang="fr">
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link rel="stylesheet" href="static/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script src="JS/html2pdf.bundle.min.js"></script>

<?php $carte_tab = json_decode($_REQUEST['carte_tab'], true);
echo $carte_tab;


foreach ($carte_tab as $i => $id) {?>
<body>
    <div id='content'>
        <div style="text-align: center; margin-bottom: 20px">
            <h1 id="year">Carte Membre 2018</h1>
        </div>
        <div style="margin-right : 50px; float: left">
            <a href="../jarez-solidarites.html"><img style="height: 300px;" alt="Logo Jarez Solidarités" src="media/logoJS.jpg"></img></a>
        </div>
        <div style="float: center; padding-top: 50px">
            <h3 id="membre"><? echo [$id]['nom']; ?></h3>
            <h3 id="adresse">8 rue saint eusebe</h3>
            <h3 id="ville">69003 Lyon</h3>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function() {
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
        html2pdf().set(opt).from(element).save();
    })
</script>

<? } ?>