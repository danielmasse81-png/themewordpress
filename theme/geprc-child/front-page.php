<?php
/**
 * Front page template for GEPRC Child.
 *
 * @package geprc-child
 */

get_header();

$products = geprc_child_get_featured_products();
$shop_url = function_exists('wc_get_page_id') ? get_permalink(wc_get_page_id('shop')) : home_url('/boutique');
?>

<section class="geprc-hero">
    <div class="hero-inner">
        <div class="hero-card">
            <div class="eyebrow">
                <span class="dashicons dashicons-location"></span>
                FPV Performance Lab
            </div>
            <h1><?php esc_html_e('Repoussez vos vols FPV avec l\'ADN GEPRC', 'geprc-child'); ?></h1>
            <p><?php esc_html_e('Propulsez vos builds avec des frames carbone, stacks optimisées et support pro. Cette page met en avant vos meilleures références prêtes à décoller.', 'geprc-child'); ?></p>
            <div class="hero-actions">
                <a class="geprc-btn primary" href="#shop">
                    <?php esc_html_e('Découvrir les drones', 'geprc-child'); ?>
                    <span class="dashicons dashicons-arrow-right-alt"></span>
                </a>
                <a class="geprc-btn secondary" href="#services">
                    <?php esc_html_e('Services & support', 'geprc-child'); ?>
                </a>
            </div>
            <div class="geprc-badges">
                <span class="geprc-badge"><span class="dashicons dashicons-plugins-checked"></span><?php esc_html_e('Assemblage contrôlé', 'geprc-child'); ?></span>
                <span class="geprc-badge"><span class="dashicons dashicons-shield-alt"></span><?php esc_html_e('Garantie & SAV', 'geprc-child'); ?></span>
                <span class="geprc-badge"><span class="dashicons dashicons-clock"></span><?php esc_html_e('Expédition rapide', 'geprc-child'); ?></span>
            </div>
        </div>
        <div class="hero-card">
            <span class="geprc-pill">GEPRC</span>
            <h3><?php esc_html_e('Compatibilité WooCommerce prête à l\'emploi', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Le thème enfant respecte la hiérarchie de modèles WordPress tout en offrant une surcouche visuelle sombre et dynamique.', 'geprc-child'); ?></p>
            <div class="geprc-specs">
                <div class="geprc-spec"><?php esc_html_e('Palette néon sombre', 'geprc-child'); ?></div>
                <div class="geprc-spec"><?php esc_html_e('Typographie Inter', 'geprc-child'); ?></div>
                <div class="geprc-spec"><?php esc_html_e('Blocs prêts pour Gutenberg', 'geprc-child'); ?></div>
                <div class="geprc-spec"><?php esc_html_e('Optimisé produits phares', 'geprc-child'); ?></div>
            </div>
            <p class="geprc-footnote"><?php esc_html_e('Ajoutez cette page comme page d\'accueil statique pour profiter des sections ci-dessous.', 'geprc-child'); ?></p>
        </div>
    </div>
</section>

<section id="services" class="alignwide" style="margin-top: 40px;">
    <div class="geprc-section-title">
        <div>
            <h2><?php esc_html_e('Solutions pour pilotes, shops et ateliers', 'geprc-child'); ?></h2>
            <p class="subtitle"><?php esc_html_e('Mettez en avant vos différenciateurs : assistance build, réglages firmware, et sélection de composants reconnus GEPRC.', 'geprc-child'); ?></p>
        </div>
        <a class="geprc-btn secondary" href="<?php echo esc_url(wp_customize_url()); ?>">
            <?php esc_html_e('Personnaliser le thème', 'geprc-child'); ?>
        </a>
    </div>
    <div class="geprc-grid">
        <article class="geprc-card">
            <span class="geprc-pill"><?php esc_html_e('Builds FPV', 'geprc-child'); ?></span>
            <h3><?php esc_html_e('Kits prêts à voler', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Présentez vos bundles PNP et RTF avec un call-to-action clair vers WooCommerce.', 'geprc-child'); ?></p>
        </article>
        <article class="geprc-card">
            <span class="geprc-pill"><?php esc_html_e('Support', 'geprc-child'); ?></span>
            <h3><?php esc_html_e('Assistance firmware', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Une zone de contenu pour documenter vos presets Betaflight/INAV ou rediriger vers votre base de connaissance.', 'geprc-child'); ?></p>
        </article>
        <article class="geprc-card">
            <span class="geprc-pill"><?php esc_html_e('Composants', 'geprc-child'); ?></span>
            <h3><?php esc_html_e('Stacks et moteurs', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Mettez en avant vos ESC, stacks et moteurs GEPRC avec badges de puissance et d\'efficacité.', 'geprc-child'); ?></p>
        </article>
        <article class="geprc-card">
            <span class="geprc-pill"><?php esc_html_e('Sécurité', 'geprc-child'); ?></span>
            <h3><?php esc_html_e('Qualité & garantie', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Rassurez vos clients avec une section sur la garantie, le SAV et le contrôle qualité.', 'geprc-child'); ?></p>
        </article>
    </div>
</section>

<section id="shop" class="alignwide" style="margin-top: 60px;">
    <div class="geprc-section-title">
        <div>
            <h2><?php esc_html_e('Produits phares', 'geprc-child'); ?></h2>
            <p class="subtitle"><?php esc_html_e('Une grille dynamique qui bascule automatiquement vers WooCommerce si des produits en vedette existent.', 'geprc-child'); ?></p>
        </div>
        <a class="geprc-btn primary" href="<?php echo esc_url($shop_url); ?>">
            <?php esc_html_e('Voir la boutique', 'geprc-child'); ?>
        </a>
    </div>

    <?php if (!empty($products)) : ?>
        <div class="geprc-grid">
            <?php foreach ($products as $product) : ?>
                <article class="geprc-card">
                    <a href="<?php echo esc_url($product->get_permalink()); ?>">
                        <?php echo wp_kses_post($product->get_image('medium')); ?>
                        <h3><?php echo esc_html($product->get_name()); ?></h3>
                    </a>
                    <p><?php echo wp_kses_post($product->get_price_html()); ?></p>
                    <a class="geprc-btn secondary" href="<?php echo esc_url($product->add_to_cart_url()); ?>">
                        <?php esc_html_e('Ajouter au panier', 'geprc-child'); ?>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="geprc-grid">
            <?php
            $placeholders = [
                __('Batteries LiPo sécurisées', 'geprc-child'),
                __('Caméras HD légères', 'geprc-child'),
                __('Frames carbone optimisées', 'geprc-child'),
                __('Radio & contrôleurs', 'geprc-child'),
            ];
            foreach ($placeholders as $title) :
            ?>
                <article class="geprc-card">
                    <span class="geprc-pill">GEPRC</span>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php esc_html_e('Ajoutez vos produits vedettes WooCommerce pour remplacer ces blocs par de vraies fiches.', 'geprc-child'); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<section class="alignwide" style="margin: 60px 0;">
    <div class="geprc-section-title">
        <div>
            <h2><?php esc_html_e('FAQ rapide', 'geprc-child'); ?></h2>
            <p class="subtitle"><?php esc_html_e('Répondez aux questions fréquentes des pilotes et revendeurs GEPRC.', 'geprc-child'); ?></p>
        </div>
    </div>
    <div class="geprc-grid">
        <article class="geprc-card">
            <h3><?php esc_html_e('Quels firmware sont supportés ?', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Met en avant vos presets Betaflight/INAV/KISS et les versions testées.', 'geprc-child'); ?></p>
        </article>
        <article class="geprc-card">
            <h3><?php esc_html_e('Quelles batteries recommandez-vous ?', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Listez vos packs LiPo/LIHV compatibles et les connecteurs utilisés.', 'geprc-child'); ?></p>
        </article>
        <article class="geprc-card">
            <h3><?php esc_html_e('Comment fonctionne la garantie ?', 'geprc-child'); ?></h3>
            <p><?php esc_html_e('Rappel des conditions de garantie GEPRC et du flux RMA.', 'geprc-child'); ?></p>
        </article>
    </div>
</section>

<?php get_footer(); ?>
