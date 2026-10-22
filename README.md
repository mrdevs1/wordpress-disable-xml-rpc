# WordPress Disable XML-RPC

A lightweight PHP snippet to disable XML-RPC methods in WordPress when XML-RPC functionality is not required.

## Overview

WordPress XML-RPC provides a way for external applications and services to communicate with a WordPress website. However, some websites do not require this functionality.

Disabling unnecessary XML-RPC methods can help reduce the functionality exposed by a WordPress installation.

This repository provides a simple PHP snippet for administrators who want to disable XML-RPC methods through a WordPress filter.

## PHP Snippet

The implementation is available in [`disable-xml-rpc.php`](disable-xml-rpc.php).

```php
<?php
/**
 * Disable XML-RPC functionality in WordPress.
 */

add_filter( 'xmlrpc_enabled', '__return_false' );
```

## How It Works

- `add_filter()` registers a callback for a WordPress filter.
- `xmlrpc_enabled` controls whether XML-RPC methods requiring authentication are enabled.
- `__return_false` is a built-in WordPress function that returns `false`.

**Important:** This filter does not necessarily block every request to the `xmlrpc.php` endpoint. It is not a complete XML-RPC endpoint blocking solution.

## Installation

### Method 1: Using a PHP Snippets Plugin

1. Download or open `disable-xml-rpc.php`.
2. Copy the PHP snippet.
3. Open your WordPress administration dashboard.
4. Add the snippet using a trusted PHP snippets plugin.
5. Configure it to run on the website as appropriate.
6. Test your website and any connected applications.

### Method 2: Using a Child Theme

1. Back up your website.
2. Open your active child theme's `functions.php` file.
3. Add the snippet without duplicating the opening `<?php` tag if the file already contains it.
4. Save the file.
5. Test your website and review the results.

A child theme is recommended so that theme updates do not overwrite your customization.

## Verification

After installing the snippet:

1. Confirm that the website loads normally.
2. Test any mobile applications, integrations, or services that may rely on XML-RPC.
3. Verify the expected XML-RPC behavior using an authorized test.
4. Review application and server logs if an integration stops working.

A response from `xmlrpc.php` alone does not establish whether all XML-RPC methods are enabled or disabled. Interpret the result according to the endpoint's actual behavior.

## Compatibility Considerations

Before disabling XML-RPC functionality, check whether your website uses:

- Applications that publish content through XML-RPC
- Legacy integrations or automation tools
- Plugins that depend on XML-RPC methods
- External services that communicate with WordPress through XML-RPC

If a required integration stops working, review its documentation before deciding whether to keep XML-RPC disabled.

## Security Notes

- Keep WordPress, themes, and plugins updated.
- Use strong authentication and appropriate access controls.
- Review server and security-plugin logs for suspicious activity.
- If your goal is to block all requests to `xmlrpc.php`, use an appropriate server-level or security-plugin rule and test it carefully.
- Avoid blocking XML-RPC without checking the operational requirements of your website.

## Troubleshooting

### XML-RPC requests still reach the endpoint

The `xmlrpc_enabled` filter does not necessarily prevent requests from reaching `xmlrpc.php`. Endpoint-level restrictions require a separate configuration.

### An application stops connecting to WordPress

Check whether the application relies on XML-RPC. If it does, disabling XML-RPC methods may prevent it from working.

### A PHP error appears

Check that the snippet has been added in the correct location and that the opening PHP tag has not been duplicated.

## Repository Structure

```text
wordpress-disable-xml-rpc/
├── README.md
└── disable-xml-rpc.php
```

## Disclaimer

This snippet is provided for educational and website-hardening purposes. Test it in a staging environment when possible and verify compatibility with your site's integrations before applying it to production.

## References

- [WordPress Developer Resources: `xmlrpc_enabled`](https://developer.wordpress.org/reference/hooks/xmlrpc_enabled/)
- [WordPress Developer Resources](https://developer.wordpress.org/)
