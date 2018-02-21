$(document).ready(init); //quand le doc est prêt lancer init()

function init() {
  $(window).scrollTo('main');
  error();
}

function error() { // gérer les erreurs

  $('.btn-scroll').click(function() { //lorsqu'on clique sur sur un bouton

    var place = $(this).prev(); // acces le p error le plus proche
    var answer = $(this).parentsUntil('', '.answer'); // on remonte jusqu'à .answer
    var formEnter = $(answer).attr('class'); // quel type de champ nous avons à faire?


    if ((formEnter == 'answer radio') || (formEnter == 'answer check') ||
      (formEnter == 'answer scale') || (formEnter == 'answer bool')) {

      var input = $(answer).find('input'); // on cherche les differents questions stockées dans un tab 'input'
      var length = input.length;
      var formValid = false; // test
      var i = 0; //incrémentation

      while (!formValid && i < length) { //tant que true et qu'on a pas testé toutes les possibilité

        if (input[i].checked == true) { // est-ce que le radio a été checké?

          formValid = true; //si oui alors le form est valide
          scrollAsk(this); // on peut donc scroller à la prochaine question
          $(place).empty(); // on vide les erreurs

        }
        i++;

      }

      if (!formValid) { // si après le test formValid = false
        $(place).empty().append('veuillez selctionner une option'); // on affiche une erreur
      }
      return formValid;

    }

    else if (formEnter == 'answer phrase') {

      var input = $(answer).find('input'); // on cherche les differents questions stockées dans un tab 'input'
      console.log(input);
      var value = $(input).val();
      console.log(value);
      if (!value) {
        $(place).empty().append('veuillez remplir ce champ'); // on affiche une erreur
      } else if (value) {
        scrollAsk(this); // on peut donc scroller à la prochaine question
        $(place).empty(); // on vide les erreurs
      }


    }

    else if (formEnter == 'answer text') {

      var input = $(answer).find('textarea'); // on cherche les differents questions stockées dans un tab 'input'
      console.log(input);
      var value = $(input).val();
      console.log(value);
      if (!value) {
        $(place).empty().append('veuillez remplir ce champ'); // on affiche une erreur
      } else if (value) {
        scrollAsk(this); // on peut donc scroller à la prochaine question
        $(place).empty(); // on vide les erreurs
      }
    }

  })
}

//scroller jusqu'à la prochaine question
function scrollAsk(e) { // prend en argument le .answer current
  var ask = $(e).parentsUntil('form');
  var next = ask.next(); // on cherche le answer suivant
  $(window).scrollTo((next), 600); // on scroll
}

//empêcher de valider le form avec enter
$('form *').on('keypress', function(e) {
  return e.which !== 13;
});

/* function valider(){
  var allInput = $(document).find('input'); // on selectionne tous les inputs
  var area = $(document).find('textarea'); // on selectionne tous les inputs
  allInput.push(area);
  console.log(allInput);
} */
