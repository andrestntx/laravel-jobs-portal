/**
 * Created by andrestntx on 3/22/16.
 */

var searchOccupations = function() {

    function initSearch(urlpath) {
        $("#occupation_id").selectpicker({
            liveSearch: true
        })
        .ajaxSelectPicker({
            ajax: {
                url: urlpath + '/ajax/occupations',
                type: 'GET',
                dataType: 'json',
                data: {
                    query: '{{{q}}}'
                }
            },
            locale: {
                emptyTitle: 'Buscar ocupación',
                searchPlaceholder: 'Buscar..',
                currentlySelected: 'Ocupación seleccionada',
                statusSearching: 'Buscando...',
                statusNoResults: 'Sin resultados',
                statusInitialized: 'Escribe el nombre de la ocupación que quieras buscar'

            },
            preprocessData: function(data) {
                var occupations = [];
                for(var key in data){ 
                    occupations.push({
                        'value': key,
                        'text': data[key],
                        'disabled': false
                    });
                }
                return occupations;
            },
            preserveSelected: true
        });
    }

    return {
        init: function(urlpath) {
            initSearch(urlpath);
        }
    };

}();


