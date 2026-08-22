<p align="center">
	<img 
        src="https://gerbtuve.com/wp-content/uploads/2022/10/logo.png" 
        alt="Ģērbtuve logo"
    >
</p>

## Production environment

| Component | Version |
| --- | --- |
| Apache | `2.4` |
| MySQL | `8.4` |
| PHP | `8.5` |
| Ubuntu | `26.04` |
| WordPress | `7.1` |

## Plugins

<details>
<summary>Installed with Composer</summary>

- Advanced Custom Fields (`advanced-custom-fields`)
- Animate It! (`animate-it`)
- CookieYes | GDPR Cookie Consent (`cookie-law-info`)
- Disable Comments (`disable-comments`)
- Display Posts (`display-posts-shortcode`)
- Easy Updates Manager (`stops-core-theme-and-plugin-updates`)
- EWWW Image Optimizer (`ewww-image-optimizer`)
- Favicon by RealFaviconGenerator (`favicon-by-realfavicongenerator`)
- Flexible SSL for CloudFlare (`cloudflare-flexible-ssl`)
- Google Analytics Dashboard for WP (`google-analytics-dashboard-for-wp`)
- Gutenberg (`gutenberg`)
- Meta Tag Manager (`meta-tag-manager`)
- OneSignal Push Notifications (`onesignal-free-web-push-notifications`)
- Post Slider and Carousel (`post-slider-and-carousel`)
- Really Simple Security (`really-simple-ssl`)
- Smart Archive Page Remove (`smart-archive-page-remove`)
- Hubbub Lite (`social-pug`)
- Ultimate Dashboard (`ultimate-dashboard`)
- UpdraftPlus - Backup/Restore (`updraftplus`)
- W3 Total Cache (`w3-total-cache`)
- WP Sitemap Page (`wp-sitemap-page`)
- Wpdevart Social comment (`comments-from-facebook`)

</details>

<details>
<summary>Install manually</summary>

- WP Cerber (`wp-cerber`)

</details>

## Setup

### Requirements

- Docker with Docker Compose
- A running MySQL container or service reachable as <a href="https://github.com/ervinsvilumsons/public-services#services" target="_blank" rel="noopener noreferrer">mysql</a>

### Installation

1. Clone the repository and open its directory.
    ```bash
    git clone git@github.com:ervinsvilumsons/gerbtuve.git
    ```

2. Create the local environment file:

    ```bash
    cp .env.example .env
    cp wp-config-sample.php wp-config.php
    ```

3. Update `.env` and `wp-config.php` with the database credentials and site URL for your environment.
4. Add <a href="https://developer.wordpress.org/advanced-administration/server/web-server/httpd/#basic-wp" target="_blank" rel="noopener noreferrer">.htaccess</a> file.
5. Start the WordPress container:

    ```bash
    make build
    ```

6. Open the site at the URL configured by `WP_SITEURL` (the example uses `http://localhost:9001`).
