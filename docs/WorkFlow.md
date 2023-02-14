Lucid work flow

### IMPORTANT
- You will need to register your every service of you lucid app with your desired configurations to the lucid_application_providers array of the following config.
[config/core.php](./config/core.php).
```php
//Create a new Service
lucid make:service students 

//Create a new Eloquent Model
lucid make:model Student

//Create a new Migration class
lucid make:migration create_students_table

//Create a new resource Controller class in a service
lucid make:controller StudentController students

//Create a new Feature in a service
lucid make:feature IndexStudentFeature students

//Create a new Job in a domain
lucid make:job IndexStudentJob students

//Create a Request in a domain
lucid make:request StoreStudentRequest students

//Create an operation if there are several jobs in the feature
lucid make:operation StoreStudentOperation Students

//Domain names and service names ought to remain the same.
//Generate permission in the permission enum class next.
//Add new permission name to core.php class for admin seeder.
//Create the role name in the role enum class if you want to add a role.

```
