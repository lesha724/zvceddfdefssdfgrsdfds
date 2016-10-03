<?php
/**
 * Created by PhpStorm.
 * User: Neff
 * Date: 07.12.2015
 * Time: 18:52
 */

    $this->pageHeader=tt('История авторизации');
    $this->breadcrumbs=array(
        tt('История авторизации'),
    );
?>
<button id="excel-import" class="btn btn-info"><i class="icon-print"></i> Excel</button>
<?php
$pageSize=Yii::app()->user->getState('pageSize',10);
$this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'user-history-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    //'enableHistory'=>true,
    'type'=>'striped hover bordered',
    'columns'=>array(
        array(
            'name'=>'name',
            'value'=>'($data->type==1)?$data->getTchName():$data->getStdName()',
        ),
        'login',
        array(
            'name'=>'type',
            'value'=>'$data->getType()',
            'filter'=>Users::model()->getTypes()
        ),
        array(
            'name'=>'adm',
            'value'=>'$data->getAdminType()',
            'filter'=>Users::model()->getAdminTypes()
        ),
        'uh3'=>array(
            'name'=>'uh3',
            'value'=>'$data->getDeviceType()',
            'filter'=>UsersHistory::model()->getDevicesTypes()
        ),
        'uh4',
        'uh5',
        'uh6',
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
                'delete'=>array(
                    'url'=>'array("deleteUserHistory","id"=>$data->uh1)'
                )
            ),
            'header'=>CHtml::dropDownList(
                'pageSize',
                $pageSize,
                $this->getPageSizeArray(),
                array('class'=>'change-pageSize','style'=>'max-width:70px')
            ),
        ),
    ),
));
Yii::app()->clientScript->registerScript('initPageSize',"
	   $(document).on('change','.change-pageSize', function() {
	        $.fn.yiiGridView.update('user-history-grid',{ data:{ pageSize: $(this).val() }})
	    });",CClientScript::POS_READY);

$url = Yii::app()->createUrl('/admin/default/userHistoryExcel');
Yii::app()->clientScript->registerScript('excelPrint',"
    $(function(){
        $('body').on('click','#excel-import', function() {
           var data = $('#user-history-grid .filters input,#user-history-grid .filters select').serialize();
           //alert(data);
            var jqxhr = $.post('$url',data)
              .success(function() { alert('Успешное выполнение'); })
              .error(function() { alert('Ошибка выполнения'); })
              .complete(function() { alert('Завершение выполнения'); });
           return false;
        });
    });
", CClientScript::POS_READY);
?>