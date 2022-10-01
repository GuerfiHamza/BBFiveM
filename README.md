
![Blackburn](https://blackburn-co.com/img/logo.png)


# Blackburn Fivem (BBFiveM)

This is a website created to manage your FiveM server.


## Features

- A form to submit whilelist.
- Player's section (money, employment and organizations, etc...).
- Enterprise Section (Manage employes & vehicles and salary, etc...).
- Organisation Section (Manage employes & vehicles and salary, etc...).
____ 
#### Admin section
- Statistics
- Manage players (Player's information, Delete billings, Wipe player, etc...).
- Manage Billings (See who sent, to whom with the amount).
- Entreprises & organisations list.
- Add / Update Form list.
- Form submissions.

## Requirements

- PHP 8.0 
___

#### FiveM Database

- Users table with these columns (Identifier (Steam identifier not the license), firstname, lastname, dateofbirth, sex, height, phone_number, bank, money, job, job_grade, org, org_grade).
- Jobs & job_grades, org, org_grades, owned_vehicles, vehicle_sold, user_licenses, billing. All these tables must be present if you need any support contact me.
## Installation

You can directly download it or git clone
```bash
  git clone https://github.com/GuerfiHamza/BBFiveM.git
  cd BBFiveM
  cp .env.example .env
  php artisan key:generate
  php artisan artisan migrate
```
    
## Configurations

- You must config in the .env FIVEM_DB_DATABASE,FIVEM_DB_USER, FIVEM_DB_PASSWORD, RCON IP, RCON PORT, RCON PASSWORD & [STEAM API KEY](https://steamcommunity.com/dev/apikey)

#### You must have minimal skills to edit an html file to be able to edit the design.
## The pro version

You guessed it! We do have a pro version.

- Custom design
- Intranet for multiple jobs (Ems, Police etc...)
- Administration panel with more functions like see treasure for businesses and organizations, manage vehicles (delete), manage licenses (delete driving licenses, etc.)
- And much more.
## Authors

- [@GuerfiHamza](https://github.com/GuerfiHamza)


## Support

For support, email contact@blackburn-co.com or via discord NeoZeroŠeer#2842.


## License

This project is released under the [NonCommercial 4.0 International Public License](https://creativecommons.org/licenses/by-nc/4.0/legalcode)


## Screenshots

![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/1.png)
![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/2.png)
![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/3.png)
![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/4.png)
![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/5.png)
![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/6.png)
![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/7.png)
![App Screenshot](https://raw.githubusercontent.com/GuerfiHamza/BBFiveM/main/imgs/8.png)

