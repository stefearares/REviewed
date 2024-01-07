# REviewed


## Motivație

&nbsp;Muzica este un domeniu vast și nu există multe website-uri cu review-uri făcute de utilizatori și pentru utilizatori. Majoritatea website-urilor care se focusează perecenzii de muzică se focusează doar pe partea de recenzie acriticilor, nu pe cea a utilizatorului de rând care are, adesea, gusturi total diferite.

## Descriere

&nbsp;Proiectul este un website dedicat muzicii. Acesta are mai multe secțiuni pentru a vizualiza diferite melodii sau albume, pentru a aflainformații despre acestea și pentru a putea consulta clasamentele cu
cele mai bune melodii. De asemenea, utilizatorul poate căuta melodii specifice pentru a le oferi o notă iar în cazul în care nu știe ce să asculte poate să descopere o melodie/album nou recomandat la întâmplare de website. Utilizatorii sunt împărțiți în două categorii: utilizator normal și cei care pot să realizeze recenzii și să publice o melodie nouă. De asemenea “revieweri” au posibilitatea de a accepta cererile
utilizatorilor normali pentru a putea deveni la rândul lor “revieweri”.

<details open>
<summary> <b>Detalii melodie/albume:</b></summary>
<br>
  <ul>
    <li> Nume melodie/albume </li>
    <li> Artist </li>
    <li> Gen muzical </li>
    <li> Anul lansării </li>
    <li> Popularitate </li>
    <li> Rating utilizatori </li>
  </ul>
</details>
<details open>
<summary><b>Detalii recenzii:</b></summary>
<br>
  <ul>
    <li> Nume utilizator </li>
    <li> Rating acordat </li>
  </ul>
</details>


## Audiența țintă

Utilizatorii “Reviewed” nu se restrâng doar la utilizatorii derând. Website-ul are conturi speciale pentru critici de muzică, carepot să descrie și să voteze la rândul lor melodiile preferate.
”REviewed” nu se adresează tuturor: oamenilor de rând care vor săvadă clasamentele de melodii, pasionaților de muzică care vor să descopere melodii noi și criticilor care doresc să contribuie la ratingul melodiilor.

## Arhitectura

&nbsp;Arhitectura proiectului este bazată pe **microservicii**, fiind oferite utilizatorilor numeroase funcțioanlități precum modificarea angajaților și căutarea acestora. De asemenea, proiectul are o arhitectură **modulară** codul sursă fiind împărțit în blocuri de dimensiuni reduse de cod pentru modificarea cu ușurință a acestora.

![Exemplu de procese pentru arhitectura microserviciilor](documentatie-ghid-utlizare-raport/Vizualizarea_proceselor.png)

![Diagrama claselor exemplu](documentatie-ghid-utlizare-raport/diagrame_clase2.png)

&nbsp;**Prima imagine** reprezinta o diagramă generală a proiectului și a fiecărei pagini.

&nbsp;**A doua imagine** fluxul de date și comunicarea acestora cu baza de date.

## Tehnologii utilizate

<ul>
<li>&nbsp;Limbaje de nivel înalt precum <b>HTML(front end)</b> și <b>CSS(front end)</b> prin care au fost realizate structura și stilizate paginile principale.
<b>Javascript</b>(front end, utilizat pentru realizarea animaților și pentru creearea și apariția dinamică a erorilor pe paginile de login și sign up), <b>PHP</b>(back end, utilizat pentru procesele de login și afișare a melodiilor), <b>MySQL</b>(back end unde se vor reține date legate deutilizatori și melodii) precum și framework-uri și librării ce îmbunătățesc calitatea produsului și viteza în realizarea acestuia precum <b>Bootstrap</b>(front end, pentru ușurarea muncii pentru crearea paginilor și stilizării).</li>
<li>&nbsp;De asemenea sunt utilizate tehnologii pentru email automation precum <b>PHPMailer</b> pentru a anunța utilizatorii de noi modificări
aduse website-ului.</li>
<li> &nbsp;Bazele de date sunt realizate în <b>MySQL</b> utilizând un host pe calculatorul personal prin intermediul aplicației <b>XAMPP</b> și <b>PhpMyAdmin</b>.
Acestea sunt împărțite în tabele distincte atât pentru melodii cât șipentru utilizatori. Bazele de date sunt împărțite în tabele de
utilizatori în care sunt stocate date precum parole, username, email și rolul fiecarui utilizator și o tabelă care va reține titlurile melodiilor și descrieriile.</li>
</ul>

## Funcționalități

&nbsp;Aplicația oferă numeroase funcționalități utile atât în corporații cât și în firme mici care facilitează gestionarea bazelor de date într-o manieră intuitivă, rapidă pentru utilizator și eficientă pentru bazele de date.

<ul>
  <li><b>Căutare</b>: utilizatorul poate căuta în baza de date angajați în funcție de anumite atribute precum CNP, numărul de angajat, nume și număr de telefon.</li>
  <li><b>Actualizare</b>: utilizatorul poate actualiza cu ușurință datele unui angajat precum: departamentul, numărul de telefon și adresa.</li>
  <li><b>Adăugare</b>: utilizatorul poate adăuga noi angajați în baza de date cu mecanisme de protecție împtriva duplicatelor precum: verificare în funcție de CNP-ul unic.</li>
  <li><b>Ștergere</b>: utilizatorul poate șterge angajați din baza de date cu ușurință și în siguranță datorita mecanismului de protecție ce necesită confirmarea acțiunii.</li>
</ul>

## Exemple de utilizare

&nbsp;Un exemplu de utilizare ar fi într-o companie care are aplicația implementată in sistemul lor. Operatorul care utilizează aplicația vrea să afle numărul de angajat al lui Ion Popescu dar nu îi cunoaște decât numele. Operatorul va folosi funcția de căutare pentru a interoga baza de date iar dacă acest Ion Popescu nu este prezent în baza de date va utiliza funcția de adăugare a acestuia în baza de date a companiei. Aplicația este gândită pentru a putea fi utilizată în orice fel de companii, indiferent de numărul de angajați.

&nbsp;Un alt exemplu ar fi o mică firma care dorește să aiba informațiile legate de angajații lor la îndemnă pentru controale sau diferite situații (precum plecarea și venirea frecventă a noilor angajați), fără a pierde bani și timp pentru menținerea informațiilor pe hârtie și depozitarea acestora în locuri special amenajate pentru depozitarea informațiilor. Proprietarul poate să facă modificări în baza de date de la propriul calculator.
