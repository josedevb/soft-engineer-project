var working = false;
$('.login').on('submit', function() {
  if (working) return;
  working = true;
  var $this = $(this),
    $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Autenticando');
  setTimeout(function() {
  }, 4000);
});