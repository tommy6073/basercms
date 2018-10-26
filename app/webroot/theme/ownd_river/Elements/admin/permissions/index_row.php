<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [ADMIN] アクセス制限設定一覧　行
 */
?>


<?php if (!$data['Permission']['status']): ?>
	<?php $class = ' class="disablerow unpublish sortable"'; ?>
<?php else: ?>
	<?php $class = ' class="publish sortable"'; ?>
<?php endif; ?>
<tr<?php echo $class; ?>>
	<td style="width:15%" class="row-tools">
		<?php if ($sortmode): ?>
			<span class="sort-handle"><?php $this->BcBaser->img('admin/sort.png', array('alt' => __d('baser', '並び替え'))) ?></span>
			<?php echo $this->BcForm->input('Sort.id' . $data['Permission']['id'], array('type' => 'hidden', 'class' => 'id', 'value' => $data['Permission']['id'])) ?>
		<?php endif ?>
		<?php if ($this->BcBaser->isAdminUser()): ?>
			<?php echo $this->BcForm->input('ListTool.batch_targets.' . $data['Permission']['id'], ['type' => 'checkbox', 'class' => 'batch-targets', 'value' => $data['Permission']['id']]) ?>
		<?php endif ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_unpublish.png', array('alt' => __d('baser', '無効'), 'class' => 'btn')), array('action' => 'ajax_unpublish', $data['Permission']['id']), array('title' => __d('baser', '非公開'), 'class' => 'btn-unpublish')) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_publish.png', array('alt' => __d('baser', '有効'), 'class' => 'btn')), array('action' => 'ajax_publish', $data['Permission']['id']), array('title' => __d('baser', '公開'), 'class' => 'btn-publish')) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_edit.png', array('alt' => __d('baser', '編集'), 'class' => 'btn')), array('action' => 'edit', $this->request->params['pass'][0], $data['Permission']['id']), array('title' => __d('baser', '編集'))) ?>
		<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_copy.png', array('alt' => __d('baser', 'コピー'), 'class' => 'btn')), array('action' => 'ajax_copy', $this->request->params['pass'][0], $data['Permission']['id']), array('title' => __d('baser', 'コピー'), 'class' => 'btn-copy')) ?>
		<?php if ($data['Permission']['name'] != 'admins'): ?>
			<?php $this->BcBaser->link($this->BcBaser->getImg('admin/icn_tool_delete.png', array('alt' => __d('baser', '削除'), 'class' => 'btn')), array('action' => 'ajax_delete', $data['Permission']['id']), array('title' => __d('baser', '削除'), 'class' => 'btn-delete')) ?>
		<?php endif ?>
	</td>
	<td style="width:10%"><?php echo $data['Permission']['no']; ?></td>
	<td style="width:55%">
		<?php $this->BcBaser->link($data['Permission']['name'], array('action' => 'edit', $this->request->params['pass'][0], $data['Permission']['id'])); ?><br />
		<?php echo $data['Permission']['url']; ?>
	</td>
	<td style="width:10%" class="bc-align-center"><?php echo $this->BcText->arrayValue($data['Permission']['auth'], array(0 => '×', 1 => '〇')) ?></td>
	<td style="width:10%">
		<?php echo $this->BcTime->format('Y-m-d', $data['Permission']['created']); ?><br />
		<?php echo $this->BcTime->format('Y-m-d', $data['Permission']['modified']); ?>
	</td>
</tr>