<style>
  .gjs-row {
    display: flex;
    flex-wrap: wrap;
    margin: -10px;
  }

  .gjs-cell {
    flex-basis: 33.33%;
    padding: 10px;
    box-sizing: border-box;
  }

  .i4l0c {
    max-width: 100%;
    height: auto;
  }

  .i7mz2 {
    margin-top: 8px;
    font-size: 14px;
  }

  #ijqis {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 16px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
    font-size: 12px;
  }

  #ijqis:hover {
    background-color: #555;
  }
</style>

<div class="gjs-row" id="ijww">
  <?php
  $filmy = Film::vyber_vsechny();
  foreach ($filmy as $film) {
    echo "<div class='gjs-cell iwyi'>
            <img class='i4l0c' src='/images/{$film["poster"]}'/>
            <h5 class='i7mz2'>
                {$film["nazev"]}
            </h5>
            <div class='i7mz2'>
                {$film["popis"]}
            </div>
            <a id='ijqis' href='/film/{$film["slug"]}'>Dozvědět se více</a>
        </div>";
  }
  ?>
</div>