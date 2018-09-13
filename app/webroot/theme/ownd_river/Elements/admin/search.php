<?php
/**
 * baserCMS :  Based Website Development Project <http://basercms.net>
 * Copyright (c) baserCMS Users Community <http://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			http://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 2.0.0
 * @license			http://basercms.net/license/index.html
 */

/**
 * [PUBLISH] 検索ボックス
 */
if (empty($search)) {
	return;
}
?>


<?php if (!empty($search)): ?>
<div class="bca-search">
	<h2 class="head bca-search__head"><a href="javascript:void(0)" id="BtnMenuSearch" class="bca-icon--plus-square"> <?php echo __d('baser', '絞り込み検索') ?></a></h2>
	<div id="Search" class="body bca-search__body">
		<?php $this->BcBaser->element('searches/' . $search) ?>
	</div>
	<!--
	<div class="clearfix close">
		<div id="CloseSearch">
			<a><?php $this->BcBaser->img('admin/btn_close.png', array('width' => 14, 'height' => 14, 'alt' => 'Close', 'class' => 'btn')) ?></a>
		</div>
	</div>
	-->
<!-- / #Search clearfix --></div>
<?php endif ?>