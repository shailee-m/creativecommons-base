// const cc_global_menu_button = document.querySelector('.slide-button');
// const cc_global_menu = document.querySelector('.global-header');
// cc_global_menu_button.onclick = () => cc_global_menu.classList.toggle('open');

jQuery(document).ready(function($){
	if ($('.glide').length > 0) {
		new Glide('.glide').mount();
	}
	if ($('.donate-buttons').length > 0) {
		$('.amount-input').val('');
		var buttons = $('.donate-buttons').find('.donate-amount'),
				submit_button = $('.donate-buttons').find('.donate');
		submit_button.on('click', function(e){
			e.preventDefault();
			$('.donate-form').submit();
		});
		buttons.on('click', function(e){
			e.preventDefault();
			var obj = $(this),
					amount = obj.data('amount');
			$('.amount-input').val(amount);
			buttons.removeClass('active');
			obj.addClass('active');
		});
	}
});