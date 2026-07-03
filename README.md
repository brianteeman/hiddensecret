# System - Hidden Secrets (Joomla 6 Plugin)

A Joomla 6 system plugin that replaces the browser’s default right-click context menu with a Bootstrap modal containing content from a Joomla module.

This creates a simple way to add hidden panels, developer tools, or contextual UI triggered from any frontend element.

---

## ✨ Features

- Intercepts right-click events on a configurable CSS selector
- Prevents the default browser context menu
- Opens a Bootstrap modal instead
- Loads modal content from a Joomla module position
- Lightweight frontend-only behaviour
- No template overrides required

---

## ⚙️ How It Works

When enabled, the plugin:

1. Checks whether a module is published in the position:
   ```
   hiddensecret
   ```

2. Listens for right-click events on a configured CSS selector (e.g. `.navbar`)

3. If both conditions are true:
   - The browser context menu is blocked
   - A Bootstrap modal is opened
   - The modal content is rendered from the module position `hiddensecret`

---

## 🔧 Plugin Configuration

The plugin has a several options:

### Trigger Selector

Defines the CSS selector that will trigger the modal on right-click.

Example:
```
.navbar
```

You can use any valid CSS selector, such as:

- `.navbar`
- `#main-menu`
- `.site-header`
- `button.admin-trigger`

### More options to be documented
---

## 📦 Module Requirement

To display content in the modal:

1. Create or select a Joomla module
2. Assign it to the module position:

```
hiddensecret
```

3. Publish the module

If no module is assigned and published to this position, the plugin does nothing.

---

## 🚀 Usage Example

### 1. Enable the plugin

Go to:

System → Plugins → System - Hidden Secrets

Enable it.

---

### 2. Set the trigger selector

Example:

```
.navbar
```

---

### 3. Create a module

- Position: `hiddensecret`
- Publish it
- Add any content you want (HTML, custom module output, forms, debug tools, etc.)

---

### 4. Test it

Right-click on the selected element (e.g. navbar).

Instead of the browser’s context menu, a Bootstrap modal will appear containing your module content.

---

## 🧠 Use Cases

- Hidden admin or developer tools
- Debug panels
- Easter egg features
- Context-sensitive overlays
- Secret navigation shortcuts

---

## ⚠️ Notes

- Requires Bootstrap modal support in the template (standard in Joomla 6)
- Only triggers when:
  - Plugin is enabled
  - Selector matches an element on the page
  - A module exists in position `hiddensecret`
- Does not affect normal left-click behaviour

---

## 🧪 Behaviour Summary

```
User right-clicks element matching selector
→ default context menu is blocked
→ Bootstrap modal opens
→ module content is rendered inside modal
```

---

## 📁 Module Position Reference

| Purpose | Position |
|--------|----------|
| Hidden Secrets modal content | hiddensecret |

---

## 👨‍💻 Author

Brian Teeman

---

## 📄 License

GNU General Public License v2.0 or later
