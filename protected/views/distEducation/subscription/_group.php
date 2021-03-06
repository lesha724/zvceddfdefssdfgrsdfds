<?php
/**
 * Created by PhpStorm.
 * User: NEFF
 * Date: 12.01.2018
 * Time: 16:42
 */

/** @var array $group */
/** @var DistEducationFilterForm $model */
/** @var int $uo1 */

$table = <<<HTML
        <table class="table table-bordered table-condensed table-hover">
            <tbody>
                %s
            </tbody>
        </table> 
HTML;

$thead = <<<HTML
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th></th>
    </tr>
HTML;

$tbody = '';

$tbody.=$thead;

$i=1;

$students = St::model()->getStudentsOfGroupForDistEducation($group['gr1']);
foreach ($students as $student) {

    $stDist = Stdist::model()->findByPk($student->st1);

    $stDistSub = Stdistsub::model()->findByAttributes(array(
        'stdistsub1'=>$student->st1,
        'stdistsub2'=>$uo1
    ));

    $button = empty($stDist) ?
        '' :
        CHtml::link('<i class="icon-ok"></i>', array('subscriptionStudent', 'st1'=>$student->st1, 'uo1'=> $uo1, 'chairId'=> $model->chairId, 'subscription'=>1, 'gr1' => $group['gr1']), array(
            'class'=>'btn btn-success btn-mini btn-subscript-student',
            'style'=> !empty($stDistSub) ? 'display:none' : ''
        ))
        .
        CHtml::link('<i class="icon-trash"></i>', array('subscriptionStudent', 'st1'=>$student->st1, 'uo1'=> $uo1, 'chairId'=> $model->chairId, 'subscription'=>0, 'gr1' => $group['gr1']), array(
            'class'=>'btn btn-danger btn-mini btn-unsubscript-student',
            'style'=> !empty($stDistSub) ? '' : 'display:none'
        ))
    ;
    $tbody.=sprintf('<tr class="tr-students-list-%d"><td>%d</td><td>%s</td><td class="action-td">%s</td></tr>', $group['gr1'], $i, $student->getFullName(), $button);
    $i++;
}
echo sprintf($table, $tbody);