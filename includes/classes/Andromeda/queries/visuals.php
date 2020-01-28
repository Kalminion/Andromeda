<?php

    /**
     * 
     * Get all visual settings
     * @return array
     * 
     */

    function visuals_get($db) {
        return $db->row('SELECT * FROM `visuals`');
    }

    /**
     * 
     * Edit visual settings
     * @param int   $visuals_home       (optional)  Toggle display of home page
     * @param int   $visuals_tips       (optional)  Toggle display of tips page
     * @param int   $visuals_tools      (optional)  Toggle display of tools page
     * @param int   $visuals_wiki       (optional)  Toggle display of wiki page
     * @param int   $visuals_planning   (optional)  Toggle display of planning page
     * @param int   $visuals_logs       (optional)  Toggle display of logs page
     * @param int   $visuals_progress   (optional)  Toggle display of progress page
     * 
     */

    function visuals_edit($db, $visuals_home = NULL, $visuals_tips = NULL, $visuals_tools = NULL, $visuals_wiki = NULL, $visuals_planning = NULL, $visuals_logs = NULL, $visuals_progress = NULL) {

        $visuals_home = checkbox($visuals_home);
        $visuals_tips = checkbox($visuals_tips);
        $visuals_tools = checkbox($visuals_tools);
        $visuals_wiki = checkbox($visuals_wiki);
        $visuals_planning = checkbox($visuals_planning);
        $visuals_logs = checkbox($visuals_logs);
        $visuals_progress = checkbox($visuals_progress);

        $db->none('UPDATE `visuals` SET `home` = ?, `tips` = ?, `tools` = ?, `wiki` = ?, `planning` = ?, `logs` = ?, `progress` = ?, `editted_by` = ?, `editted_on` = ?', array($visuals_home, $visuals_tips, $visuals_tools, $visuals_wiki, $visuals_planning, $visuals_logs, $visuals_progress, $_SESSION['user_id'], date('Y-m-d H:i:s')));
    }
?>