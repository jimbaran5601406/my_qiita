/*!
 * Start Bootstrap - Resume v6.0.2 (https://startbootstrap.com/theme/resume)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-resume/blob/master/LICENSE)
 */
(function ($) {
	"use strict"; // Start of use strict

	// Smooth scrolling using jQuery easing
	$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
		if (
			location.pathname.replace(/^\//, "") ==
				this.pathname.replace(/^\//, "") &&
			location.hostname == this.hostname
		) {
			var target = $(this.hash);
			target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
			if (target.length) {
				$("html, body").animate(
					{
						scrollTop: target.offset().top
					},
					1000,
					"easeInOutExpo"
				);
				return false;
			}
		}
	});

	// Closes responsive menu when a scroll trigger link is clicked
	$(".js-scroll-trigger").click(function () {
		$(".navbar-collapse").collapse("hide");
	});

	// Activate scrollspy to add active class to navbar items on scroll
	$("body").scrollspy({
		target: "#sideNav"
	});
})(jQuery); // End of use strict

document.addEventListener("DOMContentLoaded", function () {
	// コメント欄の送信ボタン取得
	const COMMENT_SUBMIT_BTN = document.querySelector("#comment_submit");
	if (COMMENT_SUBMIT_BTN) {
		// bootstrapのクラス名付与
		COMMENT_SUBMIT_BTN.setAttribute(
			"class",
			"btn btn-outline-primary btn-block"
		);
	}
});

document.addEventListener("DOMContentLoaded", function () {
	// 投稿記事内のh1～h6までの見出し取得
	const HEADINGS = document.querySelectorAll(
		".post h2, .post h3, .post h4, .post h5, .post h6"
	);
	// 各見出しにhd_indexというID付与
	HEADINGS.forEach(function (heading, i) {
		heading.setAttribute("id", `hd_${i}`);
	});
});
