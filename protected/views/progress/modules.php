<?php
/* @var $this ProgressController
 * @var $model FilterForm
 */
    $this->pageHeader=tt('Ведение модулей');
    $this->breadcrumbs=array(
        tt('Успеваемость'),
    );


    Yii::app()->clientScript->registerPackage('chosen');
    Yii::app()->clientScript->registerPackage('gritter');
    Yii::app()->clientScript->registerPackage('spin');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/progress/modules.js', CClientScript::POS_HEAD);

    $error       = tt('Ошибка! Проверьте правильность вводимых данных!');
    $success     = tt('Cохранено!');
    $minMaxError = tt('Оценка за пределами допустимого интервала!');

    Yii::app()->clientScript->registerScript('translations', <<<JS
        tt.error       = "{$error}"
        tt.success     = "{$success}"
        tt.minMaxError = "{$minMaxError}"
JS
    , CClientScript::POS_READY);

?>

<?php
    $this->renderPartial('/widget/year_sem');


    $this->renderPartial('/widget/filter_form', array(
        'model' => $model,
        'type'  => $type
    ));


    $this->renderPartial('modules/_bottom', array(
        'model' => $model,
        'type' => $type,
        'moduleInfo' => $moduleInfo
    ));

