<?php
/**
 *
 * @var DefaultController $this
 * @var Users $user
 *
 */

//Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin/teachers.js', CClientScript::POS_HEAD);

$this->pageHeader=tt('Настройки');
$this->breadcrumbs=array(
    tt('Студенты') => array('/admin/default/students'),
    tt('Настройки'),
);
?>

<?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'grants',
        'type' => 'horizontal',
        'action' => ''//$this->createUrl('/admin/prospect/scheduleProspect')
    ));
    echo $form->errorSummary($user);
?>
    <div class="control-group">
        <label for="Users_u2" class="control-label"><?=tt('Логин')?></label>
        <div class="controls">
            <label>
                <?=CHtml::textField('Users[u2]', $user->u2)?>
                <span class="lbl"></span>
            </label>
        </div>
    </div>

    <div class="control-group">
        <label for="Users_u3" class="control-label"><?=tt('Пароль')?></label>
        <div class="controls">
            <label>
                <?=CHtml::passwordField('Users[u3]', $user->u3)?>
                <span class="lbl"></span>
            </label>
        </div>
    </div>

    <div class="control-group">
        <label for="Users_u3" class="control-label"><?=tt('Повторите пароль')?></label>
        <div class="controls">
            <label>
                <?=CHtml::passwordField('Users[password]', $user->password)?>
                <span class="lbl"></span>
            </label>
        </div>
    </div>

    <div class="control-group">
        <label for="Users_u4" class="control-label">Email</label>
        <div class="controls">
            <label>
                <?=CHtml::textField('Users[u4]', $user->u4)?>
                <span class="lbl"></span>
            </label>
        </div>
    </div>

    <div class="control-group">
        <label for="Users_u8" class="control-label"><?=tt('Заблокирован')?></label>
        <div class="controls">
            <label>
                <?php
                echo CHtml::checkBox('Users[u8]', $user->u8,
                    array(
                        'class' => 'ace ace-switch',
                        'uncheckValue' => '0'
                    )
                )
                ?>
                <span class="lbl"></span>
            </label>
        </div>
    </div>


    <div class="form-actions">
        <button type="submit" class="btn btn-info">
            <i class="icon-ok bigger-110"></i>
            <?=tt('Сохранить')?>
        </button>
    </div>

<?php $this->endWidget();