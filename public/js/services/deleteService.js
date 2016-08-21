
var deleteService = function() {

    function deleteStudy(studyId) {
        swal({
            title: '¿Está seguro?',
            text: 'El registro será elmininado',
            type: "warning",
            confirmButtonText: "Eliminar",
            confirmButtonColor: "#c9302c",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            html: true
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/studies/' + studyId,
                    dataType: 'json',
                    method: 'DELETE',
                    success: function (data) {
                        if (data['success']) {
                            $("#study_" + studyId).remove();
                            swal("Estudio eliminado", "", "success");
                        }
                        else {
                            swal("Hubo un error", "", "warning");
                        }
                    },
                    error: function () {
                        swal("Hubo un error", "", "warning");
                    }
                });
            }
        });

    }

    function deleteExperience(expereicneId) {
        swal({
            title: '¿Está seguro?',
            text: 'El registro será elmininado',
            type: "warning",
            confirmButtonText: "Eliminar",
            confirmButtonColor: "#c9302c",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            html: true
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '/experiences/' + expereicneId,
                    dataType: 'json',
                    method: 'DELETE',
                    success: function (data) {
                        if (data['success']) {
                            $("#experience_" + expereicneId).remove();
                            swal("Experiencia eliminada", "", "success");
                        }
                        else {
                            swal("Hubo un error", "", "warning");
                        }
                    },
                    error: function () {
                        swal("Hubo un error", "", "warning");
                    }
                });
            }
        });
    }

    function postDelete(url, id, nameId) {
        swal({
            title: '¿Está seguro?',
            text: 'El registro será elmininado',
            type: "warning",
            confirmButtonText: "Eliminar",
            confirmButtonColor: "#c9302c",
            cancelButtonText: "Cancelar",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            html: true
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: url + id,
                    dataType: 'json',
                    method: 'DELETE',
                    success: function (data) {
                        if (data['success']) {
                            $("#" + nameId + "_" + id).fadeOut( "slow" );
                            swal("Registro eliminado", "", "success");
                        }
                        else {
                            swal("Atención", 'No se puede eliminar, porque tiene objetos relacionados', "warning");
                        }
                    },
                    error: function () {
                        swal("Hubo un error", "", "warning");
                    }
                });
            }
        });
    }

    return {
        deleteCompanyCategory: function(id) {
            postDelete('/admin/company-categories/', id, 'category');
        },
        deleteCompany: function(id) {
            postDelete('/admin/companies/', id, 'company');
        },
        deleteResume: function(id) {
            postDelete('/admin/registers/', id, 'resume');
        },
        deleteContractTypes: function(id) {
            postDelete('/admin/contract-types/', id, 'type');
        },
        deleteOccupation: function(id) {
            postDelete('/admin/occupations/', id, 'occupation');
        },
        deleteParameter: function(id) {
            postDelete('/admin/parameters/', id, 'parameter');
        },
        deleteAdmin: function(id) {
            postDelete('/admin/admins/', id, 'admin');
        },
        deleteGeoLocations: function(id) {
            postDelete('/admin/geo-locations/', id, 'location');
        },
        deleteActivity: function(id) {
            postDelete('/admin/activities/', id, 'activity');
        },
        deleteStudy: function(studyId) {
            deleteStudy(studyId);
        },
        deleteExperience: function(experienceId) {
            deleteExperience(experienceId);
        }

    }
}();