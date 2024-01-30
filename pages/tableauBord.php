<?php
    $labels=[];
    $data=[];
    $bgcolor=[];
    function rndRGBColorCode()
    {
        return "#" . dechex(rand(0, 255)) . dechex(rand(0, 255)) . dechex(rand(0, 255)); #using the inbuilt random function
    }
?>
<div class="card">
    <div class="card-header">
        <center><span class="h4 text-center">Tableau De Bord</span></center>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <td>#</th>
                    <th>Poste</th>
                    <th>Type</th>
                    <th>Date de l'offre</th>
                    <th>Nombre de Candidats</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($listeOffrePostuler as $key => $can) {
                        array_push($labels,$can['poste']);
                        array_push($data, $can['nb']);
                        array_push($bgcolor,rndRGBColorCode());
                    ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $can['poste'] ?></td>
                        <th><?= $can['type'] ?></th>
                        <td><?= $can['dateOFFRE'] ?></td>
                        <td><?= $can['nb'] ?></td>
                        <td>
                            <a href="?page=infoOffre&id=<?= $can['idOFFRE'] ?>" class="btn btn-sm btn-primary float-end">
                                <i class="fas fa-info-circle text-white"></i>
                            </a>
                        </td>
                            <!-- Details-->
                        <!-- <td>
                            <a href="?page=detailCan&id=<?= $can['idUser'] ?>" class="btn btn-sm btn-primary float-end">
                                <i class="fas fa-info-circle text-white"></i>
                            </a>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-6 mx-auto mt-3">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Repartition de la liste des offres postulées
                </div>
                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                <div class="card-footer small text-muted">Modifier Aujourd'hui a <?php echo date('H:i:s'); ?></div>
</div>
</div>
<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($labels) ?>,
        datasets: [{
        data: <?php echo json_encode($data) ?>,
        backgroundColor: <?php echo json_encode($bgcolor) ?>,
        }],
    },
    });

</script>


