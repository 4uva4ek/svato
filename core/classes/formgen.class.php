<?php
/******************************************************************************/
//                                                                            //
//                           InstantCMS v1.10.4                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2014                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

class cmsFormGen {

    private $xml;
    private $html;
    private $default_cfg;

    private $params;

//============================================================================//
//============================================================================//

    public function __construct($xml_file, $default_cfg) {

        $this->xml         = simplexml_load_file($xml_file);
        $this->default_cfg = $default_cfg;

        $this->parseParams();

    }

//============================================================================//
//============================================================================//

    private function parseParams(){

        global $_LANG;
        // подключим LANG файл для модуля
        cmsCore::loadLanguage('admin/modules/'.(string)$this->xml->module->id);

        foreach($this->xml->params->param as $p){

            $param = array();
            // заполняем атрибутами массив и приводим к строке значения
            foreach($p->attributes() as $key => $value) {
                $param[$key] = (string)$value;
            }
            // Если есть элементы списка
            if (isset($p->option)){

                foreach($p->option as $o){
                    $opt = array();
                    foreach($o->attributes() as $k => $v) {
                        $opt[$k] = (string)$v;
                    }
                    $tolk = 'MOD_'.mb_strtoupper($param['name'].'_OPT'.($opt['value'] ? '_'.$opt['value'] : ''));
                    $opt['title'] = isset($_LANG[$tolk]) ? $_LANG[$tolk] : (isset($opt['title']) ? $opt['title'] : '');
                    $param['tag_option'][] = $opt;
                }
            }

            // Возможные lang ключи для параметров
            // если ключ для поля есть, то возвращается его значение
            // $param['name'] считается уникальным для каждого параметра xml
            // на его основе и строим ключи
            // если таких элеменов в массиве $_LANG нет, предполагаем, что соответствующие элементы
            // title, hint и units заданы в xml и используем их
            $ulk = 'MOD_'.mb_strtoupper($param['name']).'_UNITS';
            $tlk = 'MOD_'.mb_strtoupper($param['name']);
            $hlk = 'MOD_'.mb_strtoupper($param['name']).'_HINT';

            $param['title'] = isset($_LANG[$tlk]) ? $_LANG[$tlk] : $param['title'];
            $param['hint']  = isset($_LANG[$hlk]) ? $_LANG[$hlk] :
                                                    (isset($param['hint']) ? $param['hint'] : '');
            $param['units'] = isset($_LANG[$ulk]) ? $_LANG[$ulk] :
                                                    (isset($param['units']) ? $param['units'] : '');

            //получаем значение параметра
            $value = $this->getParamValue($param['name'], (isset($param['default']) ? $param['default'] : ''));
            //если это массив, склеиваем в строку
            if (is_array($value)){ $value = implode('|', $value); }

            $param['value'] = $value;

            $param['html']  = $this->getParamHTML($param);

            $this->params[] = $param;

        }

        return;

    }

//============================================================================//
//============================================================================//

    private function getParamValue($param_name, $default){

        if (isset($this->default_cfg[$param_name])){

            $value = $this->default_cfg[$param_name];

        } else {

            $value = $default;

        }

        if ($value === 'on') { $value = 1; }
        if ($value === 'off') { $value = 0; }

        return $value;

    }

//============================================================================//
//============================================================================//

    public function getHTML(){

        ob_start();

            global $tpl_data;

            $tpl_data['module'] = $this->xml->module;
            $tpl_data['fields'] = $this->params;

            cmsPage::includeTemplateFile('admin/autoform.php');

        $this->html = ob_get_clean();

        return $this->html;

    }


//============================================================================//
//============================================================================//

    private function getParamHTML($param) {

        switch ($param['type']){

            case 'number':  return $this->renderNumber($param);
                            break;

            case 'string':  return $this->renderString($param);
                            break;

            case 'flag':    return $this->renderFlag($param);
                            break;

            case 'list':    return $this->renderList($param);
                            break;

            case 'list_db': return $this->renderListDB($param);
                            break;

            case 'list_function': return $this->renderListFunction($param);
                            break;

        }

        return;

    }

//============================================================================//
//============================================================================//

    private function renderNumber($param) {

        return '<input type="text" id="'.$param['name'].'" name="'.$param['name'].'" value="'.$param['value'].'" class="param-number" /> '. $param['units'];

    }

    private function renderString($param) {

        return '<input type="text" id="'.$param['name'].'" name="'.$param['name'].'" value="'.htmlspecialchars($param['value']).'" class="param-string" /> ';

    }

    private function renderFlag($param) {

        $html = '<input type="checkbox" '.($param['value']==1 ? 'checked="checked"' : '').' onclick="$(\'#'.$param['name'].'\').val(1-$(\'#'.$param['name'].'\').val())" />' . "\n" .
                '<input type="hidden" id="'.$param['name'].'" name="'.$param['name'].'" value="'.$param['value'].'" />';

        return $html;

    }

    private function renderList($param){

        $html = '<select id="'.$param['name'].'" name="'.$param['name'].'" class="param-list">' . "\n";

        foreach($param['tag_option'] as $option){

            $html .= "\t" . '<option value="'.htmlspecialchars($option['value']).'" '.($param['value'] == $option['value'] ? 'selected="selected"' : '').'>'.$option['title'].'</option>' . "\n";

        }

        $html .= '</select>' . "\n";

        return $html;

    }

    private function renderListFunction($param) {

        $key_title  = isset($param['key_title']) ? $param['key_title'] : 'title';
        $key_value  = isset($param['key_value']) ? $param['key_value'] : 'id';
        $fparam     = isset($param['param']) ? $param['param'] : '';

        if(!function_exists($param['function'])){ return ''; }

        $items = call_user_func($param['function'], $fparam);
        if(!$items){ return ''; }

        $html = '<select id="'.$param['name'].'" name="'.$param['name'].'" class="param-list">' . "\n";

        if (isset($param['tag_option'])){
            foreach($param['tag_option'] as $option){

                $html .= "\t" . '<option value="'.htmlspecialchars($option['value']).'" '.($param['value'] == $option['value'] ? 'selected="selected"' : '').'>'.$option['title'].'</option>' . "\n";

            }
        }

        foreach($items as $option){

            $html .= "\t" . '<option value="'.htmlspecialchars($option[$key_value]).'" '.($param['value'] == $option[$key_value] ? 'selected="selected"' : '').'>'.$option[$key_title].'</option>' . "\n";

        }

        $html .= '</select>' . "\n";

        return $html;

    }

    private function renderListDB($param) {

        $inDB = cmsDatabase::getInstance();

        $src_title  = isset($param['src_title']) ? $param['src_title'] : 'title';
        $src_id     = isset($param['src_value']) ? $param['src_value'] : 'id';
        $src_where  = isset($param['src_where']) ? $param['src_where'] : '';
        $src_order  = isset($param['src_order']) ? $param['src_order'] : $src_title;

        $tree       = isset($param['tree']) ? (int)$param['tree'] : 0;
        $order_by   = ($tree ? 'NSLeft' : $src_order);
        $select     = "{$src_id} as value, {$src_title} as title";

        if ($tree) { $select .= ", NSLevel as level"; }

        $where      = ($src_where) ? "WHERE {$src_where}" : '';

        $sql        = "SELECT {$select}
                       FROM {$param['src']}
                       {$where}
                       ORDER BY {$order_by}
                       LIMIT 100";

        $result = $inDB->query($sql);


        // ------------------------------------------------------------- //
        // ------------------------------------------------------------- //

        if (!isset($param['multiple'])){

            $html = '<select id="'.$param['name'].'" name="'.$param['name'].'" class="param-list">' . "\n";

            if (isset($param['tag_option'])){
                foreach($param['tag_option'] as $option){

                    $html .= "\t" . '<option value="'.htmlspecialchars($option['value']).'" '.($param['value'] == $option['value'] ? 'selected="selected"' : '').'>'.$option['title'].'</option>' . "\n";

                }
            }

            if ($inDB->num_rows($result)){
                while($option = $inDB->fetch_assoc($result)){
                    if (isset($option['level']) && $option['level'] >= 1){
                        $option['title'] = str_repeat('--', $option['level']-1) . ' ' . $option['title'];
                    }
                    $html .= "\t" . '<option value="'.htmlspecialchars($option['value']).'" '.($param['value'] == $option['value'] ? 'selected="selected"' : '').'>'.$option['title'].'</option>' . "\n";
                }
            }

            $html .= '</select>' . "\n";

        }

        // ------------------------------------------------------------- //
        // ------------------------------------------------------------- //

        if (isset($param['multiple'])){

            $values = explode('|', $param['value']);

            $html = '<table cellpadding="0" cellspacing="0">' . "\n";

            if ($inDB->num_rows($result)){
                while($option = $inDB->fetch_assoc($result)){
                    $html .= '<tr>' . "\n" .
                                "\t" . '<td><input type="checkbox" id="'.$param['name'].'_'.$option['value'].'" name="'.$param['name'].'['.$option['value'].']" value="'.htmlspecialchars($option['value']).'" '.(in_array($option['value'], $values) ? 'checked="checked"' : '').' />' . "\n" .
                                "\t" . '<td><label for="'.$param['name'].'_'.$option['value'].'">'.$option['title'].'</label></td>' . "\n" .
                             '</tr>';
                }
            }

            $html .= '</table>' . "\n";

        }

        return $html;

    }


//============================================================================//
//============================================================================//


}

?>
