# 1)телефонные номера лучше хранить в формате varchar(15) а не varchar(255), т.к международные стандарты могут поддерживать до 15 цифр максимум
# 2)для поля гендер лучше использовать TinyINT
# 3)Добавим индекс 
ALTER TABLE phone_numbers ADD INDEX(user_id);

SELECT
	u.name, count(p.id)
FROM
	users u
LEFT JOIN phone_numbers p
ON p.user_id = u.id
WHERE
 TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.birth_date), NOW()) BETWEEN 18 AND 22
AND
	u.gender = 2
GROUP BY u.id;