# flashcarrd
a simple flashcard app written in php and javascript

> [!NOTE]
> This project is not in a finished state. Bugs are to be expected

## Install
Just clone the directory and start a php server. Use php version `8.x` for the best results. No database required.

```
git clone https://github.com/brodyking/flashcarrd
```

## Documentation
Here is enough to get you started. You'll figure it out.

1. All API functions/objects are in `api/`
2. Everything is done inside `index.php` using get params and cookies to store user info.
3. All data is stored in `database/users/`
   1. Session is stored in `session.json`, other account information is stored in `account.json` and `sets.json`
   2. You MUST disable access to the `database/` folder on your webserver if you host this publically. All user data will be public if you fail todo so, including passwords and emails.
4. All components, or pages depending on how they are being used, are stored in `components/`
5. All API scrips are `include`'d at the beginning of index.php, but are only assigned a variable and used when needed
6. All components are added in by `include`, but only when needed.
7. I wrote the bulk of this project in one day, so its rushed and messy. Sorry not sorry.