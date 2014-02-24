update AppUser
set
	name = :name
where
	ID = :ID
limit 1