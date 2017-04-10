# webapp_docker_lemp
webapp using LEMP stack and docker.

# deploy
  docker compose up -d 
  docker exec -i webappdockerlemp_db_1 mysql -uroot -padmin --force marathon < marathon.sql
