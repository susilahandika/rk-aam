SELECT a.`store`, a.`month`, a.`year`, 
SUM(IF(b.`choice`='ok', 1, 0)) AS count_ok,
SUM(IF(b.`choice`='no', 1, 0)) AS count_no,
SUM(IF(b.`choice`='na', 1, 0)) AS count_na
FROM `checklist_head` AS a
INNER JOIN `checklist_detail` b ON a.`id` = b.`checklist_id`
INNER JOIN minimart.`region` AS c ON a.`region_id` = c.`id`
INNER JOIN minimart.`department` AS d ON a.`dept_id` = d.`id` AND c.`id` = d.`region_id`
INNER JOIN `minimart`.`user_store` AS e ON a.`store` = e.`store_id`
WHERE a.`month` = MONTH(NOW())
AND a.`year` = YEAR(NOW())
AND e.`user_id` = 219001287
GROUP BY a.`store`, a.`month`, a.`year` 