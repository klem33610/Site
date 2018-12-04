<lang="fr">
<meta charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="static/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">
<script src="JS/html2pdf.bundle.min.js"></script>
<!-- <script src="JS/makePDF.js"></script> -->

<?php date_default_timezone_set('UTC');
setlocale(LC_TIME, 'fr_FR.utf8','fra');
$Date = date("d-m-Y");
$Month = new DateTime(date("d-m-Y"));
?>

<body>
    <div id='content'>
        <div style="float: left; margin:10px 0 0 20px">
            <a href="../jarez-solidarites.html"><img style="height: 120px;" alt="Logo Jarez Solidarités" src="media/logoJS.jpg"></img></a>
        </div>
        <div style="text-align: right; margin: 10px 70px 0 0">
                    <h6 id="id">Numéro d'ordre du reçu :</h6>
                </div>
        <div style="text-align: center">
          <h2 id="year">Reçus dons aux oeuvres 2018</h2>
            <h5>Articles 200 et 238 bis du Code Général des Impôts</h5>
        </div>
        <div style="border-style: solid; margin: 50px 20px; padding: 10px 10px">
            <h3 style="text-align: center; margin-bottom:10px">BÉNÉFICIAIRE DES VERSEMENTS</h3>
            <h5 style="text-align: left"><strong>Nom : </strong> Association Jarez Solidarités</h5>
            <h5 style="text-align: left"><strong>Adresse : </strong> 80 rue des Vergers, 42320 CELLIEU</h5>
            <h5 style="text-align: left"><strong>Objet : </strong>
                initier, organiser, mettre en œuvre, accompagner, coordonner toutes actions de solidarité envers les personnes en
                difficulté, quelles que soient leurs origines, leur culture, leur religion
                Au titre <strong>d'œuvre ou organisme d'intérêt général</strong>.
            </h5>
        </div>
        <div style="border-style: solid; margin: 30px 20px; padding: 10px 10px">
            <h3 style="text-align: center">DONATEUR</h3>
            <div style="margin-bottom: 10px">
                <h5 style="display: inline; text-align: left"><strong>Nom : </strong></h5>
                <h5 style="display: inline" id="Nom"> Desage</h5>
            </div>
            <div style="margin-bottom: 10px">
                <h5 style="display: inline; text-align: left"><strong>Prénom : </strong></h5>
                <h5 style="display: inline" id=" Prénom">Clément</h5>
            </div>
            <div style="margin-bottom: 10px">   
                <h5 style="display: inline; text-align: left"><strong>Adresse : </strong></h5>
                <h5 style="display: inline" id="Adresse">8 Rue Saint Eusèbe, 69003 Lyon</h5>
            </div>
        </div>
        <div style="margin: 30px 30px">
            <h5 id="year" style="display: inline"> Pour l’année 2018,</h5>
            <h5 style="display: inline">  le bénéficiaire reconnaît avoir reçu au titre des versements ouvrant droit à réduction d'impôt
                (cotisation, don, abandon de frais engagés par le bénévole), la somme de : </h5>
            <h5 id="Montant" style="display: inline"><strong>1000 euros.</strong> 
        </div>
        <div style="margin: 30px 30px">
            <h4><strong>Date et signature :</strong></h4>
            <h4> <? echo $Month->format('d/m/y'); ?></h4>
            <img alt="Logo Jarez Solidarités" style="height: 80px;" src="media/Sign.png"></img>
        </div>
    </div>

</body>

<script type="text/javascript">
    $(function() {
        var element = document.getElementById('content');
        var opt = {
            margin: 0,
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
                format: 'A4',
            }
        };
        html2pdf().set(opt).from(element).save();
    })
</script>