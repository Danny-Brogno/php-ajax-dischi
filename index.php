<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <!-- VUE -->
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <!-- AXIOS -->
  <script src="https://cdn.jsdelivr.net/npm/axios@0.21.1/dist/axios.min.js"></script>

    <style>

      * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      body {
      background: navy;
      justify-content: center;
      }

      header {
        display: flex;
        justify-content: center;
      }

      img {
        width: 200px;
        height: 200px;

      }

      .box {
        background-color: lime;
        text-align: center;
        width: 300px;
        height: 300px;
        margin: 10px;
      }

      .box h1 {
        font-size: 22px;
      }

      </style>

      <script>

        function init() {

          new Vue({
            el: "#dannyVue",
            data: {

            }, // END OF DATA
            mounted() {

              axios.get("data.php")
              .then(r => {
                console.log("all ok", r);
              })
              .catch(e => {
                console.log("NOT OK", e);
              })

            } // END OF MOUNTED

          }) // END OF NEW VUE

        } // END OF INIT

        document.addEventListener("DOMContentLoaded", init);

      </script>

      <title>PHP</title>

    <?php
      require_once 'data.php';
    ?>

  </head>
  <body>

    <header>
      <div id="dannyVue">
        <h1>Dischi</h1>
        <?php
        foreach ($db as $cd) {
          echo '<div class="box"><h1>' . $cd['title'] . '</h1>'
          . '<img src="' . $cd['poster'] . '">'
          . '<p>' . $cd['author'] . '</p>'
          . '<p>' . $cd['genre'] . '</p>'
          . '<p>' . $cd['year'] . '</p>'
          . '</div>';
        }
        ?>
      </div>
    </header>

  </html>
