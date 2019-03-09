SELECT a.`id`, a.`item_name`, d.`id`, d.`category_name`,
SUM(IF(c.`choice`='ok', 1, 0)) AS count_ok,
SUM(IF(c.`choice`='no', 1, 0)) AS count_no,
SUM(IF(c.`choice`='na', 1, 0)) AS count_na
FROM item_checklist AS a
INNER JOIN `checklist_head` AS b ON a.`region_id` = b.`region_id` AND a.`dept_id` = b.`dept_id`
INNER JOIN `checklist_detail` AS c ON a.`id` = c.`item_id`
INNER JOIN `category` AS d ON a.`category_id` = d.`id`
GROUP BY a.`id`, a.`item_name`, d.`id`, d.`category_name`