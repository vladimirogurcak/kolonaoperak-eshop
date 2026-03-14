## SERVER
```bash
ssh root@147.93.63.203
```

### BIKELEASING.SK
```bash
scp ./_bikeleasing-sk/wpallimport/functions.php root@147.93.63.203:/home/user/web/bikeleasing.sk/public_html/wp-content/uploads/wpallimport
scp ./_bikeleasing-sk/wpallexport/functions.php root@147.93.63.203:/home/user/web/bikeleasing.sk/public_html/wp-content/uploads/wpallexport
```

### KOLONAOPERAK.CZ
```bash
scp ./_kolonaoperak-cz/wpallimport/functions.php root@147.93.63.203:/home/user/web/kolonaoperak.cz/public_html/wp-content/uploads/wpallimport
scp ./_kolonaoperak-cz/wpallexport/functions.php root@147.93.63.203:/home/user/web/kolonaoperak.cz/public_html/wp-content/uploads/wpallexport
```


### AYVENSBIKE.SK
```bash
scp ./_ayvensbike-sk/wpallimport/functions.php root@147.93.63.203:/home/user/web/ayvensbike.sk/public_html/wp-content/uploads/wpallimport
scp ./_ayvensbike-sk/wpallexport/functions.php root@147.93.63.203:/home/user/web/ayvensbike.sk/public_html/wp-content/uploads/wpallexport
```

### AYVENSBIKE.CZ
```bash
scp ./_ayvensbike-cz/wpallimport/functions.php root@147.93.63.203:/home/user/web/ayvensbike.cz/public_html/wp-content/uploads/wpallimport
scp ./_ayvensbike-cz/wpallexport/functions.php root@147.93.63.203:/home/user/web/ayvensbike.cz/public_html/wp-content/uploads/wpallexport
```


### ctm bikes
python3 xml_filter.py ./ctm-bikes.xml ./ctm-bikes-filtered.xml "//Item[Category1[not(contains(.,'Kids'))] and MOCCZK > 50000 and Disposition = 'true']"
python3 xml_to_excel.py ./ctm-bikes/ctm-bikes-filtered.xml ./ctm-bikes/ctm-bikes

### radotin
python3 xml_filter.py ./SKIBIKE/SKIBIKE.xml ./SKIBIKE/SKIBIKE-filtered.xml "//SHOPITEM[PRICE_ORIGINAL[1] > 30000"
python3 xml_to_excel.py ./SKIBIKE/SKIBIKE-filtered.xml ./SKIBIKE/SKIBIKE

### crussis
python3 xml_filter.py ./CRUSSIS/CRUSSIS.xml ./CRUSSIS/CRUSSIS-filtered.xml "//SHOPITEM[CATEGORYTEXT[1][contains(.,"Elektrokola")]]"
python3 xml_to_excel.py ./CRUSSIS/CRUSSIS-filtered.xml ./CRUSSIS/CRUSSIS

### SKIBIKE
python3 xml_to_excel.py ./SKIBIKE/SKIBIKE.xml ./SKIBIKE/SKIBIKE

### Aspire
python3 xml_filter.py ./aspire/aspire-heureka-sk.xml ./aspire/aspire-heureka-sk-filtered.xml '//SHOPITEM[PRICE_VAT[1] >= 2000 and STOCK_QUANTITY[1] > 0 and ((MANUFACTURER[1] = "CANNONDALE kola a rámy" and CATEGORYTEXT[1][contains(.,"Cannondale kola")]) or (MANUFACTURER[1] = "GT kola a rámy" and CATEGORYTEXT[1][contains(.,"GT kola")])) and CATEGORYTEXT[1][not(contains(.,"Rámy a vidlice"))] and CATEGORYTEXT[1][not(contains(.,"Dětská"))]]'

### Shindler sk
python3 xml_filter.py ./schindler/schindler-sk.xml ./schindler/schindler-sk-filtered.xml '//SHOPITEM[CUSTOMER_PRICE[1] >= 2000 and STOCK_ITEM[1] > 0 and (starts-with(CATEGORYTEXT[1], "Bicykle") or starts-with(CATEGORYTEXT[1], "Elektrobicykle"))]'
python3 xml_to_excel.py ./schindler/schindler-sk-filtered.xml ./schindler/schindler

### Schindler cz
python3 xml_filter.py ./schindler/schindler-cz.xml ./schindler/schindler-cz-filtered.xml '//SHOPITEM[CUSTOMER_PRICE[1] >= 50000 and STOCK_ITEM[1] > 0 and (starts-with(CATEGORYTEXT[1], "Jízdní kola") or starts-with(CATEGORYTEXT[1], "Elektrokola"))]'

python3 xml_filter.py ./schindler/schindler-cz.xml ./schindler/schindler-cz-filtered-2.xml '//SHOPITEM[CUSTOMER_PRICE[1] >= 50000 and (STOCK_ITEM[1] > 0 or sum(WAREHOUSES/WAREHOUSE/QUANTITY/VALUE) > 0) and (starts-with(CATEGORYTEXT[1], "Jízdní kola") or starts-with(CATEGORYTEXT[1], "Elektrokola"))]'

python3 xml_to_excel.py ./schindler/schindler-cz-filtered.xml ./schindler/schindler

### Bikeicon sk
python3 xml_filter.py ./bikeicon/bikeicon-sk.xml ./bikeicon/bikeicon-sk-filtered.xml '//SHOPITEM[CUSTOMER_PRICE[1] >= 2000 and STOCK_ITEM[1] > 0 and (starts-with(CATEGORYTEXT[1], "Bicykle") or starts-with(CATEGORYTEXT[1], "Elektrobicykle"))]'
python3 xml_to_excel.py ./bikeicon/bikeicon-sk-filtered.xml ./bikeicon/bikeicon

### Bikeicon cz
python3 xml_filter.py ./bikeicon/bikeicon-cz.xml ./bikeicon/bikeicon-cz-filtered.xml '//SHOPITEM[CUSTOMER_PRICE[1] >= 50000 and STOCK_ITEM[1] > 0 and (starts-with(CATEGORYTEXT[1], "Jízdní kola") or starts-with(CATEGORYTEXT[1], "Elektrokola"))]'
python3 xml_to_excel.py ./bikeicon/bikeicon-cz-filtered.xml ./bikeicon/bikeicon