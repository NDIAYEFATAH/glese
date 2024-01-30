var editData= function (id) {
    $('#exampleModals').load('infosCandidat.php')

    $.ajax({
        type: "GET",
        url: "index.php",
        data:{editId:id},
        dataType: "html",
        success: function(data) {
            var userData=JSON.parse(data);
            $("input[name='idOffre']").val(userData.idOffre);
            $("input[name='poste']").val(userData.poste);
            $("input[name='description']").val(userData.description);
            $("input[name='competence']").val(userData.competence);
            $("input[name='type']").val(userData.type);
            $("input[name='publier']").val(userData.publier);
        }
    });
}

$(document).on('submit','#updateform',function(e) {
  e.preventDefault();
  var id=$("input[name='idOffre']").val();
  var poste=$("input[name='poste']").val();
  var description=$("input[name='description']").val();
  var competence=$("input[name='competence']").val();
  var type=$("input[name='type']").val();
  var publier=$("input[name='publier']").val();

  $.ajax({
    method:"POST",
    url: "index.php",
    data:{
      updateId:id,
      poste:poste,
      description:description,
      competence: competence,
      type:type,
      publier:publier
    },
    success: function (data) {
      $('#exampleModals').load('gestionOffre.php');
    }
  });

});
