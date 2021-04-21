<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootsrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <h1 class="text-center">Progress Nasional</h1>
                <p id="persentase-nasional"></p>
                <canvas id="progress-nasional"></canvas>
                <a href="detailNasional">detail</a>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h1 class="text-center">Progress Satker</h1>
                    <select class="custom-select" id="select-provinsi">
                        <?php foreach ($satker as $s ) :?>
                            <option value="<?= $s['kodesatker']; ?>"><?= $s['namasatker']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <canvas id="progress-provinsi"></canvas>
                <a href="detail-provinsi/" id="detail-provinsi">detail</a>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- bootsrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
    
    $(document).ready(function() {
        //progress nasional
        var progressNasional,progressSatker

        progressNasional = new Chart($('#progress-nasional')[0].getContext('2d'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [0, 0],
                    backgroundColor: ['rgba(182, 61, 69, 1)', 'rgba(3, 110, 186, 1)']
                }],
                labels: [
                    'Sudah mengisi',
                    'Belum mengisi'
                ]
            }
        });

        progressProvinsi = new Chart($('#progress-provinsi')[0].getContext('2d'), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [0, 0],
                    backgroundColor: ['rgba(182, 61, 69, 1)', 'rgba(3, 110, 186, 1)']
                }],
                labels: [
                    'Sudah mengisi',
                    'Belum mengisi'
                ]
            }
        });

        function initProgressNasional(){
            $(document).ready(function(){
                $.ajax({
                    url: "countProgressNasional", 
                    dataType: "json",
                    success: function(result){
                        progressNasional.data.datasets[0].data = result
                        $('#persentase-nasional').html(result[0]/result[1]+'%')
                        progressNasional.update()
                    }
                });
            });
        }

        initProgressNasional();

        $('#select-provinsi').change(function () {
            console.log($('#select-provinsi').val())
        })

        $('#detail-provinsi').attr('href','detail-provinsi/'+$('#select-provinsi').val())
        //progress satker

    })
    
    </script>


    <button onclick="logout()">logout</button>
</body>
<script></script>
<script>
    function logout() {
        location.replace('auth/logout')
    }
</script>

</html>