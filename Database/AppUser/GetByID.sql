select
	ID,
	name
from
	AppUser
where
	ID = :ID
limit 1