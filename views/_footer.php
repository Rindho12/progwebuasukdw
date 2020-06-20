<?php
defined('PATH') or exit('No direct script.');
?>
	</main>
	<footer class="column">
		<div>
			&copy; 2018. Rindho Ananta Samat.<br>
			All right reserved.
		</div>
	</footer>
</div>
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.js') ?>"></script>
	<script type="text/javascript">
		$(function() {
			$(document).on('click', '#add', function(event) {
				event.preventDefault();
				if ($(this).hasClass('active')) {
					$('#form').slideUp(150);
					$('#list').slideDown(150);
					$('#input-search').fadeIn(150);
					$(this).removeClass('active');
				} else if (true) {
					$('#list').slideUp(150);
					$('#form').slideDown(150);
					$('#input-search').fadeOut(150);
					$(this).addClass('active');
				};
			});
			$(document).on('keyup', '#input-search', function(event) {
				event.preventDefault();
				var index1 = 0;
				var index2 = 0;
				var index3 = 0;
				var index4 = 0;
				var index5 = 0;
				var index6 = 0;
				var index7 = 0;
				var index8 = 0;
				var key = $(this).val();
				var tdNum1 = $(this).attr('data-one');
				var tdNum2 = $(this).attr('data-two');
				var tdNum3 = $(this).attr('data-three');
				var tdNum4 = $(this).attr('data-four');
				var tdNum5 = $(this).attr('data-five');
				var tdNum6 = $(this).attr('data-six');
				var tdNum7 = $(this).attr('data-seven');
				var tdNum8 = $(this).attr('data-eight');
				$('#table-search tbody tr').each(function() {
					$(this).hide();
				});
				$('#table-search tbody tr td:nth-of-type('+tdNum1+')').each(function() {
					index1++;
					console.log($(this).text());
					if ($(this).text().search(key) > -1) {
						$('#table-search tbody tr:nth-of-type('+index1+')').show();
					}
				});
				if (tdNum2 !== undefined) {
					$('#table-search tbody tr td:nth-of-type('+tdNum2+')').each(function() {
						index2++;
						console.log($(this).text());
						if ($(this).text().search(key) > -1) {
							$('#table-search tbody tr:nth-of-type('+index2+')').show();
						}
					});
				};
				if (tdNum3 !== undefined) {
					$('#table-search tbody tr td:nth-of-type('+tdNum3+')').each(function() {
						index3++;
						console.log($(this).text());
						if ($(this).text().search(key) > -1) {
							$('#table-search tbody tr:nth-of-type('+index3+')').show();
						}
					});
				};
				if (tdNum4 !== undefined) {
					$('#table-search tbody tr td:nth-of-type('+tdNum4+')').each(function() {
						index4++;
						console.log($(this).text());
						if ($(this).text().search(key) > -1) {
							$('#table-search tbody tr:nth-of-type('+index4+')').show();
						}
					});
				};
				if (tdNum5 !== undefined) {
					$('#table-search tbody tr td:nth-of-type('+tdNum5+')').each(function() {
						index4++;
						console.log($(this).text());
						if ($(this).text().search(key) > -1) {
							$('#table-search tbody tr:nth-of-type('+index5+')').show();
						}
					});
				};
				if (tdNum6 !== undefined) {
					$('#table-search tbody tr td:nth-of-type('+tdNum6+')').each(function() {
						index4++;
						console.log($(this).text());
						if ($(this).text().search(key) > -1) {
							$('#table-search tbody tr:nth-of-type('+index6+')').show();
						}
					});
				};
				if (tdNum7 !== undefined) {
					$('#table-search tbody tr td:nth-of-type('+tdNum7+')').each(function() {
						index4++;
						console.log($(this).text());
						if ($(this).text().search(key) > -1) {
							$('#table-search tbody tr:nth-of-type('+index7+')').show();
						}
					});
				};
				if (tdNum8 !== undefined) {
					$('#table-search tbody tr td:nth-of-type('+tdNum8+')').each(function() {
						index4++;
						console.log($(this).text());
						if ($(this).text().search(key) > -1) {
							$('#table-search tbody tr:nth-of-type('+index8+')').show();
						}
					});
				};
			});
			$(document).on('click', '#multiply-button button', function(event) {
				event.preventDefault();
				if ($(this).hasClass('add')) {
					var html = $('#multiply-form-1').html();
					$('#multiply-form-2').append(html);
				} else {
					$('#multiply-form-2 > div:last-child').remove();
				};
			});
			$(document).on('click', '#form-ajax-reservation button[name="submit"]', function(event) {
				event.preventDefault();
				var Depart = $('#form-ajax-reservation input[name="depart"]').val();
				var From = $('#form-ajax-reservation select[name="from"]').val();
				var To = $('#form-ajax-reservation select[name="to"]').val();
				var Type = $('#form-ajax-reservation select[name="type"]').val();
				$.ajax({
					url: 'http://localhost:8080/ukk_tiketing/?c=reservation&m=getRecordRes',
					method: 'POST',
					data: {depart: Depart, from: From, to: To, type: Type},
					beforeSend: function () {
						$('#table-search > tbody > tr').remove();
						$('#loading').show();
					},
				})
				.done(function (data) {
					$('#table-search > tbody').html(data);
				})
				.always(function () {
					$('#loading').hide();
				});
			});
			$(document).on('blur', '#passenger > div > div > div > input[name="identity[]"]', function () {
				var identity = $(this).val();
				if (identity == '') {
					return false;
				}
				var parent = $(this).parent().parent();
				$.ajax({
					url: 'http://localhost:8080/ukk_tiketing/?c=reservation&m=getCustomer',
					method: 'POST',
					data: {id: identity},
					beforeSend: function () {
						parent.children('div:nth-of-type(1)').children('input[name="identity[]"]').attr('disabled', 'disabled');
						parent.children('div:nth-of-type(2)').children('input[name="name[]"]').attr('disabled', 'disabled');
						parent.children('div:nth-of-type(3)').children('input[name="phone[]"]').attr('disabled', 'disabled');
						parent.children('div:nth-of-type(4)').children('input[name="birth[]"]').attr('disabled', 'disabled');
						parent.children('div:nth-of-type(5)').children('select[name="gender[]"]').attr('disabled', 'disabled');
						parent.children('div:nth-of-type(6)').children('textarea[name="address[]"]').attr('disabled', 'disabled');
					},
				})
				.done(function (data) {
					var json = $.parseJSON(data);
					if (json !== null) {
						parent.children('div:nth-of-type(2)').children('input[name="name[]"]').val(json.nameCustomer);
						parent.children('div:nth-of-type(3)').children('input[name="phone[]"]').val(json.phoneCustomer);
						parent.children('div:nth-of-type(4)').children('input[name="birth[]"]').val(json.birthCustomer);
						parent.children('div:nth-of-type(5)').children('select[name="gender[]"]').val(json.genderCustomer);
						parent.children('div:nth-of-type(6)').children('textarea[name="address[]"]').val(json.addressCustomer);
					} else {
						parent.children('div:nth-of-type(2)').children('input[name="name[]"]').val('');
						parent.children('div:nth-of-type(3)').children('input[name="phone[]"]').val('');
						parent.children('div:nth-of-type(4)').children('input[name="birth[]"]').val('');
						parent.children('div:nth-of-type(5)').children('select[name="gender[]"]').val('');
						parent.children('div:nth-of-type(6)').children('textarea[name="address[]"]').val('');
					}
				})
				.always(function () {
					parent.children('div:nth-of-type(1)').children('input[name="identity[]"]').removeAttr('disabled', 'disabled');
					parent.children('div:nth-of-type(2)').children('input[name="name[]"]').removeAttr('disabled', 'disabled');
					parent.children('div:nth-of-type(3)').children('input[name="phone[]"]').removeAttr('disabled', 'disabled');
					parent.children('div:nth-of-type(4)').children('input[name="birth[]"]').removeAttr('disabled', 'disabled');
					parent.children('div:nth-of-type(5)').children('select[name="gender[]"]').removeAttr('disabled', 'disabled');
					parent.children('div:nth-of-type(6)').children('textarea[name="address[]"]').removeAttr('disabled', 'disabled');
				});
			});
			$(document).on('click', '#form form button.active', function(event) {
				event.preventDefault();
				var price = $(this).attr('data');
				var pass = 0;
				$('#passenger .passenger').each(function () {
					pass++;
				});
				var all = (price*pass)+20000;
				$('#pricing input[name="priceAll"]').val(all);
				$('#multiply-button').hide();
				$(this).removeClass('active');
				$(this).attr('disabled', 'disabled');
				$('#pricing').slideDown(150);
			});
			$(document).on('keyup', '#pricing input[name="payAll"]', function(event) {
				event.preventDefault();
				var pay = $(this).val();
				var price = $('#pricing input[name="priceAll"]').val();
				var change = pay-price;

				if (change >= 0) {
					$('#pricing input[name="change"]').val(change);
					$('#form form button[name="submit"]').removeAttr('disabled');
				} else {
					$('#pricing input[name="change"]').val('not enough');
				}
			});
			$(document).on('click', '#toggle-aside, #overlay', function (event) {
				event.preventDefault();
				if ($(this).hasClass('active')) {
					$('aside').animate({left: '-275px'}, 200);
					$('#overlay').fadeOut(200);
					$('#toggle-aside').removeClass('active');
					$('#overlay').removeClass('active');
				} else {
					$('aside').animate({left: '0'}, 200);
					$('#overlay').fadeIn(200);
					$('#toggle-aside').addClass('active');
					$('#overlay').addClass('active');
				}
			})
		});
	</script>
</body>
</html>
