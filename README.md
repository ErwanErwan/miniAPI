# MiniAPI 


## Install


first clone the repository
``` bash
git clone https://github.com/ErwanErwan/miniAPI.git
```

then cd in the cloned repo and run a php local development server

```bash
cd miniAPI/
php -S localhost:3000
````


## API Doc


The url scheme is the following

http://domain.com/index.php?ressource=entity&param1=12&param2=toto

**ressource:** the name of the entity you wish to reach

**param1:** a parameter to pass to the controller method that handle the request

**param2:** idem

...



### Users

**get all users**
``` bash
GET http://domain.com/index.php?ressource=user
```

**get one user by id**
``` bash
GET http://domain.com/index.php?ressource=user&id_user=[id_user]
```

### Songs

**get all songs**
``` bash
GET http://domain.com/index.php?ressource=song
```

**get one song by id**
``` bash
GET http://domain.com/index.php?ressource=song&id_song=[id_song]
```



### FavoriteSong(user_song)

**get all favorites**
``` bash
GET http://domain.com/index.php?ressource=favorite
```

**get favorite song list by id_user**
``` bash
GET http://domain.com/index.php?ressource=favorite&id_user=[id_user]
```


**add song to favorite for a user**
``` bash
POST http://domain.com/index.php?ressource=favorite&id_user=[id_user]
```

Data
```json
{
	"id_song": 1
}
```


**delete song to favorite for a user**
``` bash
DELETE http://domain.com/index.php?ressource=favorite&id_user=[id_user]&id_song=[id_song]
```


