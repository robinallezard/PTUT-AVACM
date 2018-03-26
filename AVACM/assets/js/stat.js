$(document).ready(init);

function init() {
  console.log("init");
}



function drawGraph() {
  var request = new XMLHttpRequest();
  console.log(request);
    request.onreadystatechange = function(){
      if(request.readystate == 4){

      }
    }
}


// Create a new line chart object where as first parameter we pass in a selector
// that is resolving to our chart container element. The Second parameter
// is the actual data object.
// new Chartist.Bar('.ct-chart', data);
