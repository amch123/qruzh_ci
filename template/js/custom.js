function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

$(document).ready(function() {
	$('#crud').DataTable({
		 responsive: true
	});

	$('#quantity').attr('value', '0');

	$('.minus').click(function(){
			var quantity = $('.qty').val();

			quantity = parseInt(quantity) - 1;

			if(quantity > 0)
			{
				$('#quantity').attr('value', quantity);
			}
			else
			{
				$('#quantity').attr('value', '0');
			}
		});

	$('.plus').click(function(){
			var quantity = $('.qty').val();

			quantity = parseInt(quantity) + 1;

			$('#quantity').attr('value', quantity);
		});
});