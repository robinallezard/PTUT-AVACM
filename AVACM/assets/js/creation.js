$(document).ready(init);


function init() {

  var select = document.getElementById('select');
  var champ = document.getElementById('champ');

  //si la valeur du select est radio ou check
  $(select).change(function() {

    var value = select.value;

    if ((value == 'check') || (value == 'radio')) {
      $(champ).append('<div class="option"><input type="text" size="30" name="question1" required><button type="button" class="rem_option">&#215;</button></div>');
    }
    var test = document.getElementsByClassName('rem_option');
    console.log(test);

      test[0].addEventListener('click',remove);

  function remove(e){
    this.parentNode.remove();
  }

  //ajout d'option
  $('#add_option').click(function(){
    $(champ).append('<div class="option"><input type="text" size="30" name="question1" required><button type="button" class="rem_option">&#215;</button></div>');
    test = document.getElementsByClassName('rem_option');
    test[test.length-1].addEventListener('click',remove);
  });

  });
}