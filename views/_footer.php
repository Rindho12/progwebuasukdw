<?php
defined('PATH') or exit('No direct script.');
?>
	</main>
	<footer class="column">
		<div>
			&copy; 2018.<br>
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
