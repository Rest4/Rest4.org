#!/bin/sh
# Daily tasks
REST_USER="webmaster"
REST_PASSWORD="pass"
REST_SERVER="rest4.org"
REST_WEBMASTER="webmaster@${REST_SERVER}"

echo "# Checking unit tests"
curl --insecure --basic -u "${REST_USER}:${REST_PASSWORD}" -X GET "https://${REST_SERVER}/unit.dat" | mail -s "[${REST_SERVER}] Unit tests results" ${REST_WEBMASTER}

echo "# Deleting sandbox folder"
curl --insecure --basic -u "${REST_USER}:${REST_PASSWORD}" -X DELETE "https://${REST_SERVER}/fs/sandbox/?recursive=yes" | mail -s "[${REST_SERVER}] Sandbox folder deleted" ${REST_WEBMASTER}

echo "# Recreating sandbox folder"
curl --insecure --basic -u "${REST_USER}:${REST_PASSWORD}" -X PUT "https://${REST_SERVER}/fs/sandbox/" | mail -s "[${REST_SERVER}] Sandbox folder created" ${REST_WEBMASTER}
