# BASAHIN NINYO ITO MGA SIGMA!!

## REQUIRED SETUP:

- **htdocs**: all the files must be inside the "htdocs" folder. If the files are inside the folder within htdocs, the page routing will not work properly.
- **php.ini**: in the file "C:\xampp\php\php.ini", the ;extension=gd msut be enabled by removing the semicolon. This is to allow image resizing function of the application. You can also just copy the php.ini here and replace it with the one in php folder.
- **mysql setup**: Since our application uses remote mysql database (AIVEN), you can run the command "mysql --user avnadmin --password=AVNS_f8o7HWTkd-96oSm9STx --host mysql-6ef4ff5-xadd852x-362b.j.aivencloud.com --port 16921" to access the database in command line.

## folder conventions:

- **views**: dito nakalagay yung mga design ng webpages natin. Yung mga files dito is ni-rerefer lang ng mga nasa controller folder to generate yung design/UI nila.
- **controllers**: dito ni-ro-route ng router.php yung mga pages natin. Yung mga pages here only contains yung LOGIC nung mga webpages natin meaning wala pa dito yung UI pero dito iko-connect yung UI using yung require ng php. Tignan niyo na lang dashboard for example.
- **assets**: dito nakalagay mga images na gagamitin natin

## common file conventions:

- **index.php**: dito dumadaan lahat bago mapunta sa iba-ibang pages. Basahin ninyo comment sa index.php for more info.
- **Database.php**: dito nakalagay yung PHP PDO natin.
- **functions.php**: dito nakalagay yung mga global functions na pwede natin gamitin sa website
- **.htaccess**: para palitan yung default route into "/"
- **tailwind.config.js**: para lang lumitaw yung autocomplete/intellisense ng tailwind natin
- **manifest.json**, **service_workert.js**, and **index.js**: for the PWA functionality of the application
