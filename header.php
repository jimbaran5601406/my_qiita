<?php
/**
 * My Qiita WordPress Theme
 * @author: Kei Funatsuya
 * @link: https://myqiita.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="HTML&CSS, JavaScript, PHP, MySQL, Laravel, Photoshopに関する情報を発信する技術ブログ" />
<meta name="author" content="Kei Funatsuya" />
<?php if ( is_home()) : ?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?= get_template_directory_uri(); ?>/screenshot.png">
<?php endif; ?>
<title><?php bloginfo('name') ?></title>
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

<!-- Site icon -->
<link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri(); ?>/assets/img/my_qiita.png" />

<!-- Third party styles -->
<link href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&family=Noto+Serif+JP:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css">
<link rel="stylesheet" href="//unpkg.com/swiper/swiper-bundle.min.css">

<!-- Core theme CSS (includes Bootstrap)-->
<link href="<?= get_template_directory_uri(); ?>/style.css" rel="stylesheet" />

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148514219-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148514219-2');
</script>
<!-- Google Adsense -->
<script data-ad-client="ca-pub-2263091751265179" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php wp_head(); ?>