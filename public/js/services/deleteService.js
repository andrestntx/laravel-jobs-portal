

var deleteService = function() {

    function deleteStudy(studyId) {
        if (confirm('¿Está seguro de eliminar?')) {
            $.ajax({
                url: '/studies/' + studyId,
                dataType: 'json',
                method: 'DELETE',
                success: function (data) {
                    if (data['success']) {
                        $("#study_" + studyId).remove();
                    }
                    else {
                        console.log('No se eliminó');
                    }
                },
                error: function () {
                    alert('fallo la conexion');
                }
            });
        }
    }

    function deleteExperience(expereicneId) {
        if (confirm('¿Está seguro de eliminar?')) {
            $.ajax({
                url: '/experiences/' + expereicneId,
                dataType: 'json',
                method: 'DELETE',
                success: function (data) {
                    if (data['success']) {
                        $("#experience_" + expereicneId).remove();
                    }
                    else {
                        console.log('No se eliminó');
                    }
                },
                error: function () {
                    alert('fallo la conexión');
                }
            });
        }
    }

    return {
        deleteStudy: function(studyId) {
            deleteStudy(studyId);
        },
        deleteExperience: function(experienceId) {
            deleteExperience(experienceId);
        }
    }

}();