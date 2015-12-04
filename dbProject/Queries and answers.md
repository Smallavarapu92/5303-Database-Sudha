### Title: Online Media System
### Team Members: Saboor Siddique, Shweta Zutshi, Sudha Mallavarapu

#### Question 1:
Show all customers.

SQL:
```
SELECT *
FROM users
WHERE rid = 1;
```

#### Answer:
```
 Showing rows 0 - 29 (255 total, Query took 0.0004 sec) 
 Cannot put all 255 rows here.
firstname	lastname	emailID						password	street	city			state					zipcode	phoneNumber	uuid	rid	
luukas		hanninen	luukas.hanninen@example.com	fishhead	6029	rautatienkatu	karkkilaÃ¥land			31216	08-585-979	1		1
sanni		palo		sanni.palo@example.com		access		2016 	pirkankatu		getafinlandproper		28954	05-798-487	9		1
eemil		rintala		eemil.rintala@example.com	ophelia		7300 	suvantokatu		pihtipudasostrobothnia	64640	04-479-821	11		1
joona		laitinen	joona.laitinen@example.com	nostromo	3459 	otavalankatu	mÃ¤nttÃ¤satakunta		71014	04-771-817	33		1
ilona		latt		ilona.latt@example.com		canuck		2561 	siilitie		pyhÃ¤rantakymenlaakso	48015	03-732-243	35		1
```

#### Question 2:
Show all media files for each type.

SQL:
```
SELECT * 
FROM  `media` 
ORDER BY  `media`.`mediaType` ASC 
```

#### Answer:
```
mediaId	mediaTitle			artist				year   fileSize	mediaType categoryId  media PriceId	  	saleType											mediaPath	priceSetDate	
1		St. Vincent			Melissa McCarthy	2014	700.00	movie		1			3	retail		D:/Movies/Comedy/St_Vincent.avi						2015-12-02 05:20:54
3		Horrible Bosses 2	Jason Bateman		2011	789.00	movie		4			77	sale		D:/Movies/Comedy/HorribleBosses2.avi				2015-12-02 05:21:03
4		The Wizard of Oz	Mila Kunis			2010	876.00	movie		8			43	retail		D:/Movies/TheWizardOfOz.mp4							2015-12-02 05:21:14
8		stick fun			alicia makul		2006	3.00	movie		5			5	retail		https://randomuser.me/api/portraits/women/25.jpg	2015-12-02 05:21:29
11		Spectre				Daniel Creig		2015	876.00	movie		3			157	sale		E:/Movies/Spectre.avi								2015-12-02 05:27:26
15		Dew peace			enrique				2004	1.00	movie		11			17	saleprice	https://api.soundcloud.com/playlists/405736.avi		2015-12-02 03:24:38
26		ghost protocol		tom cruise			2011	8.00	movie		7			56	retail		D:/movies/ghostprotocol.avi							2015-12-02 05:36:55				
27		Inside out			udit kumar swamy	2009	1.00	movie		10			29	saleprice	https://api.soundcloud.com/tracks/6622601.mpeg		2015-12-02 03:24:38
28		Avengers			groot				2014	78.00	movie		9			74	sale		D:/movies/avengers.avi								2015-12-02 05:39:15
29		Vampire Fun			Lautner				2013	6.00	movie		1			8	retail		https://randomuser.me/api/portraits/thumb/women/25.	2015-12-02 03:24:37
30		iron man			robert				2053	98.00	movie		12			4	retail		D:/movie/ironman.mp3								2015-12-02 05:40:38
2		marlboro			st vincent			2012	10.00	music		15			25	retail		D://work//music//marlboro.mp4						2015-12-02 05:25:59
5		mama mia			michael jackson		2000	5.00	music		20			20	sale		D:/desktop/mamamia.mp3								2015-12-02 05:17:51
6		Hello				Adele				2015	2.81	music		22			66	sale		D:/music/hello.mp3									2015-12-02 05:26:38
7		My heart will go on	Celine Dion			1990	2.89	music		20			12	sale		E:/songs/MyHeartWillGoOn.mp3						2015-12-02 03:24:38
9		Blank Space			Taylor Swift		2015	3.00	music		16			112	sale		E:/Songs/BlankSpace.mp4								2015-12-02 05:27:07
10		Style				Taylor Swift		2015	2.80	music		15			124	retail		D:/Songs/Style.avi									2015-12-02 05:27:16
```

#### Question 3:
Add a new media item.

SQL:
```
INSERT INTO media
VALUES (NULL, 'Same Old Love', 'Selena Gomez', '2015', '6.63Mb', 'music', '1', '2', 'retail', 'D:/songs/same_old_love.mp3', CURRENT_TIMESTAMP);
```

#### Answer:
```
mediaId	mediaTitle		artist		year   fileSize	  mediaType categoryId  media PriceId	  	saleType											mediaPath	priceSetDate	
31		Same Old Love 	Selena Gomez 2015  6.63 music 1 2       retail D:/songs/same_old_love.mp3 2015-12-04 08:45:48

```

#### Question 4:
Edit a media item.

SQL:
```
UPDATE media
SET mediaPath = 'E:/songs/same_old_love.mp3'
WHERE mediaTitle = 'HELLO';
```

#### Answer:
```
1 row affected. (Query took 0.0208 sec)
mediaId	mediaTitle	artist	year	fileSize	mediaType	categoryId	priceId	saleType mediaPath					priceSetDate	
6		Hello		Adele	2015	2.81		music		22			66		sale	 E:/songs/same_old_love.mp3	2015-12-02 05:26:38
```

#### Question 5:
Find all media items over 3Mb.

SQL:
```
SELECT *
FROM media
WHERE fileSize > '3';
```

#### Answer:
```
mediaId	mediaTitle			artist				year	fileSize	mediaType	categoryId	priceId	saleType	mediaPath								priceSetDate	
1		St. Vincent			Melissa McCarthy	2014	700			movie		1			3		retail		D:/Movies/Comedy/St_Vincent.avi			12/2/15 05:20 AM
2		marlboro			st vincent			2012	10			music		15			25		retail		D://work//music//marlboro.mp4			12/2/15 05:25 AM
3		Horrible Bosses 2	Jason Bateman		2011	789			movie		4			77		sale		D:/Movies/Comedy/HorribleBosses2.avi	12/2/15 05:21 AM
4		The Wizard of Oz	Mila Kunis			2010	876			movie		8			43		retail		D:/Movies/TheWizardOfOz.mp4				12/2/15 05:21 AM
5		mama mia			michael jackson		2000	5			music		20			20		sale		D:/desktop/mamamia.mp3					12/2/15 05:17 AM
```

#### Question 6:
Find the sum of orders for each month.

SQL:
```
select month(dateOrdered) as month1,sum(mediaOrderId) as allorders,sum(totalCost) as Total
from mediaOrder
group by month1;
```

#### Answer:
```
month1	allorders	Total
9		16			28317.00
10		29			22818.00
```

#### Question 7:
Find the supplier that provides the most media.

SQL:
```
select firstname,lastname
from users 
where uuid 
in
(
select uuid 
from mediaOrder
where orderListId
in
(
select orderListId 
from mediaOrderList
group by orderListId
having count(orderListId) in
(
select max(countlist)
from 
(
select orderListId,count(orderListId) as countlist
from mediaOrderList
group by orderListId
) a    
)
)
);
```

#### Answer:
```
firstname	lastname	
viljami		hatala
nelli		peltonen
ellen		lehtinen
sofia		hiltunen
```

#### Question 8:
List all the downloads for customer "emilia saarinen".

SQL:
```
select mediaTitle
from media
where mediaid 
in
(
select mediaid
from purchase 
where uuid 
in
(
select uuid
from users
where firstname="emilia"
and lastname="saarinen" and downloadCount>0
)
)
;
```

#### Answer:
```
mediaTitle
Hello
```

#### Question 9:
List all the downloads for customer "" arranged by type.

SQL:
```
SELECT mediaTitle
FROM users
JOIN mediaSharing ON (users.uuid = mediaSharing.uuid)
JOIN media ON (media.mediaId = mediaSharing.mediaId)
WHERE users.firstname = 'emilia' and users.lastname = 'saarinen' and downloadCount > 0
GROUP BY media.mediaType;
```

#### Answer:
```
mediaTitle	
The Wizard of Oz

```

#### Question 10:
Find the average profits for a given year.

SQL:
```
select year(purchaseDate) as year,avg(price-wp.mediaPrice) as price
from purchase p 
join wholesalePrice wp
on p.mediaId=wp.mediaId
join mediaPrice mp
on p.mediaId=mp.mediaId
group by year

```

#### Answer:
```
year	price
2010	19.352941
2011	20.616279
2012	16.869919
```

#### Question 11:
Show all customers from tavastia proper that have purchased over 10 items.

SQL:
```
SELECT firstname, lastname
FROM purchase
JOIN users ON (users.uuid = purchase.uuid)
WHERE users.state = 'tavastia proper'
group by purchaseId 
having count(purchaseId)>0;
```

#### Answer:
```
firstname	lastname	
helmi	sakala
```

#### Question 12:
Add a new customer.

SQL:
```
INSERT INTO users
VALUES ('Shweta','Zutshi','shwetazutshi1@gmail.com','shweta123','4700 Taft Blvd', 'Wichita Falls', 'Texas', 76308, '2017440947',1001,1);
```

#### Answer:
```
1 row inserted. (Query took 0.0172 sec)
```

#### Question 13:
List the most searched media files.

SQL:
```
select *
from userPreference
group by mediaId
having count(mediaId) 
in
(
select max(num)
from
(
select mediaId , count(mediaId) as num 
from userPreference
group by mediaId
) a
)
;
```

#### Answer:
```
uuid	mediaId	preferenceDate		preferenceId	
21		33		2012-10-14 04:30:09	19
```

#### Question 14:
List the customer representatives by amount sold all time.

SQL:
```
select u.firstname,u.lastname,p.uuid,sum(mp.price) as totalprice
from crAssigned cr
join purchase p
on cr.purchaseId=p.purchaseId
join media m
on m.mediaId=p.mediaId
join mediaPrice mp
on mp.mediaId=m.mediaId
join users u
on u.uuid=p.uuid
group by p.uuid
;
```

#### Answer:
```
firstname	lastname	uuid	totalprice	
luukas		hanninen	1		118.00
sanni		palo		9		303.00
eemil		rintala		11		271.00
joona		laitinen	33		127.00
ilona		latt		35		118.00
```

#### Question 15:
List the customer representatives by amount sold by year.

SQL:
```
select u.firstname,u.lastname,p.uuid,sum(mp.price) as totalprice,year(purchaseDate) as year
from crAssigned cr
join purchase p
on cr.purchaseId=p.purchaseId
join media m
on m.mediaId=p.mediaId
join mediaPrice mp
on mp.mediaId=m.mediaId
join users u
on u.uuid=p.uuid
group by p.uuid,year
;
```

#### Answer:
```
firstname	lastname	uuid	totalprice	year	
luukas		hanninen	1		118.00		2010
sanni		palo		9		303.00		2012
eemil		rintala		11		271.00		2012
joona		laitinen	33		127.00		2010
ilona		latt		35		118.00		2012
```

#### Question 16:
List the customer representatives by amount sold this month.
 
SQL:
```
select u.firstname,u.lastname,p.uuid,sum(mp.price) as totalprice,month(purchaseDate) as month
from crAssigned cr
join purchase p
on cr.purchaseId=p.purchaseId
join media m
on m.mediaId=p.mediaId
join mediaPrice mp
on mp.mediaId=m.mediaId
join users u
on u.uuid=p.uuid
group by p.uuid
having month='10'
;
```

#### Answer:
```
firstname	lastname	uuid	totalprice	month	
konsta		korpi		76		259.00		10
peppi		karvonen	103		263.00		10
akseli		lauri		140		124.00		10
```

#### Question 17:
List all orders over $100.

SQL:
```
SELECT *
FROM mediaOrder
WHERE totalCost > 100;
```

#### Answer:
```
mediaOrderId	uuid	dateOrdered			  dateReceived			totalCost	orderListId	orderStatus	
1				4		2015-09-25 12:21:51	  2015-10-01 10:44:16		7523.00			2		n
2				10		2015-10-25 07:34:48	  2015-12-28 22:20:54		2575.00			2		n
3				26		2015-09-06 23:44:30	  2015-12-17 13:00:53		6600.00			5		y
4				28		2015-10-07 05:46:26	  2015-12-24 19:42:38		9390.00			3		y
5				29		2015-09-26 09:10:00	  2015-10-18 01:04:45		6478.00			4		n
```

#### Question 18:
What is the average time between placing an order and receiving the order.

SQL:
```
select avg(dateReceived-dateOrdered) as averageWaitingtime,
avg(year(dateReceived)-year(dateOrdered)) as averageWaitingYearTime,
avg(month(dateReceived)-month(dateOrdered)) as averageWaitingMonthTime
from mediaOrder
;
```

#### Answer:
```
averageWaitingtime	averageWaitingYearTime	averageWaitingMonthTime	
139662649.66666666	0.0000					1.4444
```

#### Question 19:
List all music files by category, then alphabetically by artist. Or list all movies by category, then alphabetically by title.

SQL:
```
###For music file and sort by artist.

select mediaType,genre,artist
from media m 
join mediaCategory mc
on m.categoryId=mc.categoryId
where m.mediaType='music'
order by mc.categoryName,m.artist
limit 0,5
;
```

#### Answer:
```
mediaType	genre	artist	
music	Romance	adam
music	Hip Hop	Adele
music	House	Adele
music	Disco	Celine Dion
music	R&B	christina
```

SQL:
```
###For movie file and sort by artist.

select categoryName,mediaTitle,genre,artist 
from media m 
join mediaCategory mc
on m.categoryId=mc.categoryId
where m.mediaType='movie'
order by mc.categoryName,m.mediaTitle
limit 0,5
;
```

#### Answer:
```
categoryName	mediaTitle	genre	artist	
movie	Avengers	Science Fiction	groot
movie	Dew peace	Comedy	enrique
movie	ghost protocol	Thriller	tom cruise
movie	Horrible Bosses 2	Historical	Jason Bateman
movie	Inside out	War	udit kumar swamy
Print
```

#### Question 20:
List the best selling items in each category.

SQL:
```
select m.mediaId,count(m.mediaId),m.mediaType,mc.genre
from media m
join purchase p
on m.mediaId=p.mediaId
join mediaCategory mc
on mc.categoryId=m.categoryId
group by mc.genre
;
```

#### Answer:
```
mediaId	count(m.mediaId)	mediaType	genre	
18		2					music	Ballad
15		2					movie	Comedy
1		1					movie	Crime
7		6					music	Disco
2		2					music	Electronic
```
