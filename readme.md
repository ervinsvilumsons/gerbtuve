<p align="center">
	<img 
        src="https://gerbtuve.com/wp-content/uploads/2022/10/logo.png" 
        alt="Ģērbtuve logo"
    >
</p>

## 🖥️ Production environment

| Component | Version |
| --- | --- |
| Apache | [2.4](https://httpd.apache.org/docs/2.4/) |
| MySQL | [8.4](https://dev.mysql.com/doc/relnotes/mysql/8.4/en/) |
| PHP | [8.5](https://www.php.net/releases/8.5/en.php) |
| Ubuntu | [26.04](https://documentation.ubuntu.com/release-notes/26.04/) |
| WordPress | [7.1](https://wordpress.org/download/releases/7-1/) |

## 🎨 Design 

Theme [Kadence](https://wordpress.org/themes/kadence/)
<details>
<summary>Color Palette</summary>

| Color | Hex |
|---|---|
| 🟦 Mosaic | `#102E46` |
| 🟦 Atlantic | `#18486D` |
| 🟧 Orange Passion | `#F57C21` |

</details>

## 🧩 Plugins

<details>
<summary>Installed with Composer</summary>

- CookieYes | GDPR Cookie Consent (`cookie-law-info`)
- EWWW Image Optimizer (`ewww-image-optimizer`)
- Flexible SSL for CloudFlare (`cloudflare-flexible-ssl`)
- Google Analytics Dashboard for WP (`google-analytics-dashboard-for-wp`)
- Meta Tag Manager (`meta-tag-manager`)
- OneSignal Push Notifications (`onesignal-free-web-push-notifications`)
- Post Slider and Carousel (`post-slider-and-carousel`)
- Really Simple Security (`really-simple-ssl`)
- Simple Local Avatars (`simple-local-avatars`)
- Hubbub Lite (`social-pug`)
- Ultimate Dashboard (`ultimate-dashboard`)
- UpdraftPlus - Backup/Restore (`updraftplus`)
- W3 Total Cache (`w3-total-cache`)

</details>

<details>
<summary>Install manually</summary>

- WP Cerber (`wp-cerber`)

</details>

## 🚀 Setup

### 📋 Requirements

- Docker with Docker Compose
- A running MySQL container or service reachable as [mysql](https://github.com/ervinsvilumsons/public-services#services)

### 📦 Installation

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
4. Add [.htaccess](https://developer.wordpress.org/advanced-administration/server/web-server/httpd/#basic-wp) file.
5. Start the WordPress container:

    ```bash
    make build
    ```

6. Open the site at the URL configured by `WP_SITEURL` (the example uses `http://localhost:9001`).
