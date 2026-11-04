# WP Gears

**A small, understandable WordPress block-theme starter for client projects.**

WP Gears is a starting point, not an all-in-one website system. It gives a project a clean block-theme foundation and leaves site-specific features to WordPress core and the needs of each client.

> **Beta 0.1.0:** Install on a local or staging WordPress site first. This first beta has not yet been tested across a range of installations, browsers, and devices.

## Principles

- Mobile-first layouts; start with the narrow screen and let content expand naturally.
- Use native WordPress blocks, the Site Editor, Global Styles, template parts, and APIs.
- Keep CSS and JavaScript small. No framework, build step, external font request, or required plugin.
- Prefer readable code and proven WordPress examples over custom abstractions.
- Add only the files and features a real project needs.

## What is intentionally not included

No custom post types, custom fields framework, form builder, page builder, slider, or companion plugin. Those are project-specific decisions. Functionality that must survive a theme change should generally live in a plugin, not in the theme.

## Repository structure

```text
wpgears/
├── theme/
│   ├── parts/
│   │   ├── header.html
│   │   └── footer.html
│   ├── templates/
│   │   ├── 404.html
│   │   ├── archive.html
│   │   ├── index.html
│   │   ├── page.html
│   │   ├── search.html
│   │   └── single.html
│   ├── functions.php
│   ├── style.css
│   └── theme.json
└── README.md
```

The theme files live directly inside `theme/`; there is no extra nested theme folder. Empty `assets/`, `inc/`, or `patterns/` folders are deliberately omitted until there is a real reason to add them.

## Install locally

1. Download or clone this repository.
2. Copy the **contents** of `theme/` into `wp-content/themes/wpgears/` in a WordPress installation.
3. Activate **WP Gears** under **Appearance → Themes**.
4. Open **Appearance → Editor** to edit the header, footer, templates, and global styles.
5. Add a few posts and pages, configure navigation, then check the site on mobile and desktop.

The repository is not yet a ready-to-upload theme ZIP: the theme is kept in a subdirectory for development. Packaging can be automated later if it becomes useful.

## File guide

### `theme/style.css`
The comment at the top is the theme header WordPress reads to identify the theme. The CSS below it is intentionally tiny. Most design tokens and global styles belong in `theme.json`, where they are also exposed to the Site Editor.

### `theme/theme.json`
The central design configuration for a block theme.

- `settings` controls editor tools and reusable presets such as colors, spacing, and font sizes.
- `styles` defines the theme's default appearance.
- `templateParts` registers the shared header and footer.

This beta uses **theme.json version 3**, which requires WordPress 6.6 or newer. JSON does not support comments, so explanations live here rather than being inserted into the JSON file.

### `theme/functions.php`
WordPress loads this file automatically. It currently has one job: enqueue the small global stylesheet using the normal `wp_enqueue_scripts` hook. There is no need to split one small function into several PHP files.

### `theme/parts/`
Reusable pieces of a page. The header contains the site title and Navigation block. The footer is a small editable placeholder. Templates include these files with Template Part blocks.

### `theme/templates/`
Block templates are made from WordPress block markup.

- `index.html` is required and acts as the fallback template.
- `single.html` displays an individual post.
- `page.html` displays a normal page.
- `archive.html` displays category, tag, date, and other archives.
- `search.html` displays search results.
- `404.html` is the not-found page.

WordPress selects the most specific matching template automatically. We do not need PHP routing code.

## Understanding block markup

A block has an opening comment, saved HTML, and a closing comment:

```html
<!-- wp:paragraph -->
<p>This is a paragraph block.</p>
<!-- /wp:paragraph -->
```

A block with no inner content can use a self-closing comment:

```html
<!-- wp:site-title /-->
```

The JSON attributes inside the comment are the block's settings. The HTML is its saved markup. Keep them consistent when editing templates manually.

**Template comment rule:** keep only the special WordPress block-delimiter comments (the ones beginning with `wp:` or `/wp:`) inside `templates/*.html` and `parts/*.html`. Do not add ordinary explanatory HTML comments there. The Site Editor can treat those comments as unexpected content inside a block and mark the block invalid. Put developer explanations in this README instead.

## Why these references?

- [Twenty Twenty-Five](https://github.com/WordPress/twentytwentyfive) is the main reference for modern block-theme architecture and keeping styling in `theme.json`.
- [Twenty Twenty-Four](https://github.com/WordPress/twentytwentyfour) is a secondary reference for specific implementation examples.
- [WordPress Theme Developer Handbook](https://developer.wordpress.org/themes/) is the source of truth for theme structure and APIs.
- [theme.json v3 reference](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-living/) documents the configuration format.

We should find an existing, well-tested approach, understand it, adapt names and requirements, and test it. Do not copy large features just because another theme has them.

## Beta 0.1.0 test checklist

- [ ] WordPress recognizes WP Gears as a block theme.
- [ ] Theme activates without a PHP error.
- [ ] Header, site title, navigation, and footer appear.
- [ ] Site Editor can edit the shared parts, templates, and Global Styles.
- [ ] Posts, pages, archives, search, and 404 use the expected templates.
- [ ] Layout works at narrow mobile widths and on desktop.
- [ ] Keyboard focus remains visible when tabbing through links.
- [ ] Browser console and PHP log show no theme-generated errors.

## Rules for future changes

1. Start with the smallest useful feature.
2. Check whether WordPress core already provides it.
3. Look for a proven implementation in an official WordPress theme or the handbook.
4. Explain the relevant code before adapting it.
5. Avoid abstractions for hypothetical future needs.
6. Test changes in WordPress before considering them complete.
7. Keep site-specific functionality out of the base theme when it should survive a theme change.

## License

WP Gears is intended to use **GPL-2.0-or-later**, in line with WordPress theme development. Any third-party code or assets added later must have a compatible license and retain required notices.
