conc=10
while [ $conc -le 256 ] ; do
	echo "Current concurrent_users $conc"
	siege -u 172.24.240.136/nonce_test_meta_big.html -d1 -r10 -c"$conc"
	conc=`expr $conc + 10`
done
