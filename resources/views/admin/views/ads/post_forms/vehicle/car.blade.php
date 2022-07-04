<script>
    function change_make(value){
        models = [];
        switch (value) {
            case 'Other':
                models=['other'];
                break;
            case 'Abarth':
                models = ['500','500C','Grande Punto','Punto Evo'];
                break;
            case 'Acura':
                models = ['MDX','NSX','RL','RSX','TL','TSX'];
                break;
            case 'Aixam':
                models = ['City','Crossline','Roadline','Scouty R'];
                break;
            case 'Alfa Romeo':
                models = ['8C','Alfa 145','Alfa 146','Alfa 147','Alfa 155','Alfa 156','Alfa 159','Alfa 164','Alfa 166','Alfa 33','Alfa 75','Alfa 90','Alfasud','Alfetta','Brera','Crosswagon','Giulia','Giulietta','GT','GTV','Junior','MiTo','Spider','Sprint'];
                break;
            case 'Alpina':
                models = ['B10','B12','B3','B5','B6','B7','B8','D 10','D3','D5','Roadster S','XD3'];
                break;
            case 'Andere':
                models = [];
                break;
            case 'Artega':
                models = ['GT'];
                break;
            case 'Asia Motors':
                models = ['Rocsta'];
                break;
            case 'Aston Martin':
                models = ['AR1','Cygnet','DB','DB7','DB9','DBS','Lagonda','Rapide','V12 Vantage','V8 Vantage','Vanquish','Virage'];
                break;
            case 'Audi':
                models = ['100','200','80','90','A1','A2','A3','A4','A4 Allroad','A5','A6','A6 Allroad','A7','A8','Cabriolet','CoupÃ©','Q3','Q5','Q7','QUATTRO','R8','RS2','RS3','RS4','RS5','RS6','RS7','S2','S3','S4','S5','S6','S7','S8','SQ5','TT','TT (All)','TT RS','TTS','V8'];
                break;
            case 'Austin':
                models = [];
                break;
            case 'Austin Healey':
                models = [];
                break;
            case 'Bentley':
                models = ['Arnage','Azure','Brooklands','Continental','Continental (All)','Continental Flying Spur','Continental GT','Continental GTC','Continental Supersports','Eight','Mulsanne','Turbo R','Turbo RT','Turbo S'];
                break;
            case 'BMW':
                models = ['114','116','118','120','123','125','130','135','2002','315','316','318','318 Gran Turismo','320','320 Gran Turismo','323','324','325','328','328 Gran Turismo','330','335','335 Gran Turismo','420','428','430','435','518','520','520 Gran Turismo','523','524','525','528','530', '530 Gran Turismo','535','535 Gran Turismo','540','545','550','550 Gran Turismo','628','630','633','635','640','645','650','725','728','730','732','735','740','745','750','760','840','850','ActiveHybrid 3','ActiveHybrid 5','ActiveHybrid 7','ActiveHybrid X6','i3','M Models (All)','M135','M3','M5','M6','Series 1 (All)','Series 3 (All)','Series 4 (All)','Series 5 (All)','Series 6 (All)','Series 7 (All)','Series X (All)','Series Z (All)','X1','X3','X5','X5 M','X5 M','X6','X6 M','X6 M','Z1','Z3','Z3 M','Z3 M','Z4','Z4 M','Z4 M','Z8'];
                break;
            case 'Borgward':
                models = [];
                break;
            case 'Brilliance':
                models = ['BC3','BS2','BS4','BS6'];
                break;
            case 'Bugatti':
                models = ['EB 110','Veyron'];
                break;
            case 'Buick':
                models = ['Century','Electra','Enclave','La Crosse','Le Sabre','Park Avenue','Regal','Riviera','Roadmaster','Skylark'];
                break;
            case 'Cadillac':
                models = ['Allante','ATS','BLS','CTS','Deville','Eldorado','Escalade','Fleetwood','Seville','SRX','STS','XLR'];
                break;
            case 'Casalini':
                models = [];
                break;
            case 'Caterham':
                models = [];
                break;
            case 'Chevrolet':
                models = ['2500','Alero','Astro','Avalanche','Aveo','Beretta','Blazer','C1500','Camaro','Caprice','Captiva','Cavalier','Chevelle','Chevy Van','Citation','Colorado','Corsica','Cruze','El Camino','Epica','Evanda','Express','G','HHR','Impala','K1500','K30','Kalos','Lacetti','Lumina','Malibu','Matiz','Nubira','Orlando','Rezzo','S-10','Silverado','Spark','SSR','Suburban','Tahoe','Trailblazer','Trans Sport','Trax','Venture','Volt' ];
                break;
            case 'Chrysler':
                models = ['300 M','300C','Aspen','Crossfire','Daytona','ES','Grand Voyager','GS','GTS','Imperial','Le Baron','Neon','New Yorker','Pacifica','PT Cruiser','Saratoga','Sebring','Stratus','Valiant','Viper','Vision','Voyager'];
                break;
            case 'Citro':
                models = ['2 CV','AX','Berlingo','BX','C-Crosser','C-Zero','C1','C2','C3','C3 Picasso','C4','C4 Aircross','C4 Picasso','C5','C6','C8','CX','DS','DS3','DS4','DS5','Evasion','Grand C4 Picasso','GSA','Jumper','Jumpy','Nemo','SAXO','SM','Visa','Xantia','XM','Xsara','Xsara Picasso','ZX'];
                break;
            case 'Cobra':
                models = [];
                break;
            case 'Corvette':
                models = ['C1','C2','C3','C4','C5','C6','C7','Z06','ZR 1'];
                break;
            case 'Dacia':
                models = ['Dokker','Duster','Lodgy','Logan','Logan Pick-Up','Pick Up','Sandero'];
                break;
            case 'Daewoo':
                models = ['Espero','Evanda','Kalos','Korando','Lacetti','Lanos','Leganza','Matiz','Musso','Nexia','Nubira','Rezzo','Tacuma'];
                break;
            case 'Daihatsu':
                models = ['Applause','Charade','Charmant','Copen','Cuore','Feroza/Sportrak','Freeclimber','Gran Move','Hijet','MATERIA','Move','Rocky/Fourtrak','Sirion','Terios','TREVIS','YRV'];
                break;
            case 'DeTomaso':
                models = ['GuarÃ',',Pantera'];
                break;
            case 'Dodge':
                models = ['Avenger','Caliber','Challenger','Charger','Dakota','Demon','Durango','Grand Caravan','Hornet','Journey','Magnum','Neon','Nitro','RAM','Stealth','Viper'];
                break;
            case 'Ferrari':
                models = ['208','246','250','275','288','308','328','330','348','360','365','400','412','456','458','512','550','575','599 GTB','612','750','California','Daytona','Dino GT4','Enzo Ferrari','F12','F355','F40','F430','F50','FF','LaFerrari','Mondial','Superamerica','Testarossa'];
                break;
            case 'Fiat':
                models = ['124','126','127','130','131','500','500C','500L','Barchetta','Brava','Bravo','Cinquecento','Coupe','Croma','Dino','Doblo','Ducato','Fiorino','Freemont','Grande Punto','Idea','Linea','Marea','Marengo','Multipla','New Panda','Palio','Panda','Punto','Punto Evo','Qubo','Regata','Ritmo','Scudo','Sedici','Seicento','Spider Europa','Stilo','Strada','Tempra','Tipo','Ulysse','Uno','X 1/9'];
                break;
            case 'Fisker':
                models = ['Karma'];
                break;
            case 'Ford':
                models = ['Aerostar','B-Max','Bronco','C-Max','Capri','Cougar','Courier','Crown','Econoline','Econovan','Edge','Escape','Escort','Excursion','Expedition','Explorer','Express','F 150','F 250','F 350','Fairlane','Falcon','Fiesta','Flex','Focus','Fusion','Galaxy','Granada','Grand C-Max','GT','Ka','Kuga','Maverick','Mercury','Mondeo','Mustang','Orion','Probe','Puma','Ranger','S-Max','Scorpio','Sierra','Sportka','Streetka','Taunus','Taurus','Thunderbird','Tourneo','Transit','Transit (All)','Transit Connect','Windstar'];
                break;
            case 'GMC':
                models = ['Acadia','Envoy','Safari','Savana','Sierra','Sonoma','Syclone','Typhoon','Vandura','Yukon'];
                break;
            case 'Grecav':
                models = ['Sonique'];
                break;
            case 'Hamann':
                models = [];
                break;
            case 'Holden':
                models = [];
                break;
            case 'Honda':
                models = ['Accord','Aerodeck','Civic','Concerto','CR-V','CR-Z','CRX','Element','FR-V','HR-V','Insight','Integra','Jazz','Legend','Logo','NSX','Odyssey','Prelude','S2000','Shuttle','Stream'];
                break;
            case 'Hummer':
                models = ['H1','H2','H3'];
                break;
            case 'Hyundai':
                models = ['Accent','Atos','Azera','Coupe','Elantra','Excel','Galloper','Genesis','Getz','Grandeur','H 100','H 200','H-1','H-1 Starex','i10','i20','i30','i40','i50','ix20','ix35','ix55','Lantra','Matrix','Pony','S-Coupe','Santa Fe','Santamo','Sonata','Terracan','Trajet','Tucson','Veloster','Veracruz','XG 30','XG 350'];
                break;
            case 'Infiniti':
                models = ['EX35','EX37','FX','G35','G37','M30','M35','M37','Q45','QX56'];
                break;
            case 'Isuzu':
                models = ['Campo','D-Max','Gemini','Midi','PICK UP','Trooper'];
                break;
            case 'Iveco':
                models = ['Massif'];
                break;
            case 'Jaguar':
                models = ['Daimler','E-Type','F-Type','MK II','S-Type','X-Type','XF','XJ','XJ12','XJ40','XJ6','XJ8','XJR','XJS','XJSC','XK','XKR'];
                break;
            case 'Jeep':
                models = ['Cherokee','CJ','Comanche','Commander','Compass','Grand Cherokee','Patriot','Renegade','Wagoneer','Willys','Wrangler'];
                break;
            case 'Kia':
                models = ['Besta','Borrego','Carens','Carnival','cee\'d','cee\'d Sportswagon','Cerato','Clarus','Elan','Joice','K2500','K2700','Leo','Magentis','Mentor','Mini','Opirus','Optima','Picanto','Pregio','Pride','pro_cee\'d','Retona','Rio','Roadster','Rocsta','Sephia','Shuma','Sorento','Soul','Sportage','Venga'];
                break;
            case 'KTM':
                models = ['X-BOW'];
                break;
            case 'Lada':
                models = ['110','111','112','1200','2107','2110','2111','2112','Aleko','Forma','Kalina','Niva','Nova','Priora','Samara'];
                break;
            case 'Lamborghini':
                models = ['Aventador','Countach','Diablo','Espada','Gallardo','Jalpa','LM','Miura','MurciÃ©lago','Urraco'];
                break;
            case 'Lancia':
                models = ['Beta','Dedra','Delta','Flaminia','Flavia','Fulvia','Gamma','Kappa','Lybra','MUSA','Phedra','Prisma','Stratos','Thema','Thesis','Voyager','Ypsilon','Zeta'];
                break;
            case 'Land Rover':
                models = ['Defender','Discovery','Freelander','Range Rover','Range Rover Evoque','Range Rover Sport','Serie I','Serie II','Serie III'];
                break;
            case 'Landwind':
                models = ['CV-9','S','SC2','SC4'];
                break;
            case 'Lexus':
                models = ['CT 200h','ES 300','ES 330','ES 350','ES Series (All)','GS 250','GS 300','GS 350','GS 430','GS 450','GS 460','GS Series (All)','GX 470','IS 200','IS 220','IS 250','IS 300','IS 350','IS Series (All)','IS-F','LS 400','LS 430','LS 460','LS 600','LS Series (All)','LX 470','LX 570','LX Series (All)','RX 300','RX 330','RX 350','RX 400','RX 450','RX Series (All)','SC 400','SC 430'];
                break;
            case 'Ligier':
                models = ['Ambra','Nova','Optima','X - Too'];
                break;
            case 'Lincoln':
                models = ['Aviator','Continental','LS','Mark','Navigator','Town Car'];
                break;
            case 'Lotus':
                models = ['340 R','Cortina','Elan','Elise','Elite','Esprit','Europa','Evora','Excel','Exige','Super Seven'];
                break;
            case 'Mahindra':
                models = [];
                break;
            case 'Maserati':
                models = ['222','224','228','3200','418','420','4200','422','424','430','Biturbo','Ghibli','GranCabrio','Gransport','Granturismo','Indy','Karif','MC12','Merak','Quattroporte','Shamal','Spyder'];
                break;
            case 'Maybach':
                models = ['57','62'];
                break;
            case 'Mazda':
                models = ['121','2','3','323','5','6','626','929','B series','Bongo','BT-50','CX-5','CX-7','CX-9','Demio','E series','Millenia','MPV','MX-3','MX-5','MX-6','Premacy','Protege','RX-6','RX-7','RX-8','Tribute','Xedos'];
                break;
            case 'McLaren':
                models = ['MP4-12C'];
                break;
            case 'Mercedes-Benz':
                models = ['190','200','220','230','240','250','260','270','280','290','300','320','350','380','400','416','420','450','500','560','600','A 140','A 150','A 160','A 170','A 180','A 190','A 200','A 210','A 220','A 250','A 45 AMG','A-Klasse (All)','B 150','B 160','B 170','B 180','B 200','B 220','B 250','B-Klasse (All)','C 160','C 180','C 200','C 220','C 230','C 240','C 250','C 270','C 280','C 30 AMG','C 300','C 32 AMG','C 320','C 350','C 36 AMG','C 43 AMG','C 55 AMG','C 63 AMG','C-Klasse (All)','CE 200','CE 220','CE 230','CE 280','CE 300','CE-Klasse (All)','Citan','CL 160','CL 180','CL 200','CL 220','CL 230','CL 320','CL 420','CL 500','CL 55 AMG','CL 600','CL 63 AMG','CL 65 AMG','CL-Klasse (All)','CLA 180','CLA 200','CLA 220','CLA 250','CLA-Klasse (All)','CLC 160','CLC 180','CLC 200','CLC 220','CLC 230','CLC 250','CLC 350','CLC-Klasse (All)','CLK 200','CLK 220','CLK 230','CLK 240','CLK 270','CLK 280','CLK 320','CLK 350','CLK 430','CLK 500','CLK 55 AMG','CLK 63 AMG','CLK-Klasse (All)','CLS 250','CLS 280','CLS 300','CLS 320','CLS 350','CLS 500','CLS 55 AMG','CLS 63 AMG','CLS-Klasse (All)','E 200','E 220','E 230','E 240','E 250','E 260','E 270','E 280','E 290','E 300','E 320','E 350','E 36 AMG','E 400','E 420','E 430','E 50','E 500','E 55 AMG','E 60 AMG','E 63 AMG','E-Klasse (All)','G 230','G 240','G 250','G 270','G 280','G 290','G 300','G 320','G 350','G 400','G 500','G 55 AMG','G 63 AMG','G 65 AMG','G-Klasse (All)','GL 320','GL 350','GL 420','GL 450','GL 500','GL 55 AMG','GL 63 AMG','GL-Klasse (All)','GLK 200','GLK 220','GLK 250','GLK 280','GLK 300','GLK 320','GLK 350','GLK-Klasse (All)','MB 100','ML 230','ML 250','ML 270','ML 280','ML 300','ML 320','ML 350','ML 400','ML 420','ML 430','ML 450','ML 500','ML 55 AMG','ML 63 AMG','ML-Klasse (All)','R 280','R 300','R 320','R 350','R 500','R 63 AMG','R-Klasse (All)','S 250','S 260','S 280','S 300','S 320','S 350','S 400','S 420','S 430','S 450','S 500','S 55','S 550','S 600','S 63 AMG','S 65 AMG','S-Klasse (All)','SL 280','SL 300','SL 320','SL 350','SL 380','SL 420','SL 450','SL 500','SL 55 AMG','SL 560','SL 60 AMG','SL 600','SL 63 AMG','SL 65 AMG','SL 70 AMG','SL 73 AMG','SL-Klasse (All)','SLK 200','SLK 230','SLK 250','SLK 280','SLK 300','SLK 32 AMG','SLK 320','SLK 350','SLK 55 AMG','SLK-Klasse (All)','SLR','SLS AMG','Sprinter','V 200','V 220','V 230','V 280','V-Klasse (All)','Vaneo','Vario','Viano','Vito'];
                break;
            case 'MG':
                models = ['MGA','MGB','MGF','Midget','Montego','TD','TF','ZR','ZS','ZT'];
                break;
            case 'Microcar':
                models = ['DUÃˆ','M-8','M.Go','MC1','MC2'];
                break;
            case 'MINI':
                models = ['1000','1300','Cabrio Series (All)','Clubman Series (All)','Clubvan','Cooper','Cooper Cabrio','Cooper Clubman','Cooper Countryman','Cooper CoupÃ©','Cooper D','Cooper D Cabrio','Cooper D Clubman','Cooper D Countryman','Cooper D Paceman','Cooper Paceman','Cooper Roadster','Cooper S','Cooper S Cabrio','Cooper S Clubman','Cooper S Countryman','Cooper S CoupÃ©','Cooper S Paceman','Cooper S Roadster','Cooper SD','Cooper SD Cabrio','Cooper SD Clubman','Cooper SD Countryman','Cooper SD CoupÃ©','Cooper SD Paceman','Cooper SD Roadster','Countryman Series (All)','Coupe Series (All)','John Cooper Works','John Cooper Works Cabrio','John Cooper Works Clubman','John Cooper Works Countryman','John Cooper Works CoupÃ©','John Cooper Works Paceman','John Cooper Works Roadster','MINI (All)','ONE','One Cabrio','One Clubman','One Countryman','One D','One D Clubman','One D Countryman','Paceman Series (All)','Roadster Series (All)'];
                break;
            case 'Mitsubishi':
                models = ['3000 GT','ASX','Canter','Carisma','Colt','Cordia','Cosmos','Diamante','Eclipse','Galant','Galloper','Grandis','i-MiEV','L200','L300','L400','Lancer','Mirage','Montero','Outlander','Pajero','Pajero Pinin','Pick-up','Santamo','Sapporo','Sigma','Space Gear','Space Runner','Space Star','Space Wagon','Starion','Tredia'];
                break;
            case 'Morgan':
                models = ['4/4','Aero 8','Plus 4','Plus 8','Roadster'];
                break;
            case 'Nissan':
                models = ['100 NX','200 SX','240 SX','280 ZX','300 ZX','350Z','370Z','Almera','Almera Tino','Altima','Armada','Bluebird','Cabstar','Cargo','Cherry','Cube','Evalia','Frontier','GT-R','Interstar','Juke','King Cab','Kubistar','Laurel','Leaf','Maxima','Micra','Murano','Navara','Note','NP 300','NV200','NV400','Pathfinder','Patrol','PickUp','Pixo','Prairie','Primastar','Primera','Qashqai','Qashqai+2','Quest','Sentra','Serena','Silvia','Skyline','Sunny','Terrano','Tiida','Titan','Trade','Urvan','Vanette','X-Trail'];
                break;
            case 'NSU':
                models = [];
                break;
            case 'Oldsmobile':
                models = ['Bravada','Custom Cruiser','Cutlass','Delta 88','Silhouette','Supreme','Toronado'];
                break;
            case 'Opel':
                models = ['Adam','Agila','Ampera','Antara','Arena','Ascona','Astra','Calibra','Campo','Cascada','Cavalier','Combo','Commodore','Corsa','Diplomat','Frontera','GT','Insignia','Kadett','Manta','Meriva','Mokka','Monterey','Monza','Movano','Nova','Omega','Pick Up Sportscap','Rekord','Senator','Signum','Sintra','Speedster','Tigra','Vectra','Vivaro','Zafira','Zafira Tourer'];
                break;
            case 'Pagani':
                models = [];
                break;
            case 'Peugeot':
                models = ['1007','104','106','107','2008','204','205','206','207','208','3008','301','304','305','306','307','308','309','4007','4008','404','405','406','407','5008','504','505','508','604','605','607','806','807','Bipper','Bipper Tepee','Boxer','Expert','Expert Tepee','iOn','J5','Partner','Partner Tepee','RCZ','TePee'];
                break;
            case 'Piaggio':
                models = ['APE','APE TM','Porter'];
                break;
            case 'Plymouth':
                models = ['Prowler'];
                break;
            case 'Pontiac':
                models = ['6000','Bonneville','Fiero','Firebird','G6','Grand-Am','Grand-Prix','GTO','Montana','Solstice','Sunbird','Sunfire','Targa','Trans Am','Trans Sport','Vibe'];
                break;
            case 'Porsche':
                models = ['356','911','911 (All)','912','914','924','928','944','959','962','964','968','991','993','996','997','Boxster','Carrera GT','Cayenne','Cayman','Panamera'];
                break;
            case 'Proton':
                models = ['300 Serie','400 Serie'];
                break;
            case 'Renault':
                models = ['Alpine A110','Alpine A310','Alpine V6','Avantime','Captur','Clio','Coupe','Espace','Express','Fluence','Fuego','Grand Espace','Grand Modus','Grand Scenic','Kangoo','Koleos','Laguna','Latitude','Mascott','Master','Megane','Modus','P 1400','R 11','R 14','R 18','R 19','R 20','R 21','R 25','R 30','R 4','R 5','R 6','R 9','Rapid','Safrane','Scenic','Spider','Trafic','Twingo','Twizy','Vel Satis','Wind','ZOE'];
                break;
            case 'Rools Royce':
                models = ['Corniche','Flying Spur','Ghost','Park Ward','Phantom','Silver Cloud','Silver Dawn','Silver Seraph','Silver Shadow','Silver Spirit','Silver Spur'];
                break;
            case 'Rover':
                models = ['100','111','114','115','200','213','214','216','218','220','25','400','414','416','418','420','45','600','618','620','623','75','800','820','825','827','City Rover','Metro','Montego','SD','Streetwise'];
                break;
            case 'Ruf':
                models = [];
                break;
            case 'Saab':
                models = ['9-3','9-4X','9-5','9-7X','90','900','9000','96','99'];
                break;
            case 'Santana':
                models = [];
                break;
            case 'Seat':
                models = ['Alhambra','Altea','Arosa','Cordoba','Exeo','Ibiza','Inca','Leon','Malaga','Marbella','Mii','Terra','Toledo'];
                break;
            case 'Skoda':
                models = ['105','120','130','135','Citigo','Fabia','Favorit','Felicia','Forman','Octavia','Pick-up','Praktik','Rapid','Roomster','Superb','Yeti'];
                break;
            case 'Smart':
                models = ['Crossblade','ForFour','ForTwo','Roadster'];
                break;
            case 'SpeedART':
                models = [];
                break;
            case 'Spyker':
                models = ['C8','C8 AILERON','C8 DOUBLE 12 S','C8 LAVIOLETTE SWB','C8 SPYDER SWB'];
                break;
            case 'Ssangyong':
                models = ['Actyon','Family','Korando','Kyron','MUSSO','REXTON','Rodius'];
                break;
            case 'Subaru':
                models = ['B9 Tribeca','Baja','BRZ','Forester','Impreza','Justy','Legacy','Libero','OUTBACK','SVX','Trezia','Tribeca','Vivio','XT','XV'];
                break;
            case 'Suzuki':
                models = ['Alto','Baleno','Cappuccino','Carry','Grand Vitara','Ignis','Jimny','Kizashi','Liana','LJ','SJ Samurai','Splash','Super-Carry','Swift','SX4','SX4 S-Cross','Vitara','Wagon R+','X-90' ];
                break;
            case 'Talbot':
                models = ['Horizon','Samba'];
                break;
            case 'Tata':
                models = ['Indica','Indigo','Nano','Safari','Sumo','Telcoline','Telcosport','Xenon'];
                break;
            case 'TECHART':
                models = [];
                break;
            case 'Tesla':
                models = [];
                break;
            case 'Toyota':
                models = ['4-Runner','Auris','Auris Touring Sports','Avalon','Avensis','Avensis Verso','Aygo','Camry','Carina','Celica','Corolla','Corolla Verso','Cressida','Crown','Dyna','FJ','GT86','Hiace','Highlander','Hilux','IQ','Land Cruiser','Lite-Ace','MR 2','Paseo','Picnic','Previa','Prius','Prius+','RAV 4','Sequoia','Sienna','Starlet','Supra','Tacoma','Tercel','Tundra','Urban Cruiser','Verso','Verso-S','Yaris' ];
                break;
            case 'Trabant':
                models = ['601'];
                break;
            case 'Triumph':
                models = ['Dolomite','Moss','Spitfire','TR3','TR4','TR5','TR6','TR7','TR8'];
                break;
            case 'TVR':
                models = ['Chimaera','Griffith','Tuscan'];
                break;
            case 'Volkswagen':
                models = ['181','Amarok','Beetle','Bora','Buggy','Caddy','CC','Corrado','Crafter','Eos','Fox','Golf','Golf (All)','Golf Plus','Iltis','Jetta','Karmann Ghia','KÃ¤fer','LT','Lupo','New Beetle','Passat','Passat (All)','Passat CC','Phaeton','Polo','Routan','Santana','Scirocco','Sharan','T1','T2','T3 (All)','T3 Caravelle','T3 Kombi','T3 Multivan','T3 other','T4 (All)','T4 California','T4 Caravelle','T4 Kombi','T4 Multivan','T4 other','T5 (All)','T5 California','T5 Caravelle','T5 Kombi','T5 Multivan','T5 other','T5 Shuttle','Taro','Tiguan','Touareg','Touran','up!','Vento'];
                break;
            case 'Volvo':
                models = ['240','244','245','262','264','340','360','440','460','480','740','744','745','760','780','850','855','940','944','945','960','965','Amazon','C30','C70','Polar','S40','S60','S70','S80','S90','V40','V50','V60','V70','V90','XC 60','XC 70','XC 90'];
                break;
            case 'Wartburg':
                models = ['311','353'];
                break;
            case 'Westfield':
                models = [];
                break;
            case 'Wiesmann':
                models = ['MF 25','MF 28','MF 3','MF 30','MF 35','MF 4','MF 5'];
                break;
            default:
                models = [];
                break;
        }
        var make_box = document.getElementById('make_box');
        if(models[0] == 'other' && make_box.childElementCount <= 2){
            var make_input = document.createElement('input');
            make_input.setAttribute('id','make_option');
            make_input.setAttribute('placeholder','type your make name here...');
            make_input.setAttribute('name','make_option');
            make_input.setAttribute('class','form-control');
            make_input.setAttribute('type','text');
            make_box.appendChild(make_input);
        }else if(make_box.childElementCount >= 3){
            make_box.removeChild(document.getElementById('make_option'));
        }
        var model_select = document.getElementById('model_option');
        model_select.innerHTML='';
        model_select.innerHTML = '<option value="" selected disabled>Select Model</option>' +
            '<option value="Other">Other</option>';
        for( let index in models){
            var option = document.createElement('option');
            option.setAttribute('value', models[index]);
            option.innerText = models[index];
            model_select.appendChild(option);
        }
    }
</script>
<div class="row">
    <div class="col-lg-4 mt-3" id="make_box">
        <label for="make">Make</label>
        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" onchange="change_make(value)" name="make" id="make">
            <option value="" disabled selected>Select Make</option>
            <option value="Other">Other</option>
            <option value="Abarth">Abarth</option>
            <option value="Acura">Acura</option>
            <option value="Aixam">Aixam</option>
            <option value="Alfa Romeo">Alfa Romeo</option>
            <option value="Alpina">Alpina</option>
            <option value="Andere">Andere</option>
            <option value="Artega">Artega</option>
            <option value="Asia Motors">Asia Motors</option>
            <option value="Aston Martin">Aston Martin</option>
            <option value="Audi">Audi</option>
            <option value="Austin">Austin</option>
            <option value="Austin Healey">Austin Healey</option>
            <option value="Bentley">Bentley</option>
            <option value="BMW">BMW</option>
            <option value="Borgward">Borgward</option>
            <option value="Brilliance">Brilliance</option>
            <option value="Bugatti">Bugatti</option>
            <option value="Buick">Buick</option>
            <option value="Cadillac">Cadillac</option>
            <option value="Casalini">Casalini</option>
            <option value="Caterham">Caterham</option>
            <option value="Chevrolet">Chevrolet</option>
            <option value="Chrysler">Chrysler</option>
            <option value="CitroÃ«n">CitroÃ«n</option>
            <option value="Cobra">Cobra</option>
            <option value="Corvette">Corvette</option>
            <option value="Dacia">Dacia</option>
            <option value="Daewoo">Daewoo</option>
            <option value="Daihatsu">Daihatsu</option>
            <option value="DeTomaso">DeTomaso</option>
            <option value="Dodge">Dodge</option>
            <option value="Ferrari">Ferrari</option>
            <option value="Fiat">Fiat</option>
            <option value="Fisker">Fisker</option>
            <option value="Ford">Ford</option>
            <option value="GMC">GMC</option>
            <option value="Grecav">Grecav</option>
            <option value="Hamann">Hamann</option>
            <option value="Holden">Holden</option>
            <option value="Honda">Honda</option>
            <option value="Hummer">Hummer</option>
            <option value="Hyundai">Hyundai</option>
            <option value="Infiniti">Infiniti</option>
            <option value="Isuzu">Isuzu</option>
            <option value="Iveco">Iveco</option>
            <option value="Jaguar">Jaguar</option>
            <option value="Jeep">Jeep</option>
            <option value="KÃ¶nigsegg">KÃ¶nigsegg</option>
            <option value="Kia">Kia</option>
            <option value="KTM">KTM</option>
            <option value="Lada">Lada</option>
            <option value="Lamborghini">Lamborghini</option>
            <option value="Lancia">Lancia</option>
            <option value="Land Rover">Land Rover</option>
            <option value="Landwind">Landwind</option>
            <option value="Lexus">Lexus</option>
            <option value="Ligier">Ligier</option>
            <option value="Lincoln">Lincoln</option>
            <option value="Lotus">Lotus</option>
            <option value="Mahindra">Mahindra</option>
            <option value="Maserati">Maserati</option>
            <option value="Maybach">Maybach</option>
            <option value="Mazda">Mazda</option>
            <option value="McLaren">McLaren</option>
            <option value="Mercedes-Benz">Mercedes-Benz</option>
            <option value="MG">MG</option>
            <option value="Microcar">Microcar</option>
            <option value="MINI">MINI</option>
            <option value="Mitsubishi">Mitsubishi</option>
            <option value="Morgan">Morgan</option>
            <option value="Nissan">Nissan</option>
            <option value="NSU">NSU</option>
            <option value="Oldsmobile">Oldsmobile</option>
            <option value="Opel">Opel</option>
            <option value="Pagani">Pagani</option>
            <option value="Peugeot">Peugeot</option>
            <option value="Piaggio">Piaggio</option>
            <option value="Plymouth">Plymouth</option>
            <option value="Pontiac">Pontiac</option>
            <option value="Porsche">Porsche</option>
            <option value="Proton">Proton</option>
            <option value="Renault">Renault</option>
            <option value="Rolls Royce">Rolls Royce</option>
            <option value="Rover">Rover</option>
            <option value="Ruf">Ruf</option>
            <option value="Saab">Saab</option>
            <option value="Santana">Santana</option>
            <option value="Seat">Seat</option>
            <option value="Skoda">Skoda</option>
            <option value="Smart">Smart</option>
            <option value="SpeedART">SpeedART</option>
            <option value="Spyker">Spyker</option>
            <option value="Ssangyong">Ssangyong</option>
            <option value="Subaru">Subaru</option>
            <option value="Suzuki">Suzuki</option>
            <option value="Talbot">Talbot</option>
            <option value="Tata">Tata</option>
            <option value="TECHART">TECHART</option>
            <option value="Tesla">Tesla</option>
            <option value="Toyota">Toyota</option>
            <option value="Trabant">Trabant</option>
            <option value="Triumph">Triumph</option>
            <option value="TVR">TVR</option>
            <option value="Volkswagen">Volkswagen</option>
            <option value="Volvo">Volvo</option>
            <option value="Wartburg">Wartburg</option>
            <option value="Westfield">Westfield</option>
            <option value="Wiesmann">Wiesmann</option>
        </select>
    </div>
    <div class="col-lg-4 mt-3"  id="model_box">
        <label for="model">Model</label>
        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" onchange="OptionBox('model_box',value,'make')" name="model" id="model_option">
            <option value="" selected disabled>Select Make</option>
        </select>
    </div>
    <div class="col-lg-4 mt-3" id="body_style_box">
        <label for="body_style">Body Style</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('body_style_box',value,'body_style')" name="body_style" id="body_style">
            <option value="">Select Body Style</option>
            <option value="Other">Other</option>
            <option value="Hatchback">Hatchback</option>
            <option value="Saloon">Saloon</option>
            <option value="Estate">Estate</option>
            <option value="Convertible">Convertible</option>
            <option value="People Carrier">People Carrier</option>
            <option value="Coupe">Coupe</option>
            <option value="4x4 - Jeeps">4x4 - Jeeps</option>
            <option value="Cabrio">Cabrio</option>
            <option value="Pickup">Pickup</option>
            <option value="MPV">MPV</option>
            <option value="Kit Car">Kit Car</option>
        </select>
    </div>
    <div class="col-lg-4">
        <label for="year">Year</label>
        <input type="text" class="form-control" id="year" name="year">
    </div>
    <div class="col-lg-4">
        <label for="mileage">Mileage-(Km)</label>
        <input type="text" class="form-control" id="mileage" name="mileage">
    </div>
    <div class="col-lg-4" id="transmission_box">
        <label for="transmission">Transmission</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('transmission_box',value,'transmission')" name="transmission" id="transmission">
            <option value="">Select Transmission</option>
            <option value="Other">Other</option>
            <option value="Manual">Manual</option>
            <option value="Automatic">Automatic</option>
            <option value="Semi-Automatic">Semi-Automatic</option>
        </select>
    </div>
    <div class="col-lg-4" id="fuel_box">
        <label for="fuel">Fuel</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('fuel_box',value,'fuel')" name="fuel" id="fuel">
            <option value="">Select Fuel Type</option>
            <option value="Other">Other</option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Hybrid">Hybrid</option>
            <option value="Electric">Electric</option>
            <option value="LPG">LPG</option>
        </select>
    </div>
    <div class="col-lg-4" id="doors_box">
        <label for="doors">Doors</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('doors_box',value,'doors')" name="doors" id="doors">
            <option value="">Select Doors Number</option>
            <option value="Other">Other</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

        </select>
    </div>
    <div class="col-lg-4" id="color_box">
        <label for="color">Color</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('color_box',value,'color')" name="color" id="color">
            <option value="">Select Color</option>
            <option value="Other">Other</option>
            <option value="Beige">Beige</option>
            <option value="Black">Black</option>
            <option value="Blue">Blue</option>
            <option value="Brown">Brown</option>
            <option value="Burgundy| Maroon">Burgundy| Maroon</option>
            <option value="Cream| Pearl">Cream| Pearl</option>
            <option value="Gold">Gold</option>
            <option value="Green">Green</option>
            <option value="Grey">Grey</option>
            <option value="Orange">Orange</option>
            <option value="Purple">Purple</option>
            <option value="Red">Red</option>
            <option value="Silver">Silver</option>
            <option value="Turquoise| Teal">Turquoise| Teal</option>
            <option value="White">White</option>
            <option value="Yellow">Yellow</option>

        </select>
    </div>
    <div class="col-lg-4" id="condition_box">
        <label for="condition">Condition</label>
        <select class="form-select form-select-md mb-3 " aria-label=".form-select-lg example" onchange="OptionBox('condition_box',value,'condition')" name="condition" id="condition">
            <option value="">Select Condition</option>
            <option value="Other">Other</option>
            <option value="New">New</option>
            <option value="Used">Used</option>

        </select>
    </div>
        <input type="hidden" id="features_value" name="features">
    <div class="row" id="features">
        <span >Vehicle Features</span>
        <script>
            var features=['4-Wheel Drive','Alarm','ABS','Driver Airbag','Electronic Stability Program (ESP)','Immobiliser','Passenger Airbag','Rear seat belts','Safety Belt Pretensioners','Safety Belt Pretensioners','Side Airbags','Xenon headlightss','Alloy Wheels','Catalytic Converter','Rear Spoiler','Tow Bar','Tuning','Air Conditioning','Auxiliary heating','Climate Control','Cruise Control','Electric heated seats','Leather Seats','Parking Sensors','Power-assisted Steering (PAS)','Power Locks','Power Seats','Power Windows','Sunroof','Tilt Steering Wheel','AM/FM Stereo','Cassette Player','CD Multichanger','CD Player','Navigation System','Premium Sound System'];

            for(let index in features){
                var feature = '<div class="form-check col-lg-3 col-sm-1">\
                    <input class="form-check-input" type="checkbox" id="'+features[index]+'" value="'+features[index]+'" onclick="checkListUpdater(\'features_value\', this.value, this.checked)" \>\
                    \
                    <label class="form-check-label" for="'+features[index]+'">\
                    '+features[index]+'\
                </label>\
            </div>'
                document.getElementById('features').innerHTML = document.getElementById('features').innerHTML+feature;
            }

        </script>

    </div>

</div>

