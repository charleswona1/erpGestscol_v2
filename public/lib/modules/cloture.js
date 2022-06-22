UI.Module.Cloture = {
    ClasseAnneeId : null,
    limitation: null,
    listPeriode: null,
    listSousPeriode: null,

    GetLimitation: function(limitationChoix){
        limitation = limitationChoix;
        if(limitationChoix == "sp"){
            this.GenerateLimitationType(UI.Module.Cloture.listSousPeriode);
        }else if(limitationChoix == "p"){
            this.GenerateLimitationType(UI.Module.Cloture.listPeriode);
        }else{
            this.ResetLimitationType();
        }
    },

    GenerateLimitationType: function(listLimitation){
        this.ResetLimitationType();
        $.each(listLimitation, function(key,item){
            $('#Choix_limite').append(new Option(item.numero,item.numero));
        });
    },

    ResetLimitationType: function(){
        $('.Choix_limite option').each(function() {
            console.log($(this).val());
            if ( $(this).val() != '' ) {
                $(this).remove();
            }
        });
    }
}