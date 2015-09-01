#!/bin/bash

proddeploy() {
  echo "------------Production Deploy------------"

  echo "---Backing Up Production DB"
  backupremotedb

  echo "Verify DB backup was made."
  ls -l prod-db-backups
  echo "Continue? [y/n]"
  read continue

  if [ "$continue" == "y" ]; then
      echo "---Deploying"
      eb deploy
  else
    echo "---Deploy canceled"
  fi
}

localdev() {
  echo "------------Start Local Dev Enviroment------------"
  #start local dev environment
    #start homestead
    #ssh into homestead
    #go to folder
}

backupremotedb() {
  echo "------------Backup Remote DB------------"
  #backup remote db
  echo "Enter DB password..."
  read dbpassword
  dt_now=$(date '+%d_%m_%Y_%H_%M_%S');
  mysqldump --user=devmaster -p$dbpassword --host=nupicture-dev-db.cwqtmomh10su.us-west-2.rds.amazonaws.com --protocol=tcp --port=3306 --default-character-set=utf8 "nupicture_dev_db" -r "./prod-db-backups/backup$dt_now.sql"
  echo "Copy remote dump to local test folder? [y/n]"
  read continue

  if [ "$continue" == "y" ]; then
    cp "./prod-db-backups/backup$dt_now.sql"  "./tests/_data/dump.sql"
  else
    echo "---Tests copy canceled"
  fi

}

runtests() {
  echo "------------Run Automation Tests------------"

  echo "---Backing Up Production DB"
  backupremotedb

  echo "Verify DB backup was made."
  ls -l prod-db-backups
  echo "Continue? [y/n]"
  read continue

  if [ "$continue" == "y" ]; then
    sudo php codecept.phar run tests/acceptance/
  else
    echo "---Tests canceled"
  fi

}

prodlogs() {
    echo "------------Get Latest Production Logs------------"

    echo "Enter EC2 instance IP"
    read ec2instanceIP
    ssh -i ~/.ssh/nupicture-dev.pem ec2-user@$ec2instanceIP 'cd /var/app/current/storage/logs/; test=$(ls -t | head -1); cat $test;'
}

echo "Available Commands"
echo "1. Production Deploy (proddeploy)"
echo "2. Start Local Dev Enviroment (localdev)"
echo "3. Backup Remote DB (backupremotedb)"
echo "4. Run Automation Tests (runtests)"
echo "5. Get Production Logs(prodlogs)"

read command

if [ "$command" ==  "proddeploy" ]; then
  proddeploy
elif [ $command == "localdev" ]; then
  localdev
elif [ $command == "backupremotedb" ]; then
  backupremotedb
elif [ $command == "runtests" ]; then
  runtests
elif [ $command == "prodlogs" ]; then
  prodlogs
else
  echo "Invalid command"
fi

echo "Bye bye :)"

exit
