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

$id      = $displayData['id'];
$modules = $displayData['modules'];
$options = $displayData['options'];

$size  = $options['size'] ?? 'lg';
$title = $options['title'] ?? '';
?>

<div class="modal fade"
     id="<?php echo htmlspecialchars($id); ?>"
     tabindex="-1"
     role="dialog"
     aria-hidden="true"
     aria-labelledby="<?php echo $id; ?>Label">

    <div class="modal-dialog modal-<?php echo htmlspecialchars($size); ?>">

        <div class="modal-content">

            <?php if ($title !== '') : ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="<?php echo $id; ?>Label">
                        <?php echo htmlspecialchars($title); ?>
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="<?php echo Text::_('JCLOSE'); ?>">
                    </button>
                </div>
            <?php endif; ?>

            <div class="modal-body">
                <?php echo $modules; ?>
            </div>

        </div>

    </div>

</div>