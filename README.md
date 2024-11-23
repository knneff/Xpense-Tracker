# BASAHIN NINYO ITO MGA SIGMA!!

## folder conventions:
- **views**: dito nakalagay yung mga design ng webpages natin. Yung mga files dito is ni-rerefer lang ng mga nasa controller folder to generate yung design/UI nila.
- **controllers**: dito ni-ro-route ng router.php yung mga pages natin. Yung mga pages here only contains yung LOGIC nung mga webpages natin meaning wala pa dito yung UI pero dito iko-connect yung UI using yung require ng php. Tignan niyo na lang dashboard for example.
- **assets**: dito nakalagay mga images na gagamitin natin

## ibig sabihin ng mga files:
- **index.php**: dito dumadaan lahat bago mapunta sa iba-ibang pages. Basahin ninyo comment sa index.php for more info.
- **Database.php**: dito nakalagay yung PHP PDO natin.
- **functions.php**: dito nakalagay yung mga global functions na pwede natin gamitin sa website
- **.htaccess**: para palitan yung default route into "/"
- **tailwind.config.js**: para lang lumitaw yung autocomplete/intellisense ng tailwind natin