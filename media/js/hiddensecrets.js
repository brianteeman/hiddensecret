/**
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
const options = Joomla.getOptions('plg_system_hiddensecrets');

if (options) {

    if (options.debug) {
        console.debug('HiddenSecrets init', options);
    }

    document.addEventListener('contextmenu', (event) => {

        const trigger = event.target.closest(options.selector);

        if (!trigger) {
            return;
        }

        if (options.suppress) {
            event.preventDefault();
        }

        const modalEl = document.getElementById('plg-system-hiddensecrets-modal');

        if (!modalEl) {
            return;
        }

        const modal = bootstrap.Modal.getOrCreateInstance(modalEl, {
            backdrop: options.backdrop,
            keyboard: options.keyboard,
            focus: options.focus
        });

        modal.show();
    });

}