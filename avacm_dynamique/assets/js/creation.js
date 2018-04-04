$( document ).ready( init );


function init() {

  var select = document.getElementById( 'select' );
  var champ = document.getElementById( 'champ' );
  var value = select.value;
  var nb_choix = 0;

  //si la valeur du select est radio ou check
  $( select ).change( function () {

    value = select.value;

    if ( ( value == 'check' ) || ( value == 'radio' ) ) {
      nb_choix++;
      $( champ ).append( '<div class="option"><input type="text" size="30" name="choix' + nb_choix + '" required><button type="button" class="rem_option">&#215;</button></div>' );
      $( 'form' ).append( '<input id="nb_choix" name="nb_choix" type = "hidden" value = "' + nb_choix + '" />' );
      var test = document.getElementsByClassName( 'rem_option' );
      test[ 0 ].addEventListener( 'click', remove );
    }

    // console.log( test );



    function remove( e ) {
      this.parentNode.remove();
      nb_choix--;
      $( '#nb_choix' ).attr( 'value', nb_choix );
    }

    //ajout d'option
    $( '#add_option' ).click( function () {
      nb_choix++;
      $( champ ).append( '<div class="option"><input type="text" size="30" name="choix' + nb_choix + '" required><button type="button" class="rem_option">&#215;</button></div>' );
      test = document.getElementsByClassName( 'rem_option' );
      test[ test.length - 1 ].addEventListener( 'click', remove );
      $( '#nb_choix' ).attr( 'value', nb_choix );
    } );

  } );

  if ( ( value == 'check' ) || ( value == 'radio' ) ) {
    nb_choix = document.getElementById( 'nb_choix' ).value;
    var test = document.getElementsByClassName( 'rem_option' );
    test[ test.length - 1 ].addEventListener( 'click', remove );

    function remove( e ) {
      this.parentNode.remove();
      nb_choix--;
      $( '#nb_choix' ).attr( 'value', nb_choix );
    }

    //ajout d'option
    $( '#add_option' ).click( function () {
      nb_choix++;
      $( champ ).append( '<div class="option"><input type="text" size="30" name="choix' + nb_choix + '" required><button type="button" class="rem_option">&#215;</button></div>' );
      test = document.getElementsByClassName( 'rem_option' );
      test[ test.length - 1 ].addEventListener( 'click', remove );
      $( '#nb_choix' ).attr( 'value', nb_choix );
    } );
  }

}