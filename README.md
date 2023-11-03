<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Popis API

### Uložení dat z JSON do databáze

#### Popis

Tento API umožňuje uložit data z JSON souboru do databáze. Načte obsah souboru ve formátu JSON, získá data a uloží je do příslušných tabulek v databázi. Pokud operace proběhne úspěšně, vrátí se stav "ok" a zpráva o úspěšném uložení dat do databáze.

#### Použití

Metoda: GET

Cesta: /saveJsonToDatabaseApi

#### Odpověď

JSON objekt obsahující:

- `status`: Stav provádění operace ("ok" nebo "error").
- `message`: Zpráva označující výsledek operace uložení dat do databáze.

#### Parametry

Nejsou k dispozici žádné parametry.

#### Příklad požadavku

/api/saveJsonToDatabaseApi

#### Příklad úspěšné odpovědi

```json
{
  "status": "ok",
  "message": "Data byla úspěšně uložena do databáze."
}
```

## Otevřené prodejní body

### Popis

Tato API umožňuje získat seznam otevřených prodejních bodů na základě předaných parametrů požadavku. Vrací JSON odpověď s informacemi o prodejních bodech, které jsou otevřeny v aktuálním čase nebo ve vybraném čase, a odpovídajícím stavem požadavku.

### Použití

Metoda: GET

Cesta: /api/openPointsApi

#### Parametry požadavku

- `chooseDateTime` (nepovinný): Datum a čas, pro které chcete získat seznam otevřených prodejních míst. Formát data a času: 'Y-m-dTH:i:s'.
- `chekOpenPoints` (nepovinný): Příznak pro kontrolu otevřených prodejních míst v aktuálním čase.

#### Odpověď

JSON objekt obsahující:

- `status`: Stav provedení požadavku („ok“ nebo „error“).
- `salePoints`: Seznam otevřených prodejních bodů, které splňují předané parametry.
- `Content-Type`: Typ obsahu označující formát přenášených dat (zde: application/json).
- `X-Requested-With`: Informace o typu požadavku (zde: XMLHttpRequest).
- `chekOpenPoints` (pokud je předán): Příznak, který označuje kontrolu otevřených prodejních bodů v aktuálním čase.
- `chooseDateTime` (pokud je předán): Vybrané datum a čas pro kontrolu otevřených prodejních bodů.

### Příklad požadavku

/api/openPoints?chooseDateTime=2023-11-10T10:26

nebo

/api/openPoints?chekOpenPoints=1

### Příklad odpovědi

```json
{
  "status": "ok",
  "salePoints": [
    {
      "id": 1,
      "sale_point": "dp1",
      "type": "ticketMachine",
      "name": "Petřín",
      "address": "Lanovka na Petřín, Praha 1",
      "lat": 50.08,
      "lon": 14.4,
      "services": 196608,
      "pay_methods": 5,
      "link": "",
      "created_at": "2023-10-31T12:38:38.000000Z",
      "updated_at": "2023-10-31T12:38:38.000000Z",
      "open_hours": [
        {
          "id": 1,
          "sale_point_id": "1",
          "day_from": 0,
          "day_to": 6,
          "hours": "9:00-23:30",
          "created_at": "2023-10-31T12:38:38.000000Z",
          "updated_at": "2023-10-31T12:38:38.000000Z"
        }
      ]
    }
  ],
  "Content-Type": "application/json",
  "X-Requested-With": "XMLHttpRequest",
  "chekOpenPoints": 1,
  "chooseDateTime": "2023-11-10T10:26"
}
```
