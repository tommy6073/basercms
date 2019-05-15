<?php
/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) baserCMS Users Community <https://basercms.net/community/>
 *
 * @copyright		Copyright (c) baserCMS Users Community
 * @link			https://basercms.net baserCMS Project
 * @package			Baser.View
 * @since			baserCMS v 0.1.0
 * @license			https://basercms.net/license/index.html
 */

/**
 * [PUBLISH] インストーラー初期ページ
 */
?>


<div class="step-1">

	<div class="em-box bca-em-box"><?php echo sprintf(__d('baser', '%s のインストールを開始します。<br>よろしければ「インストール開始」ボタンをクリックしてください。'), Configure::read('BcApp.title'))?></div>

	<div class="section bca-section">
		<p><?php echo __d('baser', 'baserCMSではファイルベースのデータベースをサポートしています。SQLite３ を利用すれば、インストールにデータベースサーバーは必要ありません。')?></p>

		<p><small>※ <?php echo __d('baser', '膨大なデータの操作、データベースによる複雑な処理が必要な場合は、MySQLなどのデータベースサーバーの利用を推奨します。')?></small></p>
	</div>

	<div class="submit bca-actions">
		<form action="<?php echo $this->request->base ?>/installations/step2" method="post">
			<button class='btn-red button bca-btn bca-actions__item' id='startbtn' type='submit' ><span><?php echo __d('baser', 'インストール開始')?></span></button>
		</form>
	</div>

</div>