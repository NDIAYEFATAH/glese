<?php 
    require_once('database.php');
    $sql = "SELECT * FROM offre";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){ ?>
        <tr>
                            <td><?= $row['idOFFRE'] ?></td>
                            <td><?= $row['poste'] ?></td>
                            <th><?= $row['type'] ?></th>
                            <td><?= $row['dateOFFRE'] ?></td>
                            <td class="text-primary"><?= $row['datePublication'] == "" ? "En attente de Publication" : $row['datePublication'] ?></td>
                            <td>
                                        <!-- Publier-->
                                <a href="?idq=<?= $row['idOFFRE'] ?>&etata=1" <?= $row['etatOFFRE']==1 ? 'hidden' : "" ?> class="btn btn-sm btn-success">
                                    Publier
                                </a>
                                        <!-- Desactiver-->
                                <a href="?idq=<?= $row['idOFFRE'] ?>&etata=0" <?= $row['etatOFFRE']==0 ? 'hidden' : "" ?> class="btn btn-sm btn-dark">
                                        Desactiver
                                </a>
                                        <!-- Suprimmer-->
                                        <td>
                                <button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			                    data-id="<?=$row['idOFFRE'];?>"
			                    data-name="<?=$row['poste'];?>"
			                    data-email="<?=$row['type'];?>"
			                    data-phone="<?=$row['dateOFFRE'];?>"
			                    >Edit</button></td>
                                        <!-- Details-->
                                <button class="btn btn-sm btn-info">
                                    <i class="fas fa-info-circle text-white"></i>
                                </button>
                            </td>
                        </tr>
<?php
        }
    }
    mysqli_close($connect);
?>
<script>
        $(document).ready(function() {
            $.ajax({
		    url: "View_ajax.php",
		    type: "POST",
		    cache: false,
		    success: function(dataResult){
			$('#table').html(dataResult); 
		}
	});
        $(function () {
                $('#update_country').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); /*Button that triggered the modal*/
                var id = button.data('idOFFRE');
                var name = button.data('poste');
                var email = button.data('description');
                var phone = button.data('competence');
                var city = button.data('type');
                var etatOffre = button.data('etatOFFRE');
                var modal = $(this);
                modal.find('#name_modal').val(poste);
                modal.find('#email_modal').val(description);
                modal.find('#phone_modal').val(competence);
                modal.find('#city_modal').val(type);
                modal.find('#name_publier').val(etatOFFRE);
                modal.find('#id_modal').val(idOFFRE);
		    });
        });
        $(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "update_ajax.php",
			type: "POST",
			cache: false,
			data:{
				id: $('#id_modal').val(),
				name: $('#name_modal').val(),
				email: $('#email_modal').val(),
				phone: $('#phone_modal').val(),
				city: $('#city_modal').val(),
                etatOffre: $('#city_publier').val(),
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
		});
	}); 
    });
    </script>