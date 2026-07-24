# TVGA WordPress Theme — Setup Guide

This is a custom, self-contained WordPress theme for the Tooele Valley
Gardening Association (tvga.info). There is no page builder, no build
step, and no required plugins — everything works out of the box on
Hostinger's standard WordPress hosting.

## 1. Install on Hostinger

1. Log in to **hPanel** and open **Websites > tvga.info > Dashboard**,
   or go directly to your site's **wp-admin**.
2. In WordPress, go to **Appearance > Themes > Add New Theme > Upload Theme**.
3. Upload `tvga-theme.zip` (do not unzip it first) and click **Install Now**,
   then **Activate**.
4. Alternatively, via Hostinger's File Manager or FTP: unzip `tvga-theme.zip`
   and upload the resulting `tvga` folder into `wp-content/themes/`, then
   activate it from **Appearance > Themes** in wp-admin.

Once activated, the homepage renders automatically — no settings are
required to see a complete, working page. It ships with sample event and
article cards so the site never looks empty on day one; see step 4 to
replace them with real content.

## 2. Set your homepage

WordPress needs to be told to use this theme's homepage design instead of
your latest blog post:

1. Go to **Settings > Reading**.
2. Set **Your homepage displays** to **A static page**.
3. Choose (or create) a page for **Homepage** — the content of that page
   doesn't matter, since `front-page.php` in this theme overrides it
   entirely and renders the designed homepage regardless of the page's
   own content.

## 3. Build your menus

1. Go to **Appearance > Menus**.
2. Create a menu, add your pages (Home, About, Membership, Volunteer,
   Sponsors, Contact, etc.), and assign it to **Primary Navigation (header)**.
3. Optionally create two smaller menus for the footer and assign them to
   **Footer — Quick Links** and **Footer — Get Involved**.
4. Until you assign menus, the header and footer show sensible placeholder
   links automatically, so the site is never broken.

## 4. Add Events and Resources (this is the part volunteers will do for years)

Two custom content types were built specifically so non-technical
volunteers can keep the homepage current without ever opening a code file:

**Events** (left sidebar in wp-admin, calendar icon)
- **Events > Add New Event**
- Fill in the title, a description, and a featured image.
- In the **Event Details** box on the right, set the **Date**, **Time**,
  and **Location**.
- The homepage automatically shows the next 3 *upcoming* events, soonest
  first, and drops events once their date has passed — nobody has to
  manually remove old events.
- The full calendar lives at `tvga.info/events/` (linked from the "View Full
  Calendar" button).

**Resources** (book icon)
- **Resources > Add New Article**
- Fill in the title, the article body, an excerpt (used as the card's
  short description), and a featured image.
- The homepage shows the 4 most recently published articles automatically.
- All articles live at `tvga.info/resources/` (linked from "Browse All
  Articles").

## 5. Customize text, photos, and links

Go to **Appearance > Customize** — everything below updates instantly in
the live preview before you publish:

- **Hero Section** — headline, subheading, background photo, both buttons.
- **Annual Garden Tour** — dates/location line, ticket announcement,
  description, the "27+" years number, photo, and the ticket button link.
- **Volunteer Banner** — heading, text, background photo, both buttons.
- **Newsletter Signup** — heading, text, and your email provider's form
  action URL (Mailchimp, Constant Contact, etc. — paste the "form action"
  URL from their embed code here to make the signup form live).
- **Contact & Social** — mailing address, email, phone, Facebook/Instagram
  URLs, and the header's Member Login link.
- **Site Identity** (built into WordPress) — upload your logo here; it
  automatically replaces the placeholder flower mark in the header and
  footer.

## 6. Swap in real photography

Every photo on the homepage currently points to a freely-licensed
placeholder from Wikimedia Commons, chosen to match the intended scene
(garden pergola, onions, tomatoes, strawberries, fruit tree pruning,
volunteers). Replace these with TVGA's own photography as it becomes
available:

- **Hero, Garden Tour, and Volunteer Banner photos** — swap in
  Appearance > Customize (see step 5).
- **Event and Resource photos** — set the Featured Image on each
  individual Event or Article in wp-admin.

## 7. A note on "Membership" and "Member Login"

- The header's **Become a Member** button automatically links to a page
  with the slug `membership` if one exists (create a Page and set its URL
  slug to `membership`). Until then it links to `#membership` as a
  placeholder anchor.
- **Member Login** links wherever you set it under Appearance > Customize
  > Contact & Social — point it at your members-only tool or portal once
  you have one.

## Theme structure (for future developers)

```
tvga/
├── style.css              theme header (required by WordPress)
├── functions.php           theme setup, enqueues, requires inc/
├── header.php / footer.php sticky nav + 4-column footer
├── front-page.php          assembles the homepage from template-parts/
├── page.php / single.php / index.php / archive.php / 404.php  fallbacks
├── single-tvga_event.php, single-tvga_resource.php
├── archive-tvga_event.php, archive-tvga_resource.php
├── inc/
│   ├── custom-post-types.php   Events + Resources CPTs
│   ├── meta-boxes.php          Event date/time/location fields
│   ├── customizer.php          all Appearance > Customize options
│   └── template-tags.php       query helpers + demo/fallback content
├── template-parts/
│   ├── section-hero.php, section-mission.php, section-events.php,
│   │   section-tour.php, section-resources.php, section-volunteer.php,
│   │   section-newsletter.php
│   └── card-event.php, card-resource.php   reusable card partials
└── assets/
    ├── css/main.css   all visual styling, design tokens at the top
    └── js/main.js     mobile nav toggle only — no framework, no build step
```

No page builder, no ACF, no Elementor. Every section is a plain PHP file
you can open and edit directly — reorder sections by reordering the
`get_template_part()` calls in `front-page.php`.
