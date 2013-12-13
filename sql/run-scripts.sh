for SQL_SCRIPT in *.sql; do

    mysql -u"$2" -p"$3" -B "$1" < "$SQL_SCRIPT"

done
