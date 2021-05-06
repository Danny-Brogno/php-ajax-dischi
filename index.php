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
        background: linear-gradient(to right, rgba(50, 205, 50, 1), rgba(0, 0, 128, 1));
      }

      main {
        height: 100vh;
        width: 90%;
        margin: 0 auto;
        display: flex;
      }

      .container {
        display: flex;
        flex-wrap: wrap;
      }

      .box {
        background: linear-gradient(to bottom left, #9400D3, #EE0000);
        display:flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 300px;
        height: 300px;
        margin: 20px 20px;
        border-radius: 5px;
        box-shadow: 5px 10px rgba(0, 0, 0, 0.4);
      }

      .box h2 {
        font-size: 20px;
      }

      .box img {
        width: 200px;
        height: 200px;
        border-radius: 5px;
      }

      </style>

      <script>

        function init() {

          new Vue({
            el: "#dannyVue",
            data: {
              "bigArray": [],

            }, // END OF DATA
            mounted() {

              axios.get("data.php")
              .then(db => {
                this.bigArray = db.data;
                console.log("ALL OK", this.bigArray);
              })
              .catch(e => {
                console.log("NOT OK", e);
              })

            } // END OF MOUNTED

          }) // END OF NEW VUE

        } // END OF INIT

        document.addEventListener("DOMContentLoaded", init);

      </script>

      <title>AXIOS & PHP</title>

      <!-- require_once 'data.php'; -->

  </head>
  <body>

    <main>
      <div id="dannyVue" class="container">
        <div v-for="album in bigArray" class="box">
          <h2>{{ album.title }}</h2>
          <h3>{{ album.author }}</h3>
          <img :src="album.poster">
        </div>
        <!-- <h1>Dischi</h1>
        foreach ($db as $cd) {
          echo '<div class="box"><h1>' . $cd['title'] . '</h1>'
          . '<img src="' . $cd['poster'] . '">'
          . '<p>' . $cd['author'] . '</p>'
          . '<p>' . $cd['genre'] . '</p>'
          . '<p>' . $cd['year'] . '</p>'
          . '</div>';
        } -->
      </div>
    </main>

  </html>
