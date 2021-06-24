On error "Class ....TableSeeder does not exist" run 
```bash
sudo chmod -R 777 vendor
make composer_dump
```

Error on run make watch

```bash
rm -rf node_modules
rm package-lock.json yarn.lock
npm cache clear --force
npm install
```

```bash
sudo chown -R $USER:$USER $PWD
```