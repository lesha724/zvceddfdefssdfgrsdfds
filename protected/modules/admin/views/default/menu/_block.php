<?php
global $menu;
$menu = $settings;

function checkbox($controller, $action)
{
    global $menu;

    $controller = mb_strtolower($controller);
    $action     = mb_strtolower($action);

    parse_str(urldecode($menu), $output);

    $val = isset($output[$controller][$action])
                ? $output[$controller][$action]
                : 1;

    $checked = $val ? "checked='checked'" : '';

    $name = $controller.'['.$action.']';
    return <<<HTML
        <span>
            <input type="hidden" name="{$name}" value="{$val}"/>
            <input type="checkbox" {$checked}/>
        </span>
HTML;

}

function checkbox2($controller)
{
    global $menu;

    $controller = mb_strtolower($controller);
    $action     = 'main';

    parse_str(urldecode($menu), $output);

    $val = isset($output[$controller][$action])
                ? $output[$controller][$action]
                : 1;

    $checked = $val ? "checked='checked'" : '';

    $name = $controller.'['.$action.']';
    return <<<HTML
            <label>
                <input type="checkbox" class="ace ace-switch ace-switch-3" {$checked}/>
                <span class="lbl"></span>
                <input type="hidden" name="{$name}" value="{$val}" />
            </label>
HTML;

}


?>
<div class="span3 widget-box collapsed">
    <div class="widget-header">
        <h5><?=tt($name)?></h5>

        <div class="widget-toolbar">
            <a data-action="collapse" href="#">
                <i class="icon-chevron-down"></i>
            </a>
        </div>
        <div class="widget-toolbar no-border">
            <?=checkbox2($controller)?>
        </div>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <ol class="dd-list">
                <?php foreach ($items as $action => $name): ?>
                    <li class="dd-item" >
                        <div class="dd-handle"><?=checkbox($controller, $action)?> <?=tt($name)?></div>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</div>