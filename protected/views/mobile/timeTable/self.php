<?php
/**
 * Created by PhpStorm.
 * User: Neff
 * Date: 09.02.2016
 * Time: 11:00
 */
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/mobile/script/timeTable/script.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerPackage('datepicker-mobile');
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/mobile/datepicker/locales/bootstrap-datepicker.'.Yii::app()->language.'.min.js', CClientScript::POS_END);

//if (! empty($model->teacher)) {
    $this->renderPartial('timeTable/schedule', array(
        'model' => $model,
        'timeTable' => $timeTable,
        'rz' => $rz,
    ));
/*}else{
    $this->pageHeader=tt('Расписание преподователя');
    $this->breadcrumbs=array(
        tt('Расписание'),
    );
}*/