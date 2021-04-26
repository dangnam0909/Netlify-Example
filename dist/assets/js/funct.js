(function ($) {
	$.fn.extend({
		sendForm: function () {
			const form = this.get(0);

			$(form).find('button .btn').on({
				click: function (e) {
					e.preventDefault();

					const email1 = form.email.value;
					const email2 = form.email_confirmation.value;
					if (email1 !== email2) {
						form.email_confirmation.setCustomValidity('入力値が一致しません。');
					}
					else {
						form.email_confirmation.setCustomValidity('');
					}

					if (form.reportValidity()) {
						form.email_confirmation.disabled = true;
						form.submit();
					}

					return false;
				},
				keypress: function (e) {
					if (e.keyCode === 13 || e.which === 13) {
						$(this).trigger('click');
					}
				}
			});

			return $(this);
		}
	});
})(jQuery);
