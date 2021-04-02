(function(){   
    let bout = document.querySelectorAll('.radio input');
    let carrousel_2 = document.querySelector('.carrousel-2')
    let noBouton = 0;
    bout[0].checked = true;

    for (const bt of bout){
        bt.value = noBouton++;
        bt.addEventListener('mousedown', function(){
            carrousel_2.style.transform = "translateX(" + (-this.value*100)+ "vw)"
        });
    }
}())