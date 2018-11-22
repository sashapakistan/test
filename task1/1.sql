# 1)���������� ������ ����� ������� � ������� varchar(15) � �� varchar(255), �.� ������������� ��������� ����� ������������ �� 15 ���� ��������
# 2)��� ���� ������ ����� ������������ TinyINT
# 3)������� ������ 
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