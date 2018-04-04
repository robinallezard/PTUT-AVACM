$( document ).ready( init ); //quand le doc est prêt lancer init()

function init() {
  $( window ).scrollTo( 'main' );
  $( 'a:first-child' ).css( 'background-color', '#96281b' ); // le premier a est rouge
  error();
}


function error() {
  $( '.btn-scroll' ).click( function () {

    var place = $( this ).prev(); // acces le p error le plus proche
    var answer = $( this ).parentsUntil( '', '.answer' ); // on remonte jusqu'à .answer
    var formEnter = $( answer ).attr( 'class' ); // quel type de champ nous avons à faire?

    if ( ( formEnter == 'answer radio' ) || ( formEnter == 'answer check' ) ||
      ( formEnter == 'answer scale' ) || ( formEnter == 'answer bool' ) ) {

      var input = $( answer ).find( 'input' ); // on cherche les differents questions stockées dans un tab 'input'
      var length = input.length;
      var formValid = false; // test
      var i = 0; //incrémentation

      while ( !formValid && i < length ) { //tant que true et qu'on a pas testé toutes les possibilité

        if ( input[ i ].checked == true ) { // est-ce que le radio a été checké?

          formValid = true; //si oui alors le form est valide
          scrollAsk( this ); // on peut donc scroller à la prochaine question
          $( place ).empty(); // on vide les erreurs

        }
        i++;

      }

      if ( !formValid ) { // si après le test formValid = false
        $( place ).empty().append( 'veuillez sélectionner une option' ); // on affiche une erreur
      }
      return formValid;

    } else if ( formEnter == 'answer phrase' ) {

      var input = $( answer ).find( 'input' ); // on cherche les differents questions stockées dans un tab 'input'
      var value = $( input ).val();

      if ( !value ) {
        $( place ).empty().append( 'veuillez remplir ce champ' ); // on affiche une erreur
      } else if ( value ) {
        scrollAsk( this ); // on peut donc scroller à la prochaine question
        $( place ).empty(); // on vide les erreurs
      }


    } else if ( formEnter == 'answer text' ) {

      var input = $( answer ).find( 'textarea' ); // on cherche les differents questions stockées dans un tab 'input'
      var value = $( input ).val();
      if ( !value ) {
        $( place ).empty().append( 'veuillez remplir ce champ' ); // on affiche une erreur
      } else if ( value ) {
        scrollAsk( this ); // on peut donc scroller à la prochaine question
        $( place ).empty(); // on vide les erreurs
      }
    }
  } )
}

//scroller jusqu'à la prochaine question
function scrollAsk( e ) { // prend en argument le .answer current
  var ask = $( e ).parentsUntil( 'form' );
  var next = ask.next(); // on cherche le answer suivant
  navCtrl( next ); // bg rouge sur le ctrl
  $( window ).scrollTo( ( next ), 600 ); // on scroll

}


function navCtrl( e ) {
  var id = e.attr( 'id' );
  var currentA = document.querySelector( '[name="#' + id + '"]' );
  $( currentA ).css( 'background', '#96281b' );
}

//empêcher de valider le form avec enter
$( 'form *' ).on( 'keypress', function ( e ) {
  return e.which !== 13;
} );