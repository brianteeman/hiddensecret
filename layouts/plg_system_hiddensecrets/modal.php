<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.hiddensecrets
 *
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$id      = htmlspecialchars($displayData['id']);
$modules = $displayData['modules'];
$options = $displayData['options'];

$size  = htmlspecialchars($options['size'] ?? 'lg');
$title = $options['title'] ?? '';
?>

<div class="modal fade"
     id="<?php echo $id; ?>"
     tabindex="-1"
     role="dialog"
     aria-hidden="true"
     <?php if ($title !== '') : ?>
     aria-labelledby="<?php echo $id; ?>Label"
     <?php else : ?>
     aria-label="<?php echo Text::_('PLG_SYSTEM_HIDDENSECRETS'); ?>"
     <?php endif; ?>>
    <div class="modal-dialog modal-<?php echo $size; ?>">
        <div class="modal-content">
            <div class="modal-header<?php echo $title === '' ? ' border-0 pb-0' : ''; ?>">
                <?php if ($title !== '') : ?>
                    <h5 class="modal-title" id="<?php echo $id; ?>Label">
                        <?php echo htmlspecialchars($title); ?>
                    </h5>
                <?php endif; ?>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="<?php echo Text::_('JCLOSE'); ?>">
                </button>
            </div>
            <div class="modal-body">
                <?php echo $modules; ?>
            </div>
        </div>
    </div>
</div>
