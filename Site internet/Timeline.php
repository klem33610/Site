<?php date_default_timezone_set('UTC');
setlocale(LC_TIME, 'fr_FR.utf8','fra');?>
  <div id="timeline" onclick="show_Table(this)">
    <section class="section intro">
      <div class="text-center card-header px-4 rounded-bottom py-2 bg-warning text-white shadow-sm">
        <h1>Frise temporelle des dons pour l'aide d'urgence &rarr;</h1>
      </div>
    </section>

    <section class="timeline" style="background-color:#456990">

      <ol>
        <? for ($i = 12; $i > 0; $i--) {
          $Date = new DateTime(date("d-m-Y"));
           $Month = $Date->modify('-'.$i.' months'); ?>
        <li class="text-center <?php if($i > 3) { echo 'other_text';} ?>">
          <div>
              <p><strong><? echo strftime("%B %Y", strtotime($Month->format("F - Y"))); ?><br> </strong></p>
              <p>Somme des promesses de dons :</p>
              <p> 100 euros </p>
          </div>
        </li>
        <? } ?>
        <? for ($i = 0; $i <= 12; $i++) {
          $Date = new DateTime(date("d-m-Y"));
           $Month = $Date->modify('+'.$i.' months'); ?>
        <li class="text-center <?php if($i > 3) { echo 'other_text';} ?>">
          <div class="<? if ($i == 0) {echo 'bg-warning';} ?>">
              <p><strong><? echo strftime("%B %Y", strtotime($Month->format("F - Y"))); ?><br> </strong></p>
              <p>Somme des promesses de dons :</p>
              <p> 100 euros </p>
          </div>
        </li>
        <? } ?>
          <li></li>
      </ol>

      <div class="arrows">
        <button onclick="slide_left()" class="arrow arrow__prev">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_prev.svg" alt="prev timeline arrow">
        </button>
        <button onclick="slide_right()" class="arrow arrow__next">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/arrow_next.svg" alt="next timeline arrow">
        </button>
      </div>
    </section>
  </div>

<script src="static/JS/Timeline.js"></script>
