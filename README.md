# Local Crime Database
## Things to be tracked
* Licsense Plates
* Police Report
* Crimes
* Warrant
* People

## Public Pages
* Comments
* Public Crime Stats

## Database
### Users
* id
* name
* password
* role (admin, records, officer)

### Person
* id
* name
* Date of Birth
* Social Security Number

### PoliceReport
* id
* reporting_officer (forgin key user)
* report_time
* offense_time
* title
* description
* reporting_person (forgin key Person)

### Crime
* id
* location
* description
* crime_type (forgin key crime_type)
* offender (forgin key Person)

### Crime Type
* id
* title
* description

### Warrants
* id
* title
* person (forgin key Person)
* date
* served_at
* served_served (forgin key user)
# Operation-Purple-Praseodymium
