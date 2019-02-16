<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 4.0.0
 * @license			http://basercms.net/license/index.html
 */
?>


<?php echo $this->BcForm->create() ?>
<?php echo $this->BcForm->hidden('ContentFolder.id') ?>
<table class="form-table bca-form-table" data-bca-table-type="type2">
  <tr>
		<th class="bca-form-table__label"><?php echo $this->BcForm->label('ContentFolder.folder_template', __d('baser', 'フォルダーテンプレート')) ?></th>
		<td class="bca-form-table__input">
			<?php echo $this->BcForm->input('ContentFolder.folder_template', array('type' => 'select', 'options' => $folderTemplateList)) ?>
		</td>
	</tr>
	<tr>
		<th class="bca-form-table__label"><?php echo $this->BcForm->label('ContentFolder.page_template', __d('baser', '固定ページテンプレート')) ?></th>
		<td class="bca-form-table__input">
			<?php echo $this->BcForm->input('ContentFolder.page_template', array('type' => 'select', 'options' => $pageTemplateList)) ?>
		</td>
	</tr>
</table>
<div class="submit">
	<?php echo $this->BcForm->submit(__d('baser', '保存'), array('class' => 'button bca-btn',
    'data-bca-btn-type' => 'save',
    'data-bca-btn-size' => 'lg',
    'data-bca-btn-width' => 'lg',
    'div' => false)) ?>
</div>
<?php echo $this->BcForm->end() ?>
