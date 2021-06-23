<?php
global $carpenter_options;

$carpenter_information_phone = $carpenter_options['carpenter_information_phone'];
$carpenter_information_zalo = $carpenter_options['carpenter_information_zalo'];
$carpenter_information_facebook = $carpenter_options['carpenter_information_facebook'];

?>

<?php if ( $carpenter_information_phone ) : ?>

<div class="phone-box">
    <a class="d-flex align-items-center" href="tel:<?php echo esc_attr( $carpenter_information_phone ); ?>">
        <span class="icon">
            <i class="fas fa-phone fa-rotate-90"></i>
        </span>

        <span class="number-phone">
            <?php echo esc_attr( $carpenter_information_phone ); ?>
        </span>
    </a>
</div>

<?php endif; ?>

<div class="contact-box">
    <?php if ( $carpenter_information_zalo ) : ?>

    <div class="zalo">
        <a href="https://zalo.me/<?php echo esc_attr( $carpenter_information_zalo ); ?>" target="_blank">
            <img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/zalo-chat.png' ) ) ?>" alt="" />
        </a>
    </div>

    <?php endif; ?>

    <?php if ( $carpenter_information_facebook ) : ?>

        <div class="facebook-chat">
            <a href="<?php echo esc_attr( $carpenter_information_facebook ); ?>" target="_blank">
                <i class="fab fa-facebook-messenger"></i>
            </a>
        </div>

    <?php endif; ?>
</div>