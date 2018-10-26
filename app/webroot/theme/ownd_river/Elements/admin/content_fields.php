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

/**
 * [ADMIN] 統合コンテンツフォーム
 * 
 * @var array $parentContents
 * @var bool $related
 * @var bool $disableEditContent コンテンツ編集不可かどうか
 */
$this->BcBaser->js('admin/contents/edit', false, ['id' => 'AdminContentsEditScript',
	'data-fullurl' => $this->BcContents->getUrl($this->request->data['Content']['url'], true, $this->request->data['Site']['use_subdomain']),
	'data-current' => json_encode($this->request->data),
	'data-settings' => $this->BcContents->getJsonSettings()
]);
$isOmitViewAction = $this->BcContents->settings[$this->request->data['Content']['type']]['omitViewAction'];
$contentName = '';
if(!$this->request->data['Site']['use_subdomain']){
	$contentName = $this->BcForm->value('Content.name');
}
?>


<?php echo $this->BcForm->hidden('Content.id') ?>
<?php echo $this->BcForm->hidden('Content.plugin') ?>
<?php echo $this->BcForm->hidden('Content.type') ?>
<?php echo $this->BcForm->hidden('Content.entity_id') ?>
<?php echo $this->BcForm->hidden('Content.parent_id') ?>
<?php echo $this->BcForm->hidden('Content.url') ?>
<?php echo $this->BcForm->hidden('Content.alias_id') ?>
<?php echo $this->BcForm->hidden('Content.site_root') ?>
<?php echo $this->BcForm->hidden('Content.site_id') ?>
<?php echo $this->BcForm->hidden('Content.lft') ?>
<?php echo $this->BcForm->hidden('Content.rght') ?>
<?php echo $this->BcForm->hidden('Content.main_site_content_id') ?>


<div id="BasicSetting" class="section">
    <h3 class="bca-main__heading" data-bca-heading-size="md">基本設定</h3>
    <table class="form-table bca-form-table">
        <tr>
            <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.name', 'URL') ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
            <td class="col-input bca-form-table__input">
<?php if(!$this->request->data['Content']['site_root']): ?>
                <?php echo $this->BcForm->input('Content.parent_id', ['type' => 'select', 'options' => $parentContents, 'escape' => false]) ?>
<?php endif ?>
<?php if(!$this->request->data['Content']['site_root'] && !$related): ?>
				<?php echo $this->BcForm->input('Content.name', ['type' => 'text', 'size' => 20, 'autofocus' => true]) ?><?php if(!$isOmitViewAction && $this->request->data['Content']['url'] != '/'): ?>/<?php endif ?>　<?php echo $this->BcForm->button(__d('baser', 'URLコピー'), ['id' => 'BtnCopyUrl', 'class' => 'small-button bca-btn', 'style' => 'font-weight:normal']) ?>
<?php else: ?>
				<?php echo $contentName ?>
				<?php echo $this->BcForm->hidden('Content.name') ?>
<?php endif ?>
				<?php echo $this->BcForm->error('Content.name') ?>
				<?php echo $this->BcForm->error('Content.parent_id') ?>　
                <br>
                <span class="url">
                    <?php echo $this->BcContents->getCurrentFolderLinkedUrl() ?><?php echo $contentName ?><?php if(!$isOmitViewAction && $this->request->data['Content']['url'] != '/' && !$this->request->data['Site']['use_subdomain']): ?>/<?php endif ?>
                </span>
            </td>
        </tr>
        <tr>
            <th class="col-head bca-form-table__label">
                <?php echo $this->BcForm->label('Content.title', __d('baser', 'タイトル')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
            <td class="col-input bca-form-table__input">
                <?php if(!$this->request->data['Content']['site_root'] && !$disableEditContent): ?>
                    <?php echo $this->BcForm->input('Content.title', ['type' => 'text', 'size' => 50]) ?>　
                    <?php echo $this->BcForm->error('Content.title') ?>
                <?php else: ?>
                    <?php echo $this->BcForm->value('Content.title') ?>　
                    <?php echo $this->BcForm->hidden('Content.title') ?>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.self_status', __d('baser', '公開状態')) ?>&nbsp;<span class="bca-label" data-bca-label-type="required">必須</span></th>
            <td class="col-input bca-form-table__input">
                <?php if(!$this->request->data['Content']['site_root'] && !$disableEditContent): ?>
                    <?php echo $this->BcForm->input('Content.self_status', ['type' => 'radio', 'options' => $this->BcText->booleanDoList('公開')]) ?>
                <?php else: ?>
                    <?php echo $this->BcText->arrayValue($this->BcForm->value('Content.self_status'), $this->BcText->booleanDoList('公開')) ?>
                    <?php echo $this->BcForm->hidden('Content.self_status') ?>
                <?php endif ?>
                <br>
                <?php echo $this->BcForm->error('Content.self_status') ?>
                <?php if($this->BcForm->value('Content.status') != $this->BcForm->value('Content.self_status')): ?>
                    <p>※ 親フォルダの設定を継承し非公開状態となっています</p>
                <?php endif ?>
            </td>
        </tr>
        <tr>
            <th class="col-head bca-form-table__label"><?php echo $this->BcForm->label('Content.self_status', __d('baser', '公開日時')) ?></th>
            <td class="col-input bca-form-table__input">
				<?php if(!$this->request->data['Content']['site_root'] && !$disableEditContent): ?>
					<?php echo $this->BcForm->input('Content.self_publish_begin', [
						'type' => 'dateTimePicker',
						'size' => 12,
						'maxlength' => 10,
						'dateLabel' => ['text' => '開始日付'],
						'timeLabel' => ['text' => '開始時間']
					]) ?>
                    &nbsp;〜&nbsp;
					<?php echo $this->BcForm->input('Content.self_publish_end', [
						'type' => 'dateTimePicker',
						'size' => 12, 'maxlength' => 10,
						'dateLabel' => ['text' => '終了日付'],
						'timeLabel' => ['text' => '終了時間']
					]) ?>
				<?php else: ?>
					<?php if($this->BcForm->value('Content.self_publish_begin') || $this->BcForm->value('Content.self_publish_end')): ?>
						<?php echo $this->BcForm->value('Content.self_publish_begin') ?>&nbsp;〜&nbsp;<?php echo $this->BcForm->value('Content.self_publish_end') ?>
					<?php endif ?>
					<?php echo $this->BcForm->hidden('Content.self_publish_begin') ?>
					<?php echo $this->BcForm->hidden('Content.self_publish_end') ?>
				<?php endif ?>
                <br>
				<?php echo $this->BcForm->error('Content.self_publish_begin') ?>
				<?php echo $this->BcForm->error('Content.self_publish_end') ?>
				<?php if(($this->BcForm->value('Content.publish_begin') != $this->BcForm->value('Content.self_publish_begin')) ||
					($this->BcForm->value('Content.publish_end') != $this->BcForm->value('Content.self_publish_end'))): ?>
                    <p>※ 親フォルダの設定を継承し公開期間が設定されている状態となっています<br>
                        （<?php echo $this->BcTime->format('Y/m/d H:i', $this->BcForm->value('Content.publish_begin')) ?> 〜
						<?php echo $this->BcTime->format('Y/m/d H:i', $this->BcForm->value('Content.publish_end')) ?>）</p>
				<?php endif ?>
            </td>
        </tr>
    </table>
</div>


