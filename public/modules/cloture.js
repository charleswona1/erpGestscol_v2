UI = {
    Periodes:[],
    SousPeriodes:[],
    typeLimitation:"",
    currentPeriode:"",
    currentSousPeriode: "",

    initViewData: function(){
        $('#clotureBtn').prop("disabled", true);
        $('.classAllert').empty();
        $('.limitation').empty();
        $('#cloture').empty();
    },

    getLimitation: function(ev){
        $('.limitation').empty();
        $('#cloture').empty();
        UI.typeLimitation = ev.value;
        console.log(ev.value);
        if(ev.value == "sp"){
            let options = '';
            $.each(UI.SousPeriodes, function(key,elt){
                options += '<option value="'+elt.id+'">'+elt.numero+'</option>'
            });
            $('.limitation').append(
                '<label for="sous_periode" class="">Choix <span style="color:red;">*</span></label>'+
                '<select name="sous_periode_id" id="sous_periode" class="form-control" required>'+
                    '<option value="">selectionnez une limite</option>'+
                    options+
                '</select>'
            );
        }else if(ev.value == "p"){
            let options = '';
            $.each(UI.Periodes, function(key,elt){
                options += '<option value="'+elt.id+'">'+elt.numero+'</option>'
            })
            $('.limitation').append(
                '<label for="periodeId" class="">Choix <span style="color:red;">*</span></label>'+
                '<select name="periode_id" id="periodeId" class="form-control" required>'+
                    '<option value="">selectionnez une limite</option>'+
                    options+
                '</select>'
            );      
        }
    },

    choixOptionLimite: function(ev){
        
    }
};