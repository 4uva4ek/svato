<?php /* Smarty version 2.6.28, created on 2015-06-02 09:17:51
         compiled from com_geo_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'com_geo_view.tpl', 19, false),)), $this); ?>
<?php echo '
<style type="text/css">
html #popup_container .popup_body {
    width: 333px;
}
#geo_window {
    height: 93px;
    margin: 10px;
}
.list select {
    margin: 0 0 10px;
    padding: 3px;
    width: 300px;
}
</style>
'; ?>

<div id="geo_window">
    <div class="list">
        <?php echo smarty_function_html_options(array('name' => 'countries','options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['country_id'],'onchange' => "geo.changeParent(this, 'regions')"), $this);?>

    </div>

    <div class="list" <?php if (! $this->_tpl_vars['city_id']): ?>style="display:none"<?php endif; ?>>
        <?php echo smarty_function_html_options(array('name' => 'regions','options' => $this->_tpl_vars['regions'],'selected' => $this->_tpl_vars['region_id'],'onchange' => "geo.changeParent(this, 'cities')"), $this);?>

    </div>

    <div class="list" <?php if (! $this->_tpl_vars['city_id']): ?>style="display:none"<?php endif; ?>>
        <?php echo smarty_function_html_options(array('name' => 'cities','options' => $this->_tpl_vars['cities'],'selected' => $this->_tpl_vars['city_id'],'onchange' => "geo.changeCity(this)"), $this);?>

    </div>
</div>