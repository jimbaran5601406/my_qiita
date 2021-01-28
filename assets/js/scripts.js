/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
(function ($) {
	"use strict"; // Start of use strict

	// aosライブラリ初期化
	AOS.init();

	{ // ローディングアニメーション非表示
		setTimeout(function () {
			$("#loading").addClass("loaded");
			$("#content").addClass("loaded");
		}, 1200);
	}


	if(document.querySelector(".post")) { // 投稿ページ限定処理
		{ // ナビゲーションが画面の高さを超過した時の処理
			const NAVBAR = document.querySelector(".navbar-nav");
			const NAVBAR_BRAND_HEIGHT = document.querySelector(".navbar-brand").clientHeight;
			const NAVBAR_HEIGHT = NAVBAR.clientHeight;
			const WINDOW_HEIGHT = window.innerHeight;
			const IS_OVERFLOW = WINDOW_HEIGHT < NAVBAR_BRAND_HEIGHT + NAVBAR_HEIGHT;

			$(".navbar-brand").addClass("show");
			$(".navbar-nav").addClass("show");
			if(IS_OVERFLOW) {
				NAVBAR.classList.add("overflow");
			}
		}

		{ // コメント送信ボタンにbootstrapクラス名付与
			const COMMENT_SUBMIT_BTN = document.querySelector("#comment_submit");
			if (COMMENT_SUBMIT_BTN) {
				// bootstrapのクラス名付与
				COMMENT_SUBMIT_BTN.setAttribute(
					"class",
					"btn btn-outline-primary btn-block"
				);
			}
		}

		{ // 各見出しにid付与
			// 投稿記事内のh1～h6までの見出し取得
			const HEADINGS = document.querySelectorAll(
				".post h2, .post h3, .post h4, .post h5, .post h6"
			);
			// 各見出しにhd_indexというID付与
			HEADINGS.forEach(function (heading, i) {
				heading.setAttribute("id", `hd_${i}`);
			});
		}

		{ // 拍手アイコンとコメントアイコンの表示処理
			window.addEventListener("scroll", displayClapBtn);

			function displayClapBtn() {
				const WINDOW_WIDTH = window.innerWidth;
				if (WINDOW_WIDTH >= 992) {
					const WINDOW_HEIGHT = window.innerHeight / 3;
					const VISIBLE_TOP_BORDER =
						document.querySelector(".post").offsetTop - WINDOW_HEIGHT;
					const VISIBLE_BOTTOM_BORDER =
						document.querySelector(".post-pagination").offsetTop - WINDOW_HEIGHT;
					const CLAP_BTN = document.querySelector(".post .wpulike");
					const COMMENT_BTN = document.querySelector(".post .post-comment-btn");

					if (
						window.scrollY >= VISIBLE_TOP_BORDER &&
						window.scrollY <= VISIBLE_BOTTOM_BORDER
					) {
						CLAP_BTN.classList.add("show");
						COMMENT_BTN.classList.add("show");
					} else {
						CLAP_BTN.classList.remove("show");
						COMMENT_BTN.classList.remove("show");
					}
				}
			}
		}

		{ // コメントエリア表示処理
			const COMMENT_BTN = document.querySelector(".post-comment-btn img");
			const COMMENT_AREA = document.querySelector(".post-comment-area");
			const COMMENT_HIDE_BTN = document.querySelector(".post-comment-hide-btn");

			if (location.hash) {
				COMMENT_AREA.classList.add("show");
			}
			COMMENT_BTN.addEventListener("click", function () {
				COMMENT_AREA.classList.toggle("show");
			});
			COMMENT_HIDE_BTN.addEventListener("click", function () {
				COMMENT_AREA.classList.toggle("show");
			});
		}
	}

	// swiper.jsライブラリ初期化
	const mySwiper = new Swiper(".swiper-container", {
		autoHeight: true,
		grabCursor: true,
		loop: true,
		speed: 800,
		autoplay: {
			delay: 5000
		},
		effect: "cube",
		cubeEffect: {
			shadow: true,
			slideShadows: true,
			shadowOffset: 40,
			shadowScale: 0.94
		},

		pagination: {
			el: ".swiper-pagination",
			clickable: true
		}
	});

	// スワイパーコンテンツホバー時に詳細表示
	$(".swiper-container").hover(function () {
		$(".swiper-content").toggleClass("show");
	});

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
