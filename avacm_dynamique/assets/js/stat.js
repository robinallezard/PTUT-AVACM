$( document ).ready( init );

function init() {
  console.log( "init" );
  $( 'button' ).click( selectData );
}

function selectData( e ) {
  var type = $( this ).attr( 'id' ); // je récupère le type de graph
  var Currentdata = document.getElementById( 'select' ).value; // on récupère la valeur du select
  var data = {};

  drawGraph( Currentdata, data );

  if ( type == "chart" ) {
    new Chartist.Line( '#result', data );
  } else if ( type == "bar" ) {
    new Chartist.Bar( '#result', data );
  } else {
    option = {
      donut: true,
      donutWidth: 20,
      startAngle: 270,
      total: 200
    }
    new Chartist.Pie( '#result', data[ 1 ], option );
  }

}


function drawGraph( donnee, tab = {} ) {
  tab.labels = [];
  tab.series = [];
  tab.series[ 0 ] = [];

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ( request.readyState === 4 ) {


      var results = JSON.parse( request.responseText );

      for ( i = 0; i < results.length; i++ ) {
        tab.labels[ i ] = results[ i ].nom;
        tab.series[ 0 ][ i ] = results[ i ][ donnee ];

      }
      return tab;
    }
  };

  request.open( 'GET', '../assets/js/data.json', true ); //la requète
  request.send();
}