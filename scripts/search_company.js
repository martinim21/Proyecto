$('.chips').material_chip();
 $('.chips-initial').material_chip({
   placeholder:'hello'
   data: [{
     tag: 'Apple',
   }, {
     tag: 'Microsoft',
   }, {
     tag: 'Google',
   }],
 });
 $('.chips-placeholder').material_chip({
   placeholder: 'Enter a tag',
   secondaryPlaceholder: '+Tag',
 });

 var chip = {
    tag: 'chip content',
    image: '', //optional
    id: 1, //optional
  };

  $('.chips').on('chip.add', function(e, chip){
  // you have the added chip here
});

$('.chips').on('chip.delete', function(e, chip){
  // you have the deleted chip here
});

$('.chips').on('chip.select', function(e, chip){
  // you have the selected chip here
});


$('.chips-initial').material_chip('data');
