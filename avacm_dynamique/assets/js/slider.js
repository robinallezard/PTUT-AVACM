//appel à l'initilialisation au chargement
$( document ).ready( init );
//l'initilialisation définit le style du caroussel
function init() {
  $( ".carousel" ).slick( {
    infinite: false,
    arrows: true,
    adaptiveHeight: true,
    prevArrow: '<button class="prev nav-btn"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button class="next nav-btn"><i class="fas fa-chevron-right"></i></button>'
    // draggable: true : ajouter si on veut pouvoir tourner les slides sans les boutons
  } )
}