
$(document).ready(function() {
    $("#testimonialsContainer").hide();


    $("#toggleTestimonials").click(function() {
        $("#testimonialsContainer").slideToggle("slow");
    });
});


miElemento.addEventListener('mouseover', function() {
    miElemento.style.backgroundColor = '#B9E67C'; 
});

miElemento.addEventListener('mouseout', function() {
    miElemento.style.backgroundColor = '#8DC63F'; 
});


