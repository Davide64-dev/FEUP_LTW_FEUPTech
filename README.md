# FEUPTech Trouble Tickets Management System

## Instructions to start the project

```sh
git clone https://github.com/Davide64-dev/FEUP_LTW_FEUPTech.git
cd FEUP_LTW_FEUPTech
php -S localhost:9000
```
Check the project in:
[http://localhost:9000/](http://localhost:9000/)

### Every time you want to repopulate the original database:

```sh
cd database
rm -f database.db
sqlite3 database.db < database.sql
```

Note: The original database is already populated when you clone the project


### Screenshots


![../screenshots/index.png](screenshots/index.png)


![../screenshots/login.png](screenshots/login.png)


![../screenshots/profile.png](screenshots/profile.png)


![../screenshots/all_tickets.png](screenshots/all_tickets.png)


![../screenshots/ticket_detail.png](screenshots/ticket_detail.png)

![../screenshots/tickets_user.png](screenshots/tickets_user.png)





## Authors

Davide Teixeira - up202109860
<br>
Linda Rodrigues - up202005545
<br>
Inês Silva - up202008076




<!--[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-c66648af7eb3fe8bc4f294546bfd86ef473780cde1dea487d3c4ff354943c9ae.svg)](https://classroom.github.com/online_ide?assignment_repo_id=10557410&assignment_repo_type=AssignmentRepo) --!>
