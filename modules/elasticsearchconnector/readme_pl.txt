# elasticsearchconnector
Łącznik umożliwiający Prestashop korzystanie z potężnego i darmowego ślinika wyszukiwanie Elasticsearch. Przeszukuj 100 000+ produktów w kilka milisekund!

## ABOUT
Ten moduł umożliwia dostęp do Elastcisearch który jest darmowym serwerem wyszukiwania i udostępnia wielowątkowy pełno-tekstowy silnik wyszukiwania.

## SUPPORTED PRESTASHOP VERSIONS
1.6.X - 1.7.X

## FEATURES:
- wsparcie dla wyszukiwania z użyciem korekcji błędów
- wsparcie wagi pól dla okreslenia ważności poszczególnych danych
- wsparcie do 3ch węzłów serwerów będących w klastrze
- logowanie elasticsearch na wszystkich dostępnych poziomach logów
- wsparcie automatycznego indeksowania po dodaniu/edycji/duplikacji produktu
- wsparcie dla indeksowania zdefiniowanego w tablicy cron
- ręczne indeksowanie uruchamiane w tle wraz z ochroną przed zbyt długą praca na wolnych serwerach
- linki indeksujące dla cron gotowe do użycia w 'Cron task manager'
- wsparcie dla pełnej przebudowy indeksu lub dodania tylko brakujączych produktów do indeksu
- działa ze wszystkimi metodami wyszukiwania PrestaShop takimi jak:
a) normalne wyszukiwanie
b) wyszukiwanie ajax
c) natychmiastowe wyszukiwanie
- wspiera zaawansowaną konfigurację indeksowania w postaci tekstu json
- wspiera zaawansowaną konfigurację wyszukiwania w postaci tekstu json
- tworzy wiele indeksów oddzielnie dla każdego skonfigurowanego sklepu i języka
- pobiera jako początkowe ustawienia dotychczas skonfigurowane opcje wyszukiwanie takie jak:
a) Dokładne dopasowanie
b) Minimalna długość wyrazu
c) Zakazane wyrazy
d) Wagi pól

## INSTALLATION
1. Instalacja Elasticsearch
- Pobierz elasticsearch
- Uruchom proces elasticsearch
2. Instalacja ElasticsearchConnector
- Moduł jest instalowany w standardowy sposób jak wszystkie inne moduły.
Proszę zwrócić uwagę, iż moduł ten używa plików z katalogu override /override/classes/Search.php
Środowisko serwera powinno posiadać uprawnienia dla użytkownika http w celu nadpisania tego pliku.
3. Skonfiguruj ElasticsearchConnector
4. Rozpocznij proces pełnej regeneracji indeksu klikając "Regeneruj teraz"

## CONFIGURATION:
Główne ustawienia 
1. Host 1 
- Pierwszy węzeł serwera elasticsearch (domyślnie: http://localhost:9200)
2. Host 2 
- Drugi węzeł serwera elasticsearch (domyślnie: pusty)
3. Host 3 
- Trzeci węzeł serwera elasticsearch (domyślnie: pusty)
4. Logowanie 
- Włącza lub wyłącza logowanie elasticshearch (domyślnie: wyłączony)
5. Ścieżka pliku logowania
- Ścieżka do pliku używanego przez elasticsearch do zapisywania logów (domyślnie: [MODULE DIR]/log/log.txt)
Proszę zwrócić uwagę aby plik był dostępny do zapisu
6. Poziom logowania
- Typ informacji zapisywany do pliku logowania przez elasticsearch (domyślnie: INFO)

Parametry Indeksowania
Proszę zwrócić uwagę iż zmiana jakiegokolwiek ustawienia w tej grupie wymaga pełnej regeneracji indeksu.
1. Nazwa przedmiotu
- Włącza lub wyłącza indeksowania nazwy przedmiotu
2. Referencja przedmiotu
- Włącza lub wyłącza indeksowania referencji przedmiotu
3. Krótki opis przedmiotu
- Włącza lub wyłącza indeksowania krótkiego opisu przedmiotu
4. Opis przedmiotu 
- Włącza lub wyłącza indeksowania opisu przedmiotu
5. Nazwa kategorii
- Włącza lub wyłącza indeksowania nazwy kategorii
6. Nazwa producenta
- Włącza lub wyłącza indeksowania nazwy producent
7. Nazwa dostawcy
- Włącza lub wyłącza indeksowania nazwy dostawców
8. Tag
- Włącza lub wyłącza indeksowania tagów
9. Atrybut produktu
- Włącza lub wyłącza indeksowania atrybutów produktu
10. Cechy produktu
- Włącza lub wyłącza indeksowania cech produktu
12. EAN13 produktu
- Włącza lub wyłącza indeksowania EAN13 produktu
13. Wyłączony ElasticSearch podczas indeksowania
- Włącza lub wyłącza domyślny silnik wyszukiwania PrestaShop podczas gdy proces pełnej regenracji indexu ElasticSearch jest w trakcie działania.

Ustawienia indeksowania
Proszę zwrócić uwagę iż zmiana jakiegokolwiek ustawienia w tej grupie wymaga pełnej regeneracji indeksu. 
1. Zaawansowane
- Włącza lub wyłącze zaawansowane ustawienia indeksacji (tylko dla zaawansowanych użytkowników elasticsearch)
Gdy opcja jest włączona wszystkie pola z tej części formularza zostają ukrytę a pole tekstowe z kodem json pozostaje widoczne.
W polu tym możesz skonfigurować wszystkie dostepne funkcje indeksowania które serwer elasticsearch może Tobie udostępnić.
Więcej na temat zaawansowanej konfiguracji indeksacji można znaleźć w dokumentacji serwera elasticsearch
2. Minimalna długość wyrazu
-  Minimalna długość wyrazu używana podczas indeksacji (domyślnie: 3)
3. Maksymalna długość wyrazu
-  Maksymalna długość wyrazu używana podczas indeksacji (domyślnie: 255)
4. Dokładne dopasowanie 
- Włącza lub wyłącza wyszukiwanie wewnątrz całego wyrazu a nie tylko dokładne dopasowanie.
5. Zablokowane wyrazy
- Definiuje listę wyrazów które będą pomijane podczas indeksowania.
Każdy wyraz powinien zostać oddzielony znakiem |

Ustawienia wyszukiwania 
1. Zaawansowane
- Włącza lub wyłącza zaawansowane ustawienia wyszukiwania (tylko dla zaawansowanych użytkowników elasticsearch)
Gdy opcja jest włączona wszystkie pola z tej części formularza zostają ukrytę a pole tekstowe z kodem json pozostaje widoczne.
W polu tym możesz skonfigurować wszystkie dostepne funkcje wyszukiwania które serwer elasticsearch może Tobie udostępnić.
Więcej na temat zaawansowanej konfiguracji wyszukiwania można znaleść w dokumentacji serwera elasticsearch
2. Operator szukania
- Ustawia operator szukania w przypadku łączenia wyszukiwanych wyrażeń (domyślnie: AND)
3. Inteligentne wyszukiwanie
- Włącza lub wyłącza inteligentne wyszukiwanie które jest korekcją literówek i błędów ortograficznych
4. Waga nazwy przedmiotu
- Wartość liczbowa określająca ważność nazwy przedmiotu
5. Waga referencji przedmiotu
- Wartość liczbowa określająca ważność referencji przedmiotu
6. Waga krótkiego opis przedmiotu
- Wartość liczbowa określająca ważność krótkeigo opisu przedmiotu
7. Waga opisu przedmiotu 
- Wartość liczbowa określająca ważność opisu przedmiotu
8. Waga nazwy kategorii
- Wartość liczbowa określająca ważność nazwy kategorii
9. Waga nazwy producenta
- Wartość liczbowa określająca ważność nazwy producent
10. Waga nazwy dostawcy
- Wartość liczbowa określająca ważność nazwy dostawcy
11. Waga tagu
- Wartość liczbowa określająca ważność tagu
12. Waga atrybutu produktu
- Wartość liczbowa określająca ważność atrubutu produktu
13. Waga cechy produktu
- Wartość liczbowa określająca ważność cechy produktu
14. Waga EAN13 produktu
- Wartość liczbowa określająca ważność EAN13 produktu

Indeksacja
Możesz znaleść tutaj interesujące informacje na temat procesu indeksowania.
Ta sekca udostępnia również przyciski i linki do przebudowy całego indeksu lub dodania brakujących produktów do indeksu.
1. Indeksacja
- To jest podstawowe ustawienie PrestaShop dodane do Elasticsearchconnectro aby wszystkie powiązane ustawienia były w jednym miejscu.
Jest to dokładnie ten sam przełącznik który można znaleść w 'Ustawienia' -> 'Wyszukiwanie'
Pozwala on na włączenie lub wyłączenia automatycznego indeksowanie produktów po każdym zapisie.

## THE BENEFITS FOR MERCHANTS
Handlowiec otrzymuje dostęp do potężnych funkcji serwera wyszukiwania tekstu takich jak autouzupełnianie, trzon wyrazu, fonetyka, synonimy oraz wiele wiele innych funkcji elasticsearch.
Porzez włączenia inteligentnego wyszukiwania ten moduł zredukuje liczbę wyszukiwań wykonanych przez klientów których wynik zwróci 0 przedmiotów z powodu błędów orograficznych lub literówek.

## THE BENEFITS FOR CUSTOMERS
Klienci dostaną najlepiej dopasowane produkty w jak najkrótszym czasie korzystając z potężnego serwera wyszukiwania tekstu
Porzez włączenia inteligentnego wyszukiwania Twoi klienci otrzymają najlepiej dopasowane produkty w przypadku gdy oryginalnie wpisana do wyszukiwania frazę zwróci 0 produktów.
Ta cecha będzie bardzo użyteczna dla Twoich klientów ponieważ będzie korygować błędy popełniane przez nich podczas wyszukiwania.

## KEYWORDS
elastic, serwer, text, full-text, wyszukiwanie, korekta, autokorekta, orografia, literówki, elasticsearch 

## DEMO
http://demo.prestawach.info/admin_dev/
demo@demo.com / demodemo