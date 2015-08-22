#!/bin/bash

proddeploy() {
  echo "Production Deploy"
  #deploy
    #backup db
    #deploy
}

localdev() {
  echo "Start Local Dev Enviroment"
  #start local dev environment
    #start homestead
    #ssh into homestead
    #go to folder
}

backupremotedb() {
  echo "------------Backup Remote DB------------"
  #backup remote db
  read dbpassword
  dt_now=$(date '+%d_%m_%Y_%H_%M_%S');
  mysqldump --user=devmaster -p$dbpassword --host=nupicture-dev-db.cwqtmomh10su.us-west-2.rds.amazonaws.com --protocol=tcp --port=3306 --default-character-set=utf8 "nupicture_dev_db" > "./prod-db-backups/backup$dt_now.sql"


}

runtests() {
  echo "Run Automation Tests"
  #run tests

}

echo "Available Commands"
echo "1. Production Deploy (proddeploy)"
echo "2. Start Local Dev Enviroment (localdev)"
echo "3. Backup Remote DB (backupremotedb)"
echo "4. Run Automation Tests (runtests)"

read command

if [ "$command" ==  "proddeploy" ]; then
  proddeploy
elif [ $command == "localdev" ]; then
  localdev
elif [ $command == "backupremotedb" ]; then
  backupremotedb
elif [ $command == "runtests" ]; then
  runtests
else
  echo "Invalid command"
fi

echo "Bye bye :)"

exit
