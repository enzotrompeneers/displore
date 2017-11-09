# Displore

### Ik wil je design stelen

Alle design assets zijn te vinden op dropbox. Open voor iedereen

Link:  [Dropbox Design Assets](https://www.dropbox.com/sh/rq4sdeeuwye5gbu/AAAySvRihZ9Rpyr3nef4_qPba?dl=0)

### Ik **haat** lokaal het project laten werken

Geen zorgen de website is ook te gebruiken op: [displore.be](http://displore.be)

### Ik wil het project lokaal laten werken

Het project gebruikt de volgende technologieeën voor devops

* Yarn (package manager)
* Vagrant
* Een goed humeur

Om te beginnen willen we eerst de back-end opzetten. Omdat er al een config file is voor vagrant voor scotchbox kunnen we gewoon direct het volgende commando runnen:

```
vagrant up
```

Vervolgens als dat trage proces eindelijk is opgestart zullen we in de VM ssh'en en de database opzetten met twee simpele commando's

```
vagrant ssh
php artisan migrate
```

Vervolgens kijk je even naar je .env file en als je deze niet hebt hernoem dan .env.example naar .env. Zorg dat zeker het volgende aanwezig is om de database te laten werken

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=displore	
DB_USERNAME=root
DB_PASSWORD=root
```

Ok geweldig, de back-end is opgezet. Nu nog de front-end

Als eerste moet je zien dat je de yarn pakket manager hebt geinstalleerd. Hiervoor heb je ook npm nodig. Dus zie dat je dat ook op je computer hebt staan.

Als je npm al hebt dan kan je het volgende commando uitvoeren om yarn te installeren

```
npm install -g yarn
```

Als yarn geinstalleerd is dan gaan we alle dependencies van het project downloaden

```
yarn install
```

Als alles correct geinstalleerd is dan zullen we een watcher starten zodat alle sass en js gecompileerd wordt en alle dependencies mooi gebundeld worden. 

```
yarn watch
```

Voila, het hele proces is gedaan. Nu alleen nog maar surfen naar http://192.168.33.10 en je kan de site testen. Als bonus is er ook nog browser-sync om alles automatisch te refreshen en deze kan je vinden op http://127.0.0.1:3000 en soms als de poort bezet is op http://127.0.0.1:3002 

### Betalen op paypal

Voorlopig werkt de paypal betaling in de sandbox van paypal. Als je de betaling wil testen gebruik dan het volgende test account.

**Gebruikersnaam** klant@displore.be  
**Wachtwoord** koopkoop
