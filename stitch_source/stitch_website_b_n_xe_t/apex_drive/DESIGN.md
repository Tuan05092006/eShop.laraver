# Design System Specification: The Kinetic Gallery

## 1. Overview & Creative North Star
This design system is built to transform the automotive e-commerce experience from a generic marketplace into a high-end digital atelier. Our Creative North Star is **"The Kinetic Gallery."**

Unlike standard retail platforms that rely on rigid grids and boxed containers, this system treats vehicles as works of art in motion. We move beyond "template" UI by utilizing intentional asymmetry, overlapping elements, and high-contrast typography scales. The goal is to evoke the precision of German engineering and the soul of a custom-built supercar. Every interaction must feel intentional, expensive, and dynamic.

## 2. Colors & Tonal Architecture
The palette is rooted in deep, sophisticated grays and whites, punctuated by a high-energy electric blue. This isn't just a dark mode; it is a layered environment designed to focus the eye on the product.

### The "No-Line" Rule
**Explicit Instruction:** You are prohibited from using 1px solid borders to define sections or containers. Modern luxury is defined by seamlessness. Boundaries must be established through:
- **Background Color Shifts:** Moving from `surface` (#131313) to `surface-container-low` (#1c1b1b).
- **Tonal Transitions:** Utilizing `surface-container-high` (#2a2a2a) to draw the eye toward interactive areas.

### Surface Hierarchy & Nesting
Treat the UI as a series of physical layers. We use the surface-container tiers to create "nested" depth.
- **Base Layer:** `surface` (#131313) or `surface-container-lowest` (#0e0e0e).
- **Mid Layer (Navigation/Filters):** `surface-container` (#201f1f).
- **Active Layer (Cards/Modals):** `surface-container-high` (#2a2a2a) or `surface-bright` (#393939).

### The "Glass & Gradient" Rule
To elevate the aesthetic, use **Glassmorphism** for floating elements (like sticky navigation or quick-view filters). Use a semi-transparent `surface-variant` (#353534 at 60% opacity) with a `backdrop-blur` of 20px. 
**Signature Gradients:** For primary CTAs, use a linear gradient from `primary_container` (#2962ff) to `primary` (#b6c4ff) at a 135-degree angle to provide a "lit from within" high-performance glow.

## 3. Typography
Our typography is a dialogue between technical precision and editorial elegance.

- **Display & Headlines (Space Grotesk):** This is our "Technical" voice. The monospaced-adjacent qualities of Space Grotesk should be used in `display-lg` and `headline-lg` to mimic the readouts of a high-end dashboard. Use tight letter-spacing (-2%) for headlines.
- **Body & Titles (Manrope):** This is our "Humanist" voice. Manrope provides a clean, highly readable counterpoint. It feels modern and trustworthy. Use `body-lg` for product descriptions to maintain an editorial feel.
- **Hierarchy as Identity:** Create a high contrast between sizes. A `display-lg` (3.5rem) title should sit near a `label-md` (0.75rem) technical spec to create a sense of scale and importance.

## 4. Elevation & Depth
In this design system, depth is earned, not forced. We move away from traditional drop shadows in favor of **Tonal Layering**.

- **The Layering Principle:** Place a `surface-container-lowest` card on a `surface-container-low` section. This creates a soft, natural "lift" through color theory rather than artificial shadows.
- **Ambient Shadows:** For floating elements (like car detail lightboxes), use "Ambient Glows." Shadows must be extra-diffused (blur: 40px+) and low-opacity (4%-6%). The shadow color should be tinted with `on_surface` (#e5e2e1) to mimic light refracting off a polished car body.
- **The "Ghost Border" Fallback:** If a container requires a border for accessibility (e.g., input fields), use a "Ghost Border." Apply the `outline_variant` (#434656) at 20% opacity. **Never use 100% opaque borders.**

## 5. Components

### High-Quality Car Listing Cards
- **Style:** No borders. Use `surface-container-low` as the base.
- **Interaction:** On hover, the card should transition to `surface-container-high` and the image should subtly scale (1.05x).
- **Content:** Information should be layered. Use `display-sm` for the price and `label-md` for technical specs (HP, 0-60, Range).

### Buttons (Kinetic CTAs)
- **Primary:** High-gloss gradient (`primary_container` to `primary`). `0.25rem` (DEFAULT) roundedness for a sharp, technical look.
- **Secondary:** Transparent background with a `Ghost Border` using `primary`. Text color set to `primary`.
- **Tertiary:** Text-only in `primary`, with a `label-md` font-weight for utility actions.

### Filter Systems (The Dashboard)
- Use a "Glassmorphism" sidebar or top-bar. 
- **Filter Chips:** Use `secondary_container` (#2e4287) with `on_secondary_container` (#9eb2fe) text. Roundedness should be `full` (9999px) to contrast against the sharp corners of the car cards.

### Input Fields
- Background: `surface_container_highest` (#353534).
- Bottom-border only: 2px wide using `outline_variant` at 30% opacity. On focus, the border animates to 100% opacity `primary`.

### Cards & Lists: The No-Divider Rule
Do not use horizontal lines to separate list items. Use vertical white space (32px or 48px from your spacing scale) or a subtle alternating background shift between `surface` and `surface-container-low`.

## 6. Do's and Don'ts

### Do:
- **Do** use intentional white space to allow car photography to "breathe."
- **Do** overlap text onto images (using proper scrims/gradients) to create an editorial, high-fashion look.
- **Do** use `tertiary` (#ffb59a) sparingly for "Urgency" or "Performance" tags (e.g., "Sold," "New Arrival").

### Don't:
- **Don't** use standard #000000 black. It kills the depth. Always use the `surface` palette.
- **Don't** use sharp 90-degree corners for everything. Stick to the `0.25rem` (DEFAULT) for a "precision-milled" feel.
- **Don't** clutter the car listing card with too many icons. High-end design relies on text and space, not "clipart" style iconography.
- **Don't** use high-contrast dividers. If you can't see the separation without a line, your spacing is incorrect.