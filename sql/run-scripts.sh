for SQL_SCRIPT in `ls *.sql | sort -V`; do

    echo "Importing $SQL_SCRIPT"
    mysql -u"$2" -p"$3" -B "$1" < "$SQL_SCRIPT"

done
