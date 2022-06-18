<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About SCMS

A CSMS (charging station management system) such as be.ENERGISED is used to manage charging stations, charging
processes and customers (so-called eDrivers) amongst other things.
One of the most important functionalities of such a CSMS is to calculate a price to a particular charging process so that
the eDriver can be invoiced for the consumed services. Establishing a price for a charging process is usually done by
applying a rate to the CDR (charge detail record) of the corresponding charging process.

## Requirement


- php > = 7.4
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- XML PHP Extension

## install

Clone from https://github.com/inspiration988/CSMS.git

`git clone https://github.com/inspiration988/CSMS.git .`

Run composer install

`composer install`


##Run API
In root directory run :
`php artisan serve`

Open url [http://127.0.0.1:8000/api/v1/rate]  in postman
and set as input :
`
{
"rate": { "energy": 0.3, "time": 2, "transaction": 1 },
"cdr": { "meterStart": 1204307, "timestampStart": "2021-04-05T10:04:00Z", "meterStop": 1215230, "timestampStop":
"2021-04-05T11:27:00Z" }
}

`



