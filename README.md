# letsnet

# --- LOCALHOST --- #

Az alap konfiguráció az App/_config/_appconfig.json -ben található, localhoston ezt másolni kell egy App/_config/_development_appconfig.json fájlba, ebből dolgozik a rendszer. A development appconfigot a gitignore tiltja :)

A 'server' értékét változtatva lehet:

    'fkinglocal' -> minden adatbázis localhoston megy
    'serverlocal' -> a webshopokra vonatkozó adatbázisok a webshop API-ról mennek

A development/sql mappában lévő .sql fájlokat (alapértelmezetten -> development appconfigban megváltoztatható) a saját nevük alapján külön adatbázisokba kell tölteni. 

Belépni a 'letsnet@letsnet.hu' felhasználóval és 'password' kóddal lehet, miután mindenki megcsinálhatja a saját felhasználóját.
A teszt webshophoz 'graphed@letsnet.hu' és 'password' párossal lehet bejutni.

(A teszt webshophoz új felhasználó esetén a Graphed Webshop adatbázist adjuk, Graphed oldallal.)


A development/sql/fkinglocal mappát akkor kell feltölteni, ha teljesen lokálisan akarunk fejleszteni. A teljes lokális léthez kell egy adminapi is, ezt le lehet szedni a letsnethungary/adminapi repoból. (További infó az ottani readmeben...)

Az index.php -ban 7. sor / define("APPCONFIG", "development"); / értéke 'development' kell, hogy legyen (innen lehet másolni).



