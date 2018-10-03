<?php

function dump($varible, $name = null) {
    if ((boolean) $name) {
        $name = '<b>' . $name . '</b> = ';
    }
    echo '<pre style="color: #494949; border: 1px dashed red">' . $name . print_r($varible, true) . '</pre>';
}

$servername = "localhost";
$username = "pkraus_petycje";
$password = "Pilchow183";
$dbname = "pkraus_petycje";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET CHARSET utf8");
$conn->query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT t1.imie, 
       t2.title,
       t2.title_url
  FROM imiona t1, 
       petycje_description t2
       ORDER BY RAND() LIMIT 7";
$result = $conn->query($sql);



$names = array("Abramuk",

"Acker",

"Adamczak",

"Adamkiewicz",

"Adamowicz",

"Adamska",

"Adamski",

"Agaciński",

"Albrecht",

"Albrecht",

"Aleksandru",

"Amer",

"Andrysiak",

"Andrzejak",

"Andrzejewski",

"Andrzejewski",

"Angielczyk",

"Antczak",

"Antoniak",

"Antoniewski",

"Antoszewski",

"Anyżewski",

"Arasimowicz",

"Arcichowski",

"Arlitewicz",

"Babiarz",

"Bajerlein",

"Bakuła",

"Baliński",

"Banaś",

"Banatkiewicz",

"Baranowski",

"Barbaś",

"Barcichowski",

"Bartkowiak",

"Bartkowiak",

"Bartkowiak",

"Bartkowiak",

"Bartkowiak",

"Bartkowiak",

"Bartkowiak",

"Bartkowski",

"Bartlewicz",

"Bartlewicz",

"Bartlewski",

"Bartlewski",

"Bartnicki",

"Bartoszak",

"Bartoszewski",

"Baszyński",

"Baszyński",

"Batko",

"Baum",

"Bączkowski",

"Bączkowski",

"Becker",

"Benert",

"Benetkiewicz",

"Berdychowski",

"Bereś",

"Berkau",

"Bernard",

"Besaraba",

"Będowski",

"Białkowski",

"Biderman",

"Bidermann",

"Bieguński",

"Bieguński",

"Bieguński",

"Bielawski",

"Bieniek",

"Bieńkowski",

"Biłozor",

"Biłozor",

"Biłozor",

"Bittner",

"Blandzi",

"Blaszka",

"Blaszka",

"Blaszka",

"Blaszka",

"Blaszka",

"Blaszka",

"Blaszka",

"Blaszka",

105,111,134,135,137,140,142,146,

"Blaszka",

103,122,127,

"Blaszka",

"Błachowicz",

"Błajet",

"Błaszak",

"Błoch",

"Bobak",

"Bobowska",

"Bobowski",

"Bochenek",

"Bocian",

"Bodański",

"Bogaczyński",

"Bogaczyński",

"Bogucki",

"Bojko",

"Boniak",

"Borawski",

"Borkowska",

"Borkowska",

"Borkowski",

"Borkowski",

"Boruczkowski",

"Borkowski",

"Borysiewicz",

"Boszkowski",

"Boy",

"Bracław",

"Brant",

"Braun",

"Braun",

"Bromka",

"Bromka",

"Bronicka",

"Bronikowski",

"Bronik",

"Bruzik",

"Brzeziński",

"Brzozowska",

"Brzuski",

"Buchwald",

"Buda",

"Budniarzyński",

"Budnik",

"Buliński",

"Burandt",

"Burbeło",

"Burczyński",

"Burtowy",

"Burzyńska",

"Bussing",

"Buszkiewicz",

"Butkiewicz",

"Byliński",

"Bystrzycki",

"Carnowska",

"Carpanowa",

"Cegielski",

"Cegielski",

"Cegielski",

"Cegiołka",

"Cegłowski",

"Ceranka",

"Centner",

"Chamera",

"Chełkowski",

"Chełkowski",

"Chempiński",

"Chęciński",

"Chladikova",

"Chłapowski",

"Chmielewski",

"Chmielewski",

"Chocaj",

"Chodkowski",

"Chojnowska",

"Chomiawko",

"Chrzanowska",

"Chudzicka",

"Chudzicka",

"Chudzicki",

"Chudzińska-Staplewska",

"Chudziński",

"Chmielarczyk",

"Chwirot",

"Chyła",

"Cianciara",

"Cichy",

"Cichocki",

"Ciechowski",

"Cieciora",

"Cieciora",

"Cierniewski",

"Cierpikowski",

"Ciesiółka",

"Cieślik",

"Cimochowski",

"Cwojdziński",

"Cwojdziński",

"Cwojdziński",

"Cybulski",

"Cyplik",

"Cyplik",

"Czajka",

"Czajka",

"Czajkowski",

"Czajkowski",

"Caplicki",

"Czarnecki",

"Czarnecki",

"Czarnecki",

"Czarnecki",

"Czarnecki",

"Czarnowski",

"Czechowska",

"Czekanowski",

"Czerwczak",

"Częstochowski",

"Czołbowski",

"Czuba",

"Czubak",

"Czubek",

"Czudowski",

"Czujkowski",

"Czyż",

"Czyżewski",

"Czyżak",

"Ćwiąkała",

"Dabiński",

"Dakowski",

"Dakowski",

"Dalecki",

"Damaszke",

"Dazblaź",

"Dąbek",

"Dąbrowska",

"Dąbrowski",

"Dedio",

"Demski",

"Deptuła",

"Derda",

"Derdzianka",

"Dering",

"Deryło",

"Detlef",

"Dinkowski",

"Dinkowski",

"Dobrogojski",

"Dobrowlańska",

"Dobrowlański",

"Dobrowlański",

"Dobrzyńska",

"Dobrzyński",

"Dobrzyński",

"Dobrzyński",

"Dobrzyński",

"Dolata",

"Domachowski",

"Domagała",

"Domińska",

"Domiradzki",

"Dowjat-Migdał",

"Dubaniewicz",

"Dubaniewicz",

"Dubisz",

"Dubowik",

"Duchowski",

"Duchowska-Ciszak",

"Dudo",

"Dudyński",

"Dudziński",

"Dumitriu",

"Dwojak",

"Dwojak",

"Dwojak",

"Dworniczak",

"Dybek",

"Dykiert",

"Dyląg",

"Dymalski",

"Dymek",

"Dzierzgowski",

"Dzieweczyński",

"Dzieweczyński",

"Dziewięcki",

"Dziewięcki",

"Dzięcielak",

"Dziubalski",

"Dzwoniarek",

"Dźwikowski",

"Eineihoven",

"Eisele",

"Egiert",

"Elbiski",

"Elzanowski",

"Elzanowski",

"Ereciński",

"Ewertowska",

"Ewertowski",

"Fajfer",

"Feliksiak",

"Fersterman",

"Fick",

"Filipek",

"Filipiak",

"Filipiak",

"Filipiak",

"Finczyński",

"Fiszer",

"Fiszer",

"Foksowicz",

"Flieger",

"Forecki",

"Forma",

"Forycki",

"Francuz",

"Frankowski",

"Frasz",

"Frąckowiak",

"Frąckowiak",

"Frąckowiak",

"Frąszczak",

"Frost",

"Frydrychowicz",

"Gabriel",

"Gacińska",

"Gadomski",

"Gaffke",

"Gajdziński",

"Gajdziński",

"Galas",

"Galasiewicz",

"Galzer",

"Gałecki",

"Gałęza",

"Gałęza",

"Gałkiewicz",

"Gałkowski",

"Garczarczyk",

"Garczyk",

"Garstecki",

"Garstecki",

"Garsztka",

"Garsztka",

"Garsztka",

"Gasek",

"Gasela",

"Gawlak",

"Gawroński",

"Gąsiorowski",

"Gąsiorowski",

"Gelles",

"Generowicz",

"Gera",

"Gębala",

"Gibajło",

"Gibajło",

"Giefing",

"Gierak",

"Gierke",

"Giermańska",

"Gierszewski",

"Gieszczyńska",

"Gieszczyński",

"Glinkiewicz",

"Glinkiewicz",

"Glinkiewicz",

"Gładniewa",

"Gładysiak",

"Gładyszak",

"Głąb",

"Głośnicki",

"Głowacki",

"Gługiewicz",

"Gniot",

"Gocal",

"Godlewski",

"Golempka",

"Gołaska",

"Gołaski",

"Gołębiowski",

"Gościniecki",

"Gotowt",

"Górecki",

"Górecki",

"Górna",

"Górny",

"Górny",

"Górny",

"Górska",

"Górska",

"Górski",

"Grabiak",

"Grabkowska",

"Grabowski",

"Gracz",

"Grajek",

"Grewling",

"Grewling",

"Grocholewski",

"Grochowina",

"Grodecki",

"Groński",

"Gruniewski",

"Grudziak",

"Gruszczyńska",

"Gruszczyński",

"Gruszczyński",

"Grzechowiak",

"Grzechowiak",

"Grzelachowski",

"Grzesiek",

"Grzesiek",

"Grześkowiak",

"Grzybek",

"Grzybek",

"Gubała",

"Gueldenpennig",

"Gunther",

"Guść",

"Gwis",

"Hacht",

"Hadrych",

"Halicki",

"Halm",

"Hamrol",

"Hamrol",

"Hamrol",

"Hamrol",

"Hanc",

"Handkiewicz",

"Haraburda",

"Haraszymczuk",

"Hartmann",

"Hejna",

"Helmich",

"Hełkowski",

"Hemerling",

"Hendrysiak",

"Hillman",

"Hirsch",

"Hoffmann",

"Hoffmann",

"Hoim",

"Hoppe",

"Horak",

"Hustan",

"Hylla",

"Idziński",

"Issel",

"Iwiński",

"Iwiński",

"Izydorczak",

"Izydorczak",

"Izydorczak",

"Jabczanik",

"Jabłońska",

"Jabłoński",

"Jabłoński",

"Jabłoński",

"Jachimowicz",

"Jackowiak",

"Jackowiak",

"Jagodziński",

"Jagustyn",

"Jakimowicz",

"Jakowicki",

"Jakowiec",

"Jakowska",

"Jakś",

"Jakubek",

"Jakubek",

"Jakubowski",

"Jakuszewski",

"Jakuszewski",

"Jałowiecki",

"Janaszak",

"Janik",

"Janik",

"Jankowiak",

"Jankowiak",

"Jankowiak",

"Jankowska",

"Jankowski",

"Jankowski",

"Janusz",

"Jarecki",

"Jarecki",

"Jarmark",

"Jarmołowicz",

"Jarmużek",

"Januszewski",

"Jarocki",

"Jarosławski",

"Jarosławski",

"Jaruchowski",

"Jarysz",

"Jaruga",

"Jaruga",

"Jarzynowski",

"Jasek",

"Jasiniak",

"Jasiniak",

"Jasiniak",

"Jasiński",

"Jasiński",

"Jaskólska",

"Jaszkowski",

"Jaśkiewicz",

"Jaworski",

"Jaworski",

"Jaworski",

"Jeske",

"Jeske",

"Jeszke",

"Jezierski",

"Jeżewski",

"Jędrzejczak",

"Jędrzejczak",

"Jędrzejczyk",

"Joachimiak",

"Jocz",

"Jodłowski",

"Józefiak",

"Józefiak",

"Józefiak",

"Jóźwiak",

"Jóźwik",

"Jugowar",

"Jurga",

"Jurkiewicz",

"Juroszek",

"Kabała",

"Kabała",

"Kabat",

"Kachlicki",

"Kaczmarek-Ciszek",

"Kaczmarek",

"Kaczmarek",

"Kaczmarek",

"Kaczmarek",

"Kaczmarek",

"Kaczmarek",

"Kaczmarek",

"Kaczor",

"Kadzinowski",

"Kalkowski",

"Kałmuczak",

"Kałudziński",

"Kałużyński",

"Kamińska",

"Kamyczek",

"Kanabus",

"Kania",

"Kania",

"Kania",

"Kaniewski",

"Kaniewski",

"Kaniewski",

"Kardasz",

"Karlewicz",

"Karlewicz",

"Karlik",

"Karpiński",

"Karpiński",

"Kaseja",

"Kasperski",

"Kaspruk",

"Kasprzak",

"Kasprzak",

"Kaszubkiewicz",

"Kaszyński",

"Kauczukowska",

"Kaufmann",

"Kazimierska",

"Kaźmierski",

"Kempiński",

"Kempner",

"Kenny",

"Kessel",

"Kędziora",

"Kędziora",

"Kęsik",

"Kiciński",

"Kiejnowski",

"Kieliński",

"Kieliszewski",

"Kiełczewski",

"Kilar",

"Kilar",

"Kin",

"Kinastowska",

"Kinecki",

"Kisły",

"Kladziński",

"Klawiński",

"Klebba",

"Klein",

"Kliemann",

"Klimecki",

"Klimek",

"Klimek",

"Klimek",

"Klimowski",

"Klimowski",

"Kloska",

"Kłos",

"Kłos",

"Kmetko",

"Knasiecki",

"Knasiecki",

"Knasiecki",

"Knasiecki",

"Knasiecki",

"Knasiecki",

"Kobierowski",

"Koch",

"Kochanowska",

"Koczorowska",

"Koczorowska",

"Koebsch",

"Kogut",

"Kokoszka",

"Kokot",

"Kolendowicz",

"Kolmas",

"Kołacz",

"Kołodziejczak",

"Kołodziejczyk",

"Kołtun",

"Komorowski",

"Konatowski",

"Konca",

"Konca",

"Koncewicz",

"Kondej",

"Konieczka",

"Konieczna",

"Konieczny",

"Konn",

"Konys",

"Konys",

"Koper",

"Koper",

"Kopydłowska",

"Koralewski",

"Korbik",

"Kornowicz",

"Kortus",

"Korwin",

"Korzeniewski",

"Kosendiak",

"Kosicki",

"Kosicki",

"Kosiołek",

"Kosmala",

"Kostański",

"Kostina",

"Kostro-Kaliszewska",

"Kostrzewska",

"Kostrzewski",

"Koszewski",

"Koszewski",

"Koszyca",

"Kościelna",

"Kotecki",

"Kotewicz",

"Kotlewski",

"Kotlewski",

"Kotliński",

"Kotrysiak",

"Kotz",

"Kowal",

"Kowalczak",

"Kowalczuk",

"Kowalczyk",

"Kowalewski",

"Kowalewski",

"Kowalewski",

"Kowalska",

"Kowalska",

"Kowalska",

"Kowalski",

"Kowalski",

"Kowalski",

"Kowalski",

"Kowalski",

"Kowalski",

"Koziełło",

"Kozierowska",

"Kozikowski",

"Kozikowski",

"Koziorek",

"Kozłowski",

"Kożuro",

"Krajewska",

"Krajewski",

"Krajewski",

"Krajnik",

"Kramer",

"Kramer",

"Kraushar",

"Krauze",

"Krawczak-Sadowska",

"Krawczyk",

"Krempa",

"Krencisz",

"Kromska",

"Kromski",

"Kromski",

"Kromski",

"Królik",

"Królikowska",

"Krówka",

"Krueger",

"Kruger",

"Krupka",

"Kryczkiewicz",

"Krynicki",

"Kryński",

"Krystian",

"Kryszczyński",

"Kryszkiewicz",

"Krzywdziński",

"Krzywiak",

"Krzywiak",

"Krzywicki",

"Krzyżański",

"Krzyżański",

"Krzyżański",

"Ksobich",

"Kubala",

"Kubasiński",

"Kubiak",

"Kubicki",

"Kubicki",

"Kucharczyk",

"Kucharski",

"Kuciak",

"Kuczaj",

"Kuczkowski",

"Kuczyc",

"Kuhn",

"Kujawa",

"Kujawa",

"Kujawa",

"Kujawiński",

"Kujawiński",

"Kujawski",

"Kukulski",

"Kulesza",

"Kulesza",

"Kulesza",

"Kulesza",

"Kulpiński",

"Kulpiński",

"Kuncewicz",

"Kuncewicz",

"Kunikowski",

"Kunkel",

"Kurek",

"Kusnerz",

"Kusznierewicz",

"Kwaśniewska",

"Kwaśniewski",

"Kwaśniewski",

148,149,150,

"Kwaśniewski",

"Lachacz",

"Langner",

"Latosiński",

"Latosiński",

"Laudański",

"Lehman",

"Lehman",

"Leja",

"Lejmann",

"Leperowska",

"Leschke",

"Lesiński",

"Lesiuk",

"Lesman",

"Leśniak",

"Lewandowska",

"Lewandowska",

"Lewandowski",

"Lewandowski",

"Lewiński",

"Lewiński",

"Lewoniec",

"Lewtak",

"Lik",

"Lipko",

"Lisiecki",

"Lisowski",

"Liwska",

"Lorens",

"Lubawy",

"Ludwiczak",

"Łada",

"Łada",

"Łakota",

"Łakota",

"Łakomy",

"Łącki",

"Łączkowski",

"Łączny",

"Łożykowski",

"Łozowski",

"Łuczak",

"Łuczak",

"Łuczak",

"Łuczkowski",

"Łuczkowski",

"Łuczyński",

"Łukaszewicz",

"Łukaszewski",

"Łukaszyk",

"Łukomski",

"Łunkiewicz",

"Machińska",

"Machnicka",

"Maciejewski",

"Maćkowiak",

"Maćkowiak",

"Maćkowiak",

"Madaliński",

"Madaliński",

"Madaliński",

"Madejczyk",

"Majcherek",

"Majerczak",

"Majewicz",

"Majewski",

"Majewski",

"Majewski",

"Majkowski",

"Makarewicz",

"Makowski",

"Maksymiuk",

"Mala",

"Malinowski",

"Malinowski",

"Małecki",

"Małecki",

"Małecki",

"Małecki",

"Małek",

"Małek",

"Małkowska",

"Małyszka",

"Małyszka",

"Małyszka",

"Mańkowski",

"Mańkowski",

"Mański",

"Mański",

"Marcinek",

"Marciniak",

"Marcinkowski",

"Marcinowski",

"Marek",

"Markiewicz",

"Markiewicz",

"Marossanyi",

"Marszałek",

"Marzewski",

"Matczak",

"Matela",

"Maternik",

"Matla",

"Matuszak",

"Matuszak",

"Matuszczak",

"Matuszek",

"Matuszek",

"Matuszewski",

"Matuszyk",

"Matysiak",

"Maziarz",

"Mazurek",

"Mazurkiewicz",

"Mądroszyk",

"Mądrzak",

"Mąkowski",

"Meissner",

"Meissner",

"Mende",

"Miarzyński",

"Miarzyński",

"Miarzyński",

"Miączyński",

"Michalak",

"Michalak",

"Michalczyk",

"Michalczyk",

"Michalski",

"Michalski",

"Michalski",

"Michałek",

"Mielcarek",

"Mielcarek",

"Mikamanowicz",

"Mikinin",

"Mikołajczak",

"Mikołajczak",

"Mikołajczak",

"Mikulski",

"Milczarek",

"Milecki",

"Milska",

"Miller",

"Miłaszewicz",

"Minicki",

"Minkwitz",

"Mirosz",

"Misiaczek",

"Misiak",

"Miszta",

"Misztal",

"Młodystach",

"Moczorodyński",

103,105,117,118,137,145,

"Moczulski",

"Modrzewska",

"Mołas",

"Momont",

"Moncarz",

"Moore",

"Mostowski",

"Motała",

"Muchajew",

"Mularewicz",

"Mulczyńska",

"Mulczyńska",

"Mulczyński",

"Murlewski",

"Musialski",

"Musiał",

"Musielak",

"Musielak",

"Muszelska",

"Muszyński",

"Muszyński",

"Mydlarz",

"Myszczyszyn",

"Myszkowska-Chramiec",

"Myszkowski",

"Nachtmann",

"Najdrowska",

"Napierała",

"Neyman",

"Niedzielski",

"Niewiarowski",

"Niewolny",

"Nitecki",

"Nitschke",

"Nochowicz",

"Noetzel",

"Noetzel",

"Nowacki",

"Nowaczyk",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowak",

"Nowakowski",

"Nowakowski",

"Nowakowski",

"Nowicka",

"Nowicki",

"Nowicki",

"Nowicki",

"Nowicki",

"Nowoszyński",

"Obrębski",

"Obst",

"Offierski",

"Offierski",

"Ogórek",

"Okońska",

"Okoński",

"Okoński",

"Okupniak",

"Olchawski",

"Olbryś",

"Olejniczak",

"Olejniczak",

"Olejnik",

"Olejnik",

"Olejnik",

"Olejnik",

"Olewiński",

"Olszewski",

"Olszowy",

"Onyszkiewicz",

"Orkiszewski",

"Orlik",

"Orłowska",

"Orłowska",

"Orłowski",

"Ornaf",

"Ornatkiewicz",

"Orzepowska",

"Osiński",

"Osiński",

"Osmański",

"Ossowski",

"Ostojski",

"Ostrowicz",

"Ostrowska",

"Ostrowski",

"Ostrowski",

"Otlewski",

"Otto",

"Otto",

"Otto",

"Owczarzak",

"Owczarzak",

"Pacholczyk",

"Pachowicz",

"Pajączkowski",

"Pająk",

"Pajzderski",

"Paliwoda",

"Palka",

"Paluszkiewicz",

"Pałasz-Piasecka",

"Parfienowicz",

"Panasiuk",

"Panus",

"Paprocki",

"Partyka",

"Partyka",

"Pasiciel",

"Pasiek",

"Pastuszko",

"Paszczak",

"Paszkiewicz",

"Paszkowski",

"Patalas",

"Patalas",

"Patejuk",

"Pawelski",

"Pawlaczyk",

"Pawlaczyk",

"Pawlak",

"Pawlak",

"Pawlak",

"Pawlak",

"Pawlak",

"Pawlak",

"Pawlak",

"Pawlak",

"Pawłowicz",

"Pawłowicz",

"Pawłowska",

"Pawłowski",

"Pawłowski",

"Pazda",

"Peisert",

"Peisert",

"Penno",

"Perlicka",

"Perzewski",

"Pestka",

"Petrulis",

"Pędziński",

"Piasecki",

"Piasecki",

"Piątek",

"Piątek",

"Piątkowski",

"Pic",

"Pic",

"Pic",

"Pic",

"Piecha",

"Piechota",

"Piechota",

"Piechowiak",

"Piechowiak",

"Piechowski",

"Pieczarka",

"Piekarski",

"Piernicki",

"Pierwoła",

"Pierwoła",

"Pietkiewicz",

"Pietrucha",

"Pietrzak",

"Pietrzyk",

"Pilacki",

"Pilaczyński",

"Pinkowski",

"Piotrowski",

"Piotrowski",

"Piotrowski",

"Piotrowski",

"Piszczyk",

"Pituła",

"Płażewski",

"Płończak",

"Płończak",

"Podlawski",

"Podlawski",

"Podlewska",

"Podraza",

"Podziawa",

"Podziemski",

"Poklewski",

"Pokryszka",

"Pokryszka",

"Pokrywka",

"Pokrywka",

"Polaczyk",

"Polaczyk",

"Polaczyk",

"Polak",

"Polak",

"Polarowicz",

"Polaszewska",

"Polewacz",

"Polonis",

"Połasz-Piasecka",

"Pomianowicz",

"Pomianowicz",

"Pomorski",

"Popławski",

"Popłonyk",

"Porankiewicz",

"Powązka",

"Powiertowska",

"Powiertowski",

"Pracel",

"Prusińska",

"Pryba",

"Prządka",

"Przebitkowski",

"Przewoźny",

"Przybylak",

"Przybylski",

"Przybylski",

"Przybylski",

"Przybylski",

"Przybysławski",

"Przybysławski",

"Przybysz",

"Przynoga",

"Przynoga",

"Przysiecki",

"Ptaszyński",

"Puacz",

"Pucek",

"Pujszo",

"Pusielewicz",

"Pytel",

"Quado",

"Radomski",

"Radomski",

"Radomski",

"Radomski",

"Radziński",

"Rafalska",

"Rasiński",

"Ratajczak",

"Ratajczak",

"Ratajczak",

"Ratajczak",

"Ratajczak",

"Ratajczak",

"Ratajczak",

"Rega",

"Regen",

"Reichelt",

"Reichelt",

"Rejewski",

"Remiszewska",

"Reszelski",

"Rogacz",

"Rogiewicz",

"Rohde",

"Rohter",

"Rok",

"Rokosz",

"Romanowski",

"Rosiński",

"Rosiński",

"Rosiński",

"Rosochowicz",

"Roszkiewicz",

"Rozmarynowicz",

"Rozwadowski",

"Rowecka",

"Rowecki",

"Rowecki",

"Rotnicki",

"Rotnicki",

"Rozwadowski",

"Różański",

"Różański",

"Ruchaj",

"Ruchaj",

"Ruchaj",

"Rudzki",

"Rupiewicz",

"Ruszczyński",

"Ruszczyński",

"Ruszczyński",

"Ruszkiewicz",

"Ruth",

"Rutkiewicz",

"Rutkowski",

"Ruwińska",

"Rybacki",

"Rybarczyk",

"Rymer",

"Rymkiewicz",

"Rzegociński",

"Rzemyszkiewicz",

"Rzemyszkiewicz",

"Rzemyszkiewicz",

"Rzepka",

"Saban",

"Sadłmi",

"Sadowska",

"Saj",

"Sak",

"Sarbok",

"Sawicki",

"Sawicki",

"Sawicki",

"Sawko",

"Sadowska",

"Sadowski",

136,144,

"Sadowski",

"Sałaciak",

"Samelak",

"Sandorski",

"Sawostjanik",

"Schumacher",

"Sczaniecki",

"Sczaniecki",

"Sczaniecki",

"Schiller",

"Schiller",

"Schoop",

"Schubert",

"Schubert",

"Schumacher",

"Sendlewski",

"Senkyr",

"Serafin",

"Serafinowska",

"Serkies",

"Seroczyński",

"Sibilski",

"Sibilski",

"Sieczkowski",

"Sieczkowski",

"Siedlecki",

"Siedlewski",

"Sierpina",

"Sierpowski",

"Sierpowski",

"Sierszeński",

"Sierzchuła",

"Sikora",

"Sikorska",

"Sikorsk",

"Sikorski",

"Silkowski",

"Silski",

"Silski",

"Simm",

"Sinuta",

"Skalisz",

"Skarbiński",

"Skarbiński",

"Skibicki",

"Skibińska",

"Skibiński",

"Skład",

"Skopiak",

"Skotnicki",

"Skowroński",

"Skowroński",

"Skowroński",

"Skowroński",

"Skręty",

"Skrobacka",

"Skrzypczak",

"Skrzypczak",

"Skrzypczak",

"Skrzypczak",

"Skubiński",

"Skubis",

"Skupniewicz",

"Skrukwa",

"Skrukwa",

"Skrzypczak",

"Skrzypek",

"Skrzypiec",

"Słodecka",

"Słodecki",

"Słodecki",

"Słomiak",

"Słomiński",

"Słupiński",

"Służewski",

"Smól",

"Smól",

"Smólski",

"Sobczak",

"Sobczak",

"Sobczak",

"Sobecki",

"Sobkowiak",

"Sobkowiak",

"Sobkowiak",

"Solak",

"Sołtys",

"Sołtysik",

"Sommerfeld",

"Sośnik",

"Sprecht",

"Sprengel",

"Spychała",

"Sroczyński",

"Stachowiak",

"Stachowiak",

"Stachowiak",

"Stanek",

"Stanisławski",

"Stanisławski",

"Stanisławski",

"Staniszewski",

"Staniszewski",

"Staniul",

"Stankowiak",

"Stankowiak",

"Stankowska",

"Stanowski",

"Stapf",

"Stasiak",

"Stasiak",

"Staszak",

"Stawniak",

"Stefaniak",

"Stefaniak",

"Stefaniak",

"Stefański",

"Stefański",

"Stefański",

"Stefański",

"Sternal",

"Sternal",

"Stęszewska",

"Stobiecki",

"Stobiński",

"Stobiński",

"Stodolny",

"Stolarski",

"Stróżyk",

"Strumnik",

"Stryczyński",

"Stryczyński",

"Strzałkowski",

"Strząpka",

"Strzeżek",

"Strzyżewska",

"Strzyżewski",

"Strzyżowski",

"Strzyżowski",

"Strzyżowski",

"Strzyżowski",

"Suchocka",

"Sulczyńska",

"Sumiński",

"Surma",

"Surman",

"Swinarski",

"Sykuła",

"Sypniewski",

"Szadziewski",

"Szajek",

"Szamowski",

"Szanel",

"Szarek",

"Szczepiński",

"Szczerba",

"Szczot",

"Szczyglewski",

"Szebiotko",

"Szeląg",

"Szefler",

"Szefler",

"Szeib",

"Sziłajtis",

"Szlachetka",

"Szloser",

"Szmeja",

"Szmeja",

"Szmeja",

"Szmidt",

"Szmyt",

"Szmyt",

"Szmyt",

"Szmyt",

"Szmyt",

"Szmyt",

"Szostak",

"Szpajer",

"Szpajer",

"Szpetulski",

"Szpytka",

"Szraj",

"Sztuba",

"Szulc",

"Szumowski",

"Szybanow",

"Szyc",

"Szydło",

"Szydłowski",

"Szyfter",

"Szyfter",

"Szyfter",

"Szymankowska",

"Szymanowska",

"Szymańska",

"Szymański",

"Szymański",

"Szymański",

"Szymański",

"Szymkiewicz",

"Szymkowiak",

"Szymkowiak",

"Szymkowiak",

"Szymot",

"Szypulski",

"Ściernicki",

"Ściernicki",

"Ściernicki",

"Ściernicki",

"Śliwiński",

"Śliwiński",

"Śliwiński",

"Śliwocki",

"Śmigiel",

"Śmigielski",

"Śniadek",

"Śniadek",

"Śniegowski",

"Śron",

"Świderski",

"Świtała",

"Świtek",

"Świątek",

"Tamm",

"Targowski",

"Tarnacki",

"Tarnowska",

"Tarnowski",

"Terlikowski",

"Terlikowski",

"Tokarski",

"Tomalak",

"Thomas",

"Tomala",

"Tomaszewski",

"Tomaszewski",

"Tomaszewski",

"Tomczak",

"Tomczak",

"Tomczak",

"Tomczak",

"Tomczak",

"Toporek",

"Toporek",

"Trapszo",

"Trębacz",

"Trocha",

"Truchanowicz",

"Tryba",

"Tryba",

"Tryba",

"Tryniak",

"Trzciński",

"Trzciński",

"Trzeciakowski",

"Trzeciakowski",

"Trzpis",

"Tuliszka",

"Turtoń",

"Tuszyński",

"Tuziak",

"Twardowski",

"Twardowski",

"Tworowski",

"Tyka",

"Tylicki",

"Tylkowski",

"Tynalewski",

"Tyrchan",

"Tyrcz",

"Tyszka",

"Tyszka",

"Tyżyk",

"Ujczak",

"Ukleja",

"Unierzyski",

"Urban",

"Urbanek",

"Urbanek",

"Urbanek",

"Urbaniak",

"Urbaniak",

"Urbaniak",

"Urbaniak",

"Uszyło",

"Valesova",

"Vater",

"Vejvoda",

"Vorbrich",

"Wachholz",

"Wagner",

"Wajnor",

"Wajnor",

"Walczak",

"Walczak",

"Walewski",

"Walich",

"Walich",

"Waliński",

"Waliszka",

"Walusz",

"Walusz",

"Walusz",

"Wanat",

"Warchoł",

"Wasielewski",

"Wasilewska",

"Wasilewska",

"Wasilewski",

"Waszkiewicz",

"Waśkowiak",

"Wawrzyniak",

"Wawrzyniak",

"Weber",

"Wencewicz",

"Wenda",

"Wendzonka",

"Werner",

"Wesołowski",

"Wieczorek",

"Wieczorek",

"Wieczorek",

"Wieczorek",

"Wieczorek",

"Wieloch",

"Wiereńko",

"Wierszołowicz",

"Wierzbicki",

"Wierzbiński",

"Wietrzyński",

"Wilczek",

"Wilczyński",

"Wiliński",

"Winkler",

"Winkowski",

"Winkowski",

"Winny",

"Wirga",

"Wirga",

"Wiśniewski",

"Wiśniewski",

"Wiśniewski",

"Wiśniewski",

"Witczak",

"Witczak",

"Witczak",

"Witkowski",

"Witkowski",

"Witt",

"Wittke",

"Wiza",

"Włoch",

"Włoch",

"Włodarczyk",

"Wnuk",

"Woch",

"Wociak",

"Wojciechowski",

"Wojciechowski",

"Wojciechowski",

"Wojciechowski",

"Wocko",

"Wojewoda",

"Wojtalik",

"Wojtera",

"Wojtera",

"Wojtowicz",

"Wolf",

"Wollf",

"Wolniewicz",

"Wolniewicz",

"Wolski",

"Woltyński",

"Wosicki",

"Wosiński",

"Woś",

"Wożniak",

"Woźniak",

"Woźniak",

"Woźniak",

"Woźniak",

"Wójcicka",

"Wójcik",

"Wrona",

"Wróbel-Bartkowiak",

140,145,148,

"Wróbel",

"Wróblewski",

"Wudarska",

"Wydarkiewicz",

"Wypych",

"Wysocka",

"Wysocka",

"Wysocki",

"Wyspiański",

"Wyszkowski",

"Wyszyński",

"Zabłocka",

"Zabłocki",

"Zabłocki",

"Zabłocki",

"Zacharias",

"Zacharow",

"Zając",

"Zakrzewska",

"Zakrzewski",

"Zakrzewski",

"Zalewska",

"Zalewski",

"Zamiar",

"Zamorski",

"Zamroz",

"Zaremba",

"Zaremba",

"Zarzeczański",

"Zarzycka",

"Zarzycki",

"Zastawny",

"Zawalski",

"Zawirski",

"Zawitaj",

"Zawodniak",

"Zątek",

"Zbierska",

"Zbierski",

"Zboralski",

"Zdunik",

"Zdunik",

"Zdzieszyński",

"Zdzieszyński",

"Zembrzuski",

"Zielazek",

"Zielazek",

"Zielazek",

"Zielenkiewicz",

"Zielińska",

"Zieliński",

"Zieliński",

"Zieliński",

"Zieliński",

"Zieliński",

"Zielniewicz",

"Zielnik",

"Zielonka",

"Ziemiański",

"Zimny",

"Zimny",

"Zinner",

"Znaniecka",

"Zoellner",

"Zoellner",

"Zuber",

"Zwierzchowski",

"Zyk",

"Zyg",

"Zys",

"Zys",

"Żabokliński",

"Żeberska",

"Żeberska",

"Żeberski",

"Żmich",

"Żołnierkiewicz",

"Żółtowska",

"Żuk",

"Żukowski",

"Żukowski"
);


$states = array("Dolnośląskie", "Kujawsko -Pomorskie", "Lubelskie", "Lubuskie", "Łódzkie", "Małopolskie", "Mazowiedzkie", "Opolskie", "Podkarpackie", "Podlaskie", "Pomorskie", "Śląskie", "Świętokrzyskie", "Warmińsko - Mazurskie", "Wielkopolskie", "Zachodnio-Pomorskie");
$times = array("W tym momencie", "Ponad minutę teamu", "Mniej niż godzinę temu", "Nie dalej niż dobę", "W tym tygodniu");

if ($result->num_rows > 0) {
    echo "<table class='activityTable'><tbody>";
    while ($row = $result->fetch_assoc()) {
        $state = $states[array_rand($states)];
        $time = $times[array_rand($times)];
        $name = $names[array_rand($names)];
        echo "<tr><td>" . $time . "</td><td><span class='name'> " . $row['imie'] . " " . $name . "</span><span class='state'>" . $state . "</span><br><a href='/petycje/" . $row['title_url'] . ".html' title='" . $row['title'] . "'><span class='title'>" . $row['title'] . "</span></a></td></tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 results";
}
$conn->close();
