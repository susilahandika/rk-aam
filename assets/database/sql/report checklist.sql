SELECT `schedule_head`.`region_id`, `minimart`.`region`.`region_name`, `schedule_head`.`dept_id`, `minimart`.`department`.`dept_name`,
	`schedule_head`.`month`, `schedule_head`.`year`, `checklist_head`.`id`, 
	`checklist_head`.`checklist_date`, `checklist_head`.`checklist_id`, `minimart`.`user`.`full_name`
FROM `schedule_head`
INNER JOIN `schedule_detail` ON `schedule_head`.`id` = `schedule_detail`.`schedule_id`
LEFT JOIN `checklist_head` ON `schedule_head`.`month` = `checklist_head`.`month` 
	AND `schedule_head`.`year` = `checklist_head`.`year` 
	AND `schedule_detail`.`store` = `checklist_head`.`store` 
INNER JOIN minimart.`region` ON `minimart`.`region`.`id` = `schedule_head`.`region_id`
INNER JOIN minimart.`department` ON `minimart`.`department`.`id` = `schedule_head`.`dept_id`
LEFT JOIN `minimart`.`user` ON `minimart`.`user`.`id` = `checklist_head`.`checklist_id`