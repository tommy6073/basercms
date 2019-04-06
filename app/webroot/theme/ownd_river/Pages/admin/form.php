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
 * [ADMIN] ページ登録・編集フォーム
 * @var BcAppView $this
 */
$this->BcBaser->css('admin/ckeditor/editor', array('inline' => true));
$this->BcBaser->js('admin/pages/edit', false);
?>


<div hidden="hidden">
	<div id="Action"><?php echo $this->request->action ?></div>
</div>

<?php echo $this->BcForm->create('Page') ?>
<?php echo $this->BcForm->input('Page.mode', array('type' => 'hidden')) ?>
<?php echo $this->BcForm->input('Page.id', array('type' => 'hidden')) ?>



<div class="bca-section bca-section-editor-area">
	<?php echo $this->BcForm->editor('Page.contents', array_merge(array(
		'editor' => @$siteConfig['editor'],
		'editorUseDraft' => true,
		'editorDraftField' => 'draft',
		'editorWidth' => 'auto',
		'editorHeight' => '480px',
		'editorEnterBr' => @$siteConfig['editor_enter_br']
			), $editorOptions)); ?>
	<?php echo $this->BcForm->error('Page.contents') ?>
</div>

<?php if (BcUtil::isAdminUser()): ?>
<div class="bca-section">
	<table class="form-table bca-form-table" data-bca-table-type="type2">
		<tr>
			<th class="bca-form-table__label"><?php echo $this->BcForm->label('Page.page_template', __d('baser', '固定ページテンプレート')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Page.page_template', array('type' => 'select', 'options' => $pageTemplateList)) ?>
				<div class="helptext">
					テーマフォルダ内の、Pages/templates テンプレートを配置する事で、ここでテンプレートを選択できます。
				</div>
				<?php echo $this->BcForm->error('Page.page_template') ?>
			</td>
		</tr>
		<tr>
			<th class="bca-form-table__label"><?php echo $this->BcForm->label('Page.code', __d('baser', 'コード')) ?></th>
			<td class="col-input bca-form-table__input">
				<?php echo $this->BcForm->input('Page.code', array(
					'type' => 'textarea',
					'cols' => 36,
					'rows' => 5,
					'style' => 'font-size:14px;font-family:Verdana,Arial,sans-serif;'
				)); ?>
				<i class="bca-icon--question-circle btn help bca-help"></i>
				<div class="helptext">
					固定ページの本文には、ソースコードに切り替えてPHPやJavascriptのコードを埋め込む事ができますが、ユーザーが間違って削除してしまわないようにこちらに入力しておく事もできます。<br />
					入力したコードは、自動的にコンテンツ本体の上部に差し込みます。
				</div>
				<?php echo $this->BcForm->error('Page.code') ?>
			</td>
		</tr>
		<?php echo $this->BcForm->dispatchAfterForm() ?>
	</table>
</div>
<?php endif ?>


<?php echo $this->BcForm->submit(__d('baser', '保存'), [
  'div' => false,
  'class' => 'button bca-btn',
  'data-bca-btn-type' => 'save',
  'data-bca-btn-size' => 'lg',
  'data-bca-btn-width' => 'lg',
  'id' => 'BtnSave'
]) ?>


<?php echo $this->BcForm->end(); ?>
