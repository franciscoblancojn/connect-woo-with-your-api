<?php
 if ( ! defined( 'ABSPATH' ) ) exit;
function CWWYA_showApi($api , $i =0){
    ?>
        <div class="api <?php echo $api["active"]?"active":""?> ">
            <label class="input-api">
                <h3 class="name-api">Name</h3>
                <input 
                    type="text" 
                    class="input-name-api" 
                    name="api[<?php echo $i?>][name]" 
                    id="api[<?php echo $i?>][name]"
                    value="<?php echo $api["name"]?>"
                >
            </label>
            <label class="input-api">
                <h3 class="url-api">Url</h3>
                <input 
                    type="text" 
                    class="input-url-api" 
                    name="api[<?php echo $i?>][url]" 
                    id="api[<?php echo $i?>][url]"
                    value="<?php echo $api["url"]?>"
                >
            </label>
            <label class="input-api">
                <h3 class="token-api">Token</h3>
                <input 
                    type="text" 
                    class="input-token-api" 
                    name="api[<?php echo $i?>][token]" 
                    id="api[<?php echo $i?>][token]"
                    value="<?php echo $api["token"]?>"
                >
            </label>
            <div class="permissions">
                <?php 
                    $permissionsDefault = array_keys(CWWYA_getConfigDefault()["permissionsDefault"]);
                    for ($j=0; $j < count($permissionsDefault); $j++) { 
                        $permission = $permissionsDefault[$j];
                        $isActive = $api["permission"][$permission] || false;
                        CWWYA_showApiPermission($permission ,$isActive, $i);
                    }
                ?>
            </div>
            <div class="contentDelete">
                <input type="submit" class="delete-api-submit" value="<?php echo $i?>" name="delete-api" id="delete-api"/>
                <button class="button delete delete-api">Delete</button>
            </div>
        </div>
    <?php
}