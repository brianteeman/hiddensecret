# System - Hidden Secrets (Joomla 6 Plugin)

A Joomla 6 system plugin that replaces the browser’s default right-click context menu with a Bootstrap modal containing content from a Joomla module.

This creates a simple way to add hidden panels, developer tools, or contextual UI triggered from any frontend element.

This is really just a bit of fun - I like to suprise site visitors with various **Hidden Secrets**.

---

## Features

- Intercepts right-click events on a configurable CSS selector
- Prevents the default browser context menu
- Opens a Bootstrap modal instead
- Loads modal content from a Joomla module position
- Lightweight frontend-only behaviour
- No template overrides required

---

## How It Works

When enabled, the plugin:

1. Checks whether a module is published in the position:
   ```
   hiddensecret
   ```
   or any module position defined in the plugin configuration 

2. Listens for right-click events on a configured CSS selector (e.g. `.navbar-brand`)

3. If both conditions are true:
   - The browser context menu is blocked
   - A Bootstrap modal is opened
   - The modal content is rendered from the module position `hiddensecret`

---

## Plugin Configuration

The plugin has a several options:

### Trigger Selector

Defines the CSS selector that will trigger the modal on right-click.

Example:
```
.navbar-brand
```

You can use any valid CSS selector, such as:

- `.navbar-brand`
- `#main-menu`
- `.site-header`
- `button.admin-trigger`

### Module Position

Defines the position that the module you wish to be displaed in the modal is in. The default is **hiddensecret** but you can configure it to use any module position. The position must not be a position that your template displays. In the module drop down select for the available positions you can simply type the name of the position you want to use.

### Modal Title

Optionaly add a title to the modal

### Modal Size

The default size is **large** but you can select from Small, Large, Extra Large and Full Screen

### Backdrop

By default the modal is displayed on top of a shaded backdrop. You can disable it with this option

### Close on Escape

For accessibility and expected behaviour you should probably leave this to **Yes**

### Focus Modal

For accessibility and expected behaviour you should probably leave this to **Yes**

### Suppress Browser Context Menu

Normally your browser will display a **context menu** when you right click. With this set to the default **Yes** the context menu will not be displayed for the target element.

### Debug

When enabled you will be able to see and confirm the plugin settings in use on your site front end in the browser console.

---

## Module Requirement

To display content in the modal:

1. Create or select a Joomla module
2. Assign it to the module position:

```
hiddensecret
```
or the position defined in the plugin configuration

3. Publish the module

If no module is assigned and published to this position, the plugin does nothing.

---

## Usage Example

### 1. Enable the plugin

Go to:

System → Plugins → System - Hidden Secrets

Enable it.

---

### 2. Set the trigger selector

Example:

```
.navbar-brand
```

---

### 3. Create a module

- Position: `hiddensecret`
- Publish it
- Add any content you want (HTML, custom module output, forms, debug tools, etc.)

---

### 4. Test it

Right-click on the selected element (e.g. navbar-brand).

Instead of the browser’s context menu, a Bootstrap modal will appear containing your module content.

---

## Use Cases

- Hidden admin or developer tools
- Debug panels
- Easter egg features
- Context-sensitive overlays
- Secret navigation shortcuts
- List of corporate logos for download

---

## Notes

- Requires Bootstrap modal support in the template (standard in Joomla 6)
- Only triggers when:
  - Plugin is enabled
  - Selector matches an element on the page
  - A module exists in position `hiddensecret`
- Does not affect normal left-click behaviour

---

## Behaviour Summary

```
User right-clicks element matching selector
→ default context menu is blocked
→ Bootstrap modal opens
→ module content is rendered inside modal
```

---

## License

GNU General Public License v2.0 or later
