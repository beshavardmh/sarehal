<?php
$targets = array( 'fitness', 'eat', 'mind' );
if ( ! isset( $_GET['target'] ) || ! in_array( $_GET['target'], $targets ) ) {
	wp_redirect( home_url() );
}
?>

<section class="signup">
    <form action="" method="post">

        <div class="progress-bar position-fixed top-0 z-index-3"></div>

        <header class="position-relative z-index-2 text-center pt-3 px-3">
            <a href="javascript:void(0)" class="py-3">
                <img data-src="https://sarehal.com/wp-content/uploads/2021/06/Linear-Logo.svg" width="160" height="50"
                     class="main-logo lazyload">
            </a>
        </header>

        <div class="position-relative z-index-2 max-w-800 mx-auto py-2 px-3">
            <a href="<?php echo home_url(); ?>" class="go-home hvr-fg-main fg-pencil">
                <div class="d-flex ai-center">
                    <div class="icon-wrap cursor-pointer">
                        <i class="far fa-chevron-right font-22"></i>
                    </div>

                    <span class="font-14">بازگشت</span>
                </div>
            </a>

            <a href="javascript:void(0)" class="display-none go-back hvr-fg-main fg-pencil">
                <div class="d-flex ai-center prev-step">
                    <div class="icon-wrap cursor-pointer">
                        <i class="far fa-chevron-right font-22"></i>
                    </div>

                    <span class="font-14">بازگشت</span>
                </div>
            </a>
        </div>

		<?php
		switch ( $_GET['target'] ) {
            case 'fitness':
                get_template_part('templates/signup_flow/fitness');
                break;
			case 'eat':
				get_template_part('templates/signup_flow/eat');
				break;
			case 'mind':
				get_template_part('templates/signup_flow/mind');
				break;
		}
		?>

        <footer class="position-fixed bottom-0 pt-4 w-100 z-index-2 d-none d-sm-block">
            <div style="background-color: #493e9a;" class="text-white font-15 text-center dir-ltr py-1">
                <div class="container">
                    <p class="d-inline-block">مرکز آنلاین تندرستی سرِحال</p>
                    <span class="mx-2">|</span>
                    <span>1400 - 1401 <?php // echo parsidate('Y', 'now', 'per'); ?></span>
                </div>
            </div>
        </footer>
    </form>
</section>