<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$form_id = 'cost_form_' . uniqid();
?>

<form id="<?php echo $form_id; ?>" action="<?php echo $CFG->DOMAIN . '/' . $CFG->URL_AJAX_INSERT; ?>">
    <div style="max-width:500px;">

        <div id="insertErrorArea">
            <ul id="errorList" style="display:none; background-color: red; color: white;"></ul>
            <ul id="successList" style="display:none; background-color: green; color: white;">
                <li>Eintrag erfolgreich</li>
            </ul>
        </div>

        <label for="cost_type_1">Ausgabe </label>
        <input id="cost_type_1" type="radio" name="cost_type" value="cost" checked="checked"/>

        <label for="cost_type_2">Einnahme </label>
        <input id="cost_type_2" type="radio" name="cost_type" value="income"/>

        <br/>

        <label for="price">Preis: </label>
        <input type="number" step="0.01" min="0.00" name="price" placeholder="0.00"/>

        <br/>

        <label for="timeframe">Rythmus: </label>
        <select name="pay_period">
            <?php
            $timef = $Timeframe->getAll();
            while ($tf = $timef->fetch_object()) {
                ?>
                <option value="<?php echo $tf->id; ?>"><?php echo $tf->name; ?></option>
            <?php } ?>
        </select>

        <br/>

        <label>Ausgabe im:</label>
        <input type="text" data-format="month" name="cost_timestamp" value="<?php echo date('m.Y'); ?>" readonly="readonly"/>

        <br/>

        <label for="is_fix">Fixkosten? </label>
        <input id="is_fix" type="checkbox" name="is_fix" onchange="$('#next_payday').toggle();"/>

        <br/>
        <span id="next_payday" style="display: none;">
            <label>Nächste Fälligkeit:</label>
            <input type="text" data-format="full" name="next_pay_period" placeholder="<?php echo date('d.m.Y'); ?>" readonly="readonly"/>
        </span>
        <br/>

        <ul style="list-style: none; padding-left: 0; width: 100%;">
            <?php
            $cg = $Category->getAll();
            while ($cat = $cg->fetch_object()) {
                ?>
                <li style="display: inline-block; margin-right: 2%; width:47%; white-space: nowrap;">
                    <input type="checkbox" name="category[]" id="cat_<?php echo $cat->id; ?>" data-refinement="<?php echo $cat->must_explain; ?>" value="<?php echo $cat->id; ?>"/>
                    <label for="cat_<?php echo $cat->id; ?>" style="white-space: normal;"><?php echo $cat->name; ?> <?php echo ($cat->must_explain) ? '*' : ''; ?></label>
                </li>
            <?php } ?>
        </ul>
        <span>* Mindestauswahl = 2</span>

        <textarea placeholder="Optional: Nähere Beschreibung" name="description" style="width:100%;"></textarea>

        <input type="submit" value="Eintragen" style="display: none;"/>
        <input type="reset" value="Reset" style="display: none;"/>
        <button class="fa fa-undo" onclick="$('#<?php echo $form_id; ?> input[type=reset]').click(); return false;"></button>
    </div>

    <link rel="stylesheet" href="<?php echo $CFG->DOMAIN; ?>/js/jquery-ui-1.11.4/jquery-ui.min.css" type="text/css"/>
    <script type="text/javascript">
        var form_id, submitURL;
        form_id = '<?php echo $form_id; ?>';
        submitURL = '<?php echo $CFG->DOMAIN . '/' . $CFG->URL_AJAX_INSERT; ?>';

        document.body.onload = function (evt) {
            var dateOpt, monthOpt, fullDateOpt;

            $('#' + form_id).change(function (evt) {
                checkInputCategories(form_id);
            });

            dateOpt = {
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
                showAnim: "slide"
            }

            monthOpt = copyObject(dateOpt);
            monthOpt.dateFormat = "mm.yy";

            fullDateOpt = copyObject(dateOpt);
            fullDateOpt.dateFormat = "dd.mm.yy";

            $('input[type=text][readonly=readonly][data-format=month]').datepicker(monthOpt);
            $('input[type=text][readonly=readonly][data-format=full]').datepicker(fullDateOpt);

            addAjaxSubmit(form_id, submitURL)
        };
    </script>

</form>

