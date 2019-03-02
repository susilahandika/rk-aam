SELECT `matriks_app_detail`.`level_app` AS last_level_app
FROM `schedule_app`
INNER JOIN (
	SELECT `schedule_app`.`schedule_id`, MAX(`schedule_app`.`app_date`) max_app_date
	FROM `schedule_app`
	WHERE `schedule_app`.`schedule_id` = 20190310000101287
	GROUP BY `schedule_app`.`schedule_id` 
) AS max_app ON `schedule_app`.`schedule_id` = max_app.schedule_id AND `schedule_app`.`app_date` = max_app.max_app_date
INNER JOIN `schedule_head` ON schedule_app.`schedule_id` = `schedule_head`.`id`
INNER JOIN `matriks_app_head` ON `schedule_head`.`region_id` = `matriks_app_head`.`region_id` AND `matriks_app_head`.`dept_id` = `schedule_head`.`dept_id`
INNER JOIN `matriks_app_detail` ON `matriks_app_head`.`id` = `matriks_app_detail`.`matriks_id` AND `schedule_app`.`app_id` = `matriks_app_detail`.`user_id`