<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangbin
 * Date: 2015-02-14
 * Time: 上午10:00
 * To change this template use File | Settings | File Templates.
 */
header('Content-Type:text/html;charset=utf-8');

$field = array(
    'factory_displayname',
    'set_displayname',

    'rbibeforeperiod',
    'rbiafterperiod',
    'containertotalnumber',
    'pipetotalnumber',
    'containerfeeratio',
    'pipefeeratio',
    'avgperiod',
    'averagedowntime',
    'containeraveragedowntime',
    'pipeaveragedowntime',




    'containeravgcost',
    'pipeavgcost',
    'containerstoppageloss',
    'pipestoppageloss',
    'containertotalnumber',
    'pipetotalnumber',
    'containerlongestdowntime',
    'pipelongestdowntime',
    'containeravgtime',
    'pipeavgtime',
    'longestdowntime',
    'stoppageavgloss',
    'avgtime',


    'rbibeforecontainerleak',
    'rbibeforepipeleak',
    'rbiaftercontainerleak',
    'rbiafterpipeleak',
    'rbibeforecontainerleaktotal',
    'rbibeforepipeleaktotal',
    'rbiaftercontainerleaktotal',
    'rbiafterpipeleaktotal',


    'recordusername',
    'recordtime'
);

$comment = array(
    '油田名称||varchar(50)',
    '平台名称||varchar(50)',

    'RBI评估前运行周期（年）||float(9,3)',
    'RBI评估后运行周期（年）||float(9,3)',
    '全面检验压力容器总数(台)||float(9,3)',
    '全面检验压力管线总数(条)||float(9,3)',
    '压力容器检验 费用比例(%)||float(9,3)',
    '压力管线检验 费用比例(%)||float(9,3)',
    '平均检验周期(年)||float(9,3)',
    '全面检验平均停工天数(天)||float(9,3)',
    '压力容器全面检验平均停工天数(天)||float(9,3)',
    '压力管线全面检验平均停工天数(天)||float(9,3)',


    '压力容器缺陷 检验平均费用 (万元/天*台)||float(9,3)',
    '压力管线缺陷 检验平均费用 (万元/天*条)||float(9,3)',
    '压力容器缺陷导致停工平均经济损失 (万元/天*台)||float(9,3)',
    '压力管线缺陷导致 停工平均经济损失 (万元/天*条)||float(9,3)',
    '缺陷压力容器总数(台)||float(9,3)',
    '缺陷压力管线总数(条)||float(9,3)',
    '压力容器缺陷 最长停工时间 (天/次)||float(9,3)',
    '压力管线缺陷最长停工时间(天)||float(9,3)',
    '压力容器缺陷检验平均时间(天/次)||float(9,3)',
    '压力管线缺陷检验平均时间(天/次)||float(9,3)',
    '缺陷导致最长停工时间(总体)(天)||float(9,3)',
    '缺陷导致停工平均经济损失(总体)（万元）||float(9,3)',
    '缺陷检验平均时间(总体)(天)||float(9,3)',


    'RBI评估前压力容器泄漏次数（次）||float(9,3)',
    'RBI评估前压力管线泄漏次数（次）||float(9,3)',
    'RBI评估后压力容器泄漏次数（次）||float(9,3)',
    'RBI评估后压力管线泄漏次数（次）||float(9,3)',
    'RBI评估前发生泄漏的压力容器总数(台)||float(9,3)',
    'RBI评估前发生泄漏的压力管线总数(条)||float(9,3)',
    'RBI评估后发生泄漏的压力容器总数(台)||float(9,3)',
    'RBI评估后发生泄漏的压力管线总数(条)||float(9,3)',


    '记录人||varchar(50)',
    '记录时间||datetime'
);

$tablefield = array_combine($field,$comment);

$sql = '';

foreach($tablefield as $k=>$table)
{
    $tablearr = explode('||',$table);
    //print_r($tablearr);
    $comment = $tablearr[0];
    $datatype = $tablearr[1];
    $fields = $k;
    $sql.= "`{$fields}` {$datatype} COMMENT '{$comment}',";
}

$sql = rtrim($sql,',');

$sql = "create table bh_Report_Rbilist (`id` int(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY (`id`),{$sql}) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='RBI经济效益表'";

echo $sql;

