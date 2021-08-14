<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.4.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.4.0/mapbox-gl.css' rel='stylesheet' />
    <title>Cek RS</title>
    <style>
      #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
      }
      .marker1 {
        background-image: url('https://img.icons8.com/color/48/000000/place-marker--v1.png');
        background-size: cover;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
      }
      .marker2 {
        background-image: url('marker2.png');
        background-size: cover;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
      }
      .mapboxgl-popup {
        max-width: 200px;
      }
      .mapboxgl-popup-content {
        text-align: center;
        font-family: inherit;
      }
      .bungkus {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 0;
      }
      .fa-github {
        color: black;
        font-size: 24px;
      }
      .foot {
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/50adeae078.js" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="coba2.php">Cek RS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="coba2.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-4 mb-4">
      <h5 class="bg-light p-2">Isi Data Pelengkap</h5>
      <div class="d-flex flex-row">
        <div class="form-check mt-2">
          <input class="form-check-input me-2 pe-2" type="radio" name="flexRadioDefault" value="Laki-Laki" id="flexRadioDefault1">
          <label class="form-check-label me-5 pe-5" for="flexRadioDefault1" style="width: max-content;">Laki-Laki</label>
        </div>
        <div class="form-check mt-2">
          <input class="form-check-input me-2 pe-2" type="radio" name="flexRadioDefault" value="Perempuan" id="flexRadioDefault2">
          <label class="form-check-label me-5 pe-5" for="flexRadioDefault2">Perempuan</label>
        </div>
        <div class="input-group mb-3 input-group-sm mt-2" style="width: auto;">
          <span class="input-group-text" id="basic-addon1">Umur</span>
          <input id="age" type="number" class="form-control" placeholder="Umur" aria-label="Umur" aria-describedby="basic-addon1">
        </div>
      </div>

      <h5 class="bg-light p-2 mt-3">Pilih Gejala yang Anda Rasakan</h5>
      <?php
        $token    = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Iml0cy5kYWlzeS5vbmVAZ21haWwuY29tIiwicm9sZSI6IlVzZXIiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9zaWQiOiI2OTA4IiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy92ZXJzaW9uIjoiMTA5IiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9saW1pdCI6IjEwMCIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbWVtYmVyc2hpcCI6IkJhc2ljIiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9sYW5ndWFnZSI6ImVuLWdiIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9leHBpcmF0aW9uIjoiMjA5OS0xMi0zMSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbWVtYmVyc2hpcHN0YXJ0IjoiMjAyMS0wOC0xMSIsImlzcyI6Imh0dHBzOi8vYXV0aHNlcnZpY2UucHJpYWlkLmNoIiwiYXVkIjoiaHR0cHM6Ly9oZWFsdGhzZXJ2aWNlLnByaWFpZC5jaCIsImV4cCI6MTYyODk0OTU3NywibmJmIjoxNjI4OTQyMzc3fQ.IkPA0inn_8O6dpieioph0m4jiamvFoP_maxRMojNAYc";
        $format   = "json";
        $language = "en-gb";
        $url      = "https://healthservice.priaid.ch/symptoms?token=$token&format=$format&language=$language";
        $data     = file_get_contents($url);
        
        if($data) {
          $response = json_decode($data, true);
      ?>
          <div class="row row-cols-4" id="grid">
      <?php
          foreach($response as $gejala) {
      ?>
            <!-- tempat hasil ApiMedic Symptomp Checker akan ditampilkan -->
            <div class="col mt-2 mb-2"><a href="#" style="text-decoration: none;" id="<?= $gejala["ID"]; ?>"></a></div>
            <!-- jika diklik akan menampilkan modal -->
            <div class="modal" tabindex="-1" id="modal<?= $gejala["ID"]; ?>">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Daftar RS Terdekat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h5 class="bg-light">Data User</h5>
                    <div class="d-flex flex-row">
                      <div class="input-group mb-3 input-group-sm mt-2 me-2" style="width: auto;">
                        <span class="input-group-text" id="basic-addon1">Jenis Kelamin</span>
                        <input type="text" class="form-control jenis" name="jenis" readonly placeholder="Jenis Kelamin" aria-label="Jenis Kelamin" aria-describedby="basic-addon1">
                      </div>
                      <div class="input-group mb-3 input-group-sm mt-2 me-2" style="width: auto;">
                        <span class="input-group-text" id="basic-addon1">Umur</span>
                        <input type="number" class="form-control umur" readonly placeholder="Umur" aria-label="Umur" aria-describedby="basic-addon1">
                      </div>
                    </div>
                    <h5 class="bg-light">Daftar Spesialisasi yang Cocok</h5>
                    <div class="disini"></div>
                    <h5 class="bg-light mt-2">Daftar Rumah Sakit Terdekat yang Sesuai</h5>
                    <div id='map<?= $gejala["ID"]; ?>' style='width: 400px; height: 300px; position:inherit; margin:auto;'></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            
            <script>
              navigator.geolocation.getCurrentPosition(function(position) { /* get lokasi user */
                let lat = position.coords.latitude; /* longitude */
                let long = position.coords.longitude; /* latitude */
              
                var settings = { /* pakai API Just Translated untuk menerjemahkan gejala hasil ApiMedic Symptom Checker dr en ke id */
                  "async": true,
                  "crossDomain": true,
                  "url": "https://just-translated.p.rapidapi.com/?lang=id&text=<?= str_replace(" ","%20",$gejala["Name"]); ?>",
                  "method": "GET",
                  "headers": {
                    "x-rapidapi-key": "871873423emshf8ad899b6cd992cp1870f4jsnf5fb5885bc9e",
                    "x-rapidapi-host": "just-translated.p.rapidapi.com"
                  }
                };
                /* jika berhasil maka tampilkan di html dengan ID yang sesuai dengan hasil ApiMedic */
                $.ajax(settings).done(function (response) { 
                  $("#<?= $gejala["ID"]; ?>").html(response.text);
                });

                $('#<?= $gejala["ID"]; ?>').click(function() { /* jika tulisan hasil ApiMedic yang sudah diterjemahkan diklik */
                  $('.disini').html(""); /* class 'disini' di kosongkan terlebih dahulu */
                  
                  var jenis = $("input[name='flexRadioDefault']:checked").val();
                  var umur = $("input[id='age']").val();
                  $('.jenis').val(jenis);
                  $('.umur').val(umur);
                  var token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Iml0cy5kYWlzeS5vbmVAZ21haWwuY29tIiwicm9sZSI6IlVzZXIiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9zaWQiOiI2OTA4IiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy92ZXJzaW9uIjoiMTA5IiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9saW1pdCI6IjEwMCIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbWVtYmVyc2hpcCI6IkJhc2ljIiwiaHR0cDovL2V4YW1wbGUub3JnL2NsYWltcy9sYW5ndWFnZSI6ImVuLWdiIiwiaHR0cDovL3NjaGVtYXMubWljcm9zb2Z0LmNvbS93cy8yMDA4LzA2L2lkZW50aXR5L2NsYWltcy9leHBpcmF0aW9uIjoiMjA5OS0xMi0zMSIsImh0dHA6Ly9leGFtcGxlLm9yZy9jbGFpbXMvbWVtYmVyc2hpcHN0YXJ0IjoiMjAyMS0wOC0xMSIsImlzcyI6Imh0dHBzOi8vYXV0aHNlcnZpY2UucHJpYWlkLmNoIiwiYXVkIjoiaHR0cHM6Ly9oZWFsdGhzZXJ2aWNlLnByaWFpZC5jaCIsImV4cCI6MTYyODk1MDA4NywibmJmIjoxNjI4OTQyODg3fQ.DipfqEQ1TRmPQQ_1ruWAITYXrXBsbylqACh9tJRnXSo";
                  var symp  = <?= $gejala["ID"]; ?>;
                  if(jenis  = "Laki-Laki") {
                    var gen = "male";
                  } else {
                    var gen = "female";
                  }
                  var form  = "json";
                  var lang  = "en-gb";
                  var url   = "";
                  /* get hasil spesialisasi dari ApiMedic sesuai dengan input data pelengkap user */
                  fetch(`https://healthservice.priaid.ch/diagnosis/specialisations?symptoms=[${symp}]&gender=${gen}&year_of_birth=${umur}&token=${token}&format=${form}&language=${lang}`, {
                  }).then((response) => response.json()).then((jsonData) => { /* jika ada response */
                    var requestOptions = {
                      method: 'GET',
                    };
                    /* get hasil Geoapify API untuk mengetahui lokasi serta kategori rs terdekat */
                    fetch(`https://api.geoapify.com/v2/places?categories=healthcare.hospital&filter=rect:${long-0.2},${lat-0.2},${long+0.2},${lat+0.2}&lang=en&limit=10&apiKey=eb32470baa61438e867c34c2bbcc1c7f`, requestOptions)
                    .then(response => response.json()).then((result) => { /* jika ada response */
                      /* get style dari Geoapify API ke MapBox GL JS API */
                      mapboxgl.accessToken = 'pk.eyJ1IjoiZGVhMTAiLCJhIjoiY2tzOWFwdnlxMHNyaTMxcGU5NnBnaWhtNCJ9.m9atsKQbdp-Vg5a5DMPlMw';
                      const map = new mapboxgl.Map({
                        container: 'map<?= $gejala["ID"]; ?>',
                        style: 'https://maps.geoapify.com/v1/styles/osm-bright/style.json?apiKey=eb32470baa61438e867c34c2bbcc1c7f',
                        center: [long, lat], 
                        zoom: 9
                      });
                      
                      $.each(jsonData, function(i, data){ /* untuk setiap hasil spesialisasi dari ApiMedic */
                        $.each(result.features, function (i, marker) { /* untuk setiap hasil lokasi dari Geoapify API */
                          /* untuk menyamakan spesialisasi ApiMedic dengan kategori rumah sakit dari Geoapify API */
                          let regex = new RegExp(`\w*` + ((data.Name).toLowerCase()).split(' ')[0] +`\w*`, 'g');
                          let test = regex.test(marker.properties.categories);
                          
                          var el = document.createElement('div');/*  buat element */
                          if(test) { /* jika hasil spesialisasi ApiMedic dengan kategori Geoapify API sama (RS yang dituju sesuai dengan gejala) */
                            el.className = 'marker1';
                          } else {
                            el.className = 'marker2';
                          }

                          new mapboxgl.Marker(el) /* buat marker (penanda) lokasi dengan MapBox GL JS API dari hasil GeoApify API */
                          .setLngLat(marker.geometry.coordinates) /* koordinat diambil dari hasil Geoapify API */
                          .setPopup(
                            new mapboxgl.Popup({ offset: 25 }) /* buat popup yang berisi informasi Nama RS dan lokasi RS */
                              .setHTML(
                                '<h5>' + marker.properties.address_line1 + '</h5><p>' + marker.properties.address_line2 + '</p>'
                              )
                          )
                          .addTo(map); /* tambahkan ke map */
                        });

                        var settings2 = { /* get terjemahan spesialisasi dari hasil ApiMedic en - id dengan Just Translated API */
                          "async": true,
                          "crossDomain": true,
                          "url": `https://just-translated.p.rapidapi.com/?lang=id&text=${data.Name}`,
                          "method": "GET",
                          "headers": {
                            "x-rapidapi-key": "871873423emshf8ad899b6cd992cp1870f4jsnf5fb5885bc9e",
                            "x-rapidapi-host": "just-translated.p.rapidapi.com"
                          }
                        };

                        $.ajax(settings2).done(function (response) { /* jika berhasil maka tambahkan ke class 'disini' */
                          $('.disini').append('<div class="col">'+ response.text + '</div>');
                        });
                      });
                    });
                  });

                  $('#modal'+ '<?= $gejala["ID"]; ?>').modal('show'); /* tampilkan modal */
                });
              });
            </script>
      <?php
          }
      ?>
          </div>
      <?php
        } else {
          echo "Error.";
        }
      ?>
    </div>

    <div class='container-fluid'>
      <div class="bungkus bg-light">
        <div class="foot">
          <p>DEA INESIA SRI UTAMI</p>
        </div>
        <div class="foot">
          <p><a href="https://github.com/BANZAITESLA"><i class="fab fa-github"></i></a></p>
        </div>
      </div>
    </div>
  </body>
</html>