(function(){   
    let carrousel = document.querySelectorAll('.carrousel-2')
    let radioCarrousel = document.querySelectorAll('.radio')
    let noRadioCarrousel = 0;
    for(const elmCarrou of carrousel){

        let bout = radioCarrousel[noRadioCarrousel].querySelectorAll('input');
        noRadioCarrousel = noRadioCarrousel + 1
        let noBouton = 0;
        bout[0].checked = true;
        for (const bt of bout){
            bt.value = noBouton++;
            bt.addEventListener('mousedown', function(){
                elmCarrou.style.transform = "translateX(" + (-this.value*100)+ "vw)"
            });
        }

 }
}())