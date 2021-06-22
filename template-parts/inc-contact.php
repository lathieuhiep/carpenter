<?php
global $carpenter_options;

$carpenter_information_phone = $carpenter_options['carpenter_information_phone'];

?>

<div class="contact-box">
    <?php if ( $carpenter_information_phone ) : ?>

    <div class="phone">
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
</div>