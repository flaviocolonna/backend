SELECT  customers.customerName, employees.firstName, employees.lastName
FROM customers
inner join employees on customers.salesRepEmployeeNumber = employees.employeeNumber
WHERE customers.salesRepEmployeeNumber = 1216


ALTER TABLE simple_bookmarks ADD CONSTRAINT bookmark_creator_fk_constraint 
FOREIGN KEY ( creatorUserId ) 
REFERENCES simple_users( userId ) 
ON DELETE NO ACTION

ALTER TABLE simple_bookmarks ADD CONSTRAINT bookmark_visibility_fk_constraint 
FOREIGN KEY (visibilityId) 
REFERENCES visibility( visibilityId ) 
ON DELETE NO ACTION