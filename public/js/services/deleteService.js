
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

    function postDelete(url, id, nameId) {
        if (confirm('¿Está seguro de eliminar?')) {
            $.ajax({
                url: url + id,
                dataType: 'json',
                method: 'DELETE',
                success: function (data) {
                    if (data['success']) {
                        $("#" + nameId + "_" + id).fadeOut( "slow" );
                    }
                    else {
                        alert('No se puede eliminar, porque tiene objetos relacionados')
                    }
                },
                error: function () {
                    alert('fallo la conexion');
                }
            });
        }
    }

    return {
        deleteCompanyCategory: function(id) {
            postDelete('/admin/company-categories/', id, 'category');
        },
        deleteCompany: function(id) {
            postDelete('/admin/companies/', id, 'company');
        },
        deleteContractTypes: function(id) {
            postDelete('/admin/contract-types/', id, 'type');
        },
        deleteOccupation: function(id) {
            postDelete('/admin/occupations/', id, 'occupation');
        },
        deleteGeoLocations: function(id) {
            postDelete('/admin/geo-locations/', id, 'location');
        },
        deleteStudy: function(studyId) {
            deleteStudy(studyId);
        },
        deleteExperience: function(experienceId) {
            deleteExperience(experienceId);
        }
    }
}();