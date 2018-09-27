<link href="static/css/timeline.min.css" rel="stylesheet">
<script src="static/JS/timeline.js"></script>

<?php date_default_timezone_set('UTC');
setlocale(LC_TIME, 'fr_FR.utf8','fra');?>

      <div class="timeline">
        <div class="timeline__wrap">
          <div class="timeline__items">
            <? for ($i = 12; $i > 0; $i--) {
              $Date = new DateTime(date("d-m-Y"));
               $Month = $Date->modify('-'.$i.' months'); ?>
               <div class="timeline__item">
                 <div class="text-center timeline__content">
                   <h2><? echo strftime("%B %Y", strtotime($Month->format("F - Y"))); ?><br></h2>
                   <p>Somme des promesses de dons :</p>
                  <p> 100 euros </p>
                </div>
              </div>
            <? } ?>
            <? for ($i = 0; $i <= 12; $i++) {
              $Date = new DateTime(date("d-m-Y"));
               $Month = $Date->modify('+'.$i.' months'); ?>
               <div class="timeline__item">
                 <div class="<? if ($i==0) {echo "border border-warning rounded ";}?> text-center timeline__content">
                   <h2><? echo strftime("%B %Y", strtotime($Month->format("F - Y"))); ?><br></h2>
                   <p>Somme des promesses de dons :</p>
                  <p> 100 euros </p>
                </div>
              </div>
            <? } ?>
          </div>
        </div>
      </div>

<script src="static/JS/timeline.min.js"></script>
