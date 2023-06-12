<?php
// Pokud proměnná existuje a není prázdná
if (empty($nazev)) {
    exit();
}

$film = Film::vyber_film($nazev);
if (empty($film)) {
    exit();
}
$slug = $nazev;
$film = $film[0];
$nazevek = $film["nazev"];
$id = $film["id"];
$delka = $film["delka"];
$rok_vydani = $film["rok_vydani"];
$popis = $film["popis"];
$poster = $film["poster"];
$zanry = $film["zanry"];
// Upraví zánry do formátu Akcni / Fantazy
$zanry = implode(" / ", $zanry);
?>
<style>
   .gjs-row {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .gjs-cell {
        flex-basis: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    #it9bi {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .recenze-container {
        margin-bottom: 20px;
    }

    .recenze-header {
        font-size: 16px;
        font-weight: bold;
    }

    .recenze-content {
        font-size: 14px;
    }

     #ilgv4 {
        font-size: 18px;
        font-weight: bold;
    }

    #iz1tq {
        text-decoration: none;
        color: #fff;
        background-color: #007bff;
        padding: 10px 20px;
        border-radius: 5px;
        display: inline-block;
    }
  #ib8h {
    margin-bottom: 20px;
  }

  #inrlc {
    font-size: 32px;
    margin: 0;
  }

  #ilql {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .zanry {
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #888;
  }

  #iyamo {
    margin-bottom: 10px;
    font-size: 14px;
    color: #888;
  }

  #iw1zm {
    margin-bottom: 20px;
    font-size: 16px;
    line-height: 1.5;
  }

  .gjs-cell-left {
    max-width: fit-content;
    margin-bottom: 20px;
  }

  .gjs-cell-right {
    flex: 0 0 67%;
    max-width: 67%;
    margin-bottom: 20px;
    margin-top: 50px;
  }
</style>

<div class="gjs-row" id="iyjy">
  <div class="gjs-cell gjs-cell-left" id="ip0x">
    <div id="ib8h">
      <h1 id="inrlc">
        <?php echo $nazevek; ?>
      </h1>
    </div>
    <img id="ilql" src="/images/<?php echo $poster ?>">
  </div>
  <div class="gjs-cell gjs-cell-right" id="ie8w">
    <div id="i8x6o" class="zanry">
      <?php echo $zanry ?>
    </div>
    <div id="iyamo">
      <span id="ighmy" draggable="true">
        <?php echo $rok_vydani ?>,
      </span>
      <?php echo $delka ?> min
    </div>
    <div id="iw1zm">
      <?php echo $popis ?>
      <br />
    </div>
  </div>
</div>
<div class="gjs-row" id="i2nkh">
    <div class="gjs-cell" id="imc6p">
        <div id="it9bi">Recenze<br /></div>
        <div id="ii1si"></div>
    <?php
    $recenze = Recenze::vyber_u_filmu($id);
    foreach ($recenze as $recenze) {
      $recenzent = $recenze["id_uzivatel"];
      $obsah = $recenze["text"];
      $hodnoceni = $recenze["hodnoceni"];
      $datum = $recenze["datum"];
      echo "<div class='recenze-container'>
                <div class='recenze-header'>$recenzent $hodnoceni/5<br /></div>
                <div class='recenze-content'>$obsah</div>
            </div>";
    }
    ?>
    <div class="gjs-row" class="idnu8"></div>
  </div>
</div>
<div class="gjs-row" id="itf7f">
  <div class="gjs-cell" id="ii3hf">
    <a href="/film/<?php echo $slug ?>/napsat-recenzi" id="iz1tq">
      <div id="ilgv4">Napsat recenzi<br /></div>
    </a>
  </div>
</div>